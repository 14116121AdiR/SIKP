<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {
public function __construct()
    {
        parent::__construct();
    }
	public function getDataUser($username){
		return $data = $this->db->select("*")
		->from("tbl_user")
		->where("tbl_user.username=",$username)
		->get();
	}
	public function getDataMhs($username){
		return $data = $this->db->select("*")
		->from("tbl_mhs")
		->where("tbl_mhs.username=",$username)
		->get();
	}
	public function daftar($tablename,$data){
		$res=$this->db->insert($tablename,$data);
		return $res;
	}
	
	public function getDataStaff($username){
		return $data = $this->db->select("*")
		->from("tbl_staff")
		->where("tbl_staff.username=",$username)
		->get();
	}
	
	
	public function getDataDosen($username){
		return $data = $this->db->select("*")
		->from("tbl_dosen")
		->where("tbl_dosen.username=",$username)
		->get();
	}

	public function getdataseminarfix(){
		
	$query = $this->db->query("SELECT * FROM daftar_seminar INNER JOIN daftar_kp ON daftar_seminar.id_daftar_kp = daftar_kp.id_pendaftarankp INNER JOIN tbl_mhs ON daftar_kp.nim = tbl_mhs.id WHERE daftar_seminar.status_validasi='sudah'")->result_array() ;	
	return $query;
	}

	public function getdatapendaftarkp($id){
		$query = $this->db->query("SELECT * FROM daftar_kp INNER JOIN tbl_mhs ON daftar_kp.nim = tbl_mhs.id  WHERE daftar_kp.nim = $id")->result_array();
        return $query;
	}
	public function getdatapendaftarseminar($id){
		$query = $this->db->query("SELECT * FROM daftar_seminar INNER JOIN daftar_kp ON daftar_seminar.id_daftar_kp = daftar_kp.id_pendaftarankp INNER JOIN tbl_mhs ON daftar_kp.nim = tbl_mhs.id WHERE daftar_kp.nim = $id")->result_array();
        return $query;
	}

	public function getlistartikel(){
		$query = $this->db->query("SELECT * FROM artikel INNER JOIN tbl_staff ON artikel.id_penulis = tbl_staff.id")->result_array();
		return $query;
	}

	public function getdataartikel($id){
		$query = $this->db->query("SELECT * FROM artikel WHERE artikel.id_artikel = $id ")->result_array();
		return $query;
	}
	
	public function ValidasiDosen($nim,$status,$pend){
		$data = array('st_validasi' =>$status, 'st_pendaftaran'=>$pend);
		$this->db->where('nim', $nim);
		$res=$this->db->update('daftar_kp', $data);
		return $res;
	}

	public function ubahdata_kp($id,$data){
		$this->db->where('id_pendaftarankp', $id);
		$res=$this->db->update('daftar_kp', $data);
		return $res;
	}

	public function ValidasiSeminar($id_seminar){
		$data = array('status_validasi' =>'sudah');
		$this->db->where('id_seminar', $id_seminar);
		$res=$this->db->update('daftar_seminar', $data);
		return $res;
	}

	public function getlistpendaftarkp(){
		$query = $this->db->query("SELECT * FROM daftar_kp INNER JOIN tbl_mhs ON daftar_kp.nim = tbl_mhs.id	")->result_array();
        return $query;
	}

	public function getlistpendaftarseminar(){
		$query = $this->db->query("SELECT * FROM daftar_seminar INNER JOIN daftar_kp ON daftar_seminar.id_daftar_kp = daftar_kp.id_pendaftarankp INNER JOIN tbl_mhs ON daftar_kp.nim = tbl_mhs.id ")->result_array();
        return $query;
	}

	public function uploadtranskip($namafile){
    $config['upload_path']          = './assets/transkip/';
    $config['allowed_types']        = 'pdf';
    $config['file_name']            = $namafile;
    $config['overwrite']			= true;
    $config['max_size']             = 2024; 
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('Transkrip')) {
        return $this->upload->data("file_name");
    }
    return $namafile;
    }

    public function upload_foto($tabel,$id,$img){
       $query= $this->db->query("UPDATE $tabel SET foto = '$img' WHERE id = '$id' ");
	   return $query;
    }


	public function UpdateBimbingan($tablename,$data,$nim){
		$this->db->where('nim', $nim);
		$res=$this->db->update($tablename, $data);
		return $res;
	}

	public function getlistdosen(){
		return $data = $this->db->select("nama_dosen,id")
		->from("tbl_dosen")
		->get();
	}

	public function is_daftarkp($id){
		return $data = $this->db->select("st_pendaftaran")
		->from("daftar_kp")
		->where("daftar_kp.nim=",$id)
		->get();
	}


}
