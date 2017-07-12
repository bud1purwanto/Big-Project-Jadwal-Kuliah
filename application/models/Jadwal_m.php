<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model {
	function getall(){
		$query=$this->db->select('*')
						->from('jadwal')
						->join('matakuliah', 'matakuliah.kodemakul = jadwal.kodemakul')
						->join('dosen','dosen.npp=jadwal.npp')
						->join('ruangan','ruangan.idruangan=jadwal.idruangan')
						->join('kelas','kelas.idkelas=jadwal.idkelas')
						->order_by('hari')
						->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function gethari($hari){
		$query=$this->db->select('*')
						->from('jadwal')
						->join('matakuliah', 'matakuliah.kodemakul = jadwal.kodemakul')
						->join('dosen','dosen.npp=jadwal.npp')
						->join('ruangan','ruangan.idruangan=jadwal.idruangan')
						->where('jadwal.hari',$hari)
						->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid(){
		
	}
	
	function getsimpan($data){
		$query=$this->db->insert('jadwal',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('idjadwal',$id)
						->delete('jadwal');
		return $query;
	}
	
	function getedit(){
		
	}

	function jamBentrok() {
		$jam_masuk = $this->input->post('jam_masuk');
		$jam_selesai = $this->input->post('jam_selesai');
	    $this->db->select('idjadwal');
	    $this->db->from('jadwal');
	    $this->db->where('jam_mulai', $jam_masuk);
	    $this->db->where('jam_akhir', $jam_selesai);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function hariBentrok() {
		$hari = $this->input->post('hari');
	    $this->db->select('idjadwal');
	    $this->db->from('jadwal');
	    $this->db->where('hari', $hari);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function matkulBentrok() {
		$kodemakul = $this->input->post('kodemakul');
	    $this->db->select('idjadwal');
	    $this->db->from('jadwal');
	    $this->db->where('kodemakul', $kodemakul);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function ruanganBentrok() {
		$ruangan = $this->input->post('ruangan');
	    $this->db->select('idjadwal');
	    $this->db->from('jadwal');
	    $this->db->where('idruangan', $ruangan);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function kelasBentrok() {
		$kelas = $this->input->post('kelas');
	    $this->db->select('idjadwal');
	    $this->db->from('jadwal');
	    $this->db->where('idkelas', $kelas);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function dosenBentrok() {
		$dosen = $this->input->post('dosen');
	    $this->db->select('idjadwal');
	    $this->db->from('jadwal');
	    $this->db->where('npp', $dosen);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}