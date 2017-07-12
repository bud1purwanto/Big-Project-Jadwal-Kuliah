<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {
	
	public function login($no_identitas, $password)
	{
		$this->db->select('id_user, no_identitas, password, status');
		$this->db->from('user');
		$this->db->where('no_identitas', $no_identitas);
		$this->db->where('password', MD5($password));
		$query=$this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		} else {
			return false;
		}	
	}

	public function getDataLogin()
	{
		if ($this->session->userdata('logged_in_adm')) {
			$session_data = $this->session->userdata('logged_in_adm');
		} elseif ($this->session->userdata('logged_in_dsn')) {
			$session_data = $this->session->userdata('logged_in_dsn');
		}else {
			$session_data = $this->session->userdata('logged_in_mhs');
		}
		
		$data['id_user'] = $session_data['id_user'];
		$id_user=$data['id_user'];

		$this->db->select("id_user, no_identitas, status");
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function getall($sts)
	{
		$this->db->select("id_user, no_identitas, status");
		$this->db->where('status', $sts);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function getsimpan()
	{
		$password=$this->input->post('password');
		$password_encrypt=md5($password);
		$data=array(
				'no_identitas'=>$this->input->post('no_identitas'),
				'password'=>$password_encrypt,
				'status'=>$this->input->post('status')
			);
		$query=$this->db->insert('user', $data);
		return $query;
	}


	function gethapus($id){
		$query=$this->db->where('id_user',$id)
						->delete('user');
		return $query;
	}
}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */
 ?>