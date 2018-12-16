<!--baris ini adalah modal untuk hapus pejabat-->
<?php $no=0; foreach($akses as $row): $no++?>
<div class="modal hide fade " id="aktifkan<?php echo $row->Id_akses;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Aktifkan <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('akses/aktifkan');?>" method="post">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">ID <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->Id_akses;?>" name="id" data-validation-required-message="Harus Diisi" class="span8" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3"><?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="nama" readonly value="<?php echo $row->nm_akses;?>" class="span8" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Bobot</label>
				<div class="controls">
					<input type="text" name="nama" readonly value="<?php echo $row->bobot;?>" class="span8" required>
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-success"><span class="halflings-icon white star"></span> Aktifkan</button>
		</form>
	</div>
</div>
<?php endforeach;?>
