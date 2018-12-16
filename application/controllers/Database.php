<?php
class Database extends CI_Controller{
    private $levpol="Beranda";
	private $lev1="DataBase";
	private $lev1kata="DataBase";
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
		$this->load->library(array('pagination','form_validation','upload'));
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
		$data['hlangit']=$this->mza_secureurl->setSecureUrl_encode('database','index'); 
		$data['hawan']=$this->mza_secureurl->setSecureUrl_encode('database','index'); // segmen 3
		$data['htanah']=$this->mza_secureurl->setSecureUrl_encode('$lev3','index');
		$data['hair']=$this->mza_secureurl->setSecureUrl_encode('$lev4','index');
		$data['hbumi']=$this->mza_secureurl->setSecureUrl_encode('$lev5','index');
		include "menu.php";
		$data['menuaktif']='database';
		$data['konten']='database/index.php';
		$this->load->view('admin/template',$data);
	}
	function backup(){
		$this->load->helper('download');
		$this->load->dbutil();
		date_default_timezone_set('Asia/Jakarta'); $jam=date('Y-m-d H:i:s');
		$nama_file	= 'pemiluhmj'.$jam;
		$prefs = array(
				'format'      => 'zip',             // gzip, zip, txt
				'filename'    => $nama_file.'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
				'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
				'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
				'newline'     => "\n"               // Newline character used in backup file
			);

		$this->dbutil->backup($prefs);
		date_default_timezone_set('Asia/Jakarta');
		$date=date('Y-m-d H:i:s');
		$backup =& $this->dbutil->backup($prefs); 
		$nama_database = 'pemiluhmj' .'.zip';
        $simpan = '/'.$date.'-'.$nama_database;
        $this->load->helper('file');
        write_file($simpan);
		$this->load->helper('download');
        force_download($nama_database, $backup);
		$this->session->set_flashdata('m_sukses','Data Berhasil Di Backup');
		redirect(enkripsi('database','index'));
	}
	function restor(){
		$isi_file = file_get_contents(base_url('upload/db/pemiluhmj.sql'));
		$string_query = rtrim( $isi_file, "\n;" );
		$array_query = explode(";", $query);
		foreach($array_query as $query){
		$this->db->query($query);
		}
	}
}