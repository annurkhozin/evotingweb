<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utama extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_calon');
		$this->load->model('m_login');
		$this->load->model('m_utama');
		$this->load->model('m_campaign');
		$this->load->helper(array('form', 'url','file'));
        $this->load->library('upload','tools');
		if(!$this->session->userdata('id')){
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
		$jrs=$this->uri->segment(3);
		$thn=$this->uri->segment(4);
		$data['calon']=$this->m_calon->ambil_data(1,$jrs,$thn)->result();
		$this->load->view('utama/index',$data);
	}
	public function prosespoling(){
		$nom=$this->input->post('nomor');
		$poin=$this->input->post('poin');
		$user=$this->input->post('user');
		$thn=$this->input->post('thn');
		$camp=$this->input->post('camp');
		$waktu=date('Y-m-d H:i:s');
		$data=array(
			'id_poling'=> $user.'-'.$waktu,
			'id_pemilih'=> $user,
			'tahun'=> $thn,
			'no_urut'=> $nom,
			'id_campaign'=> $camp,
			'waktu'=> $waktu,
			'poin'=> $poin,
		);
		$data2=array(
			'status'=>0
		);
		$this->m_utama->insert($data);
		$this->m_utama->update($data2,$thn.$camp.$user);
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('akses');
		$this->session->set_flashdata('sukses','Terimakasih telah ikut berpartisipasi dan memberikan hak pilih anda!');
		redirect(enkripsi('Login','index_login'));
	}
}
?>