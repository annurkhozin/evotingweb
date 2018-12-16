<?php $no=0; foreach($admin as $row): $no++?>
<div class="modal hide fade " id="nonaktifkan<?php echo $row->id_user;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Nonaktifkan <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('admin/nonaktifkan');?>" method="post">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">ID <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $idu=$row->id_user;?>" name="id" data-validation-required-message="Harus Diisi" class="span8" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Nama <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="nama" readonly
					value="<?php	$jr=$this->m_campaign->cek_id($row->id_campaign)->row_array();
									$hak=$this->m_admin->cek_hak($idu)->row_array();
									$cek_tu=$this->m_tatausaha->ambil_data_aktif($idu)->row_array();
									$cek_dos=$this->m_dosen->ambil_data_aktif($idu)->row_array();
									$cek_mahas=$this->m_mahasiswa->ambil_data_aktif($idu)->row_array();
									if($cek_tu>0){
										$nama=$cek_tu['nama_tu'];
									}elseif($cek_dos>0){
										$nama=$cek_dos['nama_dos'];
									}elseif($cek_mahas>0){
										$nama=$cek_mahas['nama_mahas'];
									}
									echo $nama; ?>" class="span8" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Status Akses </label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $hak['nama_akses'];?>" class="span8" required>
				</div>
			</div>
			<?php if($row->id_akses=='admin'){ ?>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Admin Campaign </label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $jr['nama_campaign'];?>" class="span8" required>
				</div>
			</div>
			<?php }?>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Username </label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->username;?>" class="span8" required>
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-danger"><span class="halflings-icon white trash"></span> Nonaktifkan</button>
		</form>
	</div>
</div>
<?php endforeach;?>