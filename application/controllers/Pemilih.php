<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemilih extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Pemilih";
	private $lev1kata="Pemilih";
	private $tukaran=" :: ";
	function __construct(){
		parent::__construct();
		$this->load->model('m_akses');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tatausaha');
		$this->load->model('m_jurusan');
		$this->load->model('m_campaign');
		$this->load->model('m_pemilih');
		$this->load->model('m_poling');
		$this->load->helper(array('form', 'url','file'));
        $this->load->library('upload','tools');
		if(!$this->session->userdata('user')){
			redirect(enkripsi('Login','index'));
		}
	}
	function secure($url){
		$data	= $this->mza_secureurl->setSecureUrl_decode($url);
		if($data != false){
			if (method_exists($this, trim($data['function']))){
				if(!empty($data['params'])){
					return call_user_func_array(array($this, trim($data['function'])), $data['params']);
				}else{
					return $this->$data['function']();
				}
			}
		}
		show_404();
	}
	public function index(){
		$lev2=""; // segmen 3
		$lev3="";
		$lev4="";
		$lev5="";
		$data['angkasa']=$this->levpol;
		$data['langit']=$this->lev1;
		$data['katalangit']=$this->lev1kata;
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode($this->lev1kata,'index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode($this->lev1kata,'index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='pemilih';
		$akses=$this->session->userdata('akses');
		if($akses=='super'){
			// $data['campaign']=$this->m_campaign->ambil_data(1)->result();
			$data['konten']='pemilih/index.php';
		}elseif($akses=='admin'){
			$jur=$this->session->userdata('jurusan');
			redirect('pemilih/tahun/'.$jur);
		}
		$this->load->view('admin/template',$data);
	}
	public function tahun(){
		$camp=$this->uri->segment(3);
		$seg3=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$lev2=$seg3; // segmen 3
		$lev3="";
		$lev4="";
		$lev5="";
		$data['angkasa']=$this->levpol;
		$data['langit']=$this->lev1;
		$data['katalangit']=$this->lev1kata;
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode($this->lev1kata,'index'); 
		$data['hawan']=('pemilih/tahun/'.$camp); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='pemilih';
		$data['tahun']=$this->m_pemilih->ambil_tahun($camp)->result();
		$data['konten']='pemilih/tahun.php';
		$this->load->view('admin/template',$data);
	}
	public function detail(){
		$camp=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$seg3=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$lev2=$seg3; // segmen 3
		$lev3=$thn;
		$lev4="Belum";
		$lev5="";
		$data['angkasa']=$this->levpol;
		$data['langit']=$this->lev1;
		$data['katalangit']=$this->lev1kata;
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode($this->lev1kata,'index');   
		$data['hawan']=('pemilih/tahun/'.$camp); // segmen 3
		$data['htanah']=('pemilih/detail/'.$camp.'/'.$thn); // segmen 4
		$data['hair']=('pemilih/detail/'.$camp.'/'.$thn); // segmen 5
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='pemilih';
		$data['pemilih']=$this->m_pemilih->ambil_data(1,$camp,$thn)->result();
		$data['mahasiswa']=$this->m_mahasiswa->ambil_data_jur($camp);
		$data['konten']='pemilih/perjurusan.php';
		$this->load->view('admin/template',$data);
	}
	public function sudah(){
		$camp=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$seg3=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$lev2=$seg3; // segmen 3
		$lev3=$thn;
		$lev4="Sudah";
		$lev5="";
		$data['angkasa']=$this->levpol;
		$data['langit']=$this->lev1;
		$data['katalangit']=$this->lev1kata;
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode($this->lev1kata,'index');   
		$data['hawan']=('pemilih/tahun/'.$camp); // segmen 3
		$data['htanah']=('pemilih/detail/'.$camp.'/'.$thn); // segmen 4
		$data['hair']=('pemilih/sudah/'.$camp.'/'.$thn); // segmen 5
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='pemilih';
		$data['pemilih']=$this->m_pemilih->ambil_data_non(1,$camp,$thn)->result();
		$data['mahasiswa']=$this->m_mahasiswa->ambil_data_jur($camp);
		$data['konten']='pemilih/sudah.php';
		$this->load->view('admin/template',$data);
	}
	public function tambah(){
		$camp=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$seg3=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$lev2=$seg3; // segmen 3
		$lev3=$thn;
		$lev4="Tambah";
		$lev5="";
		$data['angkasa']=$this->levpol;
		$data['langit']=$this->lev1;
		$data['katalangit']=$this->lev1kata;
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode($this->lev1kata,'index');   
		$data['hawan']=('pemilih/tahun/'.$camp); // segmen 3
		$data['htanah']=('pemilih/detail/'.$camp.'/'.$thn); // segmen 4
		$data['hair']=('pemilih/tambah/'.$camp.'/'.$thn); // segmen 5
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='pemilih';
		$data['pemilih']=$this->m_pemilih->ambil_data(0,$camp,$thn)->result();
		$data['mahasiswa']=$this->m_pemilih->mahas()->result();
		$data['tatausaha']=$this->m_tatausaha->ambil_data()->result();
		$data['dosen']=$this->m_dosen->ambil_data()->result();
		$data['konten']='pemilih/tambah.php';
		$this->load->view('admin/template',$data);
	}
	function tambahthn(){
		$namacamp=$this->input->post('namacamp'); 	
		$camp=$this->input->post('id_campaign'); 	
		$thn=$this->input->post('thn');
		$cek=$this->m_pemilih->cekth($thn,$camp); 	
		if($cek->num_rows()>0){ 
			$this->session->set_flashdata('m_error','Campaign <b>'.$namacamp." Pada Tahun ".$thn. '</b> sudah Ada Pemilihan!');
			redirect(base_url().'pemilih/tahun/'.$camp);
		}else{
			$info=array(
				'id_tahun'=>$thn.$camp,
				'tahun'=>$thn,
				'id_campaign'=>$camp,
				'mulai'=>$this->input->post('tgl_mulai'),
				'selesai'=>$this->input->post('tgl_mari')
			);
			$this->m_pemilih->simpanth($info);
			$this->session->set_flashdata('m_sukses','Pemilihan Campaign <b>'.$namacamp." Pada Tahun ".$thn. '</b> Berhasil Ditambahkan!');
			redirect(base_url().'pemilih/tahun/'.$camp);
		}
	}
	function editthn(){
		$hal=$this->input->post('hal'); 	
		$namacamp=$this->input->post('namacamp'); 	
		$camp=$this->input->post('camp'); 	
		$thn=$this->input->post('thn');
		$info=array(
			'mulai'=>$this->input->post('tgl_mulai'),
			'selesai'=>$this->input->post('tgl_mari')
		);
		$this->m_pemilih->editth($info,$thn.$camp);
		$this->session->set_flashdata('m_sukses','Pemilihan Campaign <b>'.$namacamp." Pada Tahun ".$thn. '</b> Berhasil Diedit!');
		redirect($hal.'/tahun/'.$camp.'/'.$thn);
	}
	function tambahmahas(){ 	
		$namacamp=$this->input->post('namacamp');
		$camp=$this->input->post('camp');
		$thn=$this->input->post('thn');
		$this->m_pemilih->simpanmahas($camp,$thn);
		$this->session->set_flashdata('m_sukses','Pemilih Campaign <b>'.$namacamp." Pada Tahun ".$thn. '</b> Berhasil Ditambahkan!');
		redirect('pemilih/tambah/'.$camp.'/'.$thn);
	}
	function tambahtu(){ 	
		$namacamp=$this->input->post('namacamp');
		$camp=$this->input->post('camp');
		$thn=$this->input->post('thn');	
		$this->m_pemilih->simpantu($camp,$thn);
		$this->session->set_flashdata('m_sukses','Pemilih Campaign <b>'.$namacamp." Pada Tahun ".$thn. '</b> Berhasil Ditambahkan!');
		redirect('pemilih/tambah/'.$camp.'/'.$thn);
	}
	function tambahdos(){ 	
		$namacamp=$this->input->post('namacamp');
		$camp=$this->input->post('camp');
		$thn=$this->input->post('thn');	
		$this->m_pemilih->simpandos($camp,$thn);
		$this->session->set_flashdata('m_sukses','Pemilih Campaign <b>'.$namacamp." Pada Tahun ".$thn. '</b> Berhasil Ditambahkan!');
		redirect('pemilih/tambah/'.$camp.'/'.$thn);
	}
	public function nonaktifkan(){
		$this->form_validation->set_rules('id_pem','id_pem','required');
		$id_pem=$this->input->post('id_pem');
		$hal=$this->input->post('hal');
		$camp=$this->input->post('camp');
		$thn=$this->input->post('thn');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data!');
				redirect ('pemilih/detail/'.$camp);
		}else{
			$data = array(
				'status'=>2,
			);
			$this->m_pemilih->edit($data,$id_pem);
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Nonaktifkan');
			redirect ('pemilih/'.$hal.'/'.$camp.'/'.$thn);
		}
	}
	public function aktifkan(){
		$this->form_validation->set_rules('id_pem','id_pem','required');
		$id_pem=$this->input->post('id_pem');
		$hal=$this->input->post('hal');
		$camp=$this->input->post('camp');
		$thn=$this->input->post('thn');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data!');
				redirect ('pemilih/detail/'.$camp);
		}else{
			$data = array(
				'status'=>1,
			);
			$this->m_pemilih->edit($data,$id_pem);
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Aktifkan');
			redirect ('pemilih/'.$hal.'/'.$camp.'/'.$thn);
		}
	}
	function ekspor(){
		$this->load->view('admin/pemilih/excel');
	}
	function randcetak($panjang){
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
		  $pos = rand(0, strlen($karakter)-1);
		  $string .= $karakter{$pos};
		}
		return $string;
	}
	function cetak(){
		$jur=$this->uri->segment(3); $thn=$this->uri->segment(4);
		$status=$this->uri->segment(5);
		$namajur=$this->m_jurusan->cek_id($jur)->row_array()['nama_jur'];
		$data['title']="Cetak :: Aktif :: Pemilih :: $namajur";
		$data['pem']=$this->m_pemilih->ambil_data($status,$jur,$thn)->result();
		$this->load->view('admin/pemilih/kartu_pemilih',$data);
	}
	function data(){
		$jur=$this->uri->segment(3); $thn=$this->uri->segment(4);
		$status=$this->uri->segment(5);
		$namajur=$this->m_jurusan->cek_id($jur)->row_array()['nama_jur'];
		$data['title']="Cetak :: Aktif :: Pemilih :: $namajur";
		$data['pem']=$this->m_pemilih->ambil_data($status,$jur,$thn)->result();
		$this->load->view('admin/pemilih/cetak',$data);
	}
	function kartu(){
		$id=$this->input->post('id');
		$camp=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$cetak=$this->randcetak(6);
		$campaign_name=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$data['title']="Cetak :: Aktif :: Pemilih :: $campaign_name";
		if($id!=null){
			$action=$this->input->post('action');
			if($action=='email'){
				$pemilihan = $this->db->where(array('tahun'=>$thn,'id_campaign'=>$camp))->get('tahun_pemilihan')->row_array();
				$time =  dt($pemilihan['mulai']).' s/d '.dt($pemilihan['selesai']);
				for($i=0; $i<count($id); $i++){
					$pemilih = $this->db->select('id_user,password')->where(array('id_campaign'=>$camp,'id_pemilih'=>$id[$i],'tahun'=>$thn))->get('pemilih')->row_array();
					$id_user =  $pemilih['id_user'];
					$password =  $pemilih['password'];

					if($mhs = $this->db->select()->where('nim',$id_user)->get('mahasiswa')->row_array()){
						$email = $mhs['email']; 
						$user_name = $mhs['nama_mahas']; 
					}elseif($dos = $this->db->select()->where('id_dos',$id_user)->get('dosen')->row_array()){
						$email = $dos['email'];
						$user_name = $dos['nama_dos']; 

					}elseif($tu = $this->db->select()->where('id_tu',$id_user)->get('tatausaha')->row_array()){
						$email = $tu['email'];
						$user_name = $tu['nama_tu']; 

					}
					if($email AND $password){
						mailkartu($email,$user_name,$id_user,$password,$camp,$campaign_name,$time);
					}
				}
				$this->session->set_flashdata('m_kosong','Proses Selesai!'.$email);
				redirect ('pemilih/detail/'.$camp.'/'.$thn);
			}else{
				for($i=0; $i<count($id); $i++){
					$info = array(
						'cetak'=>$cetak,
					);
					$this->m_pemilih->edit($info,$id[$i]);
				}
				$data['pem']=$this->m_pemilih->cetak($jur,$thn,$cetak)->result();
				$this->load->view('admin/pemilih/kartu_pemilih',$data);
			}
		}else{
			$this->session->set_flashdata('m_kosong','Data kosong! Tidak ada data yang dipilih!');
			redirect ('pemilih/detail/'.$camp.'/'.$thn);
		}
	}
}
?>