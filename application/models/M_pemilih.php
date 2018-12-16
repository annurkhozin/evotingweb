<?php
class M_pemilih extends CI_Model{
	private $lev1="pemilih";
	private $lev2="tahun_pemilihan";
	private $lev1id="id_pemilih";
	private $lev2id="id_tahun";
	function ambil_data($s,$j,$t){
		$q=$this->db->query("select * from pemilih
								where id_campaign='$j'
								and tahun='$t'
								and status='$s'");
		return $q;
	}
	function ambil_data_non($s,$c,$t){
		$q=$this->db->query("select * from pemilih
								where id_campaign='$c'
								and tahun='$t'
								and status!='$s'");
		return $q;
	}
	function ambil_tahun($c){
		$q=$this->db->query("select distinct(tahun),mulai,selesai,id_campaign from tahun_pemilihan
								where id_campaign='$c'");
		return $q;
	}
	function cekth($th,$c){
		$q=$this->db->query("select * from tahun_pemilihan
								where id_campaign='$c'
								and tahun='$th'");
		return $q;
	}
	function mahas(){
		$q=$this->db->select('A.*,C.nama_jur')->from('mahasiswa AS A')->join('jur_mahas AS B','B.nim=A.nim')->join('jurusan AS C','C.id_jur=B.id_jur')->get();
		
		return $q;
	}
	function ceknim($n,$t,$c){
		$q=$this->db->query("select * from pemilih 
							where id_user='$n'
							and id_campaign='$c'
							and tahun='$t'");
		return $q;
	}	
	function tata($c,$t){
		$q=$this->db->query("select * from tatausaha,pemilih
							where tatausaha.status_anggota='1'
							and pemilih.id_user!=tatausaha.id_tu
							and pemilih.id_akses='tu'
							and pemilih.id_campaign='$c'
							and pemilih.tahun!='$t'");
		return $q;
	}
	function dosen($c,$t){
		$q=$this->db->query("select * from dosen,pemilih
							where dosen.status_anggota='1'
							and pemilih.id_user!=dosen.id_dos
							and pemilih.id_akses='dos'
							and pemilih.id_campaign='$c'
							and pemilih.tahun!='$t'");
		return $q;
	}
	function cekjml($c,$t){
		$q=$this->db->query("select count(id_user) as sel from pemilih
							where id_campaign='$c'
							and tahun='$t'");
		return $q;
	}
	function topem($c,$a,$t){
		$q=$this->db->query("select * from pemilih
							where id_campaign='$c'
							and id_akses='$a'
							and tahun='$t'");
		return $q;
	}
	function apem($s,$c,$a,$t){
		$q=$this->db->query("select * from pemilih
							where id_campaign='$c'
							and id_akses='$a'
							and tahun='$t'
							and status='$s'");
		return $q;
	}
	function cetak($c,$t,$p){
		$q=$this->db->query("select * from pemilih 
							where id_campaign='$c'
							and tahun='$t'
							and cetak='$p'");
		return $q;
	}
	function cekjam($c,$t){
		$q=$this->db->query("select * from tahun_pemilihan
							where id_campaign='$c'
							and tahun='$t'");
		return $q;
	}
	function jthn($j){
		$q=$this->db->query("select * from tahun_pemilihan
							where id_campaign='$j'");
		return $q;
	}
	function edit($data,$id){
		$this->db->where($this->lev1id,$id);
		$this->db->update($this->lev1,$data);
	}
	function editth($data,$id){
		$this->db->where($this->lev2id,$id);
		$this->db->update($this->lev2,$data);
	}
	function simpanth($data){
		$this->db->insert($this->lev2,$data);
	}
	function randpass($panjang){
		$karakter= '1234567890';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
		  $pos = rand(0, strlen($karakter)-1);
		  $string .= $karakter{$pos};
		}
		return $string;
	}
	function simpanmahas($c,$t){
		$nim=$this->input->post('id');
		for($i=0; $i<count($nim); $i++){
			$data=array(
			'id_pemilih'=>$t.$c.$nim[$i],
			'id_user'=>$nim[$i],
			'password'=>$this->randpass(6),
			'id_akses'=>'mahas',
			'id_campaign'=>$c,
			'tahun'=>$t,
			'status'=>1
			);
		$this->db->insert($this->lev1,$data);
		}
	}
	function simpantu($c,$t){
		$id=$this->input->post('id');
		for($i=0; $i<count($id); $i++){
			$data=array(
			'id_pemilih'=>$t.$c.$id[$i],
			'id_user'=>$id[$i],
			'password'=>$this->randpass(6),
			'id_akses'=>'tu',
			'id_campaign'=>$c,
			'tahun'=>$t,
			'status'=>1
			);
		$this->db->insert($this->lev1,$data);
		}
	}
	function simpandos($c,$t){
		$id=$this->input->post('id');
		for($i=0; $i<count($id); $i++){
			$data=array(
			'id_pemilih'=>$t.$c.$id[$i],
			'id_user'=>$id[$i],
			'password'=>$this->randpass(6),
			'id_akses'=>'dos',
			'id_campaign'=>$c,
			'tahun'=>$t,
			'status'=>1
			);
		$this->db->insert($this->lev1,$data);
		}
	}
}