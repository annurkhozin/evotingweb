<?php $no=0; foreach($tatausaha as $row): $no++?>
<div class="modal hide fade " id="aktifkantu<?php echo $row->id_tu;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Aktifkan <?php echo $katalangit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('tatausaha','aktifkan'));?>" method="post">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Tata Usaha</label>
				<div class="controls">
					<input type="text" readonly name="id[]" readonly value="<?php echo $row->id_tu;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Tata Usaha</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->nama_tu;?>" class="span10">
				</div>
			</div>		
			<div class="control-group">
				<label class="span1"></label><label class="span3">Email</label>
				<div class="controls">
					<input type="text" readonly name="email" placeholder="Email" class="span10" value="<?php echo $row->email;?>">
				</div>
			</div>			
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gambar</label>
				<div class="controls">
					<img src="<?php echo base_url('upload/'.$row->foto);?>" height="150px" width="150px">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tempat Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->tmp_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->tgl_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jenis Kelamin</label>
				<div class="controls">
					<input type="text" readonly value="<?php $a=$row->jk; if($a='L'){echo "Laki-laki";}elseif($a='P'){echo "Perempusan";}else{echo "-";}?>" class="span10">
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Agama</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->agama;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Terakhir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->pendidikan_akhir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Alamat</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->alamat;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Status Kepegawaian</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->status_pegawai;?>" class="span10">
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