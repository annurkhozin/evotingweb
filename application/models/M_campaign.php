<?php
class M_campaign extends CI_Model{
	private $lev1="campaign";
	private $lev1id="id_campaign";
	private $lev1stat="status_campaign";
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
}