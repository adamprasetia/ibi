<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_sipb_m extends MY_Controller 
{
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'SIPB M';
		$this->data['subtitle'] = 'List';
		$this->data['module'] = 'bidan';
		$this->data['modulesub'] = 'sipb_m';
		$this->data['index'] = $this->data['module'].'/'.$this->data['modulesub'];
		$this->data['view'] = 'bidan_sipb_m';
		$this->load->model($this->data['view'].'_model','model');
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
			'bidan_'.$this->data['modulesub'].'_tipe_name' => 'Jenis Pengajuan',
			'bidan_'.$this->data['modulesub'].'_status_name' => 'Status',
			'nomor' => 'Nomor',
			'masa_berlaku' => 'Masa Berlaku'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['index'].'/index/'.$bidan_id.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
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
				$r->{'bidan_'.$this->data['modulesub'].'_tipe_name'},
				$r->{'bidan_'.$this->data['modulesub'].'_status_name'},
				$r->nomor,
				dateformatindo($r->masa_berlaku,2),
				anchor($this->data['index'].'/edit/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['index'].'/pdf/'.$bidan_id.'/'.$r->id,'Cetak',array('class'=>'btn btn-default btn-xs','target'=>'_blank'))
				."&nbsp;|&nbsp;".anchor($this->data['index'].'/delete/'.$bidan_id.'/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['index'].'/index/'.$bidan_id.get_query_string(null,'offset'));
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['content'] = $this->load->view($this->data['view'].'_list',$this->data,true);
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
		redirect($this->data['index'].'/index/'.$bidan_id.get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'tipe'=>$this->input->post('tipe'),
			'bidan_lain'=>$this->input->post('bidan_lain'),
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
			$this->data['syarat'] = $this->general_model->get('bidan_'.$this->data['modulesub'].'_syarat')->result();
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['action'] = $this->data['index'].'/add/'.$bidan_id.get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['view'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->model->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['index'].'/index/'.$bidan_id.get_query_string());
		}
	}
	public function edit($bidan_id,$id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['syarat'] = $this->general_model->get('bidan_'.$this->data['modulesub'].'_syarat')->result();
			$this->data['bidan_id'] = $bidan_id;
			$this->data['bidan'] = $this->general_model->get_from_field('bidan','id',$bidan_id)->row();
			$this->data['row'] = $this->model->get_from_field('id',$id)->row();
			$this->data['row']->tanggal = format_dmy($this->data['row']->tanggal);
			$this->data['row']->masa_berlaku = format_dmy($this->data['row']->masa_berlaku);
			$this->data['row']->syarat = explode(',', $this->data['row']->syarat);
			$this->data['action'] = $this->data['index'].'/edit/'.$bidan_id.'/'.$id.get_query_string();
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$this->data['content'] = $this->load->view($this->data['view'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['bidan'] = $bidan_id;
			$data['user_update'] = $this->user_login['id'];
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->model->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['index'].'/edit/'.$bidan_id.'/'.$id.get_query_string());
		}
	}
	public function delete($bidan_id,$id='')
	{
		if($id<>''){
			$this->model->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->model->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('delete_success').'</div>');
		redirect($this->data['index'].'/index/'.$bidan_id.get_query_string());
	}
	public function pdf($bidan_id,$id)
	{
		$this->load->model('bidan/bidan_model');
		$bidan = $this->bidan_model->get_by_id($bidan_id);
		$sipb_m = $this->general_model->get_from_field('bidan_sipb_m','id',$id)->row();
		$bidan_lain = false;
		if ($sipb_m->bidan_lain) {
			$bidan_lain = $this->bidan_model->get_by_id($sipb_m->bidan_lain);			
		}
		$str = $this->general_model->last('bidan_str',$bidan->id,$sipb_m->tanggal);
		if ($bidan_lain) {
			$str_lain = $this->general_model->last('bidan_str',$bidan_lain->id,$sipb_m->tanggal);			
		}
		if ($sipb_m->tipe!=1) {
			$last_sipb = $this->general_model->last('bidan_sipb_m',$bidan->id,$sipb_m->tanggal);			
		}

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
		$pdf->Cell(0,5,'PENERBITAN SURAT IZIN PRAKTIK BIDAN (SIPB/M)',0,0,'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',10);
		if ($bidan_lain) {
			if ($sipb_m->tipe==1) {
				$pdf->MultiCell(0,5,'        Berdasarkan Peraturan Menteri Kesehatan Republik Indonesia Nomor 1464/MENKES/PER/X/2010, tentang Izin dan Penyelenggaraan Praktik Bidan. Dengan ini kami Pengurus Organisasi Ikatan Bidan Indonesia Kabupaten Cianjur memberikan rekomendasi untuk penerbitan Surat Izin Praktik Bidan (SIPB) satu atap (1 BPM dengan 2 SIPB) kepada yang bersangkutan karena telah memenuhi persyaratan administrasi dan persyaratan praktik bidan, sesuai dengan ketentuan yang berlaku, atas nama :',0,'J');
			}else{
				$pdf->MultiCell(0,5,'        Berdasarkan Peraturan Menteri Kesehatan Republik Indonesia Nomor 1464/MENKES/PER/X/2010, tentang Izin dan Penyelenggaraan Praktik Bidan. Dengan ini kami Pengurus Organisasi Ikatan Bidan Indonesia Kabupaten Cianjur memberikan rekomendasi untuk penerbitan Surat Izin Praktik Bidan (SIPB) 1 atap (1 BPM 2 SIPB) dengan Bidan '.$bidan->name.' Nomor SIPB '.$last_sipb->nomor.' kepada yang bersangkutan karena telah memenuhi persyaratan administrasi dan persyaratan praktik bidan, sesuai dengan ketentuan yang berlaku, atas nama :',0,'J');				
			}
		}else{
			$pdf->MultiCell(0,5,'        Berdasarkan Peraturan Menteri Kesehatan Republik Indonesia Nomor 1464/MENKES/PER/X/2010, tentang Izin dan Penyelenggaraan Praktik Bidan. Dengan ini kami Pengurus Organisasi Ikatan Bidan Indonesia Kabupaten Cianjur memberikan rekomendasi untuk penerbitan Surat Izin Praktik Bidan (SIPB) kepada yang bersangkutan karena telah memenuhi persyaratan administrasi dan persyaratan praktik bidan, sesuai dengan ketentuan yang berlaku, atas nama :',0,'J');
		}
		$pdf->SetFont('Arial','',8);
		$pdf->Ln(5);
		$pdf->Cell(35,5,'Nama',0,0,'L');
		$pdf->Cell(5,5,' : ',0,0,'C');
		$pdf->Cell(55,5,$bidan->name,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(35,5,'Tempat, Tanggal lahir',0,0,'L');
		$pdf->Cell(5,5,' : ',0,0,'C');
		$pdf->Cell(55,5,$bidan->tempat_lahir.', '.dateformatindo($bidan->tanggal_lahir,2),0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(35,5,'Pedidikan',0,0,'L');
		$pdf->Cell(5,5,' : ',0,0,'C');
		$pdf->Cell(55,5,$bidan->pendidikan_name,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(35,5,'Alamat Praktik',0,0,'L');
		$pdf->Cell(5,5,' : ',0,0,'C');
		$pdf->Cell(55,5,$bidan->praktik_nama,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(40,5,'',0,0,'C');
		$pdf->MultiCell(55,5,$bidan->praktik_alamat,0,'L');
		$pdf->Ln(5);
		if ($sipb_m->tipe!=1 && $sipb_m->bidan_lain==false) {
			$pdf->Cell(35,5,'Nomor SIPB LAMA',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(55,5,$last_sipb->nomor,0,0,'L');
			$pdf->Ln(5);
			$pdf->Cell(35,5,'Masa Berlaku SIPB LAMA',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(55,5,dateformatindo($last_sipb->masa_berlaku,2),0,0,'L');
			$pdf->Ln(5);
		}
		$pdf->Cell(35,5,'Nomor STR',0,0,'L');
		$pdf->Cell(5,5,' : ',0,0,'C');
		$pdf->Cell(55,5,$str->nomor,0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(35,5,'Masa Berlaku STR',0,0,'L');
		$pdf->Cell(5,5,' : ',0,0,'C');
		$pdf->Cell(55,5,dateformatindo($str->masa_berlaku,2),0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(35,5,'Nomor Kartu Anggota',0,0,'L');
		$pdf->Cell(5,5,' : ',0,0,'C');
		$pdf->Cell(55,5,$bidan->kta_no,0,0,'L');
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

		if ($bidan_lain && $sipb_m->tipe==1) {			
			$pdf->setXY(110,105);
			$pdf->Cell(35,5,'Nama',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(0,5,$bidan_lain->name,0,0,'L');
			$pdf->Ln(5);
			$pdf->setX(110);
			$pdf->Cell(35,5,'Tempat, Tanggal lahir',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(0,5,$bidan_lain->tempat_lahir.', '.dateformatindo($bidan_lain->tanggal_lahir,2),0,0,'L');
			$pdf->Ln(5);
			$pdf->setX(110);
			$pdf->Cell(35,5,'Pedidikan',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(0,5,$bidan_lain->pendidikan_name,0,0,'L');
			$pdf->Ln(5);
			$pdf->setX(110);
			$pdf->Cell(35,5,'Alamat Praktik',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(0,5,$bidan->praktik_nama,0,0,'L');
			$pdf->Ln(5);
			$pdf->setX(110);
			$pdf->Cell(40,5,'',0,0,'C');
			$pdf->MultiCell(0,5,$bidan->praktik_alamat,0,'L');
			$pdf->Ln(5);
			$pdf->setX(110);
			$pdf->Cell(35,5,'Nomor STR',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(60,5,$str_lain->nomor,0,0,'L');
			$pdf->Ln(5);
			$pdf->setX(110);
			$pdf->Cell(35,5,'Masa Berlaku STR',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(60,5,dateformatindo($str_lain->masa_berlaku,2),0,0,'L');
			$pdf->Ln(5);
			$pdf->setX(110);
			$pdf->Cell(35,5,'Nomor Kartu Anggota',0,0,'L');
			$pdf->Cell(5,5,' : ',0,0,'C');
			$pdf->Cell(60,5,$bidan_lain->kta_no,0,0,'L');
			$pdf->Ln(10);		
		}				
		$pdf->Output($title,"I");		
	}
}