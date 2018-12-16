<?php 
function menuaktif($kd=0,$menu=0){
	$CI=& get_instance();
	if($kd==$menu){
		$h='active';
	}else{
		$h=0;
	}
	return $h;
}
function buttonedit(){
	$edit="<button type='submit' class='btn btn-md btn-info'><span class='halflings-icon white edit'></span> Edit Data</button>";
	return $edit;
}
function buttonsimpan(){
	$simpan="<button type='submit' class='btn btn-md btn-primary'><span class='halflings-icon white ok'></span> Simpan Data</button>";
	return $simpan;
}
function buttonaktif(){
	$simpan="<button type='submit' class='btn btn-md btn-success'><span class='halflings-icon white star'></span> Aktifkan</button>";
	return $simpan;
}
function buttonnonaktif(){
	$simpan="<button type='submit' class='btn btn-md btn-danger'><span class='halflings-icon white trash'></span> Nonaktifkan</button>";
	return $simpan;
}
function getnama($id){
	$CI=& get_instance();
	$q=$CI->db->query("select * from mahasiswa where NIM='$id'");
	$s=$q->row_array();
	$nama=$s['Nm_mahasiswa'];
	return $nama;
}
function getpoin($id){
	$CI=& get_instance();
	$q=$CI->db->query("select sum(poling.poin) as poin from calon,poling where calon.No_urut=poling.No_urut
					and calon.NIM='$id'");
	$s=$q->row_array();
	$poin=$s['poin'];
	return $poin;
}
function cekselectcalon($nim,$id){
	$CI=& get_instance();
	$q=$CI->db->query("select * from calon where NIM='$nim' and No_urut='$id'");
	$a='';
	if($q->num_rows()>0){
		$a='selected';
	}
	return $a;
}
function getpoint($level){
	$CI=& get_instance();
	$q=$CI->db->query("select * from akses where Id_akses='$level'");
	$row=$q->row_array();
	$point=$row['bobot'];
	return $point;
}
function getakses($id){
	$CI=& get_instance();
	$q=$CI->db->query("select * from akses where Id_akses='$id'");
	$akses="";
	if($q->num_rows()>0){
		$a=$q->row_array();
		$akses=$a['nm_akses'];
	}
	return $akses;
}
function ceksuara($id,$url){
	$ci=& get_instance();
	$text="Suara";
	if($id==$text){
		$h=$url;
	}else{
		$h="";
	}
	$ci->session->unset_userdata('suara');
	return $h;
}
function cekgagal($id,$url){
	$ci=& get_instance();
	$text="Gagal";
	if($id==$text){
		$h=$url;
	}else{
		$h="";
	}
	$ci->session->unset_userdata('gagal');
	return $h;
}
function getnamaok($id){
	$CI=& get_instance();
	$q=$CI->db->query("select * from mahasiswa where NIM='$id'");
	$q2=$CI->db->query("select * from dosen where NIP='$id'");
	$q3=$CI->db->query("select * from tatausaha where NIP='$id'");
	if($q->num_rows()>0){
		$row=$q->row_array();
		$nama=$row['Nm_mahasiswa'];
	}elseif($q2->num_rows()>0){
		$row=$q2->row_array();
		$nama=$row['Nm_dosen'];
	}elseif($q3->num_rows()){
		$row=$q3->row_array();
		$nama=$row['Nm_tatausaha'];
	}
	return $nama;
}