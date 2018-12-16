<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form action="<?php echo site_url('dosen/importdata')?>" method="post" enctype="multipart/form-data" role="form">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Import <?php echo $langit;?></label>
				<div class="controls">
					<input type="file" id="import" name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
					<button type="submit" name="save" class="btn btn-md btn-primary"><span class="halflings-icon white ok"></span> Import</button>
				</div>
			</div>
		</form><br /><br /><br /><br />
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('dosen','tambah'));?>" method="post"  enctype="multipart/form-data" >
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Dosen</label>
				<div class="controls">
					<input type="text" name="id" data-validation-required-message="Harus Diisi" placeholder="ID Dosen" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Dosen</label>
				<div class="controls">
					<input type="text" name="nama" data-validation-required-message="Harus Diisi" placeholder="Nama Dosen" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Email</label>
				<div class="controls">
					<input type="text" name="email" placeholder="Email" class="span10" autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gambar</label>
				<div class="controls">
					<input type="file" name="file">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tempat Lahir</label>
				<div class="controls">
					<input type="text" name="tlahir" placeholder="Tempat Lahir" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" name="tglahir" class="input-xlarge datepicker span10"  placeholder="Tanggal Lahir" id="date01" >
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jenis Kelamin</label>
				<div class="controls">
					<select name="jk" class="span10">
						<option value="">Jenis Kelamin ?</option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Agama</label>
				<div class="controls">
					<select name="agm" class="span10">
						<option value="">Agama ?</option>
						<option value="Islam">Islam</option>
						<option value="Bhuda">Bhuda</option>
						<option value="Kristen">Kristen</option>
						<option value="Katholik">Katholik</option>
						<option value="Hindu">Hindu</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Terakhir</label>
				<div class="controls">
					<input type="text" name="diakhir" placeholder="Pendidikan Terakhir" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Alamat</label>
				<div class="controls">
					<input type="text" name="almat" placeholder="Alamat Dosen" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Status Kepegawaian</label>
				<div class="controls">
					<select name="peg" class="span10">
						<option value="">Status Kepegawaian?</option>
						<option value="PNS">PNS</option>
						<option value="GTT">GTT</option>
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
