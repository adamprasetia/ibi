<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_sipb_p extends MY_Controller {

	private $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'SIPB P';
		$this->data['subtitle'] = 'List';
		$this->data['module'] = 'bidan_sipb_p';
		$this->data['url'] = 'bidan/sipb_p';
		$this->load->model($this->data['module'].'_model','model');
		$this->load->helper('text');
	}
	public function index($bidan_id)
	{
		$offset = $this->general->get_offset();
		$limit = $this->general->get_limit();
		$total = $this->model->count_all($bidan_id);
		
		$this->data['bidan_id'] = $bidan_id;
		$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'tanggal' => 'Tanggal Permohonan',
			$this->data['module'].'_tipe_name' => 'Jenis Pengajuan',
			$this->data['module'].'_status_name' => 'Status',
			'nomor' => 'Nomor',
			'masa_berlaku' => 'Masa Berlaku'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['url'].'/index/'.$bidan_id.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>$this->lang->line('action'),'style'=>'min-width:110px');
		$this->table->set_heading($heading);
		$result = $this->model->get($bidan_id)->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				dateformatindo($r->tanggal,2),
				$r->{$this->data['module'].'_tipe_name'},
				$r->{$this->data['module'].'_status_name'},
				$r->nomor,
				dateformatindo($r->masa_berlaku,2),
				anchor($this->data['url'].'/edit/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['url'].'/pdf/'.$bidan_id.'/'.$r->id,'Cetak',array('class'=>'btn btn-default btn-xs','target'=>'_blank'))
				."&nbsp;|&nbsp;".anchor($this->data['url'].'/delete/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['url'].'/index/'.$bidan_id.get_query_string(null,'offset'));
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['content'] = $this->load->view($this->data['module'].'_list',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function search($bidan_id)
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'tipe'=>$this->input->post('tipe'),
			'status'=>$this->input->post('status'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to')
		);
		redirect($this->data['url'].'/index/'.$bidan_id.get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'tipe'=>$this->input->post('tipe'),
			'tanggal'=>format_ymd($this->input->post('tanggal')),
			'nomor'=>$this->input->post('nomor'),
			'masa_berlaku'=>format_ymd($this->input->post('masa_berlaku')),
			'status'=>$this->input->post('status')
		);
		if ($this->input->post('syarat')) {
			$data['syarat'] = implode(',',$this->input->post('syarat'));
		}
		return $data;
	}
	public function _check_double($tipe = '',$bidan_id = '')
	{
		$result = $this->model->check_double($bidan_id);
		if ($result) {
			$this->form_validation->set_message('_check_double', 'Sudah terdaftar di pengajuan '.$this->data['title']);	
			return FALSE;
		}
		return TRUE;
	}	
	private function _set_rules($bidan_id = '')
	{
		// echo $bidan_id;exit;
		if ($bidan_id) {
			$this->form_validation->set_rules('tipe','Jenis Pengajuan','required|trim|callback__check_double['.$bidan_id.']');
		}else{
			$this->form_validation->set_rules('tipe','Jenis Pengajuan','required|trim');			
		}		
		$this->form_validation->set_rules('tanggal','Tanggal Permohonan','required|trim');
		$this->form_validation->set_rules('nomor','Nomor','trim');
		$this->form_validation->set_rules('masa_berlaku','Masa Berlaku','trim');
		$this->form_validation->set_rules('status','Status','required|trim');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');			
	}
	public function add($bidan_id)
	{
		$this->_set_rules($bidan_id);
		if($this->form_validation->run()===false){
			$this->data['syarat'] = $this->general_model->get($this->data['module'].'_syarat')->result();
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['action'] = $this->data['url'].'/add/'.$bidan_id.get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$this->general_model->add($this->data['module'],$data);
			if ($this->input->post('lunas')) {
				$this->keuangan($bidan_id);	
			}			
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['url'].'/index/'.$bidan_id.get_query_string());
		}
	}
	private function keuangan($bidan_id)
	{
		$tipe = $this->input->post('tipe');
		$data = array(
			'bidan'=>$bidan_id,
			'tanggal'=>format_ymd($this->input->post('tanggal')),
			'tipe'=>'1'
		);
		$this->load->model('bidan/bidan_model');
		$bidan = $this->bidan_model->get($bidan_id)->row();
		if ($tipe==1) {
			$data['jenis'] = '6'; //SIPB P - Baru
		}else {
			$data['jenis'] = '7'; //SIPB P - Perpanjang
		}
		$this->load->model('keuangan_harga/keuangan_harga_model');
		$keuangan_harga = $result = $this->keuangan_harga_model->harga($data['jenis'],$bidan->wilayah)->row();
		$data['jumlah'] = $keuangan_harga->harga;
		$data['ket'] = 'Otomatis';
		$this->general_model->add('keuangan',$data);
	}		
	public function edit($bidan_id,$id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['syarat'] = $this->general_model->get($this->data['module'].'_syarat')->result();
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['row'] = $this->general_model->get_from_field($this->data['module'],'id',$id)->row();
			$this->data['row']->tanggal = format_dmy($this->data['row']->tanggal);
			$this->data['row']->masa_berlaku = format_dmy($this->data['row']->masa_berlaku);
			$this->data['row']->syarat = explode(',', $this->data['row']->syarat);
			$this->data['action'] = $this->data['url'].'/edit/'.$bidan_id.'/'.$id.get_query_string();
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$this->general_model->edit($this->data['module'],$id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['url'].'/edit/'.$bidan_id.'/'.$id.get_query_string());
		}
	}
	public function delete($bidan_id,$id='')
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
		redirect($this->data['url'].'/index/'.$bidan_id.get_query_string());
	}
	public function pdf($bidan_id,$id)
	{
		$this->load->model('bidan_str/bidan_str_model');
		$this->load->model('bidan/bidan_model');
		$bidan = $this->bidan_model->get($bidan_id)->row();
		$sipb_p = $this->general_model->get_from_field('bidan_sipb_p','id',$id)->row();
		$str = $this->bidan_str_model->last($bidan->id,$sipb_p->tanggal);

		require_once "assets/plugins/fpdf/fpdf.php";		
		$pdf = new FPDF();
		$pdf->SetAutoPageBreak(TRUE, 10);
		$pdf->AliasNbPages();

		$title = 'SURAT REKOMENDASI INSTANSI ('.strtoupper($bidan->name).')';

		$pdf->AddPage('P','A4');
		$pdf->SetTitle($title);

		/* Kop Surat*/
		$pdf->Image(base_url('assets/img/logo.jpg'),20,10);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(20,5,'',0,0,'C');
		$pdf->Cell(0,5,'PENGURUS CABANG',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(20,5,'',0,0,'C');
		$pdf->Cell(0,5,'IKATAN BIDAN INDONESIA CABANG KABUPATEN CIANJUR',0,0,'C');
		$pdf->Ln(5);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(20,5,'',0,0,'C');
		$pdf->Cell(0,5,'Indonesian Midwives Association - Cianjur West Java Region',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(20,5,'',0,0,'C');
		$pdf->Cell(0,5,'Sekretariat : Jl. Otto Iskandardinata I No 11 Bojong Herang - Cianjur',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(20,5,'',0,0,'C');
		$pdf->Cell(0,5,'Telp : (0263) 281496 || Website :  www.ibicianjur.net',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(20,5,'',0,0,'C');
		$pdf->Cell(0,5,'Email: bidan@ibicianjur.net / pcibicianjur@gmail.com',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'','B',0,'C');
		$pdf->Ln(10);

		/* Isi Surat*/
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(0,5,'SURAT REKOMENDASI',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'Nomor : '.strtoupper($bidan->nomor).'/REK/PCIBI/CJR/'.get_mm_roman(date('n')).'/'.date('Y'),0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'TENTANG',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'PENERBITAN SURAT IZIN PRAKTIK BIDAN (SIKB/P)',0,0,'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',10);
		$pdf->MultiCell(0,5,'        Berdasarkan Peraturan Menteri Kesehatan Republik Indonesia Nomor 1464/MENKES/PER/X/2010, tentang Izin dan Penyelenggaraan Praktik Bidan bahwa Surat Tanda Register (STR) atas nama : '.$bidan->name.' Nomor : '.$str->nomor.'. Masih berlaku sampai dengan '.dateformatindo($str->masa_berlaku,2),0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'        Dengan ini kami Pengurus Organisasi Ikatan Bidan Indonesia Kabupaten Cianjur memberikan rekomendasi untuk penerbitan Surat Izin Kerja Bidan (SIKB) kepada yang bersangkutan karena telah memenuhi persyaratan administrasi, sesuai dengan ketentuan yang berlaku, atas nama :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(45,5,'Nama',0,0,'L');
		$pdf->Cell(10,5,' : ',0,0,'C');
		$pdf->Cell(0,5,$bidan->name,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(45,5,'Tempat, Tanggal lahir',0,0,'L');
		$pdf->Cell(10,5,' : ',0,0,'C');
		$pdf->Cell(0,5,$bidan->tempat_lahir.', '.dateformatindo($bidan->tanggal_lahir,2),0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(45,5,'Pedidikan',0,0,'L');
		$pdf->Cell(10,5,' : ',0,0,'C');
		$pdf->Cell(0,5,$bidan->pendidikan_name,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(45,5,'Tahun Lulus',0,0,'L');
		$pdf->Cell(10,5,' : ',0,0,'C');
		$pdf->Cell(0,5,$bidan->tahun_lulus,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(45,5,'Tempat Bekerja',0,0,'L');
		$pdf->Cell(10,5,' : ',0,0,'C');
		$pdf->Cell(0,5,$bidan->praktik_nama,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(55,5,'',0,0,'C');
		$pdf->MultiCell(0,5,$bidan->praktik_alamat,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(45,5,'Nomor Kartu Anggota (KTA)',0,0,'L');
		$pdf->Cell(10,5,' : ',0,0,'C');
		$pdf->Cell(0,5,$bidan->kta_no,0,0,'L');
		$pdf->Ln(10);
		$pdf->Cell(0,5,'Demikian surat rekomendasi ini dibuat, untuk dipergunakan sebagaimana mestinya.',0,0,'C');
		$pdf->Ln(10);
		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Cianjur, '.dateformatindo(date('Y-m-d'),2),0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Ketua',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(120,5,'',0,0,'C');
		$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),null,null,50);
		$pdf->Ln(5);
		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Liste Zulhijwati Wulan., AMKeb., SKM., M.Kes',0,0,'C');
		$pdf->Output($title,"I");		
	}
	public function last()
	{
		$bidan = $this->input->get('bidan');
		$tanggal = format_ymd($this->input->get('tanggal'));
		$result = $this->model->last($bidan,$tanggal);
		echo json_encode($result);
	}	
}