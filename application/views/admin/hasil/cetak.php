<?php
date_default_timezone_set('Asia/Jakarta');
$this->load->view('admin/cetak/header.php');
$camp=$this->uri->segment(3);
$thn=$this->uri->segment(4);
$calon=$this->m_calon->ambil_data(1,$camp,$thn);
$ss=$this->m_campaign->cek_id($camp)->row_array();
$dosmi=$this->m_pemilih->topem($camp,'dos',$thn)->num_rows();
$mahmi=$this->m_pemilih->topem($camp,'mahas',$thn)->num_rows();
$tumi=$this->m_pemilih->topem($camp,'tu',$thn)->num_rows();
?>
<a class="btn btn-medium btn-info" href="#" onClick="window.print();"><i class="icon-print"></i> Cetak</a>
<h4 align="center"><strong>Hasil Pemilihan <?php echo $ss['nama_campaign'].' '.$thn;?></strong></h4>
<table style="font-size:12px">
	<tr>
		<td style="width:100">Campaign</td>
		<td style="width:10">:</td>
		<td><?php echo $ss['nama_campaign'];?></td>
	</tr>
	<tr>
		<td style="width:100">Tahun Pemilihan</td>
		<td style="width:10">:</td>
		<td><?php echo $thn;?></td>
	</tr>
	<tr>
		<td style="width:100">Jumlah Calon</td>
		<td style="width:10">:</td>
		<td><?php echo $calon->num_rows();?> Calon</td>
	</tr>
	<tr>
		<td style="width:100">Jumlah Pemilih</td>
		<td style="width:10">:</td>
		<td><?php echo $dosmi+$mahmi+$tumi;?> Pemilih</td>
	</tr>
	<tr>
		<td style="width:100">Waktu Pemilihan</td>
		<td style="width:10">:</td>
		<td><?php $waktu=$this->m_pemilih->cekth($thn,$camp)->row_array(); echo dt($waktu['mulai']).' s/d '.dt($waktu['selesai']);?></td>
	</tr>
</table><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
	<tr bgcolor="#71FAF1">
		<th><font size="1px">No Urut Calon</font></th>
		<th><font size="1px">NIM</font></th>
		<th><font size="1px">Nama Calon</font></th>
		<th><center><font size="1px">Poin Suara</font></center></th>
		<th><center><font size="1px">Presentasi Suara</font></center></th>
	</tr>
	<?php
		$n=0; foreach($calon->result() as $cal): $n++;
	?>
	<tr>
		<td><font size="1px"><?php echo $cal->no_urut;?></font></td>
		<td><font size="1x"><?php echo $cal->nim;?></font></td>
		<td><font size="1x"><?php $nam=$this->m_mahasiswa->cek_id($cal->nim)->row_array()['nama_mahas']; echo $nam;?></font></td>
		<td><font size="1px"><center><?php $poin=$this->m_poling->poling($cal->no_urut,$camp,$thn)->row_array(); $hasil_poin=$poin['poin']; 
			if($hasil_poin!=null){echo $hasil_poin;}else{ echo '0';}?></font></td>
		<td><font size="1px"><center><?php $semua_poin=$this->m_poling->poling_semua($camp,$thn)->row_array(); $hasil_semua_poin=$semua_poin['poin']; 
			if($hasil_semua_poin!=null){
				$persen=($hasil_poin/$hasil_semua_poin)*100;
				echo $persen." %";
			}else{ echo '0';}?></font></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="2"><font size="1px"><center> Total :</center></font></td>
		<td><font size="1px"><center><?php echo $calon->num_rows(); ?> Calon</center></font></td>
		<td><font size="1px"><center><?php echo $hasil_semua_poin; ?> Poin suara</center></font></td>
		<td><font size="1px"><center>100 %</center></font></td>
	</tr>
</table></font>
<?php
$this->load->view('admin/cetak/ttd.php');
?>