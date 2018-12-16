<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Admin";
	private $lev1kata="Admin";
	private $tukaran=" :: ";
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form','url','file'));
		$this->load->library('Excel_reader');
		$this->load->model('m_admin');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tatausaha');
		$this->load->model('m_jurusan');
		$this->load->model('m_campaign');
		$this->load->model('m_akses');
		if(!$this->session->userdata('user')){
			redirect(enkripsi('Login','index'));
		}
		$level = $this->session->userdata('akses');
		if($level =='admin'){
			redirect(enkripsi('dashboard','index'));
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
		$lev2="Aktif"; // segmen 3
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('admin','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('admin','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['admin']=$this->m_admin->ambil_data(1)->result();
		$data['menuaktif']='admin';
		$data['konten']='admin/index.php';
		$this->load->view('admin/template',$data);
	}
	public function tambah(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password1','password1','required');
		$this->form_validation->set_rules('password2','password2','required');
		$id=$this->input->post('id');
		$ak=$this->input->post('akses');
		$camp=$this->input->post('camp');
		$pass1=$this->input->post('password1');
		$pass2=$this->input->post('password2');
		$cek=$this->m_admin->ambil_data_aktif($this->input->post('id'))->num_rows();
		if($cek>0){
			$this->session->set_flashdata('m_error','Id <strong>'.$id.'</strong> Sudah Digunakan');
			redirect (enkripsi('admin','index'));
		}elseif($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menyimpan Data <strong>'.$id.'</strong>!');
				redirect (enkripsi('admin','index'));
		}else{
			if($pass1!=$pass2){
				$this->session->set_flashdata('m_error','Confirmasi Password <strong>'.$id.' Tidak Cocok</strong>!');
				redirect (enkripsi('admin','index'));
			}else{
				$data = array(
					'id_admin'=>$id.$ak.$camp,
					'id_user'=>$id,
					'id_campaign'=>$camp,
					'id_akses'=>$ak,
					'status'=>1,
					'username'=>$this->input->post('username'),
					'password'=>md5($pass1)
				);
				$this->m_admin->simpan($data);
				$this->session->set_flashdata('m_sukses','Data <strong>ADMIN</strong> Berhasil Di Simpan');
				redirect (enkripsi('admin','index'));
			}
		}
	}
	public function edit(){
		$id=$this->input->post('id');
		$nm=$this->input->post('nama');
		$ak=$this->input->post('akses');
		$camp=$this->input->post('camp');
		$pass1=$this->input->post('password1');
		$pass2=$this->input->post('password2');
		if($pass1!=$pass2){
			$this->session->set_flashdata('m_error','Konfirmasi Password <strong>'.$nm.'</strong> Tidak Cocok!');
			redirect (enkripsi('admin','index'));
		}else{
			if($pass1!=null){
				$data = array(
					'id_admin'=>$id.$ak.$camp,
					'id_user'=>$id,
					'id_campaign'=>$camp,
					'id_akses'=>$ak,
					'username'=>$this->input->post('username'),
					'password'=>md5($pass1)
				);
			}else{
				$data = array(
					'id_admin'=>$id.$ak.$camp,
					'id_user'=>$id,
					'id_campaign'=>$camp,
					'id_akses'=>$ak,
					'username'=>$this->input->post('username')
				);
			}
			$this->m_admin->edit($data,$id);
			$this->session->set_flashdata('m_sukses','Data Admin <strong>'.$nm.'</strong> Berhasil Di Simpan');
			redirect (enkripsi('admin','index'));
		}
	}
	public function nonaktifkan(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('admin','index'));
		}else{
			$data = array(
				'status'=>0,
			);
			$this->m_admin->hapus($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('admin','index'));
		}
	}
	public function aktifkan(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Pengaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('admin','nonaktif'));
		}else{
			$data = array(
				'status'=>1,
			);
			$this->m_admin->hapus($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Aktifkan');
			redirect (enkripsi('admin','nonaktif'));
		}
	}
	public function loadcoy(){
		$id=$this->input->post('coba');
		$mahas=$this->m_mahasiswa->cek_id($id);
		$dos=$this->m_dosen->cek_id($id);
		$tu=$this->m_tatausaha->cek_id($id);
		if($mahas->num_rows()>0){
			$data['jurr']=$this->m_admin->cekss($id)->row_array();
			$this->load->view('admin/admin/loadmahas.php',$data);
		}elseif(($tu->num_rows()>0) or ($dos->num_rows()>0)) {
			$this->load->view('admin/admin/loadtu.php');
		}
	}
	public function loadcoy2(){
		$idj=$this->input->post('coba2');
		if($idj=='admin'){
			$this->load->view('admin/admin/loadjur.php');
		}elseif($idj=='super'){
			echo'<input type="hidden" name="camp" value="'.$idj.'">';
		}
	}
	public function loadcoy3(){
		$idk=$this->input->post('coba');
		$idj=$this->input->post('idj');
		if($idk=='admin'){
			if($idj==null){
			$data['nj']='Pilih Campaign';
			$data['idj']='';
			}else{
			$data['idj']=$idj;
			$data['nj']=$this->input->post('nj');
			}
			$this->load->view('admin/admin/editjur.php',$data);
		}elseif($idk=='super'){
			echo'<input type="hidden" name="camp" value="'.$idk.'">';
		}
	}
	public function nonaktif(){
		$lev2="Nonaktif"; // segmen 3
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('dosen','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('dosen','nonaktif'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['admin']=$this->m_admin->ambil_data(0)->result();
		$data['menuaktif']='master';
		$data['konten']='admin/nonaktif.php';
		$this->load->view('admin/template',$data);
	}
}
?>