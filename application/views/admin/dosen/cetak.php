<?php
$this->load->view('admin/cetak/header.php');
?>
<a class="btn btn-medium btn-info" href="#" onClick="window.print();"><i class="icon-print"></i> Cetak</a>
<h4 align="center"><strong>Data Dosen</strong></h4>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
	<tr bgcolor="#71FAF1">
		<th><font size="1px">ID Dosen</font></th>
		<th><font size="1px">Nama Dosen</font></th>
		<th><font size="1px">Tempat Lahir</font></th>
		<th><font size="1px">Tanggal Lahir</font></th>
		<th><font size="1px">Jenis Kelamin</font></th>
		<th><font size="1px">Agama</font></th>
		<th><font size="1px">Pendidikan Akhir</font></th>
		<th><font size="1px">Alamat</font></th>
		<th><font size="1px">Status Kepegawaian</font></th>
	</tr>
	<?php
		$dosen=$this->m_dosen->ambil_data()->result();
		$n=0; foreach($dosen as $row): $n++;
	?>
	<tr>
		<td><font size="1px"><?php echo $row->id_dos;?></font></td>
		<td><font size="1x"><?php echo $row->nama_dos;?></font></td>
		<td><font size="1px"><?php echo $row->tmp_lahir;?></font></td>
		<td><font size="1px"><?php echo $row->tgl_lahir;?></font></td>
		<td><font size="1px"><?php echo $row->jk;?></font></td>
		<td><font size="1px"><?php echo $row->agama;?></font></td>
		<td><font size="1px"><?php echo $row->pendidikan_akhir;?></font></td>
		<td><font size="1px"><?php echo $row->alamat;?></font></td>
		<td><font size="1px"><?php echo $row->status_pegawai;?></font></td>
	</tr>
	<?php endforeach;?>
</table></font>
<?php
$this->load->view('admin/cetak/ttd.php');
?>
