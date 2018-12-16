<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Akses extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Akses";
	private $lev1kata="Akses";
	private $tukaran=" :: ";
	function __construct(){
		parent::__construct();
		$this->load->model('m_akses');
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('akses','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('akses','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['akses']=$this->m_akses->ambil_data()->result();
		$data['menuaktif']='akses';
		$data['konten']='master/akses/index.php';
		$this->load->view('admin/template',$data);
	}
	
	public function tambah(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('bobot','bobot','required');
		$cek=$this->m_akses->ambil_data_aktif($this->input->post('id'))->num_rows();
		if($cek>0){
			$this->session->set_flashdata('m_error','Id <strong>'.$this->input->post('id').'</strong> Sudah Digunakan');
			redirect (enkripsi('akses','index'));
		}elseif($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menyimpan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('akses','index'));
		}else{
			$data = array(
				'Id_akses'=>$this->input->post('id'),
				'nm_akses'=>$this->input->post('nama'),
				'bobot'=>$this->input->post('bobot'),
				'stts'=>1
			);
			$this->m_akses->simpan($data);
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Simpan');
			redirect (enkripsi('akses','index'));
		}
	}
	
	public function edit()
	{	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('bobot','bobot','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('akses','index'));
		}else{
			$data = array(
				'nm_akses'=>$this->input->post('nama'),
				'bobot'=>$this->input->post('bobot'),
			);
			$this->m_akses->edit($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Edit');
			redirect (enkripsi('akses','index'));
		}
	}
	public function hapus()
	{	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('akses','index'));
		}else{
			$data = array(
				'stts'=>0,
			);
			$this->m_akses->edit($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('akses','index'));
		}
	}
	public function aktifkan()
	{
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Pengaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('pejabat_penetap','nonaktif'));
		}else{
			$data = array(
				'stts'=>1,
			);
			$this->m_akses->edit($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil DiAktifkan');
			redirect (enkripsi('akses','nonaktif'));
		}
	}
	public function nonaktif()
	{
		$lev2="Nonaktif"; // segmen 3
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('akses','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('akses','nonaktif'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['akses']=$this->m_akses->ambil_data_non(0)->result();
		$data['menuaktif']='master';
		$data['konten']='master/akses/nonaktif.php';
		$this->load->view('admin/template',$data);
	}
}
?>