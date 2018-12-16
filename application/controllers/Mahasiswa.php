<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mahasiswa extends CI_Controller {
	private $levpol="Beranda";
	private $lev1="Mahasiswa";
	private $lev1kata="Mahasiswa";
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('mahasiswa','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('mahasiswa','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$akses=$this->session->userdata('akses');
		if($akses=='super'){
			$data['mahasiswa']=$this->m_mahasiswa->ambil_data(1)->result();
		}elseif($akses=='admin'){
			$data['mahasiswa']=$this->m_mahasiswa->ambil_data(1)->result();
		}
		$data['menuaktif']='mahasiswa';
		$data['konten']='mahasiswa/index.php';
		$this->load->view('admin/template',$data);
	}
	public function tambah(){	
		$this->form_validation->set_rules('nim','nim','required');
		$this->form_validation->set_rules('nama','nama','required');
		$nim=$this->input->post('nim');
		$cek=$this->m_mahasiswa->ambil_data_aktif($nim)->num_rows();
		if($cek>0){
			$this->session->set_flashdata('m_error','Id <strong>'.$nim.'</strong> Sudah Digunakan');
			redirect (enkripsi('mahasiswa','index'));
		}elseif($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Menyimpan Data <strong>'.$this->input->post('nama').'</strong>!');
			redirect (enkripsi('mahasiswa','index'));
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
				redirect (enkripsi('mahasiswa','index'));
			}else{
				$data = array(
					'nim'=>$nim,
					'nama_mahas'=>$this->input->post('nama'),
					'email'=>$this->input->post('email'),
					'foto'=>$fileName,
					'thn_masuk'=>$this->input->post('thnm'),
					'jalan'=>$this->input->post('jln'),
					'rt'=>$this->input->post('rt'),
					'rw'=>$this->input->post('rw'),
					'desa'=>$this->input->post('ds'),
					'kec'=>$this->input->post('kec'),
					'kota'=>$this->input->post('kot'),
					'kode_pos'=>$this->input->post('pos'),
					'provinsi'=>$this->input->post('prov'),
					'kota_lahir'=>$this->input->post('kotlah'),
					'tgl_lahir'=>$this->input->post('tglhir'),
					'phone'=>$this->input->post('hp'),
					'gol_darah'=>$this->input->post('godar'),
					'jk'=>$this->input->post('jk'),
					'agama'=>$this->input->post('agm'),
					'nama_bpk'=>$this->input->post('bpk'),
					'nama_ibu'=>$this->input->post('ibu'),
					'didik_bpk'=>$this->input->post('dikba'),
					'didik_ibu'=>$this->input->post('dikbu'),
					'kerja_bpk'=>$this->input->post('kerjaba'),
					'kerja_ibu'=>$this->input->post('kerjabu'),
					'hasil_bpk'=>$this->input->post('hasilba'),
					'hasil_ibu'=>$this->input->post('hasilbu'),
					'anak_ke'=>$this->input->post('ankke'),
					'jml_saudara'=>$this->input->post('saudara'),
					'jurusan_asal'=>$this->input->post('jursal'),
					'asal_sekolah'=>$this->input->post('asalsek'),
					'kota_sekolah'=>$this->input->post('kotsek'),
					'status'=>1
				);
				$info=array(
					'nim'=>$nim,
					'id_jur'=>$this->input->post('jur')
				);
				$this->m_mahasiswa->simpan($data);
				$this->m_mahasiswa->simpanjur($info,$nim);
				$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Simpan');
				redirect (enkripsi('mahasiswa','index'));
			}
		}
	}
	public function edit(){
		$this->form_validation->set_rules('nim','nim','required');
		$this->form_validation->set_rules('nama','nama','required');
		$fileName = $_FILES['file']['name'];
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('m_error','Ada Kesalahan Dalam Mengedit Data <strong>'.$this->input->post('nama').'</strong>!');
			redirect (enkripsi('mahasiswa','index'));
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
					'nama_mahas'=>$this->input->post('nama'),
					'email'=>$this->input->post('email'),
					'foto'=>$fileName,
					'thn_masuk'=>$this->input->post('thnm'),
					'jalan'=>$this->input->post('jln'),
					'rt'=>$this->input->post('rt'),
					'rw'=>$this->input->post('rw'),
					'desa'=>$this->input->post('ds'),
					'kec'=>$this->input->post('kec'),
					'kota'=>$this->input->post('kot'),
					'kode_pos'=>$this->input->post('pos'),
					'provinsi'=>$this->input->post('prov'),
					'kota_lahir'=>$this->input->post('kotlah'),
					'tgl_lahir'=>$this->input->post('tglhir'),
					'phone'=>$this->input->post('hp'),
					'gol_darah'=>$this->input->post('godar'),
					'jk'=>$this->input->post('jk'),
					'agama'=>$this->input->post('agm'),
					'nama_bpk'=>$this->input->post('bpk'),
					'nama_ibu'=>$this->input->post('ibu'),
					'didik_bpk'=>$this->input->post('dikba'),
					'didik_ibu'=>$this->input->post('dikbu'),
					'kerja_bpk'=>$this->input->post('kerjaba'),
					'kerja_ibu'=>$this->input->post('kerjabu'),
					'hasil_bpk'=>$this->input->post('hasilba'),
					'hasil_ibu'=>$this->input->post('hasilbu'),
					'anak_ke'=>$this->input->post('ankke'),
					'jml_saudara'=>$this->input->post('saudara'),
					'jurusan_asal'=>$this->input->post('jursal'),
					'asal_sekolah'=>$this->input->post('asalsek'),
					'kota_sekolah'=>$this->input->post('kotsek')					
				);
			}
		}else{
			$data = array(
				'nama_mahas'=>$this->input->post('nama'),
				'email'=>$this->input->post('email'),
				'thn_masuk'=>$this->input->post('thnm'),
				'jalan'=>$this->input->post('jln'),
				'rt'=>$this->input->post('rt'),
				'rw'=>$this->input->post('rw'),
				'desa'=>$this->input->post('ds'),
				'kec'=>$this->input->post('kec'),
				'kota'=>$this->input->post('kot'),
				'kode_pos'=>$this->input->post('pos'),
				'provinsi'=>$this->input->post('prov'),
				'kota_lahir'=>$this->input->post('kotlah'),
				'tgl_lahir'=>$this->input->post('tglhir'),
				'phone'=>$this->input->post('hp'),
				'gol_darah'=>$this->input->post('godar'),
				'jk'=>$this->input->post('jk'),
				'agama'=>$this->input->post('agm'),
				'nama_bpk'=>$this->input->post('bpk'),
				'nama_ibu'=>$this->input->post('ibu'),
				'didik_bpk'=>$this->input->post('dikba'),
				'didik_ibu'=>$this->input->post('dikbu'),
				'kerja_bpk'=>$this->input->post('kerjaba'),
				'kerja_ibu'=>$this->input->post('kerjabu'),
				'hasil_bpk'=>$this->input->post('hasilba'),
				'hasil_ibu'=>$this->input->post('hasilbu'),
				'anak_ke'=>$this->input->post('ankke'),
				'jml_saudara'=>$this->input->post('saudara'),
				'jurusan_asal'=>$this->input->post('jursal'),
				'asal_sekolah'=>$this->input->post('asalsek'),
				'kota_sekolah'=>$this->input->post('kotsek')
			);
		}
		$info = array(
			'id_jur'=>$this->input->post('jur'),
		);
		$this->m_mahasiswa->edit($data,$this->input->post('nim'));
		$this->m_mahasiswa->editjur($info,$this->input->post('nim'));
		$this->session->set_flashdata('m_sukses','Data <strong>'.$this->input->post('nama').'</strong> Berhasil Di Edit');
		$prof=$this->uri->segment(3);
		if($prof==null){
			redirect (enkripsi('mahasiswa','index'));
		}else{
			redirect ('dashboard/profil/'.$prof);
		}
	}
	public function nonaktifkan(){	
		$this->form_validation->set_rules('id[]','id[]','required');
		$id=$this->input->post('id');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Data Kosong atau Ada Kesalahan Dalam meng Nonaktifan Data <strong>Mahasiswa</strong>!');
				redirect (enkripsi('mahasiswa','index'));
		}else{
			for($i=0; $i<count($id); $i++){
				$data = array(
					'status'=>0,
				);
				$this->m_mahasiswa->edit($data,$id[$i]);
			}
			$this->session->set_flashdata('m_sukses','Data <strong>'.count($id).' Mahasiswa</strong> Berhasil Di Nonaktifkan');
			redirect (enkripsi('mahasiswa','index'));
		}
	}
	public function aktifkan(){	
		$this->form_validation->set_rules('id[]','id[]','required');
		$id=$this->input->post('id');
		if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('m_error','Data Kosong atau Ada Kesalahan Dalam meng Aktifan Data <strong>Mahasiswa</strong>!');
				redirect (enkripsi('mahasiswa','nonaktif'));
		}else{
			for($i=0; $i<count($id); $i++){
				$data = array(
					'status'=>1,
				);
				$this->m_mahasiswa->edit($data,$id[$i]);
			}
			$this->session->set_flashdata('m_sukses','Data <strong>'.count($id).' Mahasiswa</strong> Berhasil Di Aktifkan');
			redirect (enkripsi('mahasiswa','nonaktif'));
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('mahasiswa','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('mahasiswa','nonaktif'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$akses=$this->session->userdata('akses');
		if($akses=='super'){
			$data['mahasiswa']=$this->m_mahasiswa->ambil_data(0)->result();
		}elseif($akses=='admin'){
			$jur=$this->session->userdata('jurusan');
			$data['mahasiswa']=$this->m_mahasiswa->ambil_data_jur($jur)->result();
		}
		$data['menuaktif']='master';
		$data['konten']='mahasiswa/nonaktif.php';
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
		if(!$this->upload->do_upload('import')) {
			$this->session->set_flashdata('m_error','Data Gagal Di Impor!');
			redirect(enkripsi('mahasiswa','index'));
			}else{
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
				$dataexcel[$i - 2]['nim'] = $data['cells'][$i][1];
				$dataexcel[$i - 2]['nama_mahas'] = $data['cells'][$i][2];
				$dataexcel[$i - 2]['email'] = $data['cells'][$i][3];
				$dataexcel[$i - 2]['thn_masuk'] = $data['cells'][$i][4];
				$dataexcel[$i - 2]['jalan'] = $data['cells'][$i][5];
				$dataexcel[$i - 2]['rt'] = $data['cells'][$i][6];
				$dataexcel[$i - 2]['rw'] = $data['cells'][$i][7];
				$dataexcel[$i - 2]['desa'] = $data['cells'][$i][8];
				$dataexcel[$i - 2]['kec'] = $data['cells'][$i][9];
				$dataexcel[$i - 2]['kota'] = $data['cells'][$i][10];
				$dataexcel[$i - 2]['kode_pos'] = $data['cells'][$i][11];
				$dataexcel[$i - 2]['provinsi'] = $data['cells'][$i][12];
				$dataexcel[$i - 2]['kota_lahir'] = $data['cells'][$i][13];
				// $dataexcel[$i - 2]['tgl_lahir'] = $data['cells'][$i][14];
				$dataexcel[$i - 2]['phone'] = $data['cells'][$i][15];
				$dataexcel[$i - 2]['gol_darah'] = $data['cells'][$i][16];
				$dataexcel[$i - 2]['jk'] = $data['cells'][$i][17];
				$dataexcel[$i - 2]['agama'] = $data['cells'][$i][18];
				$dataexcel[$i - 2]['nama_bpk'] = $data['cells'][$i][19];
				$dataexcel[$i - 2]['nama_ibu'] = $data['cells'][$i][20];
				$dataexcel[$i - 2]['didik_bpk'] = $data['cells'][$i][21];
				$dataexcel[$i - 2]['didik_ibu'] = $data['cells'][$i][22];
				$dataexcel[$i - 2]['kerja_bpk'] = $data['cells'][$i][23];
				$dataexcel[$i - 2]['kerja_ibu'] = $data['cells'][$i][24];
				$dataexcel[$i - 2]['hasil_bpk'] = $data['cells'][$i][25];
				$dataexcel[$i - 2]['hasil_ibu'] = $data['cells'][$i][26];
				$dataexcel[$i - 2]['anak_ke'] = $data['cells'][$i][27];
				$dataexcel[$i - 2]['jml_saudara'] = $data['cells'][$i][28];
				$dataexcel[$i - 2]['jurusan_asal'] = $data['cells'][$i][29];
				$dataexcel[$i - 2]['asal_sekolah'] = $data['cells'][$i][30];
				$dataexcel[$i - 2]['kota_sekolah'] = $data['cells'][$i][31];
				$dataexcel[$i - 2]['id_jur'] = $data['cells'][$i][32];
			}
			$files = $upload_data['file_name'];
			$path = './assets/file/'.$files;
			delete_files($path);
			$this->m_mahasiswa->loaddata($dataexcel);
			$this->m_mahasiswa->jur($dataexcel);
		}
		$this->session->set_flashdata('m_sukses','Data Berhasil Di Impor!');
		redirect('mahasiswa');
	}
	function ekspor(){
		$this->load->view('admin/mahasiswa/excel');
	}
	function cetak(){
		$akses=$this->session->userdata('akses');
		if($akses=='super'){
			$data['mahasiswa']=$this->m_mahasiswa->ambil_data(1)->result();
		}elseif($akses=='admin'){
			// $jur=$this->session->userdata('jurusan');
			$data['mahasiswa']=$this->m_mahasiswa->ambil_data(1)->result();
			// $data['mahasiswa']=$this->m_mahasiswa->ambil_data_jur($jur)->result();
		}
		$data['title']="Cetak || Aktif || Mahasiswa";
		$this->load->view('admin/mahasiswa/cetak',$data);
	}
}
?>
