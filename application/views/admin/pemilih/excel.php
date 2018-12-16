<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pemilih.xls");
$jur=$this->uri->segment(3); $thn=$this->uri->segment(4);
$status=$this->uri->segment(5);
$namajur=$this->m_campaign->cek_id($jur)->row_array()['nama_campaign'];
?>
<table border="1">
	<tr>
		<th>ID Pemilih</th>
		<th>Nama Pemilih</th>
		<th>Password</th>
		<th>Campaign</th>
		<th>Asal Pemilih</th>
		<th>Tahun</th>
		<th>Status</th>
	</tr>
	<?php $pem=$this->m_pemilih->ambil_data($status,$jur,$thn)->result();
		$n=0; foreach($pem as $row): $n++;
		$mahas=$this->m_mahasiswa->cek_id($row->id_user)->row_array();
		$tu=$this->m_tatausaha->cek_id($row->id_user)->row_array();
		$dos=$this->m_dosen->cek_id($row->id_user)->row_array();
		$akses=$this->m_akses->cek_id($row->id_akses)->row_array();
		if($mahas>0){
			$nama=$mahas['nama_mahas'];
		}elseif($tu>0){
			$nama=$tu['nama_tu'];
		}if($dos>0){
			$nama=$dos['nama_dos'];
		}
	?>
	<tr>
		<td><?php echo $row->id_user;?></td>
		<td><?php echo $nama;?></td>
		<td><?php echo $row->password;?></td>
		<td><?php echo $namajur;?></td>
		<td><?php echo $akses['nama_akses'];?></td>
		<td><?php echo $row->tahun;?></td>
		<td><?php $s=$row->status; if($s=='1'){echo"Belum";}elseif($s=='0'){echo"Sudah";};?></td>
	</tr>
	<?php endforeach;?>
</table>