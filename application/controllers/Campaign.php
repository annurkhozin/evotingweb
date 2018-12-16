<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Campaign extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Campaign";
	private $lev1kata="Campaign";
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('Campaign','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('Campaign','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		// $data['campaign']=$this->db->where('status_campaign',1)->get('campaign')->result();
		$data['menuaktif']='campaign';
		$data['konten']='campaign/index.php';
		$this->load->view('admin/template',$data);
	}
	public function tambah(){
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$cek=$this->m_campaign->cek_id($this->input->post('id'))->num_rows();
		if($cek>0){
			$this->session->set_flashdata('m_error','ID <strong>'.$this->input->post('id').'</strong> Sudah Digunakan');
			redirect (enkripsi('campaign','index'));
		}elseif($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menyimpan Data <strong>'.$this->input->post('nama').'</strong>!');
			redirect (enkripsi('campaign','index'));
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
				redirect (enkripsi('campaign','index'));
			}else{
				$upload_data = $this->upload->data('file');
				$this->load->library('upload');
				$data = array(
					'id_campaign'=>$this->input->post('id'),
					'nama_campaign'=>$this->input->post('nama'),
					'keterangan_campaign'=>$this->input->post('keterangan'),
					'logo_campaign'=>$fileName,
					'status_campaign'=>1
				);
				$this->m_campaign->simpan($data);
				$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Simpan');
				redirect (enkripsi('campaign','index'));
			}
		}
	}
	public function edit(){
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$fileName = $_FILES['file']['name'];
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Data!');
			redirect (enkripsi('campaign','index'));
		}elseif($fileName!=null){
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']	= '1000';
			$config['file_name'] =$fileName; 
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload("file")){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Logo Campaign!');
				redirect (enkripsi('campaign','index'));
			}else{
				$upload_data = $this->upload->data('file');
				$this->load->library('upload');
				$data = array(
					'nama_campaign'=>$this->input->post('nama'),
					'keterangan_campaign'=>$this->input->post('keterangan'),
					'logo_campaign'=>$fileName
				);
			}
		}elseif($fileName==null){
			$data = array(
				'nama_campaign'=>$this->input->post('nama'),
				'keterangan_campaign'=>$this->input->post('keterangan'),
			);
		}
		$this->m_campaign->edit($data,$this->input->post('id'));
		$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Edit');
		redirect (enkripsi('campaign','index'));
	}
	public function nonaktifkan(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('campaign','index'));
		}else{
			$data = array(
				'status_campaign'=>0,
			);
			$this->m_campaign->edit($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('campaign','index'));
		}
	}
	public function aktifkan(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('campaign','nonaktif'));
		}else{
			$data = array(
				'status_campaign'=>1,
			);
			$this->m_campaign->edit($data,$this->input->post('id'));
			$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('campaign','nonaktif'));
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('Campaign','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('Campaign','nonaktif'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='campaign';
		$data['konten']='campaign/nonaktif.php';
		$this->load->view('admin/template',$data);
	}
}
?>