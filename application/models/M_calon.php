<?php
class M_calon extends CI_Model{
	private $lev1="calon";
	private $lev1id="id_calon";
	private $nim="nim";
	function ambil_data($s,$c,$t){
		$q=$this->db->query("select * from calon,mahasiswa
							where calon.id_campaign='$c' and mahasiswa.nim=calon.nim
							and mahasiswa.status='$s'
							and calon.status='$s' and calon.tahun='$t' ORDER BY no_urut ASC");
		return $q;
	}
	function ambil_data_api($s,$c,$t){
		$q=$this->db->select('A.no_urut, B.nim, B.nama_mahas AS nama_calon, A.visimisi, A.gambar, COUNT(C.poin) AS poin_suara')
		// $q=$this->db->select('A.no_urut, B.nim, B.nama_mahas, A.visimisi, A.gambar, COUNT(C.poin) AS poin')
		->from('calon AS A')->join('mahasiswa AS B', 'B.nim = A.nim')->join('poling AS C','C.no_urut = A.no_urut')
		->where(array('A.id_campaign'=>$c,'B.status'=>$s,'A.status'=>$s, 'A.tahun'=>$t))->group_by('A.no_urut')->order_by('A.no_urut','ASC')->get();
		return $q;
	}
	function ambil_data_non($s,$c){
		$q=$this->db->query("select * from calon,mahasiswa 
							where calon.id_campaign='$c' and mahasiswa.nim=calon.nim
							and calon.status='$s'");
		return $q;
	}
	function ambil_data_aktif($n,$t){
		$q=$this->db->query("select * from calon
							where nim='$n' and tahun='$t'");
		return $q;
	}
	function nourut($camp,$thn){
		$this->db->select_max('no_urut');
		$this->db->where('id_campaign',$camp);
		$this->db->where('tahun',$thn);
		return $this->db->get('calon');
	}
	function ambil_data_thn($n,$t){
		$q=$this->db->query("select * from calon
							where nim='$n' and tahun='$t'");
		return $q;
	}
	function jml($c,$t){
		$q=$this->db->query("select count(nim) as jml from calon
							where id_campaign='$c' and tahun='$t'");
		return $q;
	}
	function simpan($data){
		$this->db->insert($this->lev1,$data);
	}
	function edit($data,$id){
		$this->db->where($this->lev1id,$id);
		$this->db->update($this->lev1,$data);
	}
}
