<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jurusan extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Jurusan";
	private $lev1kata="Jurusan";
	private $tukaran=" :: ";
	function __construct(){
		parent::__construct();
        $this->load->helper(array('form','url','file'));
		$this->load->library('Excel_reader');
		$this->load->model('m_dosen');
		$this->load->model('m_tatausaha');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_jurusan');
		$this->load->model('m_campaign');
		$this->load->model('m_akses');
		$this->load->helper(array('form', 'url','file'));
        $this->load->library('upload','tools');
		if((!$this->session->userdata('user'))and (!$this->session->userdata('akses'))){
            redirect(enkripsi('login','index'));
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('Jurusan','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('Jurusan','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['jurus']=$this->m_jurusan->ambil_data(1)->result();
		$data['menuaktif']='jurusan';
		$data['konten']='jurusan/index.php';
		$this->load->view('admin/template',$data);
	}
	public function tambah(){
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$cek=$this->m_jurusan->cek_id($this->input->post('id'))->num_rows();
		if($cek>0){
			$this->session->set_flashdata('m_error','ID <strong>'.$this->input->post('id').'</strong> Sudah Digunakan');
			redirect (enkripsi('jurusan','index'));
		}elseif($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menyimpan Data <strong>'.$this->input->post('nama').'</strong>!');
			redirect (enkripsi('jurusan','index'));
		}else{
			$fileName = $_FILES['file']['name'];
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']	= '1000';
			$config['file_name'] =$fileName; 
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload("file")){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menambah Gambar!');
				redirect (enkripsi('jurusan','index'));
			}else{
				$upload_data = $this->upload->data('file');
				$this->load->library('upload');
				$data = array(
					'id_jur'=>$this->input->post('id'),
					'nama_jur'=>$this->input->post('nama'),
					'logo_jur'=>$fileName,
					'status_jur'=>1
				);
				$this->m_jurusan->simpan($data);
				$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Simpan');
				redirect (enkripsi('jurusan','index'));
			}
		}
	}
	public function edit(){
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$fileName = $_FILES['file']['name'];
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Data!');
			redirect (enkripsi('jurusan','index'));
		}elseif($fileName!=null){
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']	= '1000';
			$config['file_name'] =$fileName; 
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload("file")){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Logo Jurusan!');
				redirect (enkripsi('jurusan','index'));
			}else{
				$upload_data = $this->upload->data('file');
				$this->load->library('upload');
				$data = array(
					'nama_jur'=>$this->input->post('nama'),
					'logo_jur'=>$fileName
				);
			}
		}elseif($fileName==null){
			$data = array(
				'nama_jur'=>$this->input->post('nama'),
			);
		}
		$this->m_jurusan->edit($data,$this->input->post('id'));
		$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Edit');
		redirect (enkripsi('jurusan','index'));
	}
	public function nonaktifkan(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('jurusan','index'));
		}else{
			$data = array(
				'status_jur'=>0,
			);
			$this->m_jurusan->edit($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('jurusan','index'));
		}
	}
	public function aktifkan(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('jurusan','nonaktif'));
		}else{
			$data = array(
				'status_jur'=>1,
			);
			$this->m_jurusan->edit($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('jurusan','nonaktif'));
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('Jurusan','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('Jurusan','nonaktif'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['jurus']=$this->m_jurusan->ambil_data(0)->result();
		$data['menuaktif']='jurusan';
		$data['konten']='jurusan/nonaktif.php';
		$this->load->view('admin/template',$data);
	}
}
?>