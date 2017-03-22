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
			'nomor' => 'No Rekomendasi',
			'name' => 'Nama Lengkap',
			// 'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'TTL',
			// 'alamat_rumah' => 'Alamat Rumah',
			// 'alamat_praktik' => 'Alamat Praktik',
			'tlp' => 'No Telp/HP',
			// 'pendidikan_name' => 'Pendidikan',
			// 'kampus' => 'Institusi/Kampus',
			// 'tahun_lulus' => 'Tahun Lulusan',
			'tempat_kerja' => 'Instansi/Tempat Kerja',
			'status_pegawai_name' => 'Status Kepegawaian',
			// 'nip' => 'NIP/NR PTT'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor($this->data['module'].get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>$this->lang->line('action'),'style'=>'min-width:115px');
		$this->table->set_heading($heading);
		$result = $this->model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				anchor($this->data['module'].'/edit/'.$r->id.get_query_string(),$r->nomor),
				$r->name,
				// $r->tempat_lahir,
				$r->tempat_lahir.', '.dateformatindo($r->tanggal_lahir,2),
				// array('data'=>word_limiter($r->alamat_rumah,2),'title'=>$r->alamat_rumah),
				// array('data'=>word_limiter($r->alamat_praktik,2),'title'=>$r->alamat_praktik),
				$r->tlp,
				// $r->pendidikan_name,
				// $r->kampus,
				// $r->tahun_lulus,
				$r->tempat_kerja,
				$r->status_pegawai_name,
				// $r->nip,
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
		$data['identitas'] = array(
			'nomor'=>$this->input->post('nomor'),
			'name'=>$this->input->post('name'),
			'tempat_lahir'=>$this->input->post('tempat_lahir'),
			'tanggal_lahir'=>format_ymd($this->input->post('tanggal_lahir')),
			'alamat_rumah'=>$this->input->post('alamat_rumah'),
			'alamat_praktik'=>$this->input->post('alamat_praktik'),
			'tlp'=>$this->input->post('tlp'),
			'golongan_darah'=>$this->input->post('golongan_darah'),
			'pendidikan'=>$this->input->post('pendidikan'),
			'kampus'=>$this->input->post('kampus'),
			'tahun_lulus'=>$this->input->post('tahun_lulus'),
			'tempat_kerja'=>$this->input->post('tempat_kerja'),
			'status_pegawai'=>$this->input->post('status_pegawai'),
			'nip'=>$this->input->post('nip')
		);
		if ($this->input->post('kta_nomor') && $this->input->post('kta_date')) {
			$data['kta'] = array(
				'nomor'=>$this->input->post('kta_nomor'),
				'masa_berlaku'=>format_ymd($this->input->post('kta_date')),
			);
		}
		if ($this->input->post('str_nomor') && $this->input->post('str_date')) {
			$data['str'] = array(
				'nomor'=>$this->input->post('str_nomor'),
				'masa_berlaku'=>format_ymd($this->input->post('str_date')),
			);
		}
		if ($this->input->post('sipb_m_nomor') && $this->input->post('sipb_m_date')) {
			$data['sipb_m'] = array(
				'nomor'=>$this->input->post('sipb_m_nomor'),
				'masa_berlaku'=>format_ymd($this->input->post('sipb_m_date')),
			);
		}
		if ($this->input->post('sipb_p_nomor') && $this->input->post('sipb_p_date')) {
			$data['sipb_p'] = array(
				'nomor'=>$this->input->post('sipb_p_nomor'),
				'masa_berlaku'=>format_ymd($this->input->post('sipb_p_date')),
			);
		}
		if ($this->input->post('sib_nomor') && $this->input->post('sib_date')) {
			$data['sib'] = array(
				'nomor'=>$this->input->post('sib_nomor'),
				'masa_berlaku'=>format_ymd($this->input->post('sib_date')),
			);
		}
		return $data;
	}
	private function _set_rules()
	{
		$this->form_validation->set_rules('nomor','No Rekomendasi','required|trim');
		$this->form_validation->set_rules('name','Nama Lengkap','required|trim');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','trim');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','trim');
		$this->form_validation->set_rules('alamat_rumah','Alamat Rumah','trim');
		$this->form_validation->set_rules('alamat_praktik','Alamat Praktik','trim');
		$this->form_validation->set_rules('tlp','No Telp/HP','trim');
		$this->form_validation->set_rules('golongan_darah','Golongan Darah','trim');
		$this->form_validation->set_rules('pendidikan','Pendidikan','trim');
		$this->form_validation->set_rules('kampus','Institusi/Kampus','trim');
		$this->form_validation->set_rules('tahun_lulus','Tahun Lulusan','trim');
		$this->form_validation->set_rules('tempat_kerja','Instansi/Tempat Kerja','trim');
		$this->form_validation->set_rules('status_pegawai','Status Kepegawaian','trim');
		$this->form_validation->set_rules('nip','NIP/NR PTT','trim');

		$this->form_validation->set_rules('kta_nomor','Nomor','trim');
		$this->form_validation->set_rules('kta_date','Masa Berlaku','trim');
		$this->form_validation->set_rules('str_nomor','Nomor','trim');
		$this->form_validation->set_rules('str_date','Masa Berlaku','trim');
		$this->form_validation->set_rules('sipb_m_nomor','Nomor','trim');
		$this->form_validation->set_rules('sipb_m_date','Masa Berlaku','trim');
		$this->form_validation->set_rules('sipb_p_nomor','Nomor','trim');
		$this->form_validation->set_rules('sipb_p_date','Masa Berlaku','trim');
		$this->form_validation->set_rules('sib_nomor','Nomor','trim');
		$this->form_validation->set_rules('sib_date','Masa Berlaku','trim');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
	}
	public function add()
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['action'] = $this->data['module'].'/add'.get_query_string();
			$this->data['owner'] = '';
			$this->data['content'] = $this->load->view($this->data['module'].'_form_add',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$field = $this->_field();
			$data = $field['identitas'];
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$id = $this->model->add($data);
			if ($id) {
				if ($field['kta']) {
					$data = $field['kta'];
					$data['bidan'] = $id;
					$data['user_create'] = $this->user_login['id'];
					$data['date_create'] = date('Y-m-d H:i:s');
					$this->general_model->add('bidan_kta',$data);					
				}
				if ($field['str']) {
					$data = $field['str'];
					$data['bidan'] = $id;
					$data['user_create'] = $this->user_login['id'];
					$data['date_create'] = date('Y-m-d H:i:s');
					$this->general_model->add('bidan_str',$data);					
				}
				if ($field['sipb_m']) {
					$data = $field['sipb_m'];
					$data['bidan'] = $id;
					$data['user_create'] = $this->user_login['id'];
					$data['date_create'] = date('Y-m-d H:i:s');
					$this->general_model->add('bidan_sipb_m',$data);					
				}
				if ($field['sipb_p']) {
					$data = $field['sipb_p'];
					$data['bidan'] = $id;
					$data['user_create'] = $this->user_login['id'];
					$data['date_create'] = date('Y-m-d H:i:s');
					$this->general_model->add('bidan_sipb_p',$data);					
				}
				if ($field['sib']) {
					$data = $field['sib'];
					$data['bidan'] = $id;
					$data['user_create'] = $this->user_login['id'];
					$data['date_create'] = date('Y-m-d H:i:s');
					$this->general_model->add('bidan_sib',$data);					
				}
			}
			$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('new_success').'</div>');
			redirect($this->data['module'].'/add'.get_query_string());
		}
	}
	public function edit($id)
	{
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->data['bidan_id'] = $id;
			$this->data['row'] = $this->model->get_from_field('id',$id)->row();
			$this->data['row']->tanggal_lahir = format_dmy($this->data['row']->tanggal_lahir);
			$this->data['action'] = $this->data['module'].'/edit/'.$id.get_query_string();
			$this->data['owner'] = owner($this->data['row']);
			$this->data['content'] = $this->load->view($this->data['module'].'_form_edit',$this->data,true);
			$this->load->view('template_view',$this->data);
		}else{
			$field = $this->_field();
			$data = $field['identitas'];
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
			$this->general_model->delete_from_field('bidan_kta','bidan',$id);
			$this->general_model->delete_from_field('bidan_str','bidan',$id);
			$this->general_model->delete_from_field('bidan_sipb_m','bidan',$id);
			$this->general_model->delete_from_field('bidan_sipb_p','bidan',$id);
			$this->general_model->delete_from_field('bidan_sib','bidan',$id);			
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->model->delete($c);
				$this->general_model->delete_from_field('bidan_kta','bidan',$c);
				$this->general_model->delete_from_field('bidan_str','bidan',$c);
				$this->general_model->delete_from_field('bidan_sipb_m','bidan',$c);
				$this->general_model->delete_from_field('bidan_sipb_p','bidan',$c);
				$this->general_model->delete_from_field('bidan_sib','bidan',$c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">'.$this->lang->line('delete_success').'</div>');
		redirect($this->data['module'].get_query_string());
	}
}