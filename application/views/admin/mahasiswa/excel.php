<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=mahasiswa.xls");
?>
<table border="1">
	<tr>
		<th>NIM</th>
		<th>Nama Mahasiswa</th>
		<th>Jurusan</th>
		<th>Tahun Masuk</th>
		<th>Jalan</th>
		<th>RT</th>
		<th>RW</th>
		<th>Desa</th>
		<th>Kecamatan</th>
		<th>Kota</th>
		<th>Kode Pos</th>
		<th>Provinsi</th>
		<th>Kota Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Phone</th>
		<th>Gol Darah</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Nama Bapak</th>
		<th>Nama Ibu</th>
		<th>Pendidikan Bapak</th>
		<th>Pendidikan Ibu</th>
		<th>Pekerjaan Bapak</th>
		<th>Pekerjaan Ibu</th>
		<th>Penghasilan Bapak</th>
		<th>Penghasilan Ibu</th>
		<th>Anak Ke</th>
		<th>Jumlah Saudara</th>
		<th>Jurusan Asal</th>
		<th>Asal Sekolah</th>
		<th>Kota Asal Sekolah</th>
	</tr>
	<?php
		$mahas=$this->m_mahasiswa->ambil_data(1)->result();
		$n=0; foreach($mahas as $row): $n++;
	?>
	<tr>
		<td><?php echo $row->nim;?></td>
		<td><?php echo $row->nama_mahas;?></td>
		<td><?php echo $row->nama_jur;?></td>
		<td><?php echo $row->thn_masuk;?></td>
		<td><?php echo $row->jalan;?></td>
		<td><?php echo $row->rt;?></td>
		<td><?php echo $row->rw;?></td>
		<td><?php echo $row->desa;?></td>
		<td><?php echo $row->kec;?></td>
		<td><?php echo $row->kota;?></td>
		<td><?php echo $row->kode_pos;?></td>
		<td><?php echo $row->provinsi;?></td>
		<td><?php echo $row->kota_lahir;?></td>
		<td><?php echo $row->tgl_lahir;?></td>
		<td><?php echo $row->phone;?></td>
		<td><?php echo $row->gol_darah;?></td>
		<td><?php echo $row->jk;?></td>
		<td><?php echo $row->agama;?></td>
		<td><?php echo $row->nama_bpk;?></td>
		<td><?php echo $row->nama_ibu;?></td>
		<td><?php echo $row->didik_bpk;?></td>
		<td><?php echo $row->didik_ibu;?></td>
		<td><?php echo $row->kerja_bpk;?></td>
		<td><?php echo $row->kerja_ibu;?></td>
		<td><?php echo $row->hasil_bpk;?></td>
		<td><?php echo $row->hasil_ibu;?></td>
		<td><?php echo $row->anak_ke;?></td>
		<td><?php echo $row->jml_saudara;?></td>
		<td><?php echo $row->jurusan_asal;?></td>
		<td><?php echo $row->asal_sekolah;?></td>
		<td><?php echo $row->kota_sekolah;?></td>
	</tr>
	<?php endforeach;?>
</table>