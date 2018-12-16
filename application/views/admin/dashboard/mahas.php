<div id="content" class="span10">
	<ul class="breadcrumb">
		<li><?php $this->load->view('admin/breadcumb.php');?></li>
	</ul>
	<a class="btn btn-md btn-info tooltipsku" href="#editmahas<?php echo $mahas['nim'];?>" data-toggle="modal"
		title="<?php echo 'Edit Data - '.$mahas['nama_mahas'];?>"><i class="halflings-icon white edit"></i> Edit Data</a>
	<a class="btn btn-md btn-success tooltipsku" href="#editpass<?php echo $mahas['nim'];?>" data-toggle="modal"
		title="<?php echo 'Edit Username dan Password - '.$mahas['nama_mahas'];?>"><i class="halflings-icon white edit"></i> Edit Password</a>
	</br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<?php $data=$this->session->flashdata('m_sukses');
			if($data!=null){
				echo "<div class='alert alert-success'><strong>Sukses!</i></strong>
					".$data."
				</div>";
			} 
			$data2=$this->session->flashdata('m_error');
			if($data2!=null){
				echo "<div class='alert alert-error'><strong>Error!</strong>
					".$data2."
				</div>";
			}?>
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-screenshot"></i><span class="break"></span> Profil </h2>
			</div></br></br>
			<div class="box-content">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="disabledInput">NIM Mahasiswa</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['nim'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Nama Mahasiswa</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['nama_mahas'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Tahun Masuk</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['thn_masuk'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Jalan</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['jalan'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">RT</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['rt'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">RW</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['rw'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Desa</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['desa'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Kecamatan</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['kec'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Kota</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['kota'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Kode Pos</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['kode_pos'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Provinsi</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['provinsi'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Kota Lahir</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['kota_lahir'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Tanggal Lahir</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['tgl_lahir'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">No HP / Phone</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['phone'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Golongan Darah</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['gol_darah'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Jenis Kelamin</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['jk'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Agama</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['agama'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Nama Bapak</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['nama_bpk'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Nama Ibu</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['nama_ibu'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Pendidikan Bapak</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['didik_bpk'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Pendidikan Ibu</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['didik_ibu'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Pekerjaan Bapak</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['kerja_bpk'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Pekerjaan Ibu</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['kerja_ibu'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Penghasilan Bapak</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['hasil_bpk'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Penghasilan Ibu</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['hasil_ibu'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Anak Ke</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['anak_ke'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Jumplah Saudara</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['jml_saudara'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Jurusan Asal</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['jurusan_asal'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Asal Sekolah</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['asal_sekolah'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Kota Sekolah Asal</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $mahas['kota_sekolah'];?>" disabled>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div><!--/row-->
</div><!--/.fluid-container-->
<?php $this->load->view('admin/dashboard/editmahas.php');
	  $this->load->view('admin/dashboard/editpass.php');?>