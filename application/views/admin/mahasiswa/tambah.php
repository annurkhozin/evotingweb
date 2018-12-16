<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form action="<?php echo site_url(enkripsi('mahasiswa','importdata'))?>" method="post" enctype="multipart/form-data" role="form">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Import <?php echo $langit;?></label>
				<div class="controls">
					<input type="file" id="import" name="import" class="form-control" required placeholder="Pilih File"
						accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
					<button type="submit" name="save" class="btn btn-md btn-primary"><span class="halflings-icon white ok"></span> Import</button>
				</div>
			</div>
		</form><br /><br /><br /><br />
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('mahasiswa','tambah'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label><label class="span3">NIM Mahasiswa</label>
				<div class="controls">
					<input type="text" name="nim" data-validation-required-message="Harus Diisi" placeholder="NIM Mahasiswa" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Mahasiswa</label>
				<div class="controls">
					<input type="text" name="nama" data-validation-required-message="Harus Diisi" placeholder="Nama Mahasiswa" class="span10" required autocomplete='off'>
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
				<label class="span1"></label><label class="span3">Jurusan Mahasiswa</label>
				<div class="controls">
					<select required name="jur" class="span10">
					<option  value="">Pilih Jurusan</option>
					<?php $jurs=$this->m_jurusan->ambil_data(1); foreach($jurs->result_array() as $j)
						{ echo "<option value='".$j['id_jur']."'>".$j['id_jur']." - ".$j['nama_jur']."</option>";}?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tahun Masuk</label>
				<div class="controls">
					<select name="thnm" class="span10">
						<option>Tahun Masuk Mahasiswa?</option>
						<?php
							for($i=date('Y'); $i>=date('Y')-20; $i-=1){
								echo"<option value='$i'> $i </option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jalan</label>
				<div class="controls">
					<input type="text" name="jln" placeholder="Jalan" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">RT</label>
				<div class="controls">
					<input type="text" name="rt" placeholder="RT" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">RW</label>
				<div class="controls">
					<input type="text" name="rw" placeholder="RW" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Desa</label>
				<div class="controls">
					<input type="text" name="ds" placeholder="Desa" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kecamatan</label>
				<div class="controls">
					<input type="text" name="kec" placeholder="Kecamatan" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kota</label>
				<div class="controls">
					<input type="text" name="kot" placeholder="Kota / Kabupaten" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kode Pos</label>
				<div class="controls">
					<input type="text" name="pos" placeholder="Kode Pos" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Provinsi</label>
				<div class="controls">
					<input type="text" name="prov" placeholder="Provinsi" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kota Lahir</label>
				<div class="controls">
					<input type="text" name="kotlah" placeholder="Kota Lahir" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" name="tglhir" class="input-xlarge datepicker span10"  placeholder="Tanggal Lahir" id="date01" >
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Phone</label>
				<div class="controls">
					<input type="text" name="hp" placeholder="Phone / HP" class="span10">
				</div>
			</div>
			<div class="control-group"><label class="span1"></label>
				<label class="span3">Gol Darah</label>
				<div class="controls">
					<input type="text" name="godar" placeholder="Golongan Darah" class="span10">
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
				<label class="span1"></label><label class="span3">Nama Bapak</label>
				<div class="controls">
					<input type="text" name="bpk" placeholder="Nama Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Ibu</label>
				<div class="controls">
					<input type="text" name="ibu" placeholder="Nama Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Bapak</label>
				<div class="controls">
					<input type="text" name="dikba" placeholder="Pendidikan Terakhir Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Ibu</label>
				<div class="controls">
					<input type="text" name="dikbu" placeholder="Pendidikan Terakhir Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pekerjaan Bapak</label>
				<div class="controls">
					<input type="text" name="kerjaba" placeholder="Pekerjaan Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pekerjaan Ibu</label>
				<div class="controls">
					<input type="text" name="kerjabu" placeholder="Pekerjaan Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Penghasilan Bapak</label>
				<div class="controls">
					<input type="text" name="hasilba" placeholder="Penghasilan Bapak" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Penghasilan Ibu</label>
				<div class="controls">
					<input type="text" name="hasilbu" placeholder="Penghasilan Ibu" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Anak Ke</label>
				<div class="controls">
					<input type="text" name="ankke" placeholder="Anak Ke" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jumlah Saudara</label>
				<div class="controls">
					<input type="text" name="saudara" placeholder="Jumlah Saudara" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jurusan Asal</label>
				<div class="controls">
					<input type="text" name="jursal" placeholder="Jurusan Asal" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Asal Sekolah</label>
				<div class="controls">
					<input type="text" name="asalsek" placeholder="Asal Sekolah" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kota Sekolah</label>
				<div class="controls">
					<input type="text" name="kotsek" placeholder="Kota Sekolah" class="span10">
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
