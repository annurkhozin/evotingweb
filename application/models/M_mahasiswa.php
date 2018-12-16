<?php
class M_mahasiswa extends CI_Model{
	private $lev0="pemilih";
	private $lev1="mahasiswa";
	private $lev2="jur_mahas";
	private $lev1id="nim";
	private $lev1stat="status";
	function ambil_data($s){
		$q=$this->db->where($this->lev1stat,$s)->from($this->lev1)->join('jur_mahas','jur_mahas.nim=mahasiswa.nim')->join('jurusan','jurusan.id_jur=jur_mahas.id_jur')->get();
		return $q;
	}
	function ambil_data_jur($jur){
		$q=$this->db->query("select * from mahasiswa,jur_mahas where mahasiswa.nim=jur_mahas.nim and mahasiswa.status='1' and jur_mahas.id_jur='$jur'");
		return $q;
	}
	function amjur($n){
		$q=$this->db->query("select * from mahasiswa,jur_mahas ,jurusan
							where jurusan.id_jur=jur_mahas.id_jur
							and mahasiswa.nim=jur_mahas.nim
							and jur_mahas.nim='$n'");
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
	function editjur($info,$id){
		$this->db->where($this->lev1id,$id);
		$this->db->update($this->lev2,$info);
	}
	function cek_id($id){
		$q=$this->db->where($this->lev1id,$id)->get($this->lev1);
		return $q;
	}
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'nim' => $dataarray[$i]['nim'],
                'nama_mahas' => $dataarray[$i]['nama_mahas'],
                'email' => $dataarray[$i]['email'],
                'thn_masuk' => $dataarray[$i]['thn_masuk'],
                'jalan' => $dataarray[$i]['jalan'],
                'rt' => $dataarray[$i]['rt'],
                'rw' => $dataarray[$i]['rw'],
                'desa' => $dataarray[$i]['desa'],
                'kec' => $dataarray[$i]['kec'],
                'kota' => $dataarray[$i]['kota'],
                'kode_pos' => $dataarray[$i]['kode_pos'],
                'provinsi' => $dataarray[$i]['provinsi'],
                'kota_lahir' => $dataarray[$i]['kota_lahir'],
                // 'tgl_lahir' => date_format(date_create($dataarray[$i]['tgl_lahir']),"Y-m-d"),
                'phone' => $dataarray[$i]['phone'],
                'gol_darah' => $dataarray[$i]['gol_darah'],
                'jk' => $dataarray[$i]['jk'],
                'agama' => $dataarray[$i]['agama'],
                'nama_bpk' => $dataarray[$i]['nama_bpk'],
                'nama_ibu' => $dataarray[$i]['nama_ibu'],
                'didik_bpk' => $dataarray[$i]['didik_bpk'],
                'didik_ibu' => $dataarray[$i]['didik_ibu'],
                'kerja_bpk' => $dataarray[$i]['kerja_bpk'],
                'kerja_ibu' => $dataarray[$i]['kerja_ibu'],
                'hasil_bpk' => $dataarray[$i]['hasil_bpk'],
                'hasil_ibu' => $dataarray[$i]['hasil_ibu'],
                'anak_ke' => $dataarray[$i]['anak_ke'],
                'jml_saudara' => $dataarray[$i]['jml_saudara'],
                'jurusan_asal' => $dataarray[$i]['jurusan_asal'],
                'asal_sekolah' => $dataarray[$i]['asal_sekolah'],
                'kota_sekolah' => $dataarray[$i]['kota_sekolah'],
                'status' =>1,
            );
			$this->db->insert($this->lev1,$data);
		}
	}
	function jur($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'nim' => $dataarray[$i]['nim'],
                'id_jur' => $dataarray[$i]['id_jur'],
            );
            $idnim=$dataarray[$i]['nim'];
			$cek=$this->db->query("SELECT * FROM jur_mahas
							WHERE nim='$idnim'");
			$cek2=$cek->row_array();
			if($cek2<1){
			$this->db->insert($this->lev2,$data);
			}
		}
	}
	function simpanjur($data,$n) {
        $cek=$this->db->query("SELECT * FROM jur_mahas
							WHERE nim='$n'");
		$cek2=$cek->row_array();
		if($cek2<1){
			$this->db->insert($this->lev2,$data);
		}
	}
}