<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan extends MY_Controller {

	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Keuangan';
		$this->data['subtitle'] = 'Data pemasukan dan pengeluaran keuangan';
		$this->data['module'] = 'keuangan';
		$this->load->model($this->data['module'].'_model','model');
	}
	public function index()
	{
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->model->count_all();

		$this->table->set_template(tbl_tmp());

		$head_data = array(
			'tanggal' => 'Tanggal',
			'tipe_name' => 'Tipe',
			'jenis_name' => 'Jenis',
			'bidan_name' => 'Bidan',
			'jumlah' => 'Jumlah',
			'ket' => 'Keterangan'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['module'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = $this->lang->line('action');
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				dateformatindo($r->tanggal,2),
				$r->tipe_name,
				$r->jenis_name,
				$r->bidan_name,
				number_format($r->jumlah),
				$r->ket,
				anchor($this->data['module'].'/edit/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['module'].'/delete/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = $this->data['module'].get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view($this->data['module'].'_list',$this->data,true);
		$this->load->view('template_view',$data);
	}
	public function search()
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'tipe'=>$this->input->post('tipe'),
			'jenis'=>$this->input->post('jenis'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to')
		);
		redirect($this->data['module'].get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'tanggal' => format_ymd($this->input->post('tanggal')),
			'tipe' => $this->input->post('tipe'),
			'jenis' => $this->input->post('jenis'),
			'bidan' => $this->input->post('bidan'),
			'jumlah' => format_uang($this->input->post('jumlah')),
			'ket' => $this->input->post('ket')
		);
		return $data;		
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim');
		$this->form_validation->set_rules('tipe','Tipe','required|trim');
		$this->form_validation->set_rules('jenis','Jenis','trim');
		$this->form_validation->set_rules('bidan','Bidan','trim');
		$this->form_validation->set_rules('jumlah','Jumlah','trim|required');
		$this->form_validation->set_rules('ket','Keterangan','trim');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
	}
	public function add()
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['action'] = $this->data['module'].'/add'.get_query_string();
			$this->data['owner'] = '';
			$data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$data);
		}else{
			$data = $this->_field();
			$this->general_model->add($this->data['module'],$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['module'].'/add'.get_query_string());
		}
	}
	public function edit($id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['row'] = $this->general_model->get_from_field($this->data['module'],'id',$id)->row();
			$this->data['action'] = $this->data['module'].'/edit/'.$id.get_query_string(); 
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$data);
		}else{
			$data = $this->_field();
			$this->general_model->edit($this->data['module'],$id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['module'].'/edit/'.$id.get_query_string());
		}
	}
	public function delete($id='')
	{
		if($id<>''){
			$this->general_model->delete($this->data['module'],$id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->general_model->delete($this->data['module'],$c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('delete_success').'</div>');
		redirect($this->data['module'].get_query_string());
	}
	public function pdf()
	{
		require_once "assets/plugins/fpdf/fpdf.php";		
		$pdf = new FPDF();
		$pdf->SetAutoPageBreak(TRUE, 10);
		$pdf->AliasNbPages();
		
		$result = $this->model->get()->result();
		$periode = '';
		if ($this->input->get('date_from') && $this->input->get('date_to')) {
			$periode = 'PERIODE '.format_dmy($this->input->get('date_from')).' S/D '.format_dmy($this->input->get('date_to'));			
		}
		$title = 'LAPORAN KEUANGAN '.$periode;

		$pdf->AddPage('L','A4');
		$pdf->SetTitle($title);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(0,5,$title,0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'PENGURUS CABANG IBI CIANJUR - WILAYAH JAWA BARAT',0,0,'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',10);
		if ($this->input->get('tipe')) {
			$pdf->Cell(20,5,'TIPE',0,0,'L');
			$pdf->Cell(0,5,' : '.$result[0]->tipe_name,0,0,'L');
			$pdf->Ln(10);			
		}
		if ($this->input->get('jenis')) {
			$pdf->Cell(20,5,'JENIS',0,0,'L');
			$pdf->Cell(0,5,' : '.$result[0]->jenis_name,0,0,'L');
			$pdf->Ln(10);
		}
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell(10,15,'NO',1,0,'C');
		$pdf->Cell(35,15,'TANGGAL',1,0,'C');
		$pdf->Cell(30,15,'TIPE',1,0,'C');
		$pdf->Cell(40,15,'JENIS',1,0,'C');
		$pdf->Cell(40,15,'BIDAN',1,0,'C');
		$pdf->Cell(30,15,'JUMLAH',1,0,'C');
		$pdf->Cell(0,15,'KETERANGAN',1,0,'C');
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',6);
		$i = 1;
		$total = 0;
		foreach ($result as $b) {
			$pdf->Cell(10,5,$i,1,0,'C');
			$pdf->Cell(35,5,dateformatindo($b->tanggal,2),1,0,'L');
			$pdf->Cell(30,5,$b->tipe_name,1,0,'L');
			$pdf->Cell(40,5,$b->jenis_name,1,0,'L');
			$pdf->Cell(40,5,$b->bidan_name,1,0,'L');
			$pdf->Cell(30,5,number_format($b->jumlah),1,0,'R');
			$pdf->Cell(0,5,$b->ket,1,0,'L');
			$pdf->Ln(5);
			$total += $b->jumlah;
			$i++;
		}
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell(155,5,'TOTAL',1,0,'C');
		$pdf->Cell(30,5,number_format($total),1,0,'R');
		$pdf->Cell(0,5,'',1,0,'R');
		$pdf->Output($title,"I");		
	}
}