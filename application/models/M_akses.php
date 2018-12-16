<?php
class M_akses extends CI_Model{
	private $lev1="akses";
	private $lev1id="id_akses";
	private $lev1stat="status";
	function ambil_data(){
		$q=$this->db->where($this->lev1stat,1)->get($this->lev1);
		return $q;
	}
	function cekak($a){
		$q=$this->db->query("select * from akses
							where akses.id_akses='$a'");
		return $q;
	}
	function ambil_datasudah(){
		$q=$this->db->query("select * from poling,mahasiswa
							where poling.id_pemilih=mahasiswa.nim");
		return $q;
	}
	function jumdoss(){
		$q=$this->db->query("select * from poling,dosen
							where poling.id_pemilih=dosen.id_dos");
		return $q;
	}
	function sudahtu(){
		$q=$this->db->query("select * from poling,tatausaha
							where poling.id_pemilih=tatausaha.id_tu");
		return $q;
	}
	function ambil_data_non(){
		$q=$this->db->where($this->lev1stat,0)->get($this->lev1);
		return $q;
	}
	function ambil_data_aktif($id){
		$q=$this->db->where($this->lev1id,$id)->get($this->lev1);
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
}