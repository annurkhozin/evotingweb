<?php
class M_admin extends CI_Model{
	private $lev1="admin";
	private $lev1id="id_akses";
	private $lev1user="id_user";
	private $lev1stat="status";

	function ambil_data($a){
		$q=$this->db->where($this->lev1stat,$a)->get($this->lev1);
		return $q;
	}
	function ambil_data_aktif($id){
		$q=$this->db->where($this->lev1user,$id)->get($this->lev1);
		return $q;
	}
	function simpan($data){
		$this->db->insert($this->lev1,$data);
	}
	function edit($data,$id){
		$this->db->where($this->lev1user,$id);
		$this->db->update($this->lev1,$data);
	}
	function hapus($data,$id){
		$this->db->where($this->lev1user,$id);
		$this->db->update($this->lev1,$data);
	}
	function cek_id($id){
		$q=$this->db->where($this->lev1user,$id)->get($this->lev1);
		return $q;
	}
	function cek_hak($id){
		$q=$this->db->query("select * from akses,admin
							where admin.id_user='$id'
							and admin.id_akses=akses.id_akses");
		return $q;
	}
	function passmahas($id){
		$q=$this->db->query("select * from mahasiswa,admin
							where mahasiswa.nim=admin.id_user
							and admin.id_user='$id'");
		return $q;
	}
	function passdos($id){
		$q=$this->db->query("select * from dosen,admin
							where dosen.id_dos=admin.id_user
							and admin.id_user='$id'");
		return $q;
	}
	function passtu($id){
		$q=$this->db->query("select * from tatausaha,admin
							where tatausaha.id_tu=admin.id_user
							and admin.id_user='$id'");
		return $q;
	}
	function cekss($id){
		$q=$this->db->query("select * from mahasiswa,jur_mahas,jurusan
							where mahasiswa.nim=jur_mahas.nim
							and jur_mahas.id_jur=jurusan.id_jur
							and mahasiswa.nim='$id'");
		return $q;
	}
	function cekadmahas($id){
		$q=$this->db->query("
							select * from jurusan,jur_mahas,admin
							where jurusan.id_jur=jur_mahas.id_jur
							and jurusan.id_jur=admin.id_jur
							and jur_mahas.nim='$id'");
		return $q;
	}
	function cekadtudos($id){
		$q=$this->db->from('admin AS A')->join('campaign AS B','B.id_campaign =  A.id_campaign')->where('A.id_user',$id)->get();
		return $q;
	}
}