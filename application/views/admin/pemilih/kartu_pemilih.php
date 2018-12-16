<link rel="shortcut icon" href="<?=base_url();?>assets/aknbjn.png">
<title><?php echo $title;?></title>
<?php
$jur=$this->uri->segment(3); $thn=$this->uri->segment(4);
$status=$this->uri->segment(5);
$jurusan=$this->m_campaign->cek_id($jur)->row_array(); $namajur=$jurusan['nama_campaign'];
$jam=$this->m_pemilih->cekjam($jur,$thn)->row_array();
?>
<style type="text/css">
	table { font-size: 10px; font-family: arial }
	tr, td { vertical-align: top; padding: 0px }
</style><center>
<div style="width: 210mm; margin: 0.5mm;">
<?php   $n=0; foreach($pem as $row): $n++;
		$mahas=$this->m_mahasiswa->cek_id($row->id_user)->row_array();
		$tu=$this->m_tatausaha->cek_id($row->id_user)->row_array();
		$dos=$this->m_dosen->cek_id($row->id_user)->row_array();
		$akses=$this->m_akses->cek_id($row->id_akses)->row_array();
		if($mahas>0){
			$nama=$mahas['nama_mahas'];
			$jk=$mahas['jk'];
			$foto=$mahas['foto'];
		}elseif($tu>0){
			$nama=$tu['nama_tu'];
			$jk=$tu['jk'];
			$foto=$tu['foto'];
		}if($dos>0){
			$nama=$dos['nama_dos'];
			$jk=$dos['jk'];
			$foto=$dos['foto'];
		}
	?>
<div style="margin-center: 10px; margin: 1.1mm; width: 60mm; height: 35.5mm; display: inline; float: left; border: solid 1px; padding: 5px">
	<table width="100%">
			<tr>
				<td style="width: 10mm; margin: 0,01mm;"><img src="<?php echo base_url('upload/aknbjn.png');?>" style="width: 30px; height: 30px"></td>
				<td colspan="4" align="left" style="font-size: 10px">AKADEMI KOMUNITAS NEGERI BOJONEGORO<br><span style="font-size: 9px">HMJ <?php echo $namajur.' '.$thn; ?></span></td>
				<td ><img src="<?php echo base_url('upload/'.$jurusan['logo_campaign']);?>" style="width: 30px; height: 30px"></td>
			</tr>
			<tr>
				<td colspan="6">=====================================</td>
			</tr>
			<tr>
				<td colspan="6"><center><b><u>KARTU PEMILIH</u></b><br><br></center></td>
			</tr>
			<tr style="font-size: 8px">
				<td colspan="2" rowspan="5"><img src="<?php if($foto!=null){echo base_url('upload/'.$foto);}else{ if($jk=='L'){echo base_url('upload/l.png');}else{echo base_url('upload/p.png');}};?>" style="width: 45px; height: 61px"></td>
				<td style="font-size: 12px">ID</td>
				<td>:</td>
				<td><b style="font-size: 12px"><?php echo $row->id_user;?></b></td>
			<tr>
			<tr>
				<td style="font-size: 9px">Nama</b></td>
				<td style="font-size: 8px">:</td>
				<td colspan="2"><b style="font-size: 8px"><?php echo $nama;?></b></td>
			</tr>
			<tr>
				<td style="font-size: 10px">Pass</td>
				<td>:</td>
				<td><b style="font-size: 12px"><?php echo $row->password;?></b></td>
			</tr>
			<tr>
				<td style="font-size: 7px">Waktu</td>
				<td style="font-size: 5px">:</td>
				<td colspan="2" style="font-size: 6.2px"><?php echo dt($jam['mulai']).'<i> s/d </i>'.dt($jam['selesai']);?></td>
			</tr>
		</table>
</div>
<?php endforeach;?>
</div></center>
<input type="button" style="font-size: 20px" onClick="window.print();" value="Cetak"/>
<?php echo "<script>alert('Gunakan Kertas A4 agar hasil cetakan sesuai!');</script>"; ?>