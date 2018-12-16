<?php
$this->load->view('admin/cetak/header.php');
$jur=$this->uri->segment(3); $thn=$this->uri->segment(4);
$status=$this->uri->segment(5);
$namajur=$this->m_campaign->cek_id($jur)->row_array()['nama_campaign'];
?>
<a class="btn btn-medium btn-info" href="#" onClick="window.print();"><i class="icon-print"></i> Cetak</a>
<h4 align="center"><strong>Data Pemilih <?php if($status==1){echo 'Aktif - ';}else{echo 'Non_Aktif - ';} echo $namajur.' '.$thn;?></strong></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
	<tr bgcolor="#71FAF1">
		<th><font size="1px">ID Pemilih</font></th>
		<th><font size="1px">Nama Pemilih</font></th>
		<th><font size="1px">Campaign</font></th>
		<th><font size="1px">Asal Pemilih</font></th>
		<th><font size="1px">Tahun</font></th>
		<th><font size="1px">Waktu Memilih</font></th>
		<th><font size="1px">Status</font></th>
	</tr>
	<?php $pem=$this->m_pemilih->ambil_data($status,$jur,$thn)->result();
		$n=0; foreach($pem as $row): $n++;
		$mahas=$this->m_mahasiswa->cek_id($row->id_user)->row_array();
		$tu=$this->m_tatausaha->cek_id($row->id_user)->row_array();
		$dos=$this->m_dosen->cek_id($row->id_user)->row_array();
		$akses=$this->m_akses->cek_id($row->id_akses)->row_array();
		$jam=$this->m_pemilih->cekjam($jur,$thn)->row_array();
		if($mahas>0){
			$nama=$mahas['nama_mahas'];
		}elseif($tu>0){
			$nama=$tu['nama_tu'];
		}if($dos>0){
			$nama=$dos['nama_dos'];
		}
	?>
	<tr>
		<td><font size="1px"><?php echo $row->id_user;?></font></td>
		<td><font size="1x"><?php echo $nama;?></font></td>
		<td><font size="1x"><?php echo $namajur;?></font></td>
		<td><font size="1px"><?php echo $akses['nama_akses'];?></font></td>
		<td><font size="1px"><?php echo $row->tahun;?></font></td>
		<td><font size="1px"><?php echo dt($jam['mulai']).'<i> s/d </i>'.dt($jam['selesai']);?></font></td>
		<td><font size="1px"><?php $s=$row->status; if($s=='1'){echo"Belum";}elseif($s=='0'){echo"Sudah";};?></font></td>
	</tr>
	<?php endforeach;?>
</table></font>
<?php
$this->load->view('admin/cetak/ttd.php');
?>
