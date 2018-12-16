<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Calon extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Calon";
	private $lev1kata="calon";
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
		$this->load->model('m_calon');
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
		$data['menuaktif']='calon';
		$akses=$this->session->userdata('akses');
		if($akses=='super'){
			// $data['campaign']=$this->m_campaign->ambil_data(1)->result();
			$data['konten']='calon/index.php';
		}elseif($akses=='admin'){
			$jur=$this->session->userdata('jurusan');
			redirect('calon/tahun/'.$jur);
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
		$data['hawan']=('calon/tahun/'.$camp); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='calon';
		$data['tahun']=$this->m_pemilih->ambil_tahun($camp)->result();
		$data['konten']='calon/tahun.php';
		$this->load->view('admin/template',$data);
	}
	public function detail(){
		$camp=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$seg3=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$lev2=$seg3; // segmen 3
		$lev3=$thn;
		$lev4="Aktif";
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
		$data['hawan']=('calon/tahun/'.$camp); // segmen 3
		$data['htanah']=('calon/detail/'.$camp.'/'.$thn); // segmen 4
		$data['hair']=('calon/detail/'.$camp.'/'.$thn); // segmen 5
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='calon';
		$data['calon']=$this->m_calon->ambil_data(1,$camp,$thn)->result();
		$data['mahasiswa']=$this->m_mahasiswa->ambil_data(1);
		$data['dosen']=$this->m_dosen->ambil_data(1);
		$data['tatausaha']=$this->m_tatausaha->ambil_data(1);
		$data['konten']='calon/perjurusan.php';
		$this->load->view('admin/template',$data);
	}
	public function tambah(){	
		$this->form_validation->set_rules('no','no','required');
		$this->form_validation->set_rules('nim','nim','required');
		$nim=$this->input->post('nim');
		$thn=$this->input->post('thn');
		$camp=$this->input->post('camp');
		$no=$this->input->post('no');
		$cek=$this->m_calon->ambil_data_aktif($nim,$thn)->num_rows();
		$cekno=$this->m_calon->ambil_data_thn($no,$thn)->num_rows();
		if($cek>0){
			$this->session->set_flashdata('m_error','NIM <strong>'.$this->input->post('nim').'</strong> Sudah Menjadi Calon Pada Tahun ini');
			redirect ('calon/detail/'.$camp.'/'.$thn);
		}elseif($cekno>0){
			$this->session->set_flashdata('m_error','Nomor Urut ini sudah digunakan!');
			redirect ('calon/detail/'.$camp.'/'.$thn);
		}elseif($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menyimpan Data!');
				redirect ('calon/detail/'.$camp.'/'.$thn);
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
				redirect ('calon/detail/'.$camp.'/'.$thn);
			}
			else{
				$upload_data = $this->upload->data('file');
				$this->load->library('upload');
				$data = array(
					'id_calon'=>$thn.$nim.$no,
					'no_urut'=>$no,
					'nim'=>$nim,
					'id_campaign'=>$camp,
					'tahun'=>$thn,
					'visimisi'=>$this->input->post('visimisi'),
					'gambar'=>$fileName,
					'status'=>1
				);
				$this->m_calon->simpan($data);
				$this->session->set_flashdata('m_sukses','Data Berhasil Di Simpan');
				redirect ('calon/detail/'.$camp.'/'.$thn);
			}
		}
	}	
	public function edit(){	
		$this->form_validation->set_rules('no','no','required');
		$this->form_validation->set_rules('nim','nim','required');	
		$id_cal=$this->input->post('id_cal');
		$thn=$this->input->post('thn');
		$thnlama=$this->input->post('thnlama');
		$no=$this->input->post('no');
		$nim=$this->input->post('nim');
		$camp=$this->input->post('camp');
		$cek=$this->m_calon->ambil_data_aktif($nim,$thn)->num_rows();
		$cekno=$this->m_calon->ambil_data_thn($no,$thn)->num_rows();
		$fileName = $_FILES['file']['name'];
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Data!');
			redirect ('calon/detail/'.$camp.'/'.$thnlama);
		}elseif($cekno>0){
			$this->session->set_flashdata('m_error','Nomor Urut ini sudah ada pada Tahun ini!');
			redirect ('calon/detail/'.$camp.'/'.$thnlama);
		}elseif($fileName!=null){
			$config['upload_path'] = "./upload";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']	= '1000';
			$config['file_name'] =$fileName; 
			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload("file")){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Gambar!');
				redirect ('calon/detail/'.$camp.'/'.$thnlama);
			}else{
				$upload_data = $this->upload->data('file');
				$this->load->library('upload');
				$data = array(
					'id_calon'=>$thn.$nim.$no,
					'no_urut'=>$no,
					'nim'=>$nim,
					'tahun'=>$thn,
					'id_campaign'=>$camp,
					'visimisi'=>$this->input->post('visimisi'),
					'gambar'=>$fileName,
					'status'=>1
				);
			}
		}elseif($fileName==null){
			$data = array(
				'id_calon'=>$thn.$nim.$no,
				'no_urut'=>$no,
				'nim'=>$nim,
				'tahun'=>$thn,
				'visimisi'=>$this->input->post('visimisi'),
				'id_campaign'=>$camp,
				'status'=>1
			);
		}
		$this->m_calon->edit($data,$id_cal);
		$this->session->set_flashdata('m_sukses','Data Berhasil Di Edit');
		redirect ('calon/detail/'.$camp.'/'.$thnlama);
	}
	public function nonaktifkan(){
		$this->form_validation->set_rules('id_cal','id_cal','required');
		$id_cal=$this->input->post('id_cal');	
		$camp=$this->input->post('camp');
		$thn=$this->input->post('thn');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data!');
				redirect ('calon/detail/'.$camp.'/'.$thn);
		}else{
			$data = array(
				'status'=>0,
			);
			$this->m_calon->edit($data,$id_cal);
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Nonaktifkan');
			redirect ('calon/detail/'.$camp.'/'.$thn);
		}
	}
	public function aktifkan(){
		$this->form_validation->set_rules('id_cal','id_cal','required');
		$id_cal=$this->input->post('id_cal');	
		$camp=$this->input->post('camp');
		$thn=$this->input->post('thn');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Penonaktifan Data!');
				redirect ('calon/nonaktif/'.$camp.'/'.$thn);
		}else{
			$data = array(
				'status'=>1,
			);
			$this->m_calon->edit($data,$id_cal);
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Nonaktifkan');
			redirect ('calon/nonaktif/'.$camp.'/'.$thn);
		}
	}
	public function nonaktif(){
		$camp=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$seg3=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];
		$lev2=$seg3; // segmen 3
		$lev3=$thn;
		$lev4="Nonaktif";
		$lev5="";
		$data['angkasa']=$this->levpol;
		$data['langit']=$this->lev1;
		$data['katalangit']=$this->lev1kata;
		$data['awan']=$lev2;
		$data['tanah']=$lev3;
		$data['air']=$lev4;
		$data['bumi']=$lev5;
		$data['hangkasa']=$this->mza_secureurl->setSecureUrl_encode('dashboard','index');
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode($this->lev1kata,'detail'); 
		$data['hawan']=('calon/tahun/'.$camp); // segmen 3
		$data['htanah']=('calon/detail/'.$camp.'/'.$thn); // segmen 4
		$data['hair']=('calon/nonaktif/'.$camp.'/'.$thn); // segmen 5
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$akses=$this->session->userdata('akses');
		$data['menuaktif']='calon';
		if($akses=='super'){
			$jurs=$this->uri->segment(3);
			$data['konten']='calon/nonaktif.php';
		}elseif($akses=='admin'){
			$jurs=$this->session->userdata('jurusan');
			$data['konten']='calon/nonaktif.php';
		}
		$data['calon']=$this->m_calon->ambil_data_non(0,$jurs)->result();
		$this->load->view('admin/template',$data);
	}
}
?>