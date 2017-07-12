<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 
 	public function index()
 	{
 		$data['title'] = "Login";
 		$this->load->view('konten/login_v');
 	}

 	public function cekLogin()
 	{
		$this->form_validation->set_rules('no_identitas', 'NIP/NIM', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDB');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('konten/login_v');
		} else {
			redirect('beranda','refresh');
		}
 	}
	
	public function cekDB($password)
 	{
 		$this->load->model('User_Model');
		$no_identitas = $this->input->post('no_identitas');
		$result = $this->User_Model->login($no_identitas,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id_user'=>$row->id_user,
					'status'=> $row->status,		
				);
				$status=$sess_array['status'];
				$this->session->set_userdata('logged_in_'.$status.'', $sess_array);	
				
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDB',"Login Gagal NIP/NIM atau Password tidak valid");
			return false;
		}
 		
 	} 


 	public function logout()
 	{
 		if ($this->session->userdata('logged_in_admin')) {
				$this->session->unset_userdata('logged_in_admin');
			} else {
				$this->session->unset_userdata('logged_in_user');
			}
 		
 		$this->session->unset_userdata('visitor');
 		$this->session->sess_destroy();
 		redirect('login','refresh');
 	}
 }

 
 /* End of file Login.php */
 /* Location: ./application/controllers/Login.php */ ?>