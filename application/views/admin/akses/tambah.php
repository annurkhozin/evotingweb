<!--baris ini adalah modal untuk tambah pejabat-->
<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('akses/tambah');?>" method="post">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">ID <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="id" data-validation-required-message="Harus Diisi" class="span8" required autofocus autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3"><?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="nama" class="span8" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Bobot</label>
				<div class="controls">
					<select required name="bobot" class="span8">
						<option value="">Bobot Penilaian</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
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
