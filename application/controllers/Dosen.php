<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dosen extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Dosen";
	private $lev1kata="Dosen";
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('dosen','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('dosen','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['dosen']=$this->m_dosen->ambil_data()->result();
		$data['menuaktif']='dosen';
		$data['konten']='dosen/index.php';
		$this->load->view('admin/template',$data);
	}
	public function tambah(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$cek=$this->m_dosen->ambil_data_aktif($this->input->post('id'))->num_rows();
		if($cek>0){
			$this->session->set_flashdata('m_error','Id <strong>'.$this->input->post('id').'</strong> Sudah Digunakan');
			redirect (enkripsi('dosen','index'));
		}elseif($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menyimpan Data <strong>'.$this->input->post('nama').'</strong>!');
				redirect (enkripsi('dosen','index'));
		}else{
			$fileName = $_FILES['file']['name'];
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']	= '1000';
			$config['file_name'] =$fileName; 
			$this->load->library('upload');
			$this->upload->initialize($config);
			$upload_data = $this->upload->data('file');
			if (!$this->upload->do_upload("file")){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menambah Gambar!');
				redirect (enkripsi('dosen','index'));
			}else{
				$data = array(
					'id_dos'=>$this->input->post('id'),
					'nama_dos'=>$this->input->post('nama'),
					'email'=>$this->input->post('email'),
					'foto'=>$fileName,
					'tmp_lahir'=>$this->input->post('tlahir'),
					'tgl_lahir'=>$this->input->post('tglahir'),
					'jk'=>$this->input->post('jk'),
					'agama'=>$this->input->post('agm'),
					'pendidikan_akhir'=>$this->input->post('diakhir'),
					'alamat'=>$this->input->post('almat'),
					'status_pegawai'=>$this->input->post('peg'),
					'status_anggota'=>1
				);
				$this->m_dosen->simpan($data);
				$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Simpan');
				redirect (enkripsi('dosen','index'));
			}
		}
	}
	public function edit(){	
		$this->form_validation->set_rules('id','id','required');
		$this->form_validation->set_rules('nama','nama','required');
		$fileName = $_FILES['file']['name'];
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Data <strong>'.$this->input->post('nama').'</strong>!');
			redirect (enkripsi('dosen','index'));
		}elseif($fileName!=null){
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']	= '1000';
			$config['file_name'] =$fileName; 
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload("file")){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Gambar!');
				redirect (enkripsi('dosen','index'));
			}else{
				$upload_data = $this->upload->data('file');
				$this->load->library('upload');
				$data = array(
					'nama_dos'=>$this->input->post('nama'),
					'email'=>$this->input->post('email'),
					'foto'=>$fileName,
					'tmp_lahir'=>$this->input->post('tlahir'),
					'tgl_lahir'=>$this->input->post('tglahir'),
					'jk'=>$this->input->post('jk'),
					'agama'=>$this->input->post('agm'),
					'pendidikan_akhir'=>$this->input->post('diakhir'),
					'alamat'=>$this->input->post('almat'),
					'status_pegawai'=>$this->input->post('peg')
				);
			}
		}else{
			$data = array(
				'nama_dos'=>$this->input->post('nama'),
				'email'=>$this->input->post('email'),
				'tmp_lahir'=>$this->input->post('tlahir'),
				'tgl_lahir'=>$this->input->post('tglahir'),
				'jk'=>$this->input->post('jk'),
				'agama'=>$this->input->post('agm'),
				'pendidikan_akhir'=>$this->input->post('diakhir'),
				'alamat'=>$this->input->post('almat'),
				'status_pegawai'=>$this->input->post('peg')
			);
		}
		$this->m_dosen->edit($data,$this->input->post('id'));
		$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Edit');
		$prof=$this->uri->segment(3);
		if($prof==null){
			redirect (enkripsi('dosen','index'));
		}else{
			redirect ('dashboard/profil/'.$prof);
		}
	}
	public function nonaktifkan(){	
		$this->form_validation->set_rules('id[]','id[]','required');
		$id=$this->input->post('id');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Data Kosong atau Ada Kesalahan Dalam meng Nonaktifan Data <strong>Dosen</strong>!');
				redirect (enkripsi('dosen','index'));
		}else{
			for($i=0; $i<count($id); $i++){
				$data = array(
					'status_anggota'=>0,
				);
				$this->m_dosen->edit($data,$id[$i]);
			}
			$this->session->set_flashdata('m_sukses','Data <strong>'.count($id).' Dosen</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('dosen','index'));
		}
	}
	public function aktifkan(){	
		$this->form_validation->set_rules('id[]','id[]','required');
		$id=$this->input->post('id');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Data Kosong atau Ada Kesalahan Dalam meng Aktifan Data <strong>Dosen</strong>!');
				redirect (enkripsi('dosen','nonaktif'));
		}else{
			for($i=0; $i<count($id); $i++){
				$data = array(
					'status_anggota'=>1,
				);
				$this->m_dosen->edit($data,$id[$i]);
			}
			$this->session->set_flashdata('m_sukses','Data <strong>'.count($id).' Dosen</strong> Berhasil Di Aktifkan');
			redirect (enkripsi('dosen','nonaktif'));
		}
	}
	public function nonaktif(){
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('dosen','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('dosen','nonaktif'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['dosen']=$this->m_dosen->ambil_data_non(0)->result();
		$data['menuaktif']='master';
		$data['konten']='dosen/nonaktif.php';
		$this->load->view('admin/template',$data);
	}
	function importdata(){
		$fileNames = $_FILES['import']['name'];
		$config['upload_path'] = './assets/file/';
		$config['file_name'] = $fileNames;
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']        = 10000;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('import')) {
			$this->session->set_flashdata('m_error','Data Gagal Di Impor!');
			redirect('dosen');
		} else {
		  $upload_data = $this->upload->data('import');
		  $this->load->library('Excel_reader');
		  $this->excel_reader->setOutputEncoding('230787');
		  $files = './assets/file/'.$fileNames;
		  $this->excel_reader->read($files);
		  error_reporting(E_ALL ^ E_NOTICE);
		  $data = $this->excel_reader->sheets[0];
		  $dataexcel = array();
		  for ($i = 2; $i <= $data['numRows']; $i++) {
			   if ($data['cells'][$i][2] == '') break;
				$dataexcel[$i - 2]['id_dos'] = $data['cells'][$i][1];
			   $dataexcel[$i - 2]['nama_dos'] = $data['cells'][$i][2];
			   $dataexcel[$i - 2]['email'] = $data['cells'][$i][3];
			   $dataexcel[$i - 2]['tmp_lahir'] = $data['cells'][$i][4];
			   $dataexcel[$i - 2]['tgl_lahir'] = $data['cells'][$i][5];
			   $dataexcel[$i - 2]['jk'] = $data['cells'][$i][6];
			   $dataexcel[$i - 2]['agama'] = $data['cells'][$i][7];
			   $dataexcel[$i - 2]['pendidikan_akhir'] = $data['cells'][$i][8];
			   $dataexcel[$i - 2]['alamat'] = $data['cells'][$i][9];
			   $dataexcel[$i - 2]['status_pegawai'] = $data['cells'][$i][10];
		  }
		  $files = $upload_data['file_name'];
		  $path = './assets/file/'.$files;
		  delete_files($path);
		  $this->m_dosen->loaddata($dataexcel);
		}
		$this->session->set_flashdata('m_sukses','Data Berhasil Di Impor!');
		redirect(enkripsi('dosen','index'));
	}
	function ekspor(){
		$this->load->view('admin/dosen/excel');
	}
	function cetak(){
		$data['title']="Cetak || Aktif || Dosen";
		$this->load->view('admin/dosen/cetak',$data);
	}
}
?>