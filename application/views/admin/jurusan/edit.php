<?php $no=0; foreach($jurus as $row): $no++?>
<div class="modal hide fade " id="edit<?php echo $row->id_jur;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('jurusan','edit'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Jurusan</label>
				<div class="controls">
					<input type="text" name="id" readonly value="<?php echo $row->id_jur;?>" data-validation-required-message="Harus Diisi" placeholder="NIM Dosen" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Jurusan</label>
				<div class="controls">
					<input type="text" name="nama" value="<?php echo $row->nama_jur;?>" data-validation-required-message="Harus Diisi" placeholder="Nama Dosen" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Logo Jurusan</label>
				<div class="controls">
					<img src="<?php echo base_url('upload/'.$row->logo_jur);?>" height="150px" width="150px"><input type="file" name="file">
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-info"><span class="halflings-icon white edit"></span> Edit Data</button>
		</form>
	</div>
</div>
<?php endforeach;?>
