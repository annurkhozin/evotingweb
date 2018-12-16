<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('assets/date/jquery-ui.css');?>" />
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('assets/date/jquery-ui-timepicker-addon.css');?>" />
<script type="text/javascript" src="<?php echo base_url('assets/date/jquery-1.10.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/date/jquery-ui.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/date/jquery-ui-timepicker-addon.js');?>"></script>
<?php $no=0; foreach($tahun as $t): $no++?>
<div class="modal hide fade " id="editthn<?php echo $t->tahun;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit Tahun Pemilihan</h3>
	</div>
	<div class="modal-body">
	<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','editthn'));?>" method="post" enctype="multipart/form-data">
			<input type="hidden" readonly name="hal" value="<?php echo $this->uri->segment(1);?>">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Pemilihan </label>
				<div class="controls">
					<input type="text" readonly name="thn" class="span10" name="datepicker" value="<?php echo $t->tahun;?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Campaign</label>
				<div class="controls">
					<?php $cmp=$this->uri->segment(3); $camp=$this->m_campaign->cek_id($cmp)->row_array(); $in=$camp['id_campaign'];$nm=$camp['nama_campaign'];?>
					<input type="text" name="namacamp" readonly value="<?php echo $nm;?>" class="span10" required>
					<input type="hidden" name="camp" value="<?php echo $in;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Mulai Pemilihan</label>
				<div class="controls">
					<input type="text" name="tgl_mulai" class="span10" id="datepicke3<?php echo $no;?>" name="datepicker" value="<?php echo $t->mulai;?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Selesai Pemilihan</label>
				<div class="controls">
					<input type="text" name="tgl_mari" class="span10" id="datepicke4<?php echo $no;?>" name="datepicker"value="<?php echo $t->selesai;?>" required>
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-primary"><span class="halflings-icon white edit"></span> Edit</button>
		</form>
	</div>
</div>
<?php endforeach;?>
<script>
var $jnoc = jQuery.noConflict();
  $jnoc(document).ready(function(){ 
<?php $nod=0; foreach($tahun as $t): $nod++?>
	$jnoc('#datepicke3<?php echo $nod;?>').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm:ss',
	stepHour: 1,
	stepMinute: 1,
	stepSecond: 1
	});
	$jnoc('#datepicke4<?php echo $nod;?>').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: 'HH:mm:ss',
	stepHour: 1,
	stepMinute: 1,
	stepSecond: 1
	});
<?php endforeach;?>
  });
  </script>