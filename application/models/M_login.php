<?php
class M_login extends CI_Model{	
	function cekmahas($n,$p,$t){
		$q=$this->db->query("SELECT pemilih.status, pemilih.id_akses, tahun_pemilihan.id_campaign, tahun_pemilihan.mulai, tahun_pemilihan.selesai, mahasiswa.nama_mahas
		 					FROM pemilih,tahun_pemilihan,akses,mahasiswa,campaign
							WHERE pemilih.id_akses=akses.id_akses
							AND tahun_pemilihan.tahun='$t'
							AND pemilih.id_campaign=campaign.id_campaign
							AND pemilih.id_campaign=tahun_pemilihan.id_campaign
							AND pemilih.tahun=tahun_pemilihan.tahun
							AND pemilih.id_user=mahasiswa.nim
							AND pemilih.id_user='$n'
							AND pemilih.password='$p'");
		return $q;
	}
	function cekdos($n,$p,$t){
		$q=$this->db->query("SELECT pemilih.status, pemilih.id_akses, tahun_pemilihan.id_campaign, tahun_pemilihan.mulai, tahun_pemilihan.selesai, dosen.nama_dos
							FROM pemilih,tahun_pemilihan,akses,dosen,campaign
							WHERE pemilih.id_akses=akses.id_akses
							AND pemilih.id_campaign=campaign.id_campaign
							AND pemilih.id_campaign=tahun_pemilihan.id_campaign
							AND pemilih.tahun=tahun_pemilihan.tahun
							AND tahun_pemilihan.tahun='$t'
							AND pemilih.id_user=dosen.id_dos
							AND pemilih.id_user='$n'
							AND pemilih.password='$p'");
		return $q;
	}
	function cektu($n,$p,$t){
		$q=$this->db->query("SELECT pemilih.status, pemilih.id_akses, tahun_pemilihan.id_campaign, tahun_pemilihan.mulai, tahun_pemilihan.selesai, tatausaha.nama_tu 
							FROM pemilih,tahun_pemilihan,akses,tatausaha,campaign
							WHERE pemilih.id_akses=akses.id_akses
							AND pemilih.id_campaign=campaign.id_campaign
							AND pemilih.id_campaign=tahun_pemilihan.id_campaign
							AND pemilih.tahun=tahun_pemilihan.tahun
							AND tahun_pemilihan.tahun='$t'
							AND pemilih.id_user=tatausaha.id_tu
							AND pemilih.status='1'
							AND pemilih.id_user='$n'
							AND pemilih.password='$p'");
		return $q;
	}
	function ceksup1($u,$p){
		$q=$this->db->query("select * from admin,akses,tatausaha
							where admin.id_akses=akses.id_akses
							and admin.id_user=tatausaha.id_tu
							and admin.username='$u'
							and admin.password='$p'
							and admin.status='1'
							and tatausaha.status_anggota='1'");
		return $q;
	}
	function ceksup2($u,$p){
		$q=$this->db->query("select * from admin,akses,dosen
							where admin.id_akses=akses.id_akses
							and admin.id_user=dosen.id_dos
							and admin.username='$u'
							and admin.password='$p'
							and admin.status='1'
							and dosen.status_anggota='1'");
		return $q;
	}
	function ceksup3($u,$p){
		$q=$this->db->query("select * from admin,akses,mahasiswa
							where admin.id_akses=akses.id_akses
							and admin.id_user=mahasiswa.nim
							and admin.username='$u'
							and admin.password='$p'
							and admin.status='1'
							and mahasiswa.status='1'");
		return $q;
	}
}