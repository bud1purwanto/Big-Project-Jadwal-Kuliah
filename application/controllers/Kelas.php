<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in_dsn') || $this->session->userdata('logged_in_adm')){
			if ($this->session->userdata('logged_in_dsn')) {
				$session_data = $this->session->userdata('logged_in_dsn');
			} else {
				$session_data = $this->session->userdata('logged_in_adm');
			}
			$data['id_user'] = $session_data['id_user'];
			$this->load->model('Kelas_m');
			$this->load->model('User_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}		
	}
	
	public function kelas(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['konten']='konten/tkelas_v';
		$data['datakelas']=$this->Kelas_m->getall();
		$this->load->view('home_v',$data);
	}
	
	public function tkelas(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$this->form_validation->set_rules('kelas','Kelas','required');
		if($this->form_validation->run()==FALSE){
			$data['konten']='form/tambahkelas_v';
			$this->load->view('home_v',$data);
		}else{
			$data=array(
				'kelas'=>$this->input->post('kelas')
			);
			$this->Kelas_m->getsimpan($data);
			redirect('kelas/kelas');
		}
	}
	
	public function hapuskelas($id){
		$kelasRebutan=$this->Kelas_m->kelasRebutan($id);
		if ($kelasRebutan) {
			$this->session->set_flashdata('hapus', "<div style='margin-top: 20px' class='alert alert-danger'>
                                                    <strong>Kelas memliki ikatan dengan jadwal</strong></div>");
		} else {
			$this->Kelas_m->gethapus($id);
		}
		redirect('kelas/kelas');
	}

	public function editkelas($id)
	{
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['title'] = "Edit Kelas";
		$data['kelasbyid']=$this->Kelas_m->getfind_byid($id);

		$this->form_validation->set_rules('kelas','Kelas','required');

		if($this->form_validation->run()==FALSE){
			$data['konten']='edit/editkelas_v';
			$this->load->view('home_v',$data);
		}else{
			$this->Kelas_m->getedit($id);
			redirect('kelas/kelas');
		}
	}
}