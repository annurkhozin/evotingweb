<?php
class M_tatausaha extends CI_Model{
	private $lev0="pemilih";
	private $lev1="tatausaha";
	private $lev1id="id_tu";
	private $lev1stat="status_anggota";
	function ambil_data(){
		$q=$this->db->where($this->lev1stat,1)->get($this->lev1);
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
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_tu' => $dataarray[$i]['id_tu'],
                'nama_tu' => $dataarray[$i]['nama_tu'],
                'email' => $dataarray[$i]['email'],
                'tmp_lahir' => $dataarray[$i]['tmp_lahir'],
                'tgl_lahir' => $dataarray[$i]['tgl_lahir'],
                'jk' => $dataarray[$i]['jk'],
                'agama' => $dataarray[$i]['agama'],
                'pendidikan_akhir' => $dataarray[$i]['pendidikan_akhir'],
                'alamat' => $dataarray[$i]['alamat'],
                'status_pegawai' => $dataarray[$i]['status_pegawai'],
                'status_anggota' =>1,
            );
			$this->db->insert($this->lev1,$data);
		}
	}
}