<div id="content" class="span10">
	<ul class="breadcrumb">
		<li><?php $this->load->view('admin/breadcumb.php');?></li>
	</ul>
	<a class="btn btn-md btn-info tooltipsku" href="#edittu<?php echo $tu['id_tu'];?>" data-toggle="modal"
		title="<?php echo 'Edit Data - '.$tu['nama_tu'];?>"><i class="halflings-icon white edit"></i> Edit Data</a>
	<a class="btn btn-md btn-success tooltipsku" href="#editpass<?php echo $tu['id_tu'];?>" data-toggle="modal"
		title="<?php echo 'Edit Username dan Password - '.$tu['nama_tu'];?>"><i class="halflings-icon white edit"></i> Edit Password</a>
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
					<label class="control-label" for="disabledInput">ID Tata Usaha</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['id_tu'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Nama Tata Usaha</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['nama_tu'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Tempat Lahir</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['tmp_lahir'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Tanggal Lahir</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['tgl_lahir'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Jenis Kelamin</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['jk'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Agama</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['agama'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Pendidikan Akhir</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['pendidikan_akhir'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Alamat</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['alamat'];?>" disabled>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="disabledInput">Status Kepegawaian</label>
					<div class="controls">
						<input class="span10" id="disabledInput" type="text" value="<?php echo $tu['status_pegawai'];?>" disabled>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div><!--/row-->
</div><!--/.fluid-container-->
<?php $this->load->view('admin/dashboard/edittu.php');
	  $this->load->view('admin/dashboard/editpass.php');?>