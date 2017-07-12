<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if( $this->session->userdata('logged_in_adm')){
			$session_data = $this->session->userdata('logged_in_adm');
			$data['id_user'] = $session_data['id_user'];
			$this->load->model('User_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}		
	}
	
	public function adm(){
		$sts="adm";
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data["name"] = "Administrator";
		$data["id"] = "Nomor Identitas";
		$data['konten']='konten/user_v';
		$data['datauser']=$this->User_Model->getall($sts);
		$this->load->view('home_v',$data);
	}

	public function dsn(){
		$sts="dsn";
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data["name"] = "Dosen";
		$data["id"] = "NIP";
		$data['konten']='konten/user_v';
		$data['datauser']=$this->User_Model->getall($sts);
		$this->load->view('home_v',$data);
	}

	public function mhs(){
		$sts="mhs";
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data["name"] = "Mahasiswa";
		$data["id"] = "NIM";
		$data['konten']='konten/user_v';
		$data['datauser']=$this->User_Model->getall($sts);
		$this->load->view('home_v',$data);
	}
	
	public function adduser(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$this->form_validation->set_rules('no_identitas','Nomor Identitas','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('status','Status','required');

		if($this->form_validation->run() == FALSE){
			$data['konten']='form/tambahuser_v';
			$this->load->view('home_v', $data);
		}else{
			$this->User_Model->getsimpan();
			redirect('user/adm');
		}
	}
	
	public function hapususer($id){
		$this->User_Model->gethapus($id);
		redirect('user/adm');
	}
	
}