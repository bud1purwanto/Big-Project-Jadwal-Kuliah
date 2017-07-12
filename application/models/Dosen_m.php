<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_m extends CI_Model {
	function getall(){
		$query=$this->db->get('dosen');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid($id){
		$this->db->select("npp, namadosen, nohp");
		$this->db->where('npp', $id);
		$query = $this->db->get('dosen');
		return $query->result();
	}
	
	function getsimpan($data){
		$query=$this->db->insert('dosen',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('npp',$id)
						->delete('dosen');
		return $query;
	}
	
	function getedit($id){
		$data=array(
				'namadosen'=>$this->input->post('nama'),
				'nohp'=>$this->input->post('nohp')
			);
		$this->db->where('npp', $id);
		$this->db->update('dosen', $data);
	}

	function dosenSibuk($id) {
	    $this->db->select('npp');
	    $this->db->from('jadwal');
	    $this->db->where('npp', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}