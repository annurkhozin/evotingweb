<!--baris ini adalah modal untuk edit akses-->
<?php $no=0; foreach($akses as $row): $no++?>
<div class="modal hide fade " id="edit<?php echo $row->Id_akses;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('akses/edit');?>" method="post">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">ID <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->Id_akses;?>" name="id" data-validation-required-message="Harus Diisi" class="span8" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3"><?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="nama" value="<?php echo $row->nm_akses;?>" class="span8" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Bobot</label>
				<div class="controls">
					<select required name="bobot" class="span8">
						<?php echo $row->bobot;?>
						<option <?php if($row=="0"){ echo "selected";}?> value="0">0</option>
						<option <?php if($row=="1"){ echo "selected";}?> value="1">1</option>
						<option <?php if($row=="2"){ echo "selected";}?> value="2">2</option>
						<option <?php if($row=="3"){ echo "selected";}?> value="3">3</option>
						<option <?php if($row=="4"){ echo "selected";}?> value="4">4</option>
					</select>
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
