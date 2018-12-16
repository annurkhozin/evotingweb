<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Dashboard";
	private $lev1kata="Dashboard";
	private $tukaran=" :: ";
	
	function __construct(){
		parent::__construct();
		backButtonHandle();
		$this->load->model('m_akses');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tatausaha');
		$this->load->model('m_jurusan');
		$this->load->model('m_campaign');
		$this->load->model('m_admin');
		$this->load->model('m_pemilih');
		$this->load->model('m_poling');
		$this->load->model('m_calon');
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
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('$lev2','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='dashboard';
		$akses=$this->session->userdata('akses');
		if($akses=='admin'){
			$data['konten']='dashboard/index.php';
		}elseif($akses=='super'){
			$data['konten']='dashboard/super.php';
		}		
		$this->load->view('admin/template',$data);
	}
	public function profil(){
		$id=$this->session->userdata('user');
		$lev2="Profil"; // segmen 3
		$lev3="";
		$lev4="";
		$lev5="";
		$data['angkasa']=$this->levpol;
		$data['langit']=$this->lev1;
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index'); 
		$data['hawan']=('dashboard/profil/'.$id); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		if (($this->levpol!=null) AND ($this->lev1==null) AND ($lev2==null) AND ($lev3==null) AND ($lev4==null) AND ($lev5==null)){
			$data['title']=$this->levpol;
		} elseif (($this->levpol!=null) AND($this->lev1!=null) AND ($lev2==null) AND ($lev3==null) AND ($lev4==null) AND ($lev5==null)){
			$data['title']=$this->lev1.$this->tukaran.$this->levpol;
		} else if (($this->levpol!=null) AND($this->lev1!=null) AND ($lev2!=null) AND ($lev3==null) AND ($lev4==null) AND ($lev5==null)){
			$data['title']=$lev2.$this->tukaran.$this->lev1.$this->tukaran.$this->levpol;
		} else if (($this->levpol!=null) AND($this->lev1!=null) AND ($lev2!=null) AND ($lev3!=null) AND ($lev4==null) AND ($lev5==null)){
			$data['title']=$lev3.$this->tukaran.$lev2.$this->tukaran.$this->lev1.$this->tukaran.$this->levpol;
		} else if (($this->levpol!=null) AND($this->lev1!=null) AND ($lev2!=null) AND ($lev3!=null) AND ($lev4!==null) AND ($lev5==null)){
			$data['title']=$lev4.$this->tukaran.$lev3.$this->tukaran.$lev2.$this->tukaran.$this->lev1.$this->tukaran.$this->levpol;
		} else if (($this->levpol!=null) AND($this->lev1!=null) AND ($lev2!=null) AND ($lev3!=null) AND ($lev4!==null) AND ($lev5!=null)){
			$data['title']=$lev5.$this->tukaran.$lev4.$this->tukaran.$lev3.$this->tukaran.$lev2.$this->tukaran.$this->lev1.$this->tukaran.$this->levpol;
		}
		$data['corong']=" > ";
		$data['menu']='menuadmin.php';
		$data['menuaktif']='dashboard';
		$user=$this->uri->segment(3);
		$mahas=$this->m_mahasiswa->cek_id($user);
		$dos=$this->m_dosen->cek_id($user);
		$tu=$this->m_tatausaha->cek_id($user);
		if($mahas->num_rows()>0){		
			$data['mahas']=$mahas->row_array();
			$data['passtu']=$this->m_admin->passmahas($user)->row_array();	
			$data['konten']='dashboard/mahas.php';			
		}elseif($dos->num_rows()>0){			
			$data['dos']=$dos->row_array();			
			$data['passtu']=$this->m_admin->passdos($user)->row_array();	
			$data['konten']='dashboard/dosen.php';			
		}elseif($tu->num_rows()>0){
			$data['tu']=$tu->row_array();			
			$data['passtu']=$this->m_admin->passtu($user)->row_array();	
			$data['konten']='dashboard/tatausaha.php';			
		}
		$this->load->view('admin/template',$data);
	}	
	public function editpass(){
		$id=$this->uri->segment(3);
		$akses=$this->input->post('akses');
		$user=$this->input->post('username');
		$pass=md5($this->input->post('password'));
		$pass1=$this->input->post('password1');
		$pass2=$this->input->post('password2');
		$cek=$this->m_admin->cek_id($id);
		if($cek->num_rows()>0){
			$passrow=$cek->row_array()['password'];
			if($passrow==$pass){
				if($pass1==$pass2){
					$data=array(
						'username'=>$user,
						'password'=>md5($pass1)
					);
					$this->m_admin->edit($data,$id.$akses);
					$this->session->set_flashdata('m_sukses','SELAMAT - Username Dan Password Anda Berhasil Di Perbaharui!');
					redirect('dashboard/profil/'.$id);
				}else{
					$this->session->set_flashdata('m_error','MAAF - Konfirmasi Password Tidak Sama! Silahkan Ulangi Lagi!');
					redirect('dashboard/profil/'.$id);
				}
			}else{
			$this->session->set_flashdata('m_error','MAAF - Password Lama Anda SALAH! Silahkan Ulangi Lagi!');
			redirect('dashboard/profil/'.$id);
			}
		}else
		redirect(enkripsi('Dashboard','index'));
	}
	function logout(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('akses');
		$this->session->unset_userdata('jurusan');
		redirect(enkripsi('Login','index'));
	}

	function connection(){
		$this->load->view('admin/dashboard/grafik');
	}
}
