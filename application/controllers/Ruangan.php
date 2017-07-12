<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {
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
			$this->load->model('Ruangan_m');
			$this->load->model('User_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}		
	}
	
	public function ruangan(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['konten']='konten/truangan_v';
		$data['dataruangan']=$this->Ruangan_m->getall();
		$this->load->view('home_v',$data);
	}
	
	public function truangan(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$this->form_validation->set_rules('ruangan','Ruangan','required');
		if($this->form_validation->run()==FALSE){
			$data['konten']='form/tambahruangan_v';
			$this->load->view('home_v',$data);
		}else{
			$data=array(
				'ruangan'=>$this->input->post('ruangan')
			);
			$this->Ruangan_m->getsimpan($data);
			redirect('ruangan/ruangan');
		}
	}
	
	public function hapusruangan($id){
		$ruanganRebutan=$this->Ruangan_m->ruanganRebutan($id);
		if ($ruanganRebutan) {
			$this->session->set_flashdata('hapus', "<div style='margin-top: 20px' class='alert alert-danger'>
                                                    <strong>Ruangan memliki ikatan dengan jadwal</strong></div>");
		} else {
			$this->Ruangan_m->gethapus($id);
		}
		redirect('ruangan/ruangan');
	}

	public function editruangan($id)
	{
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['title'] = "Edit Ruangan";
		$data['ruanganbyid']=$this->Ruangan_m->getfind_byid($id);

		$this->form_validation->set_rules('ruangan','Ruangan','required');

		if($this->form_validation->run()==FALSE){
			$data['konten']='edit/editruangan_v';
			$this->load->view('home_v',$data);
		}else{
			$this->Ruangan_m->getedit($id);
			redirect('ruangan/ruangan');
		}
	}
}