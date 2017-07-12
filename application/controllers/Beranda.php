<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in_dsn') || $this->session->userdata('logged_in_mhs') || $this->session->userdata('logged_in_adm')){
			if ($this->session->userdata('logged_in_dsn')) {
				$session_data = $this->session->userdata('logged_in_dsn');
			} elseif ($this->session->userdata('logged_in_adm')) {
				$session_data = $this->session->userdata('logged_in_adm');
			}else {
				$session_data = $this->session->userdata('logged_in_mhs');
			}
			$data['id_user'] = $session_data['id_user'];
			$this->load->model('Dosen_m');
			$this->load->model('User_Model');
			
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}		
	}

	public function index()
	{
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;

		$data['konten']='konten/awal_v';
		$this->load->view('home_v',$data);
	}
	
}
