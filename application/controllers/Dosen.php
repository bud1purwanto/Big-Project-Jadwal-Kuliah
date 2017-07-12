<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
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
			$this->load->model('Dosen_m');
			$this->load->model('User_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}		
	}
	
	public function dosen(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['konten']='konten/tdosen_v';
		$data['datadosen']=$this->Dosen_m->getall();
		$this->load->view('home_v',$data);
	}
	
	public function tdosen(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$this->form_validation->set_rules('npp','NPP','required');
		$this->form_validation->set_rules('nama','Nama Dosen','required');
		$this->form_validation->set_rules('nohp','No. Hp/Telp','required');
		if($this->form_validation->run() == FALSE){
			$data['konten']='form/tambahdosen_v';
			$this->load->view('home_v',$data);
		}else{
			$data=array(
				'npp'=>$this->input->post('npp'),
				'namadosen'=>$this->input->post('nama'),
				'nohp'=>$this->input->post('nohp')
			);
			$this->Dosen_m->getsimpan($data);
			redirect('dosen/dosen');
		}
	}
	
	public function hapusdosen($id){
		$dosenSibuk=$this->Dosen_m->dosenSibuk($id);
		if ($dosenSibuk) {
			$this->session->set_flashdata('hapus', "<div style='margin-top: 20px' class='alert alert-danger'>
                                                    <strong>Dosen memliki ikatan dengan jadwal</strong></div>");
		} else {
			$this->Dosen_m->gethapus($id);
		}
		redirect('dosen/dosen');
		
	}

	public function editdosen($id)
	{
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['title'] = "Edit Dosen";
		$data['dosenbyid']=$this->Dosen_m->getfind_byid($id);

		$this->form_validation->set_rules('nama','Nama Dosen','required');
		$this->form_validation->set_rules('nohp','No. Hp/Telp','required');

		if($this->form_validation->run()==FALSE){
			$data['konten']='edit/editdosen_v';
			$this->load->view('home_v',$data);
		}else{
			$this->Dosen_m->getedit($id);
			redirect('dosen/dosen');
		}
	}
	
}