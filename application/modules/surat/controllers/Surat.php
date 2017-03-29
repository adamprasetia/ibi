<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends MY_Controller 
{
	private $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Surat';
		$this->data['subtitle'] = 'List';
		$this->data['module'] = 'surat';
		$this->load->model($this->data['module'].'_model','model');
		$this->load->helper('text');
	}
	public function index()
	{
		$offset = $this->general->get_offset();
		$limit = $this->general->get_limit();
		$total = $this->model->count_all();
		
		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'surat_tipe_name' => 'Tipe Surat',
			'bulan' => 'Bulan',
			'tahun' => 'Tahun',
			'nomor' => 'Nomor'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['module'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>$this->lang->line('action'),'style'=>'min-width:110px');
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				$r->surat_tipe_name,
				get_mm($r->bulan),
				$r->tahun,
				$r->nomor,
				anchor($this->data['module'].'/edit/'.$r->id.get_query_string(),'Ubah',array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['module'].'/'.strtolower($r->surat_tipe_name).'_pd/'.$r->id.get_query_string(),$r->surat_tipe_name.' PD',array('target'=>'_blank','class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['module'].'/'.strtolower($r->surat_tipe_name).'_pc/'.$r->id.get_query_string(),$r->surat_tipe_name.' PC',array('target'=>'_blank','class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['module'].'/delete/'.$r->id.get_query_string(),'Delete',array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['module'].'/index'.get_query_string(null,'offset'));
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$this->data['pagination'] = $this->pagination->create_links();

		$this->data['content'] = $this->load->view($this->data['module'].'_list',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function search()
	{
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit')
		);
		redirect($this->data['module'].'/index'.get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'tipe'=>$this->input->post('tipe'),
			'bulan'=>$this->input->post('bulan'),
			'tahun'=>$this->input->post('tahun'),
			'nomor'=>$this->input->post('nomor')
		);
		return $data;
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('tipe','Tipe Surat','trim');
		$this->form_validation->set_rules('bulan','Bulan','trim');
		$this->form_validation->set_rules('tahun','Tahun','trim');
		$this->form_validation->set_rules('nomor','Nomor','trim');
	}
	public function add()
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['action'] = $this->data['module'].'/add'.get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->model->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['module'].get_query_string());
		}
	}
	public function edit($id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['row'] = $this->model->get_from_field('id',$id)->row();
			$this->data['action'] = $this->data['module'].'/edit/'.$id.get_query_string();
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->user_login['id'];
			$data['date_update'] = date('Y-m-d H:i:s');
			$this->model->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>');
			redirect($this->data['module'].'/edit/'.$id.get_query_string());
		}
	}
	public function delete($id='')
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
		redirect($this->data['module'].get_query_string());
	}
	public function kta_pd($id)
	{
		$row = $this->model->get_from_field('id',$id)->row();
		$total = $this->model->surat_total($row->bulan,$row->tahun);
		$bidan = $this->model->bidan($row->bulan,$row->tahun);
		$limit = 30;

		require_once "assets/plugins/fpdf/fpdf.php";		
		$pdf = new FPDF();
		$pdf->SetAutoPageBreak(TRUE, 10);
		$pdf->AliasNbPages();

		$pdf->AddPage('L','Legal');
		if ($total <= $limit) {
			$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),30,55+($total*4),50);
			$pdf->Image(base_url('assets/img/ttd_sekretaris.jpg'),210,50+($total*4),20);
		}
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(0,5,'REKAP DATA PENGAJUAN BARU KARTU TANDA ANGGOTA IBI',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'PENGURUS CABANG IBI CIANJUR - WILAYAH JAWA BARAT BULAN '.strtoupper(get_mm($row->bulan)).' TAHUN '.$row->tahun,0,0,'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',6);
		$pdf->Cell(7,15,'NO',1,0,'C');
		$pdf->Cell(35,15,'NAMA',1,0,'C');
		$pdf->Cell(25,5,'PESERTA ANGGOTA',1,0,'C');
		$pdf->setXY(52,30);
		$pdf->Cell(12.5,10,'B',1,0,'C');
		$pdf->Cell(12.5,5,'LAMA',1,0,'C');
		$pdf->setXY(64.5,35);
		$pdf->Cell(12.5,5,'NO ID',1,0,'C');
		$pdf->setXY(77,25);
		$pdf->Cell(45,15,'TEMPAT/TGL LAHIR',1,0,'C');
		$pdf->Cell(115,15,'ALAMAT',1,0,'C');
		$pdf->Cell(40,5,'PENDIDIKAN',1,0,'C');
		$pdf->setXY(237,30);
		$pdf->Cell(8,10,'D1',1,0,'C');
		$pdf->Cell(8,10,'D3',1,0,'C');
		$pdf->Cell(8,10,'D4',1,0,'C');
		$pdf->Cell(8,10,'S1',1,0,'C');
		$pdf->Cell(8,10,'S2',1,0,'C');
		$pdf->setXY(277,25);
		$pdf->Cell(20,15,'LULUS',1,0,'C');
		$pdf->Cell(20,15,'G.D',1,0,'C');
		$pdf->Cell(0,15,'KET',1,0,'C');
		$pdf->Ln(15);
		$i = 1;
		foreach ($bidan as $b) {
			$pdf->Cell(7,4,$i,1,0,'C');
			$pdf->Cell(35,4,$b->name,1,0,'L');
			$pdf->Cell(12.5,4,($b->tipe==1?'x':''),1,0,'C');
			$pdf->Cell(12.5,4,($b->tipe==3?'x':$b->kta_no),1,0,'C');
			$pdf->Cell(45,4,$b->tempat_lahir.', '.dateformatindo($b->tanggal_lahir,2),1,0,'L');
			$pdf->Cell(115,4,$b->alamat,1,0,'L');
			$pdf->Cell(8,4,($b->pendidikan==1?'x':''),1,0,'C');
			$pdf->Cell(8,4,($b->pendidikan==2?'x':''),1,0,'C');
			$pdf->Cell(8,4,($b->pendidikan==3?'x':''),1,0,'C');
			$pdf->Cell(8,4,($b->pendidikan==4?'x':''),1,0,'C');
			$pdf->Cell(8,4,($b->pendidikan==5?'x':''),1,0,'C');
			$pdf->Cell(20,4,$b->tahun_lulus,1,0,'C');
			$pdf->Cell(20,4,$b->golongan_darah_name,1,0,'C');
			$pdf->Cell(0,4,strtoupper($b->bidan_kta_tipe_name),1,0,'C');
			$pdf->Ln(4);
			if ($i%$limit==0 && $i!=$total) {
				$pdf->AddPage('L','Legal');
			}
			if ($i == $total && $total > $limit) {
				$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),30,25+(($i%$limit)*4),50);
				$pdf->Image(base_url('assets/img/ttd_sekretaris.jpg'),210,20+(($i%$limit)*4),20);
			}
			$i++;
		}
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(90,5,'Mengetahui',0,0,'C');
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,5,'Cianjur, '.dateformatindo(date('Y-m-d'),2),0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(90,5,'Ketua',0,0,'C');
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,5,'Sekretaris',0,0,'C');
		$pdf->Ln(20);
		$pdf->Cell(90,5,'Liste Zulhijwati Wulan., AMKeb., SKM., M.Kes',0,0,'C');
		$pdf->Cell(0,5,'Dewi Ratih AMKeb., SKM., M.Kes',0,0,'C');
		$pdf->Ln(5);


		$pdf->AddPage('P','A4');
		$pdf->SetTitle('Pengajuan KTA Baru dan Lama '.get_mm($row->bulan).' '.$row->tahun);

		/* Kop Surat*/
		$pdf->Image(base_url('assets/img/logo.jpg'),20,10);
		$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),25,160,50);
		$pdf->Image(base_url('assets/img/cap.jpg'),80,150,40);
		$pdf->Image(base_url('assets/img/ttd_sekretaris.jpg'),135,155,20);
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
		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Cianjur, '.dateformatindo(date('Y-m-d'),2),0,0,'C');
		$pdf->Ln(10);
		$pdf->Cell(25,5,'Nomor',0,0,'L');
		$pdf->Cell(5,5,':',0,0,'L');
		$pdf->Cell(70,5,$row->nomor,0,0,'L');
		$pdf->Cell(0,5,'Kepada Yth,',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(25,5,'Lampiran',0,0,'L');
		$pdf->Cell(5,5,':',0,0,'L');
		$pdf->Cell(70,5,'1 Berkas',0,0,'L');
		$pdf->Cell(0,5,'Sekretariat Pengurus Daerah IBI',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(25,5,'Perihal',0,0,'L');
		$pdf->Cell(5,5,':',0,0,'L');
		$pdf->Cell(70,5,'Pengajuan KTA Baru dan Lama',0,0,'L');
		$pdf->Cell(0,5,'Provinsi Jawa Barat',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Di',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(100,5,'',0,0,'C');
		$pdf->Cell(0,5,'Tempat',0,0,'C');
		$pdf->Ln(15);
		$pdf->Cell(0,5,'Dengan Hormat,',0,0,'L');
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Bersama Surat ini kami kirimkan Rekap Data Pengajuan Anggota Baru dan Perpanjang sebanyak '.$total.' orang untuk mendapatkan Kartu Tanda Anggota Ikatan Bidan Indonesia, berasal dari Pengurus Cabang IBI Kabupaten Cianjur - Wilayah Jawa Barat. Sehubungan hal tersebut, mohon kiranya dapat ditindak lanjuti untuk dapat dibuatkan KTA - nya. Demikian yang dapat kami sampaikan atas perhatian dan bantuannya kami ucapkan terimakasih.',0,'J');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(0,5,'PENGURUS CABANG IKATAN BIDAN INDONESIA',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'KABUPATEN CIANJUR',0,0,'C');
		$pdf->Ln(15);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(90,5,'Ketua',0,0,'C');
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,5,'Sekretaris',0,0,'C');
		$pdf->Ln(30);
		$pdf->Cell(90,5,'Liste Zulhijwati Wulan., AMKeb., SKM., M.Kes',0,0,'C');
		$pdf->Cell(0,5,'Dewi Ratih AMKeb., SKM., M.Kes',0,0,'C');
		$pdf->Ln(5);

		$pdf->Output("Pengajuan KTA Baru dan Lama","I");
	}
	public function kta_pc($id)
	{
		$row = $this->model->get_from_field('id',$id)->row();
		$bidan = $this->model->bidan($row->bulan,$row->tahun);

		require_once "assets/plugins/fpdf/fpdf.php";		
		$pdf = new FPDF();
		$pdf->SetAutoPageBreak(TRUE, 10);
		$pdf->AliasNbPages();

		$pdf->AddPage('L','Legal');
		$pdf->SetTitle('Pengajuan KTA Baru dan Lama '.get_mm($row->bulan).' '.$row->tahun);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(0,5,'REKAP DATA PENGAJUAN BARU ANGGOTA IBI',0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(0,5,'PENGURUS CABANG IBI CIANJUR - WILAYAH JAWA BARAT BULAN '.strtoupper(get_mm($row->bulan)).' TAHUN '.$row->tahun,0,0,'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell(7,15,'NO',1,0,'C');
		$pdf->Cell(35,15,'NAMA',1,0,'C');
		$pdf->Cell(115,15,'ALAMAT',1,0,'C');
		$pdf->Cell(40,15,'PUSKESMAS/BPS',1,0,'C');
		$pdf->Cell(20,15,'NO HP',1,0,'C');
		$pdf->Cell(30,15,'NO. KTA',1,0,'C');
		$pdf->Cell(30,15,'TGL PENGAMBILAN',1,0,'C');
		$pdf->Cell(30,15,'MASA BERLAKU',1,0,'C');
		$pdf->Cell(0,15,'TTD',1,0,'C');
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',6);
		$i = 1;
		foreach ($bidan as $b) {
			$pdf->Cell(7,5,$i,1,0,'C');
			$pdf->Cell(35,5,$b->name,1,0,'L');
			$pdf->Cell(115,5,$b->alamat,1,0,'L');
			$pdf->Cell(40,5,$b->tempat_kerja,1,0,'L');
			$pdf->Cell(20,5,$b->tlp,1,0,'L');
			$pdf->Cell(30,5,'',1,0,'C');
			$pdf->Cell(30,5,'',1,0,'C');
			$pdf->Cell(30,5,'',1,0,'C');
			$pdf->Cell(0,5,$i.'...................','R',0,($i%2==0?'L':'R'));
			$pdf->Ln(5);
			$i++;
		}
		$pdf->Output("Pengajuan KTA Baru dan Lama","I");
	}
}