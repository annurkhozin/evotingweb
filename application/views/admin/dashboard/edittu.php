<div class="modal hide fade " id="edittu<?php echo $tu['id_tu'];?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit Profil</h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('tatausaha/edit/'.$tu['id_tu']);?>" method="post">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Tata Usaha</label>
				<div class="controls">
					<input type="text" name="id" readonly value="<?php echo $tu['id_tu'];?>" data-validation-required-message="Harus Diisi" placeholder="ID Tata Usaha" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Tata Usaha</label>
				<div class="controls">
					<input type="text" name="nama" value="<?php echo $tu['nama_tu'];?>" data-validation-required-message="Harus Diisi" placeholder="Nama Tata Usaha" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tempat Lahir</label>
				<div class="controls">
					<input type="text" name="tlahir" value="<?php echo $tu['tmp_lahir'];?>" placeholder="Tempat Lahir" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" name="tglahir" value="<?php echo $tu['tgl_lahir'];?>" class="input-xlarge datepicker span10"  placeholder="Tanggal Lahir" id="date01" >
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jenis Kelamin</label>
				<div class="controls">
					<select name="jk" class="span10">
						<option value="<?php echo $tu['jk'];?>"><?php $a=$tu['jk']; if($a='L'){echo "Laki-laki";}elseif($a='P'){echo "Perempusan";}else{echo "-";}?></option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Agama</label>
				<div class="controls">
					<select name="agm" class="span10">
						<option value="<?php echo $tu['agama'];?>"><?php echo $tu['agama'];?></option>
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
					<input type="text" name="diakhir" value="<?php echo $tu['pendidikan_akhir'];?>" placeholder="Pendidikan Terakhir" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Alamat</label>
				<div class="controls">
					<input type="text" name="almat" value="<?php echo $tu['alamat'];?>"placeholder="Alamat Tata Usaha" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Status Kepegawaian</label>
				<div class="controls">
					<select name="peg" class="span10">
						<option value="<?php echo status_pegawai;?>"><?php echo $tu['status_pegawai'];?></option>
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
		<button type="submit" class="btn btn-md btn-info"><span class="halflings-icon white edit"></span> Edit Data</button>
		</form>
	</div>
</div>