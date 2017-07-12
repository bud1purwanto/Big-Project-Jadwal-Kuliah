<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_m extends CI_Model {
	function getall(){
		$query=$this->db->get('ruangan');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid($id){
		$this->db->select("idruangan, ruangan");
		$this->db->where('idruangan', $id);
		$query = $this->db->get('ruangan');
		return $query->result();
	}
	
	function getsimpan($data){
		$query=$this->db->insert('ruangan',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('idruangan',$id)
						->delete('ruangan');
		return $query;
	}
	
	function getedit($id){
		$data=array(
				'ruangan'=>$this->input->post('ruangan')
			);
		$this->db->where('idruangan', $id);
		$this->db->update('ruangan', $data);
	}

	function ruanganRebutan($id) {
	    $this->db->select('idruangan');
	    $this->db->from('ruangan');
	    $this->db->where('idruangan', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}