<?php
class M_poling extends CI_Model{
	private $lev1="pemilih";
	private $lev1id="id_pemilih";
	function ambil_data($s,$t){
		$q=$this->db->query("select * from poling
								where id_pemilih='$s'
								and tahun='$t'");
		return $q;
	}
	function ambil_data_non($s,$c){
		$q=$this->db->query("select * from calon,mahasiswa,jur_mahas 
							where calon.id_campaign='$c' and mahasiswa.nim=calon.nim
							and calon.status='$s'");
		return $q;
	}
	function poling($n,$c,$t){
		$q=$this->db->query("select sum(poin) as poin from poling
							 where tahun='$t' and no_urut='$n'
							 and id_campaign='$c'");
		return $q;
	}
	function poling_semua($c,$t){
		$q=$this->db->query("select sum(poin) as poin from poling
							 where tahun='$t'
							 and id_campaign='$c'");
		return $q;
	}
	function cekjam($n,$c,$t){
		$q=$this->db->query("select * from poling
							 where tahun='$t' and id_pemilih='$n'
							 and id_campaign='$c'");
		return $q;
	}
	function ambil_data_aktif($id){
		$q=$this->db->where($this->nim,$id)->get($this->lev1);
		return $q;
	}
	function simpan($data){
		$this->db->insert($this->lev1,$data);
	}
	function edit($data,$id){
		$this->db->where($this->lev1id,$id);
		$this->db->update($this->lev1,$data);
	}
	public function getNo()
    {
        $q = $this->db->query("select MAX(RIGHT(No_urut,1)) as kd_max from calon");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%02s", $tmp);
            }
        }
        else
        {
            $kd = "01";
        }
        return $kd;
    }
}