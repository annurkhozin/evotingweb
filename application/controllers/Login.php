<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Calon";
	private $lev1kata="calon";
	private $tukaran=" :: ";
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_admin');
		$this->load->model('m_campaign');
		$this->load->model('m_calon');
		$this->load->model('m_pemilih');
		$this->load->model('m_poling');
		$this->load->helper(array('form', 'url','file'));
        $this->load->library('upload','tools');
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
		redirect(enkripsi('login','index_login'));
	}	
	public function index_login(){
		if(($this->session->userdata('akses')=='super') OR ($this->session->userdata('akses')=='admin')){
			redirect(base_url().enkripsi('Dashboard','index')); die;
		}
		$this->load->view('login/login');
	}
	public function auto(){
		$this->load->view('login/autologin');
	}
	function imgcaptcha(){
		echo imgcaptcha();
	}
	public function loginAuto(){
		if($this->session->userdata('authcaptcha')!=$this->input->post('key')){
			echo 'key'; die;
		}else{
			$this->proses();
		}
	}
	public function proses(){
		$this->form_validation->set_rules('id','id','required');
		if($this->form_validation->run()==TRUE){
			$id=$this->input->post('id');
			$pass=$this->input->post('pin');
			$thn=date('Y');
			$jam=date('Y-m-d H:i:s');
			$cekmahas=$this->m_login->cekmahas($id,$pass,$thn);
			$cekdos=$this->m_login->cekdos($id,$pass,$thn);
			$cektu=$this->m_login->cektu($id,$pass,$thn);
			if($cekmahas->num_rows()>0){
				$row=$cekmahas->row_array();
				$akses=$row['id_akses'];
				$camp=$row['id_campaign'];
				$mul=$row['mulai'];
				$sel=$row['selesai'];
				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('akses',$akses);
				if(($mul<$jam) and ($jam<$sel)){
					if($row['status']==0){
						echo 'status'; die;
					}else{
						echo base_url().'Utama/index/'.$camp.'/'.$thn.'?n='.en($row['nama_mahas']);
					}
				}else{
					echo 'time'; die;
				}
			
			}elseif($cekdos->num_rows()>0){
				$row=$cekdos->row_array();
				$akses=$row['id_akses'];
				$camp=$row['id_campaign'];
				$mul=$row['mulai'];
				$sel=$row['selesai'];
				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('akses',$akses);
				if(($mul<$jam) and ($jam<$sel)){
					if($row['status']==0){
						echo 'status'; die;
					}else{
						echo base_url().'Utama/index/'.$camp.'/'.$thn.'?n='.en($row['nama_dos']); die;
					}
				}else{
					echo 'time'; die;
				}
			}elseif($cektu->num_rows()>0){
				$row=$cektu->row_array();
				$akses=$row['id_akses'];
				$camp=$row['id_campaign'];
				$mul=$row['mulai'];
				$sel=$row['selesai'];
				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('akses',$akses);
				if(($mul<$jam) and ($jam<$sel)){
					if($row['status']==0){
						echo 'status'; die;
					}else{
						echo base_url().'Utama/index/'.$camp.'/'.$thn.'?n='.en($row['nama_tu']); die;
					}
				}else{
					echo 'time'; die;
				}
			}else{
				echo 'failed'; die;
			}
		}else{
			echo 'validasi'; die;
		}
		
	}
	public function ssession($row){
		$akses=$row['id_akses'];
		$id_user=$row['id_user'];
		$this->session->set_userdata('user',$id_user);
		$this->session->set_userdata('akses',$akses);	
	}
	public function prosesadmin(){
		$user=$this->input->post('username');
		$pass=$this->input->post('password');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		$cek1=$this->m_login->ceksup1($user,md5($pass));
		$cek2=$this->m_login->ceksup2($user,md5($pass));
		$cek3=$this->m_login->ceksup3($user,md5($pass));
		if($cek1->num_rows()>0){
			$row=$cek1->row_array();
			$this->ssession($row);
			$cekad=$this->m_admin->cekadtudos($row['id_user'])->row_array();
			$jur=$cekad['id_campaign'];
			$this->session->set_userdata('jurusan',$jur);
			echo base_url().enkripsi('Dashboard','index'); die;
		}elseif($cek2->num_rows()>0){
			$row=$cek2->row_array();
			$this->ssession($row);
			$cekad=$this->m_admin->cekadtudos($row['id_user'])->row_array();
			$jur=$cekad['id_campaign'];
			$this->session->set_userdata('jurusan',$jur);
			echo base_url().enkripsi('Dashboard','index'); die;
		}elseif($cek3->num_rows()>0){
			$row=$cek3->row_array();
			$this->ssession($row);
			$cekad=$this->m_admin->cekadmahas($row['id_user'])->row_array();
			$jur=$cekad['id_campaign'];
			$this->session->set_userdata('jurusan',$jur);
			echo base_url().enkripsi('Dashboard','index'); die;
		}else{
			echo 'failed'; die;
		}
	}

	function grafik(){
		$this->load->view('utama/grafik');
	}

	function modal(){
		$page = $this->input->get('page');
		$this->load->view('login/'.$page);
	}
 

}
?>