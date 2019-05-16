<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KP extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('pdf');
		$this->load->helper(array('form', 'url'));
		
	}


	public function index()	{
		$this->load->model('Site_model');
		$seminar=$this->Site_model->getdataseminarfix();
		$artikel = $this->Site_model->getlistartikel();

		$art = array('art'=>$artikel);
		$datasem = array('datasem' =>$seminar );
		$this->session->set_userdata($datasem);
		$this->session->set_userdata($art);
		$data['nama']="Guest";
		$data['logged_in']=0;
		$this->session->set_userdata($data);	
		$this->load->view('Template',$data);
	}

	public function dashboard(){
		$check = $this->session->userdata('logged_in');
		if($check==0){
			$data['nama']="Guest";
			$this->load->view('Template',$data);
		}
		else{
			$type = $this->session->userdata('type');
			if($type=="mhs"){
				$data['nama']=$this->session->userdata('nama');
				$this->load->view('Template',$data);
			}
			else if($type=="staff"){
				$data['nama']=$this->session->userdata('nama');
				$this->load->view('Template',$data);
			}
			else if($type=="dosen"){
				$data['nama']=$this->session->userdata('nama');
				$this->load->view('Template',$data);
			}
			
		}
	}
	public function profile(){
		$check = $this->session->userdata('logged_in');
		if($check==1){
			if($this->session->userdata('type')=="mhs"){
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['prodi']=$this->session->userdata('prodi');
				$data['jenis_kelamin']=$this->session->userdata('jenis_kelamin');
				$data['alamat']=$this->session->userdata('alamat');
				$data['username']=$this->session->userdata('username');
				$data['foto']=$this->session->userdata('foto');
				$data['telp']=$this->session->userdata('telp');
				$this->beranda($data);

			}
			elseif($this->session->userdata('type')=="staff"){
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['jabatan']=$this->session->userdata('jabatan');
				$data['jenis_kelamin']=$this->session->userdata('jenis_kelamin');
				$data['alamat']=$this->session->userdata('alamat');
				$data['foto']=$this->session->userdata('foto');
				$this->load->view('staff/Staff_dashboard',$data);

			}
			elseif($this->session->userdata('type')=="dosen"){
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['jabatan']=$this->session->userdata('jabatan');
				$data['jenis_kelamin']=$this->session->userdata('jenis_kelamin');
				$data['alamat']=$this->session->userdata('alamat');
				$data['foto']=$this->session->userdata('foto');	
				$this->load->view('dosen/Dosen_dashboard',$data);			
			}
		}
		else if($check==0){
				$this->load->view('Login');
			}
	
	}


	public function page_login(){
		
		$check = $this->session->userdata('logged_in');
		if($check==1){
			if($this->session->userdata('type')=="mhs"){
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['prodi']=$this->session->userdata('prodi');
				$data['jenis_kelamin']=$this->session->userdata('jenis_kelamin');
				$data['alamat']=$this->session->userdata('alamat');
				$data['username']=$this->session->userdata('username');
				$data['foto']=$this->session->userdata('foto');
				$data['telp']=$this->session->userdata('telp');
				$this->beranda($data);

			}
			elseif($this->session->userdata('type')=="staff"){
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['jabatan']=$this->session->userdata('jabatan');
				$data['jenis_kelamin']=$this->session->userdata('jenis_kelamin');
				$data['alamat']=$this->session->userdata('alamat');
				$data['foto']=$this->session->userdata('foto');
				$this->load->view('staff/Staff_dashboard',$data);

			}
			elseif($this->session->userdata('type')=="dosen"){
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['jabatan']=$this->session->userdata('jabatan');
				$data['jenis_kelamin']=$this->session->userdata('jenis_kelamin');
				$data['alamat']=$this->session->userdata('alamat');
				$data['foto']=$this->session->userdata('foto');
				$this->load->view('dosen/Dosen_dashboard',$data);

			}
		}
		else if($check==0){
				$this->load->view('Login');
			}
	}
	public function beranda($data){
		$this->load->view('mhs/Afterlogin',$data);
	}

	public function datamhsdashboard($username){
		$query3 = $this->Site_model->getDataMhs($username)->result_array();					
					foreach ($query3 as $key => $data) {
						$mhs_login=array(
							'id'=>$data['id'],
							'prodi'=>$data['prodi'],
							'nama'=>$data['nama'],
							'jenis_kelamin'=>$data['jenis_kelamin'],
							'telp'=>$data['telp'],
							'alamat' =>$data['alamat'],
							'username' =>$data['username'],
							'foto'=>$data['foto']
							);

						$this->session->set_userdata($mhs_login);
					}
					$kp = $this->Site_model->getdatapendaftarkp($data['id']);
					$seminar = $this->Site_model->getdatapendaftarseminar($data['id']);
						if(!$kp){
                           $info_kp = 'Belum Mendaftar Kerja Praktek';
                           $info_pem = 'Belum Mendaftar Kerja Praktek';
						}else{
							foreach ($kp as $key => $dat) {
								if($dat['st_pendaftaran']=='selesai'){
									$info_kp = $dat['nama_instansi'];
									$info_pem = $dat['dosen_pembimbing'];
								}else{
									$info_kp = 'Dalam Proses Pendaftaran';
									$info_pem ='Dalam Proses Pendaftaran KP';
								}
							}	
						}

						if(!$seminar){
							$info_sem1 = 'Belum Mendaftar';
							$info_sem2 = 'Seminar';
							$info_lap = 'Belum Mendaftar Seminar';
						}else{
							foreach ($seminar as $key => $dat) {
 								if($dat['status_validasi']=='sudah'){
 									$info_sem1 = $dat['tanggal_seminar'].' / '.$dat['jam']; 									
 									$info_sem2 = $dat['ruang'];
									$info_lap = $dat['judul_seminar'];
 								}else{
 									$info_sem1 = 'Dalam Proses Pendaftaran';
 									$info_sem2 = 'Seminar';
									$info_lap ='Dalam Proses Pendaftaran Seminar';
 								}
							}
						}
						$informasi=array(
							'info_kp'=>$info_kp,
							'info_pem'=>$info_pem,
							'info_sem1'=>$info_sem1,
							'info_sem2'=>$info_sem2,
							'info_lap'=>$info_lap
						);
					$this->session->set_userdata($informasi);	
					$this->beranda($data);
	}

	public function datadosendashboard($username){
		$query5 = $this->Site_model->getDataDosen($username)->result_array();
					foreach ($query5 as $key => $data) {
						# code...
						$dosen_login=array(
							'id'=>$data['id'],
							'nama'=>$data['nama_dosen'],
							'jenis_kelamin'=>$data['jenis_kelamin'],
							'alamat' =>$data['alamat'],
							'foto' =>$data['foto'],
							'jabatan'=>$data['jabatan']
							);
						$this->session->set_userdata($dosen_login);
					}
					$this->load->model('Site_model');
					$query = $this->Site_model->getlistpendaftarkp();
					$data=array('data'=>$query);
					$this->session->set_userdata($data);
					$this->load->view('dosen/Dosen_dashboard',$dosen_login);
	}

	public function datastaffdashboard($username){
		$query4 = $this->Site_model->getDataStaff($username)->result_array();
					foreach ($query4 as $key => $data) {
						# code...
						$staff_login=array(
							'id'=>$data['id'],
							'nama'=>$data['nama'],
							'jenis_kelamin'=>$data['jenis_kelamin'],
							'alamat' =>$data['alamat'],
							'foto' =>$data['foto'],
							'jabatan'=>$data['jabatan']
							);
						$this->session->set_userdata($staff_login);
					}
					$this->load->model('Site_model');
		 			$query = $this->Site_model->getlistpendaftarkp();
		 			$data=array('data'=>$query);
		 			$this->session->set_userdata($data);
					$this->load->view('staff/Staff_dashboard',$staff_login);
	}


	public function Login(){
		extract($_POST);
		$this->load->model('Site_model');
        $query = $this->Site_model->getDataUser($_POST['username'])->result_Array();
		if($query==NULL){
			$this->load->view('Loginerror');
		}
		else{
			foreach ($query as $key => $value) {
				# code...
				$user_login=array(
					'username' =>$value['username'],
					'password' =>$value['password'],
					'type' =>$value['type'],
					'logged_in' =>1
					);
				$this->session->set_userdata($user_login);
			}
			if($user_login['username']!=$_POST['username']||$user_login['password']!=$_POST['password']){
				$this->load->view('Loginerror');
			}
			else{
				if($user_login['type']=="mhs"){
					$this->datamhsdashboard($user_login['username']);					
				}
				elseif($user_login['type']=="staff"){
					$this->datastaffdashboard($user_login['username']);
				}
				elseif($user_login['type']=="dosen"){
					$this->datadosendashboard($user_login['username']);										
				}
			}
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
	public function submit_daftar(){
		$check = $this->session->userdata('logged_in');
		if($check==1){

        $config['upload_path']          = './assets/upload/transkrip/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 1000;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
		}else{
		extract($_POST);
		$this->load->model('Site_model');
		$file = $this->upload->data();
		$tbl='daftar_kp';
		$value=array(
			'nim' => $_POST['Nim'],
			'nama_instansi' => $_POST['Nama_instansi'],
			'alamat_instansi' => $_POST['Alamat_instansi'],
			'telp_instansi' => $_POST['No_instansi'],
			'div_dept' => $_POST['divisi'],
			'bidang' => $_POST['Bidang'],
			'posisi' => $_POST['Posisi'],
			'waktu_mulai' => $_POST['Waktu_pelaksanaan'],
			'waktu_selesai' => $_POST['Waktu_selesai'],
			'dosen_pembimbing' => NULL,
			'transkrip' => $file['file_name'],
			'st_validasi' => 'belum',
			'st_pendaftaran' => 'proses',
			);
		$res=$this->Site_model->daftar($tbl,$value);
		if($res){
			$data=$this->data_pendaftarkp($value['nim']);
			if($data){
			echo '<script>alert("Pendaftaran KP berhasil");</script>';
			$this->load->view('mhs/DaftarKP',$data);
		   }
		}
		else{
			$data=array('pendaftaran_p'=>NULL);
			echo '<script>alert("Pendaftaran KP gagal");</script>';
			$this->load->view('mhs/DaftarKP',$data);
		}
		}
	  }else{
	  	$this->load->view('Login');
	  }	
	}


	public function daftarulang_kp($id){
		$check = $this->session->userdata('logged_in');
		if($check==1){

        $config['upload_path']          = './assets/upload/transkrip/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 1000;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());
		extract($_POST);
		$this->load->model('Site_model');
		$file = $this->upload->data();
		$tbl='daftar_kp';
		$value=array(
			'nim' => $_POST['Nim'],
			'nama_instansi' => $_POST['Nama_instansi'],
			'alamat_instansi' => $_POST['Alamat_instansi'],
			'telp_instansi' => $_POST['No_instansi'],
			'div_dept' => $_POST['divisi'],
			'bidang' => $_POST['Bidang'],
			'posisi' => $_POST['Posisi'],
			'waktu_mulai' => $_POST['Waktu_pelaksanaan'],
			'waktu_selesai' => $_POST['Waktu_selesai'],
			'dosen_pembimbing' => NULL,
			'transkrip' => $file['file_name'],
			'st_validasi' => 'belum',
			'st_pendaftaran' => 'proses',
			'balasan_instansi' => NULL,
			'surat_balasan' => NULL
			);
		$res=$this->Site_model->ubahdata_kp($id,$value);
		if($res){
			$data=$this->data_pendaftarkp($value['nim']);
			if($data){
			echo '<script>alert("Pendaftaran KP berhasil");</script>';
			$this->load->view('mhs/DaftarKP',$data);
		   }
		}
		else{
			echo '<script>alert("Pendaftaran KP gagal");</script>';
			$this->load->view('mhs/DaftarKP',$data);
		}
		}
	  }else{
	  	$this->load->view('Login');
	  }	
	}


	public function submit_seminar(){
		$check = $this->session->userdata('logged_in');
		if($check==1){

        $config['upload_path']          = './assets/upload/laporan_logbook/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 1000;
 
		$this->load->library('upload', $config);
        $this->upload->do_upload('laporan');
        $file1 = $this->upload->data();
        $this->upload->do_upload('logbook');
        $file2 = $this->upload->data();

		extract($_POST);
		$this->load->model('Site_model');
		$tbl='daftar_seminar';
		$value=array(			
			'id_daftar_kp' => $_POST['id_daftar_kp'],
			'judul_seminar' => $_POST['judul'],
			'laporan' => $file1['file_name'],
			'logbook' => $file2['file_name'],
			'tanggal_seminar' => $_POST['Waktu_pelaksanaan'],
			'jam' => $_POST['jam'],
			'ruang' => $_POST['ruang'],
			'status_validasi' => 'belum'
			);
		$res=$this->Site_model->daftar($tbl,$value);
		if($res>=1){
			$data=array(
				'nama' => $this->session->userdata('nama'),				
				'foto' => $this->session->userdata('foto'),
				'id' => $this->session->userdata('id'),
				'id_kp'=>$_POST['id_daftar_kp'],
				'res' => $res
				);
			echo '<script>alert("Pendaftaran seminar KP berhasil");</script>';
			$this->datamhsdashboard($this->session->userdata('username'));
		}
		else{
			echo '<script>alert("Pendaftaran seminar KP gagal");</script>';
			$this->load->view('mhs/DaftarSeminarKP',$data);
		}
	  }else{
	  	$this->load->view('Login');
	  }	
	}

    public function panduan(){
        $this->load->view('panduan');
    }

    public function daftar(){
    	$this->load->model('Site_model');
    	$iskp=$this->Site_model->is_daftarkp($this->session->userdata('id'))->result_array();
		$check = $this->session->userdata('logged_in');
		if($check==1){
			if($this->session->userdata('type')=="mhs"){
				if($iskp){
					$data=$this->data_pendaftarkp($this->session->userdata('id'));					
					$this->load->view('mhs/DaftarKP',$data);
				}else{
					$data['foto']=$this->session->userdata('foto');
					$data['nama']=$this->session->userdata('nama');
					$data['id']=$this->session->userdata('id');
					$data['prodi']=$this->session->userdata('prodi');
					$data['res']=NULL;
					$data['pendaftaran_p']=NULL; 
					$this->load->view('mhs/DaftarKP',$data);
				}
							
			}
		}
		else if($check==0){
				$this->load->view('Login');
			}
	}

	public function seminar(){
		$this->load->model('Site_model');
		$value=$this->Site_model->getdatapendaftarkp($this->session->userdata('id'));
		$check = $this->session->userdata('logged_in');
		if($check==1){
			if($this->session->userdata('type')=="mhs"){
				foreach ($value as $key => $get) {
				}
				$data['id_kp']=$get['id_pendaftarankp'];
				$data['foto']=$this->session->userdata('foto');
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['prodi']=$this->session->userdata('prodi');
				$data['res']=NULL;
					$this->load->view('mhs/DaftarSeminarKP',$data);			
			}
		}
		else if($check==0){
				$this->load->view('Login');
			}
	}


	public function aksi_upload(){
		$check = $this->session->userdata('logged_in');
		if($check==1){
		$config['upload_path']          = './assets/upload/foto_profil';
		$config['allowed_types']        = 'jpg';
		$config['max_size']             = 1000;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$this->load->model('Site_model');
			$data = $this->upload->data();
			$tbl=$this->session->userdata('tabel');
			$id=$this->session->userdata('id');
			$this->Site_model->upload_foto($tbl,$id,$data['file_name']);
			if($tbl=='tbl_mhs'){
				$this->datamhsdashboard($this->session->userdata('username'));
		    }else if($tbl=='tbl_dosen'){
		    	$this->datadosendashboard($this->session->userdata('username'));
		    }else{
		    	$this->datastaffdashboard($this->session->userdata('username'));
		    }
		}
	  }else{
	  	$this->load->view('Login');
	  }			
	}
   

   public function cetaksurat_page(){

   	    $check = $this->session->userdata('logged_in');
		if($check==1){
			if($this->session->userdata('type')=="mhs"){
				$status = $this->data_pendaftarkp($this->session->userdata('id'));
				if($status){
					$v=$status['validasi_p'];
					$p=$status['pendaftaran_p'];
				}else{
					$v=NULL;
					$p=NULL;
				}
				$data['foto']=$this->session->userdata('foto');
				$data['nama']=$this->session->userdata('nama');
				$data['id']=$this->session->userdata('id');
				$data['prodi']=$this->session->userdata('prodi');
				$data['st_val']=$v;
				$data['st_pend']=$p;
				$data['res']=NULL;
			$this->load->view('mhs/Cetak_SuratKP',$data);			
			}
		}
		else if($check==0){
				$this->load->view('Login');
		}
			
	}

	public function data_pendaftarkp($id){
		$this->load->model('Site_model');
		$value=$this->Site_model->getdatapendaftarkp($id);
		if($value){
		foreach ($value as $key => $data) {
	  		$pendaftaran=array(
	  			'id_pen'=>$data['id_pendaftarankp'],
	  			'nama_p'=>$data['nama'],
	  			'id_p'=>$data['nim'],
	  			'prodi_p'=>$data['prodi'],
	  			'alamat_p'=>$data['alamat'],
	  			'instansi_p'=>$data['nama_instansi'],
	  			'alamat_instansi_p'=>$data['alamat_instansi'],
	  			'telpinstansi_p'=>$data['telp_instansi'],
	  			'div_p'=>$data['div_dept'],
	  			'bidang_p'=>$data['bidang'],
	  			'posisi_p'=>$data['posisi'],
	  			'waktum_p'=>$data['waktu_mulai'],
	  			'waktus_p'=>$data['waktu_selesai'],
	  			'dosen_p'=>$data['dosen_pembimbing'],
	  			'transkrip_p'=>$data['transkrip'],
	  			'balasan_p'=>$data['surat_balasan'],
	  			'validasi_p'=>$data['st_validasi'],
	  			'pendaftaran_p'=>$data['st_pendaftaran'],
	  			'nama'=>$this->session->userdata('nama'),
  			    'foto'=>$this->session->userdata('foto'),
				'id'=>$this->session->userdata('id'),
				'prodi'=>$this->session->userdata('prodi'),
				'res'=>NULL
	  		);
	  	  }
	  		return $pendaftaran;
	  	}else{
	  		return NULL;
	  	}	
	}

	public function pendaftaran($id){
		if($this->session->userdata('logged_in')==1){
        $pendaftaran = $this->data_pendaftarkp($id);
	    if($pendaftaran){
		$this->load->view('dosen/Profile_pendaftar',$pendaftaran);

	   }else{
	   	echo '<script>alert("Data tidak ada");</script>';
	   }

	  }else{
	  	$this->load->view('Login');
	  }
	}

	public function data_pendaftarseminar($id){
	  $this->load->model('Site_model');
		$value=$this->Site_model->getdatapendaftarseminar($id);
	  	foreach ($value as $key => $data) {
	  		$pendaftaran=array(
	  			'nama_p'=>$data['nama'],
	  			'id_p'=>$data['nim'],
	  			'judulseminar_p'=>$data['judul_seminar'],
	  			'tanggalseminar_p'=>$data['tanggal_seminar'],
	  			'jamseminar_p'=>$data['jam'],
	  			'ruangseminar_p'=>$data['ruang'],
	  			'statusvalidasi_p'=>$data['status_validasi'],
	  			'id_seminar'=>$data['id_seminar'],
	  			'nama'=>$this->session->userdata('nama')
	  		);
	  	return $pendaftaran;
	  	}
	   
		
	}


	public function dataseminar($id){
		$check = $this->session->userdata('logged_in');
		if($check==1){
		$pendaftaran = $this->data_pendaftarseminar($id);
	    if($pendaftaran){	  	
	  	$this->session->set_userdata($pendaftaran);
		$this->load->view('dosen/profil_seminar',$pendaftaran);

	   }else{
	   	echo '<script>alert("Data tidak ada");</script>';
	   }
	  }else{
	  	$this->load->view('Login');
	  } 
	}

	public function tolak($id){
		$check = $this->session->userdata('logged_in');
		if($check==1){
		$this->load->model('Site_model');
		$val=$this->Site_model->ValidasiDosen($id,'tolak','gagal');
		if($val){
          echo '<script>alert("Berhasil menolak validasi pendaftaran KP");</script>';
          $pendaftaran = $this->data_pendaftarkp($id);
          $this->load->view('dosen/Profile_pendaftar',$pendaftaran);
		}else{
          echo '<script>alert("Gagal menolak validasi pendaftaran KP");</script>';
		}
	  }else{
	  	$this->load->view('Login');
	  }	
	}

	public function validasi_seminar($id_seminar){
		$check = $this->session->userdata('logged_in');
		if($check==1){
		$this->load->model('Site_model');
		$val=$this->Site_model->ValidasiSeminar($id_seminar);
		if($val){
          echo '<script>alert("Sukses validasi pendaftaran seminar KP");</script>';
          $pendaftaran = $this->data_pendaftarseminar($_POST['Nim']);
          $this->load->view('dosen/profil_seminar',$pendaftaran);
		}else{
          echo '<script>alert("Gagal validasi pendaftaran seminar KP");</script>';
		}
	  }else{
	  	$this->load->view('Login');
	  }	
	}


    public function listseminar(){
    $check = $this->session->userdata('logged_in');
		if($check==1){
    	$this->load->model('Site_model');
		$query = $this->Site_model->getlistpendaftarseminar();
		$datasem=array('datasem'=>$query);
		$this->session->set_userdata($datasem);
		$this->load->view('dosen/list_seminar');	
	 }else{
	 	$this->load->view('Login');
	 }
    }

    public function editkp($id){
    	$check = $this->session->userdata('logged_in');
		if($check==1){
    	$pendaftaran = $this->data_pendaftarkp($id);
	    if($pendaftaran){	  	
	  	$this->session->set_userdata($pendaftaran);
		$this->load->view('staff/edit_pendaftarkp',$pendaftaran);

	   }else{
	   	echo '<script>alert("Data tidak ada");</script>';
	   }
	 }else{
	 	$this->load->view('Login');
	 }
    }

    public function ubahkp($id_kp){
    	$check = $this->session->userdata('logged_in');
		if($check==1){
    	$this->load->model('Site_model');
    	$value=array(
			'nim' => $_POST['Nim'],
			'nama_instansi' => $_POST['Nama_instansi'],
			'alamat_instansi' => $_POST['Alamat_instansi'],
			'telp_instansi' => $_POST['No_instansi'],
			'div_dept' => $_POST['divisi'],
			'bidang' => $_POST['Bidang'],
			'posisi' => $_POST['Posisi'],
			'waktu_mulai' => $_POST['Waktu_pelaksanaan'],
			'waktu_selesai' => $_POST['Waktu_pelaksanaan'],
			);
		$res=$this->Site_model->ubahdata_kp($id_kp,$value);
		if($res){
			echo '<script>alert("Pendaftaran KP berhasil");</script>';
			$this->load->view('staff/Staff_dashboard');
		}
		else{
			echo '<script>alert("Pendaftaran KP gagal");</script>';
			$this->load->view('staff/Staff_dashboard');
		}
	  }else{
	  	$this->load->view('Login');
	  }	
    }

    public function suratbalasan($id_kp){
    	$check = $this->session->userdata('logged_in');
		if($check==1){
    	$config['upload_path']          = './assets/upload/transkrip/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 1000;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('surat_balasan')){
			$error = array('error' => $this->upload->display_errors());
		}else{
		extract($_POST);
		$this->load->model('Site_model');
		$file = $this->upload->data();
		$tbl='daftar_kp';
		if($_POST['balasan']=='true'){
			$pen = 'selesai';
		}else{
			$pen = 'gagal';
		}
		$value=array(
			'st_pendaftaran'=> $pen,
			'balasan_instansi' => $_POST['balasan'],
			'surat_balasan' =>$file['file_name']
			);
		$res=$this->Site_model->ubahdata_kp($id_kp,$value);
		if($res){
			$data=$this->data_pendaftarkp($this->session->userdata('id'));
			if($data){
			echo '<script>alert("Pendaftaran KP berhasil");</script>';
			$this->load->view('mhs/DaftarKP',$data);
		    }
		}
		else{
			echo '<script>alert("Pendaftaran KP gagal");</script>';
			$this->load->view('mhs/DaftarKP',$data);
		}
		}
	  }else{
	  	$this->load->view('Login');
	  }	
    }

	public function dosenpembimbing(){
		$check = $this->session->userdata('logged_in');
		if($check==1){
		$data=array(
			'dosen_pembimbing' => $_POST['namadosen'] );
		$id=$_POST['id_daftar'];

		$this->load->model('Site_model');
		$val=$this->Site_model->ubahdata_kp($id,$data);
		if($val){
          echo '<script>alert("Sukses");</script>';
          $pendaftaran = $this->data_pendaftarkp($_POST['NIM']);
          if($pendaftaran!=NULL){
          	$this->load->view('dosen/Profile_pendaftar',$pendaftaran);
          }else{
          	echo '<script>alert("Data tidak ada");</script>';
          }
          
		}else{
          echo '<script>alert("Gagal");</script>';
		}

	  }else{
	  	$this->load->view('Login');
	  }	
	}

	public function validasi($id){
		$check = $this->session->userdata('logged_in');
		if($check==1){
		$this->load->model('Site_model');
		$val=$this->Site_model->ValidasiDosen($id,'sudah','proses');
		if($val){
          echo '<script>alert("Sukses validasi pendaftaran KP");</script>';
          $pendaftaran = $this->data_pendaftarkp($id);
          $this->load->view('dosen/Profile_pendaftar',$pendaftaran);
		}else{
          echo '<script>alert("Gagal validasi pendaftaran KP");</script>';
		}
	  }else{
	  	$this->load->view('Login');
	  }	
	}

public function surat_pengantar($id){
	$check = $this->session->userdata('logged_in');
	if($check==1){

		$pdf = new FPDF('P','mm','A4');			
		$pdf->SetLeftMargin(20);
		$pdf->SetTopMargin(0);
		$pdf->AddPage();
		$pdf->Image('./assets/img/header_pdf.jpg',20,null,169,36,'JPG');		
		$pdf->SetFont('Times','',12);
		$this->load->model('Site_model');
		$value=$this->Site_model->getdatapendaftarkp($id);
		if($value){
	  	foreach ($value as $key => $data) {
	  		$pdf->Cell(99,7,'Nomor   :',0,0,'L');$pdf->Cell(70,7,'---Tanggal--',0,1,'R');
	  		$pdf->Cell(169,7,'Lampiran  : - ',0,2,'L');
	  		$pdf->Cell(169,7,'Perihal  : Permohonan Kerja Praktek ',0,2,'L');
	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(26,7,'Yth. Pimpinan ',0,0,'L'); $pdf->Cell(114,7,$data['nama_instansi'],0,1,'L');
	  		$pdf->Cell(20,7,'di - ',0,1,'L');
	  		$pdf->Cell(169,7,$data['alamat_instansi'],0,2,'L');
	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(20,7,'Dengan hormat,',0,1,'L');
	  		$pdf->Cell(169,7,'Dalam rangka menyelesaikan mata kuliah Kerja Praktek, dengan ini kami mengajukan ',0,2,'L');
	  		$pdf->Cell(169,7,'permohonan Kerja Praktek mahasiswa Institut Teknologi Sumatera atas nama Saudara: ',0,2,'L');
	  		$pdf->Cell(169,5,'',0,2);

	  		$pdf->SetFont('Times','B',12);
	  		$pdf->Cell(7,5,'No','L T R',0,'C');$pdf->Cell(50,5,'Nama','L T R',0,'C');$pdf->Cell(20,5,'NIM','L T R',0,'C');
	  		$pdf->Cell(25,5,'Program','L T R',0,'C');$pdf->Cell(30,5,'Waktu','L T R',0,'C');$pdf->Cell(37,5,'Narahubung','L T R',1,'C');
	  		$pdf->Cell(7,5,'','L R B',0,'C');$pdf->Cell(50,5,'','L R B',0,'C');$pdf->Cell(20,5,'','L R B',0,'C');
	  		$pdf->Cell(25,5,'Studi','L R B',0,'C');$pdf->Cell(30,5,'Pelaksanaan','L R B',0,'C');$pdf->Cell(37,5,'','L R B',1,'C');

	  		$pdf->SetFont('Times','',12);
	  		$pdf->Cell(7,5,'1','L T R',0,'C');$pdf->Cell(50,5,$data['nama'],'L T R',0,'C');$pdf->Cell(20,5,$data['nim'],'L T R',0,'C');
	  		$pdf->Cell(25,5,'Teknik','L T R',0,'C');$pdf->Cell(30,5,$data['waktu_mulai'].'-','L T R',0,'C');$pdf->Cell(37,5,$data['telp'],'L T R',1,'C');
	  		$pdf->Cell(7,5,'','L R B',0,'C');$pdf->Cell(50,5,'','L R B',0,'C');$pdf->Cell(20,5,'','L R B',0,'C');
	  		$pdf->Cell(25,5,'Informatika','L R B',0,'C');$pdf->Cell(30,5,$data['waktu_selesai'],'L R B',0,'C');$pdf->Cell(37,5,'','L R B',1,'C');
	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(169,7,'Mohon bantuan Bapak/Ibu kiranya berkenan menerima mahasiswa tersebut, untuk melaksanakan',0,2,'L');
	  		$pdf->Cell(169,7,'Kerja Praktek di Instansi yang Bapak/Ibu pimpin.',0,2,'L');
	  		$pdf->Cell(169,3,'',0,2);
	  		$pdf->Cell(169,7,'Atas perhatian dan kerjasama yang baik, kami ucapkan terimakasih.',0,2,'L');
	  		$pdf->Cell(169,10,'',0,2);

	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(99,7,'a.n. Ketua Jurusan Teknologi Produksi dan Industri',0,1,'L');
	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(99,7,'Sekretaris Jurusan Teknologi Produksi dan Industri',0,1,'L');
	  		$pdf->Cell(169,20,'',0,2);
	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(70,7,'Dr. Eng. Feerzet Achmad, S.T.,M.T.','B',1,'L');
	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(10,7,'NRK. ',0,0);$pdf->Cell(60,7,'1975041720171091',0,1,'L');

	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(30,7,'Tembusan ',0,1,'L');
	  		$pdf->Cell(7,7,'',0,0);$pdf->Cell(60,7,'1. Rektor (sebagai laporan)',0,1,'L');
	  		$pdf->Cell(7,7,'',0,0);$pdf->Cell(60,7,'2. Wakil Rektor Bidang Akademik',0,1,'L');
		  }   
        }
        $pdf->Output();

    }else{
       	$this->load->view('Login');
       } 
    }


    public function surat_tugas($id){
	$check = $this->session->userdata('logged_in');
	if($check==1){

		$pdf = new FPDF('P','mm','A4');			
		$pdf->SetLeftMargin(20);
		$pdf->SetTopMargin(0);
		$pdf->AddPage();
		$pdf->Image('./assets/img/header_pdf.jpg',20,null,169,36,'JPG');		
		$pdf->SetFont('Times','',12);
		$this->load->model('Site_model');
		$value=$this->Site_model->getdatapendaftarkp($id);
		if($value){
	  	foreach ($value as $key => $data) {
	  		$pdf->Cell(99,7,'Nomor   :',0,0,'L');$pdf->Cell(70,7,'Lampung Selatan,...................',0,1,'R');
	  		$pdf->Cell(169,7,'Lampiran  : - ',0,2,'L');
	  		$pdf->Cell(169,7,'Perihal  : Surat Tugas Kerja Praktek ',0,2,'L');
	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(26,7,'Yth. Pimpinan ',0,0,'L'); $pdf->Cell(114,7,$data['nama_instansi'],0,1,'L');
	  		$pdf->Cell(20,7,'di - ',0,1,'L');
	  		$pdf->Cell(169,7,$data['alamat_instansi'],0,2,'L');
	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(20,7,'Dengan hormat,',0,1,'L');
	  		$pdf->Cell(169,7,'Sehubungan terbitnya Izin Kerja Praktek yang diberikan oleh '.$data['nama_instansi'],0,2,'L');
	  		$pdf->Cell(169,7,'Nomor:......................., pada tanggal .............. kepada mahasiswa berikut:',0,2,'L');
	  		$pdf->Cell(169,5,'',0,2);

	  		$pdf->SetFont('Times','B',12);
	  		$pdf->Cell(7,5,'No','L T R',0,'C');$pdf->Cell(50,5,'Nama','L T R',0,'C');$pdf->Cell(20,5,'NIM','L T R',0,'C');
	  		$pdf->Cell(25,5,'Program','L T R',0,'C');$pdf->Cell(30,5,'Waktu','L T R',0,'C');$pdf->Cell(37,5,'Narahubung','L T R',1,'C');
	  		$pdf->Cell(7,5,'','L R B',0,'C');$pdf->Cell(50,5,'','L R B',0,'C');$pdf->Cell(20,5,'','L R B',0,'C');
	  		$pdf->Cell(25,5,'Studi','L R B',0,'C');$pdf->Cell(30,5,'Pelaksanaan','L R B',0,'C');$pdf->Cell(37,5,'','L R B',1,'C');

	  		$pdf->SetFont('Times','',12);
	  		$pdf->Cell(7,5,'1','L T R',0,'C');$pdf->Cell(50,5,$data['nama'],'L T R',0,'C');$pdf->Cell(20,5,$data['nim'],'L T R',0,'C');
	  		$pdf->Cell(25,5,'Teknik','L T R',0,'C');$pdf->Cell(30,5,$data['waktu_mulai'].'-','L T R',0,'C');$pdf->Cell(37,5,$data['telp'],'L T R',1,'C');
	  		$pdf->Cell(7,5,'','L R B',0,'C');$pdf->Cell(50,5,'','L R B',0,'C');$pdf->Cell(20,5,'','L R B',0,'C');
	  		$pdf->Cell(25,5,'Informatika','L R B',0,'C');$pdf->Cell(30,5,$data['waktu_selesai'],'L R B',0,'C');$pdf->Cell(37,5,'','L R B',1,'C');
	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(169,7,'Maka terhitung '.$data['waktu_mulai'].' s/d '.$data['waktu_selesai'].', mahasiswa tersebut kami tugaskan melaksanakan',0,2,'L');
	  		$pdf->Cell(169,7,'Kerja Praktek di '.$data['nama_instansi'].', '.$data['alamat_instansi'].'.',0,2,'L');
	  		$pdf->Cell(169,3,'',0,2);
	  		$pdf->Cell(169,7,'Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.',0,2,'L');
	  		$pdf->Cell(169,10,'',0,2);

	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(99,7,'a.n. Ketua Jurusan Teknologi Produksi dan Industri',0,1,'L');
	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(99,7,'Sekretaris Jurusan Teknologi Produksi dan Industri',0,1,'L');
	  		$pdf->Cell(169,20,'',0,2);
	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(70,7,'Dr. Eng. Feerzet Achmad, S.T.,M.T.','B',1,'L');
	  		$pdf->Cell(70,7,'',0,0);$pdf->Cell(10,7,'NRK. ',0,0);$pdf->Cell(60,7,'1975041720171091',0,1,'L');

	  		$pdf->Cell(169,10,'',0,2);
	  		$pdf->Cell(30,7,'Tembusan ',0,1,'L');
	  		$pdf->Cell(7,7,'',0,0);$pdf->Cell(60,7,'1. Rektor (sebagai laporan)',0,1,'L');
	  		$pdf->Cell(7,7,'',0,0);$pdf->Cell(60,7,'2. Wakil Rektor Bidang Akademik',0,1,'L');
		  }   
        }
        $pdf->Output();

    }else{
       	$this->load->view('Login');
       } 
    }

public function artikel(){
	$check = $this->session->userdata('logged_in');
	if($check==1){
		$this->load->view('staff/artikel');
	}else{
		$this->load->view('Login');
	}
}


public function submit_artikel(){
	$check = $this->session->userdata('logged_in');
	if($check==1){
		$config['upload_path']          = './assets/upload/artikel/';
		$config['allowed_types']        = 'jpg';
		$config['max_size']             = 1000;
 
		$this->load->library('upload', $config);
        $this->upload->do_upload('gambar');
        $file = $this->upload->data();

		extract($_POST);
		$this->load->model('Site_model');
		$tbl='artikel';
		$value=array(			
			'id_penulis' => $_POST['id_staff'],
			'tanggal_publish' => date("Y-m-d"),
			'judul' => $_POST['judul'],
			'isi' => $_POST['isi'],
			'gambar' => $file['file_name']
			);
		$res=$this->Site_model->daftar($tbl,$value);
		if($res>=1){
			echo '<script>alert("Berhasil membuat artikel");</script>';
			$this->artikel();
		}
		else{
			echo '<script>alert("Gagal membuat artikel");</script>';
			$this->artikel();
		}

	}else{
		$this->load->view('Login');
	}
}

public function artikel_page($id){
	$this->load->model('Site_model');
	$value = $this->Site_model->getdataartikel($id);
	foreach ($value as $key => $data) {
		$art = array
		       ('judul' => $data['judul'] ,
		        'isi' => $data['isi'] ,
		        'tanggal' => $data['tanggal_publish'] ,
		        'gambar' => $data['gambar'] 
		       );
	}
	$this->load->view('staff/artikel_page',$art);
}


 
}




