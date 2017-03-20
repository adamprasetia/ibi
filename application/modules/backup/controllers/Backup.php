<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends MY_Controller {

	private $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Backup Database';
		$this->data['subtitle'] = 'Download file backup';
	}
	public function index()
	{
		$this->delete();
		$this->data['content'] = $this->load->view('backup_view',$this->data,true);
		$this->load->view('template_view',$this->data);
	}
	public function do_backup()
	{
		$this->load->dbutil();

        $prefs = array(     
	        'format' => 'zip',
	        'filename' => 'ibi.sql'
	    );

        $backup =& $this->dbutil->backup($prefs); 

        $db_name = 'bear_'.date("Y-m-d-H-i-s").'.zip';
        $save = './backup/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup); 

        $this->load->helper('download');
        force_download($db_name, $backup); 	
	}
	private function delete()
	{
		$files = glob('./backup/*');
		foreach($files as $file){
			if(is_file($file))
		    	unlink($file);
		}
	}
}