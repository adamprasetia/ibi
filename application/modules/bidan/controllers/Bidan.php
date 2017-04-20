<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan extends MY_Controller 
{
	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Master Bidan';
		$this->data['subtitle'] = 'Pengolahan data bidan';
		$this->data['module'] = 'bidan';
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
			'name' => 'Nama Lengkap',
			'tanggal_lahir' => 'TTL',
			'tlp' => 'No Telp/HP',
			'tempat_kerja' => 'Instansi/Tempat Kerja',
			'kta_no' => 'Nomor KTA',
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['module'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>$this->lang->line('action'),'style'=>'min-width:120px');
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				anchor($this->data['module'].'/edit/'.$r->id.get_query_string(),$r->name),
				$r->tempat_lahir.', '.dateformatindo($r->tanggal_lahir,2),
				$r->tlp,
				$r->tempat_kerja,
				$r->kta_no,
				anchor($this->data['module'].'/edit/'.$r->id.get_query_string(),$this->lang->line('edit'),array('class'=>'btn btn-default btn-xs'))
				."&nbsp;|&nbsp;".anchor($this->data['module'].'/delete/'.$r->id.get_query_string(),$this->lang->line('delete'),array('class'=>'btn btn-danger btn-xs','onclick'=>"return confirm('".$this->lang->line('confirm')."')"))
			);
		}
		$this->data['table'] = $this->table->generate();
		$this->data['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = site_url($this->data['module'].get_query_string(null,'offset'));
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
			'limit'=>$this->input->post('limit'),
			'pendidikan'=>$this->input->post('pendidikan'),
			'status_pegawai'=>$this->input->post('status_pegawai')
		);
		redirect($this->data['module'].get_query_string($data));		
	}
	private function _field()
	{
		$data = array(
			'nomor'=>$this->input->post('nomor'),
			'name'=>$this->input->post('name'),
			'tempat_lahir'=>$this->input->post('tempat_lahir'),
			'tanggal_lahir'=>format_ymd($this->input->post('tanggal_lahir')),
			'alamat'=>$this->input->post('alamat'),
			'tlp'=>$this->input->post('tlp'),
			'golongan_darah'=>$this->input->post('golongan_darah'),
			'wilayah'=>$this->input->post('wilayah'),
			'praktik_nama'=>$this->input->post('praktik_nama'),
			'praktik_alamat'=>$this->input->post('praktik_alamat'),
			'pendidikan'=>$this->input->post('pendidikan'),
			'kampus'=>$this->input->post('kampus'),
			'tahun_lulus'=>$this->input->post('tahun_lulus'),
			'no_ijazah'=>$this->input->post('no_ijazah'),
			'tempat_kerja'=>$this->input->post('tempat_kerja'),
			'status_pegawai'=>$this->input->post('status_pegawai'),
			'nip'=>$this->input->post('nip'),
			'kta_no'=>$this->input->post('kta_no'),
			'sertikom'=>$this->input->post('sertikom')
		);
		return $data;
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('nomor','No Rekomendasi','trim');
		$this->form_validation->set_rules('name','Nama Lengkap','required|trim');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','trim');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','trim');
		$this->form_validation->set_rules('alamat','Alamat Rumah','trim');
		$this->form_validation->set_rules('tlp','No Telp/HP','trim');
		$this->form_validation->set_rules('golongan_darah','Golongan Darah','trim');
		$this->form_validation->set_rules('wilayah','Wilayah','trim');
		$this->form_validation->set_rules('praktik_nama','Nama Praktik','trim');
		$this->form_validation->set_rules('praktik_alamat','Alamat Praktik','trim');
		$this->form_validation->set_rules('pendidikan','Pendidikan','trim');
		$this->form_validation->set_rules('kampus','Institusi/Kampus','trim');
		$this->form_validation->set_rules('tahun_lulus','Tahun Lulusan','trim');
		$this->form_validation->set_rules('tempat_kerja','Instansi/Tempat Kerja','trim');
		$this->form_validation->set_rules('status_pegawai','Status Kepegawaian','trim');
		$this->form_validation->set_rules('nip','NIP/NR PTT','trim');
		$this->form_validation->set_rules('kta_no','Nomor','trim');
		$this->form_validation->set_rules('sertikom','Nomor Sertikom','trim');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
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
			$id = $this->general_model->add($this->data['module'],$data);
			$alert = '<div class="alert alert-success">'.$this->lang->line('new_success').'</div>';
			if ($_FILES['userfile']['name']) {
				$result_upload = $this->upload_photo($id);
				if ($result_upload) {
					$alert .= '<div class="alert alert-danger">'.$result_upload.'</div>';					
				}
			}			
			$this->session->set_flashdata('alert',$alert);			
			redirect($this->data['module'].'/add'.get_query_string());
		}
	}
	public function edit($id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['bidan_id'] = $id;
			$this->data['row'] = $this->general_model->get_from_field($this->data['module'],'id',$id)->row();
			$this->data['action'] = $this->data['module'].'/edit/'.$id.get_query_string();
			$this->data['owner'] = '<div class="box-header owner">'.owner($this->data['row']).'</div>';
			$this->data['content'] = $this->load->view($this->data['module'].'_form',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$data = $this->_field();
			$this->general_model->edit($this->data['module'],$id,$data);
			$alert = '<div class="alert alert-success">'.$this->lang->line('edit_success').'</div>';
			if ($_FILES['userfile']['name']) {
				$result_upload = $this->upload_photo($id);
				if ($result_upload) {
					$alert .= '<div class="alert alert-danger">'.$result_upload.'</div>';					
				}
			}			
			$this->session->set_flashdata('alert',$alert);
			redirect($this->data['module'].'/edit/'.$id.get_query_string());
		}
	}
	public function delete($id = '')
	{
		if($id<>''){
			$this->general_model->delete($this->data['module'],$id);
			$this->general_model->delete('bidan_kta',$id);
			$this->general_model->delete('bidan_str',$id);
			$this->general_model->delete('bidan_sipb_p',$id);
			$this->general_model->delete('bidan_sipb_m',$id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->general_model->delete($this->data['module'],$c);
				$this->general_model->delete('bidan_kta',$c);
				$this->general_model->delete('bidan_str',$c);
				$this->general_model->delete('bidan_sipb_p',$c);
				$this->general_model->delete('bidan_sipb_m',$c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('delete_success').'</div>');
		redirect($this->data['module'].get_query_string());
	}
	private function upload_photo($filename = '')
	{
		$upload_path = './files/bidan';
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, true);
		}
		$config['upload_path'] = $upload_path;
		$config['file_name'] = $filename.'.jpg';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
        	return $this->upload->display_errors();
        }
	}
	private function delete_foto($filename = '')
	{
		if ($filename) {			
			$filepath = './files/bidan/'.$filename;
			if (is_file($filepath)){
				if (!unlink($filepath)) {
					return TRUE;
				}
			}
		}
		return FALSE;
	}	
	public function get()
	{
		$id = $this->input->get('id');
		if ($id) {
			$result = $this->model->get($id)->row();	
		}else{
			$result = $this->model->get()->result();
		}
		echo json_encode($result);
	}	
}