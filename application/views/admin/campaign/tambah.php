<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form action="<?php echo site_url('campaign/importdata')?>" method="post" enctype="multipart/form-data" role="form">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Import <?php echo $langit;?></label>
				<div class="controls">
					<input type="file" id="import" name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
					<button type="submit" name="save" class="btn btn-md btn-primary"><span class="halflings-icon white ok"></span> Import</button>
				</div>
			</div>
		</form><br /><br /><br /><br />
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('campaign','tambah'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Campaign</label>
				<div class="controls">
					<input type="text" name="id" data-validation-required-message="Harus Diisi" placeholder="ID Campaign" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Campaign</label>
				<div class="controls">
					<input type="text" name="nama" data-validation-required-message="Harus Diisi" placeholder="Nama Campaign" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Keterangan Campaign</label>
				<div class="controls">
					<textarea name="keterangan" class="span10" placeholder="Keterangan Campaign" autocomplete='off'></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Logo Campaign</label>
				<div class="controls">
					<input type="file" name="file" required>
				</div>
			</div>
			<br>
			<br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-primary"><span class="halflings-icon white ok"></span> Simpan Data</button>
		</form>
	</div>
</div>
