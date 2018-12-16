<?php $no=0; foreach($jurus as $row): $no++?>
<div class="modal hide fade " id="aktifkan<?php echo $row->id_jur;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Aktifkan <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('jurusan','aktifkan'));?>" method="post">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Jurusan</label>
				<div class="controls">
					<input type="text" readonly name="id" readonly value="<?php echo $row->id_jur;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Jurusan</label>
				<div class="controls">
					<input type="text" readonly name="nama" value="<?php echo $row->nama_jur;?>" class="span10">
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