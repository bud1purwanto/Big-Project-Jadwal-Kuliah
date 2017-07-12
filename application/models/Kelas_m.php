<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_m extends CI_Model {
	function getall(){
		$query=$this->db->get('kelas');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid($id){
		$this->db->select("idkelas, kelas");
		$this->db->where('idkelas', $id);
		$query = $this->db->get('kelas');
		return $query->result();
	}
	
	function getsimpan($data){
		$query=$this->db->insert('kelas',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('idkelas',$id)
						->delete('kelas');
		return $query;
	}
	
	function getedit($id){
		$data=array(
				'kelas'=>$this->input->post('kelas')
			);
		$this->db->where('idkelas', $id);
		$this->db->update('kelas', $data);
	}

	function kelasRebutan($id) {
	    $this->db->select('idkelas');
	    $this->db->from('kelas');
	    $this->db->where('idkelas', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}