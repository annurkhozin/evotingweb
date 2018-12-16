<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hasil extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Hasil";
	private $lev1kata="hasil";
	private $tukaran=" :: ";
	function __construct(){
		parent::__construct();
		$this->load->model('m_calon');
		$this->load->model('m_login');
		$this->load->model('m_utama');
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
		$data['menuaktif']='hasil';
		$akses=$this->session->userdata('akses');
		if($akses=='super'){
			// $data['campaign']=$this->m_campaign->ambil_data(1)->result();
			$data['konten']='hasil/index.php';
		}elseif($akses=='admin'){
			$jur=$this->session->userdata('jurusan');
			redirect('hasil/tahun/'.$jur);
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
		$data['hawan']=('hasil/tahun/'.$camp); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='hasil';
		$data['tahun']=$this->m_pemilih->ambil_tahun($camp)->result();
		$data['konten']='hasil/tahun.php';
		$this->load->view('admin/template',$data);
	}
	public function detail(){
		$camp=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$seg3=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$lev2=$seg3; // segmen 3
		$lev3=$thn;
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
		$data['hawan']=('hasil/tahun/'.$camp); // segmen 3
		$data['htanah']=('hasil/detail/'.$camp.'/'.$thn); // segmen 4
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='hasil';
		$data['calon']=$this->m_calon->ambil_data(1,$camp,$thn)->result();
		$data['konten']='hasil/pertahun.php';
		$this->load->view('admin/template',$data);
	}
	function cetak(){
		$data['title']="Cetak || Hasil Pemiihan";
		$this->load->view('admin/hasil/cetak',$data);
	}
}
?>