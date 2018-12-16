<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export.xls");
?>
<table border="1">
	<tr>
		<th>ID Dosen</th>
		<th>Nama Dosen</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Pendidikan Akhir</th>
		<th>Alamat</th>
		<th>Status Kepegawaian</th>
	</tr>
	<?php
		$dosen=$this->m_dosen->ambil_data()->result();
		$n=0; foreach($dosen as $row): $n++;
	?>
	<tr>
		<td><?php echo $row->id_dos;?></td>
		<td><?php echo $row->nama_dos;?></td>
		<td><?php echo $row->tmp_lahir;?></td>
		<td><?php echo $row->tgl_lahir;?></td>
		<td><?php echo $row->jk;?></td>
		<td><?php echo $row->agama;?></td>
		<td><?php echo $row->pendidikan_akhir;?></td>
		<td><?php echo $row->alamat;?></td>
		<td><?php echo $row->status_pegawai;?></td>
	</tr>
	<?php endforeach;?>
</table>