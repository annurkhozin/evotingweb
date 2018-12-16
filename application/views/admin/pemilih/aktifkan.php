<?php $no=0; foreach($pemilih as $row): $no++?>
<div class="modal hide fade " id="aktifkan<?php echo $row->id_user;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Nonaktifkan <?php echo $langit;?></h3>
	</div>
	<?php $mahas=$this->m_mahasiswa->cek_id($row->id_user)->row_array();
		$tu=$this->m_tatausaha->cek_id($row->id_user)->row_array();
		$dos=$this->m_dosen->cek_id($row->id_user)->row_array();
		$akses=$this->m_akses->cek_id($row->id_akses)->row_array();
		if($mahas>0){
			$nama=$mahas['nama_mahas'];
			$alm=$mahas['kota'];
			$tgl=$mahas['tgl_lahir'];
		}elseif($tu>0){
			$nama=$tu['nama_tu'];
			$alm=$tu['alamat'];
			$tgl=$tu['tgl_lahir'];
		}if($dos>0){
			$nama=$dos['nama_dos'];
			$alm=$dos['alamat'];
			$tgl=$dos['tgl_lahir'];
		}
	?>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','aktifkan'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">ID Pemilih</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->id_user;?>" class="span10" required>
					<input type="hidden" name="id_pem" value="<?php echo $row->id_pemilih;?>">
					<input type="hidden" name="hal" value="<?php echo $this->uri->segment(2);?>">
					<input type="hidden" name="camp" value="<?php echo $this->uri->segment(3);?>">
					<input type="hidden" name="thn" value="<?php echo $this->uri->segment(4);?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Nama Pemilih </label>
				<div class="controls">
					<input type="text" readonly class="span10" value="<?php echo $nama;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Alamat Pemilih </label>
				<div class="controls">
					<input type="text" readonly class="span10" value="<?php echo $alm;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tanggal Lahir </label>
				<div class="controls">
					<input type="text" readonly class="span10" value="<?php echo $tgl;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Status Pemilih </label>
				<div class="controls">
					<input type="text" readonly class="span10" value="<?php echo $akses['nama_akses'];?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Pemilihan </label>
				<div class="controls">
					<input type="text" readonly class="span10" value="<?php echo $row->tahun;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Status</label>
				<div class="controls">
					<input type="text" name="no" readonly class="span10" value="<?php $s=$row->status; if($s=='0'){echo"Belum";}elseif($s=='2'){echo"Di Nonaktifkan";};?>">
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-success"><span class="halflings-icon white star"></span> Aktifkan Data</button>
		</form>
	</div>
</div>
<?php endforeach;?>