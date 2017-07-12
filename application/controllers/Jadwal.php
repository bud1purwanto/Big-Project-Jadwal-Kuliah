<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in_dsn') || $this->session->userdata('logged_in_mhs') || $this->session->userdata('logged_in_adm')){
			if ($this->session->userdata('logged_in_dsn')) {
				$session_data = $this->session->userdata('logged_in_dsn');
			} elseif ($this->session->userdata('logged_in_adm')) {
				$session_data = $this->session->userdata('logged_in_adm');
			}else {
				$session_data = $this->session->userdata('logged_in_mhs');
			}
			$data['id_user'] = $session_data['id_user'];
			$this->load->model('Jadwal_m');
			$this->load->model('Matakuliah_m');
			$this->load->model('Dosen_m');
			$this->load->model('Ruangan_m');
			$this->load->model('Kelas_m');
			$this->load->model('User_Model');
		}else{
			$this->session->set_flashdata('login_lagi', 'Anda sudah logout, silahkan login lagi!');
			redirect('login','refresh');
		}		
	}
	
	public function jadwal_makul(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$data['konten']='konten/tjadwal_v';
		$data['datajadwal']=$this->Jadwal_m->getall();
		$this->load->view('home_v',$data);
	}
	
	public function tjadwal(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$this->form_validation->set_rules('hari','Hari','required');
		$this->form_validation->set_rules('jam_masuk','Jam Masuk','required');
		$this->form_validation->set_rules('jam_selesai','Jam Selesai','required');
		$this->form_validation->set_rules('kodemakul','Kode Matakuliah','required');
		$this->form_validation->set_rules('ruangan','Ruangan','required');
		$this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('dosen','dosen','required');

		$data['konten']='form/tambahjadwal_v';
		$data['datamakul']=$this->Matakuliah_m->getall();
		$data['datadosen']=$this->Dosen_m->getall();
		$data['dataruangan']=$this->Ruangan_m->getall();
		$data['datakelas']=$this->Kelas_m->getall();
		
		if($this->form_validation->run()==FALSE ){
			$this->load->view('home_v',$data);
		}else{
			$hariBentrok=$this->Jadwal_m->hariBentrok();
			$jamBentrok=$this->Jadwal_m->jamBentrok();
			$matkutBentrok=$this->Jadwal_m->matkulBentrok();
			$ruanganBentrok=$this->Jadwal_m->ruanganBentrok();
			$kelasBentrok=$this->Jadwal_m->kelasBentrok();
			$dosenBentrok=$this->Jadwal_m->dosenBentrok();


			//Tidak Bentrok
			if (!$hariBentrok && !$jamBentrok && !$matkutBentrok && !$ruanganBentrok && !$kelasBentrok && !$dosenBentrok) {
				$data=array(
				'hari'=>$this->input->post('hari'),
				'jam_mulai'=>$this->input->post('jam_masuk'),
				'jam_akhir'=>$this->input->post('jam_selesai'),
				'kodemakul'=>$this->input->post('kodemakul'),
				'idruangan'=>$this->input->post('ruangan'),
				'idkelas'=>$this->input->post('kelas'),
				'npp'=>$this->input->post('dosen')
				);
				$this->Jadwal_m->getsimpan($data);
				$this->session->set_flashdata('sukses', 'Jadwal Ditambahkan');
				redirect('jadwal/jadwal_makul');
				
				//Hari Bentrok jam tidak bentrok
			} else if ($hariBentrok && !$jamBentrok) {
				$data=array(
				'hari'=>$this->input->post('hari'),
				'jam_mulai'=>$this->input->post('jam_masuk'),
				'jam_akhir'=>$this->input->post('jam_selesai'),
				'kodemakul'=>$this->input->post('kodemakul'),
				'idruangan'=>$this->input->post('ruangan'),
				'idkelas'=>$this->input->post('kelas'),
				'npp'=>$this->input->post('dosen')
				);
				$this->Jadwal_m->getsimpan($data);
				$this->session->set_flashdata('sukses', 'Jadwal Ditambahkan');
				redirect('jadwal/jadwal_makul');
				
				//Hari Bentrok ruang tidak bentrok
			} else if ($hariBentrok && !$ruanganBentrok) {
				$data=array(
				'hari'=>$this->input->post('hari'),
				'jam_mulai'=>$this->input->post('jam_masuk'),
				'jam_akhir'=>$this->input->post('jam_selesai'),
				'kodemakul'=>$this->input->post('kodemakul'),
				'idruangan'=>$this->input->post('ruangan'),
				'idkelas'=>$this->input->post('kelas'),
				'npp'=>$this->input->post('dosen')
				);
				$this->Jadwal_m->getsimpan($data);
				$this->session->set_flashdata('sukses', 'Jadwal Ditambahkan');
				redirect('jadwal/jadwal_makul');
				
				//Hari Tidak bentrok lain bentrok
			} else if (!$hariBentrok && $jamBentrok && $ruanganBentrok && $matkutBentrok && $kelasBentrok && $dosenBentrok) {
				$data=array(
				'hari'=>$this->input->post('hari'),
				'jam_mulai'=>$this->input->post('jam_masuk'),
				'jam_akhir'=>$this->input->post('jam_selesai'),
				'kodemakul'=>$this->input->post('kodemakul'),
				'idruangan'=>$this->input->post('ruangan'),
				'idkelas'=>$this->input->post('kelas'),
				'npp'=>$this->input->post('dosen')
				);
				$this->Jadwal_m->getsimpan($data);
				$this->session->set_flashdata('sukses', 'Jadwal Ditambahkan');
				redirect('jadwal/jadwal_makul');
				
			}else if ($hariBentrok && $jamBentrok && $ruanganBentrok || !$matkutBentrok && !$kelasBentrok && !$dosenBentrok){
				$this->session->set_flashdata('fail', 'Hari Bentrok, Jam dan Ruangan Bentrok, Gagal Menambahkan!');
				$this->load->view('home_v',$data);
			}else if ($hariBentrok || !$jamBentrok && !$matkutBentrok && !$ruanganBentrok && !$kelasBentrok && !$dosenBentrok){
				$this->session->set_flashdata('fail', 'Hari Bentrok, Gagal Menambahkan!');
				$this->load->view('home_v',$data);
			}

			
		}
	}
	
	public function hapusjadwal($id){
		$this->Jadwal_m->gethapus($id);
		redirect('jadwal/jadwal_makul');
	}
	
	public function lihat_jadwal(){
		$getStatus=$this->User_Model->getDataLogin();
		foreach ($getStatus as $key) 
		{
            	$status = $key->status;
        }
		$data["status"] = $status;
		$hari=$this->uri->segment(3);
		$data['konten']='konten/lihatjadwal_v';
		$data['datajadwal']=$this->Jadwal_m->getall();
		$data['datahari']=$this->Jadwal_m->gethari($hari);
		$this->load->view('home_v',$data);
	}
}