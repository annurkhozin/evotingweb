<?php
class M_utama extends CI_Model{
	private $lev1="poling";
	private $lev1id="id_poling";
	function insert($data){
		$this->db->insert($this->lev1,$data);
	}
	function update($data,$id){
		$this->db->where('id_pemilih',$id);
		$this->db->update('pemilih',$data);
	}
	function cekpoin($id){
		$q=$this->db->query("select * from akses
							where id_akses='$id'");
		return $q;
	}
}