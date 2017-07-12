<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {
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
			$this->load->model('Matakuliah_m');
			$this->load->model('User_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}		
	}
	public function matakuliah(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['konten']='konten/tmatakuliah_v';
		$data['datamakul']=$this->Matakuliah_m->getall();
		$this->load->view('home_v',$data);
	}
	
	public function tmatakuliah(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$this->form_validation->set_rules('kode','Kode','required');
		$this->form_validation->set_rules('makul','Matakuliah','required');
		$this->form_validation->set_rules('prodi','Prodi','required');
		if($this->form_validation->run() == FALSE){
			$data['konten']='form/tambahmakul_v';
			$this->load->view('home_v',$data);
		}else{
			$data=array(
				'kodemakul'=>$this->input->post('kode'),
				'makul'=>$this->input->post('makul'),
				'semester'=>$this->input->post('semester'),
				'prodi'=>$this->input->post('prodi'),
			);
			$this->Matakuliah_m->getsimpan($data);
			redirect('matakuliah/matakuliah');
		}
	}
	
	public function hapusmakul($id){
		$matkulRuwet=$this->Matakuliah_m->matkulRuwet($id);
		if ($matkulRuwet) {
			$this->session->set_flashdata('hapus', "<div style='margin-top: 20px' class='alert alert-danger'>
                                                    <strong>Matakuliah memliki ikatan dengan jadwal</strong></div>");
		} else {
			$this->Matakuliah_m->gethapus($id);
		}
		redirect('matakuliah/matakuliah');
	}
	
	public function editmakul($id)
	{
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['title'] = "Edit Mata Kuliah";
		$data['makulbyid']=$this->Matakuliah_m->getfind_byid($id);

		$this->form_validation->set_rules('makul','Matakuliah','required');
		$this->form_validation->set_rules('prodi','Prodi','required');

		if($this->form_validation->run()==FALSE){
			$data['konten']='edit/editmakul_v';
			$this->load->view('home_v',$data);
		}else{
			$this->Matakuliah_m->getedit($id);
			redirect('matakuliah/matakuliah');
		}
	}
	
}