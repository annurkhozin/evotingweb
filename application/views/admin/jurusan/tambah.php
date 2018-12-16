<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form action="<?php echo site_url('jurusan/importdata')?>" method="post" enctype="multipart/form-data" role="form">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Import <?php echo $langit;?></label>
				<div class="controls">
					<input type="file" id="import" name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
					<button type="submit" name="save" class="btn btn-md btn-primary"><span class="halflings-icon white ok"></span> Import</button>
				</div>
			</div>
		</form><br /><br /><br /><br />
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('jurusan','tambah'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Jurusan</label>
				<div class="controls">
					<input type="text" name="id" data-validation-required-message="Harus Diisi" placeholder="ID Jurusan" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Jurusan</label>
				<div class="controls">
					<input type="text" name="nama" data-validation-required-message="Harus Diisi" placeholder="Nama Jurusan" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Logo Jurusan</label>
				<div class="controls">
					<input type="file" name="file" required>
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-primary"><span class="halflings-icon white ok"></span> Simpan Data</button>
		</form>
	</div>
</div>
