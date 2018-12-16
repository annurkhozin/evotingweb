<?php
$this->load->view('admin/cetak/header.php');
?>
<a class="btn btn-medium btn-info" href="#" onClick="window.print();"><i class="icon-print"></i> Cetak</a>
<h4 align="center"><strong>Data Mahasiswa</strong></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
	<tr bgcolor="#71FAF1">
		<th><font size="1px">No</font></th>
		<th><font size="1px">NIM</font></th>
		<th><font size="1px">Nama Mahasiswa</font></th>
		<th><font size="1px">Tempat Lahir</font></th>
		<th><font size="1px">Tanggal Lahir</font></th>
		<th><font size="1px">Jenis Kelamin</font></th>
		<th><font size="1px">Agama</font></th>
		<th><font size="1px">Alamat</font></th>
		<th><font size="1px">Jurusan</font></th>
	</tr>
	<?php $n=0; foreach($mahasiswa as $row): $n++;
	?>
	<tr>
		<td><font size="1px"><?php echo $n;?></font></td>
		<td><font size="1px"><?php echo $row->nim;?></font></td>
		<td><font size="1x"><?php echo $row->nama_mahas;?></font></td>
		<td><font size="1px"><?php echo $row->kota_lahir;?></font></td>
		<td><font size="1px"><?php echo $row->tgl_lahir;?></font></td>
		<td><font size="1px"><?php echo $row->jk;?></font></td>
		<td><font size="1px"><?php echo $row->agama;?></font></td>
		<td><font size="1px"><?php echo $row->kec.' - '.$row->kota;?></font></td>
		<td><font size="1px"><?php echo $row->nama_jur;?></font></td>
	</tr>
	<?php endforeach;?>
</table></font>
<?php
$this->load->view('admin/cetak/ttd.php');
?>
