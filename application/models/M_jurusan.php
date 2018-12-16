<?php
class M_jurusan extends CI_Model{
	private $lev1="jurusan";
	private $lev1id="id_jur";
	private $lev1stat="status_jur";
	function ambil_data($a){
		$q=$this->db->where($this->lev1stat,$a)->get($this->lev1);
		return $q;
	}
	function simpan($data){
		$this->db->insert($this->lev1,$data);
	}
	function edit($data,$id){
		$this->db->where($this->lev1id,$id);
		$this->db->update($this->lev1,$data);
	}
	function cek_id($id){
		$q=$this->db->where($this->lev1id,$id)->get($this->lev1);
		return $q;
	}
	function cekad($id){
		$q=$this->db->query("select * from jurusan,jur_mahas
							where jurusan.id_jur=jur_mahas.id_jur
							and jur_mahas.id_jur='$id'
		");
		return $q;
	}
}