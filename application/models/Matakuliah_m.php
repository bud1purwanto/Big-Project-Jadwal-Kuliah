<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah_m extends CI_Model {
	function getall(){
		$query=$this->db->get('matakuliah');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid($id){
		$this->db->select("kodemakul, makul, semester, prodi");
		$this->db->where('kodemakul', $id);
		$query = $this->db->get('matakuliah');
		return $query->result();
	}
	
	function getsimpan($data){
		$query=$this->db->insert('matakuliah',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('kodemakul',$id)
						->delete('matakuliah');
		return $query;
	}
	
	function getedit($id){
		$data=array(
				'makul'=>$this->input->post('makul'),
				'semester'=>$this->input->post('semester'),
				'prodi'=>$this->input->post('prodi')
			);
		$this->db->where('kodemakul', $id);
		$this->db->update('matakuliah', $data);
	}

	function matkulRuwet($id) {
	    $this->db->select('kodemakul');
	    $this->db->from('matakuliah');
	    $this->db->where('kodemakul', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}
