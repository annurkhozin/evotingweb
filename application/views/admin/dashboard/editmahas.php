<div class="modal hide fade " id="editmahas<?php echo $mahas['nim'];?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit Profil</h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('mahasiswa/edit/'.$mahas['nim']);?>" method="post">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">NIM <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $mahas['nim'];?>" name="nim" data-validation-required-message="Harus Diisi" class="span10" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Nama</label>
				<div class="controls">
					<input type="text" name="nama" value="<?php echo $mahas['nama_mahas'];?>" data-validation-required-message="Harus Diisi" placeholder="Nama Mahasiswa" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Masuk</label>
				<div class="controls">
					<select required name="thnm" class="span10">
						<option value="<?php echo $mahas['thn_masuk'];?>"><?php echo $mahas['thn_masuk'];?></option>
						<?php
							for($i=date('Y'); $i>=date('Y')-20; $i-=1){
								echo"<option value='$i'> $i </option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Jalan</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['jalan'];?>" name="jln" placeholder="Jalan" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">RT</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['rt'];?>" name="rt" placeholder="RT" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">RW</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['rw'];?>" name="rw" placeholder="RW" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Desa</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['desa'];?>" name="ds" placeholder="Desa" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Kecamatan</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['kec'];?>" name="kec" placeholder="Kecamatan" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Kota</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['kota'];?>" name="kot" placeholder="Kota / Kabupaten" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Kode Pos</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['kode_pos'];?>" name="pos" placeholder="Kode Pos" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Provinsi</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['provinsi'];?>" name="prov" placeholder="Provinsi" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Kota Lahir</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['kota_lahir'];?>" name="kotlah" placeholder="Kota Lahir" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['tgl_lahir'];?>" name="tglhir" class="input-xlarge datepicker span10"  placeholder="Tanggal Lahir" id="date01" >
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Phone</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['phone'];?>" name="hp" placeholder="Phone / HP" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gol Darah</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['gol_darah'];?>" name="godar" placeholder="Golongan Darah" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Jenis Kelamin</label>
				<div class="controls">
					<select name="jk" class="span10">
						<option value="<?php echo $mahas['jk'];?>"><?php $a=$mahas['jk']; if($a='L'){echo "Laki-laki";}elseif($a='P'){echo "Perempusan";}else{echo "-";}?></option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Agama</label>
				<div class="controls">
					<select name="agm" class="span10">
						<option value="<?php echo $mahas['agama'];?>"><?php echo $mahas['agama'];?></option>
						<option value="Islam">Islam</option>
						<option value="Bhuda">Bhuda</option>
						<option value="Kristen">Kristen</option>
						<option value="Katholik">Katholik</option>
						<option value="Hindu">Hindu</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Nama Bapak</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['nama_bpk'];?>" name="bpk" placeholder="Nama Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Nama Ibu</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['nama_ibu'];?>" name="ibu" placeholder="Nama Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Pendidikan Bapak</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['didik_bpk'];?>" name="dikba" placeholder="Pendidikan Terakhir Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Pendidikan Ibu</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['didik_ibu'];?>" name="dikbu" placeholder="Pendidikan Terakhir Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Pekerjaan Bapak</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['kerja_bpk'];?>" name="kerjaba" placeholder="Pekerjaan Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Pekerjaan Ibu</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['kerja_ibu'];?>" name="kerjabu" placeholder="Pekerjaan Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Penghasilan Bapak</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['hasil_bpk'];?>" name="hasilba" placeholder="Penghasilan Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Penghasilan Ibu</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['hasil_ibu'];?>" name="hasilbu" placeholder="Penghasilan Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Anak Ke</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['anak_ke'];?>" name="ankke" placeholder="Anak Ke" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Jumlah Saudara</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['jml_saudara'];?>" name="saudara" placeholder="Jumlah Saudara" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Jurusan Asal</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['jurusan_asal'];?>" name="jursal" placeholder="Jurusan Asal" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Asal Sekolah</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['asal_sekolah'];?>"name="asalsek" placeholder="Asal Sekolah" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Kota Sekolah</label>
				<div class="controls">
					<input type="text" value="<?php echo $mahas['kota_sekolah'];?>" name="kotsek" placeholder="Kota Sekolah" class="span10">
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