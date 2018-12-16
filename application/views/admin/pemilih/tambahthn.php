<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('assets/date/jquery-ui.css');?>" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('assets/date/jquery-ui-timepicker-addon.css');?>" />
<script type="text/javascript" src="<?php echo base_url('assets/date/jquery-1.10.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/date/jquery-ui.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/date/jquery-ui-timepicker-addon.js');?>"></script>
<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
	<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','tambahthn'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Campaign</label>
				<div class="controls">
					<?php $camp=$this->uri->segment(3); $campg=$this->m_campaign->cek_id($camp)->row_array(); $in=$campg['id_campaign'];$nm=$campg['nama_campaign'];?>
					<input type="text" name="namacamp" readonly value="<?php echo $nm;?>" class="span10" required>
					<input type="hidden" name="id_campaign" value="<?php echo $in;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Pemilihan </label>
				<div class="controls">
					<select name="thn" style="width:475px;" data-rel="chosen">
						<option value="">Tahun Pemilihan..?</option>
						<?php
							for($i=date('Y'); $i<=date('Y')+5; $i+=1){
								echo"<option value='$i'> $i </option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Mulai Pemilihan</label>
				<div class="controls">
					<input type="text" name="tgl_mulai" class="span10" id="datepicke1" name="datepicker" placeholder="Mulai Pemilihan" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Selesai Pemilihan</label>
				<div class="controls">
					<input type="text" name="tgl_mari" class="span10" id="datepicke2" name="datepicker" placeholder="Selesai Pemilihan" required>
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
<script>
var $jnoc = jQuery.noConflict();
  $jnoc(document).ready(function(){
	$jnoc('#datepicke1').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm:ss',
	stepHour: 1,
	stepMinute: 1,
	stepSecond: 1
	});
	$jnoc('#datepicke2').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm:ss',
	stepHour: 1,
	stepMinute: 1,
	stepSecond: 1
	});
  });
  </script>