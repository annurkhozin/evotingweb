<?php $campaign = $this->db->where('status_campaign',1)->get('campaign')->result();
$no=0; foreach($campaign as $row): $no++?>
<div class="modal hide fade " id="nonaktifkan<?php echo $row->id_campaign;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Nonaktifkan <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('campaign','nonaktifkan'));?>" method="post">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Campaign</label>
				<div class="controls">
					<input type="text" readonly name="id" readonly value="<?php echo $row->id_campaign;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Campaign</label>
				<div class="controls">
					<input type="text" readonly name="nama" value="<?php echo $row->nama_campaign;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Keterangan Campaign</label>
				<div class="controls">
					<textarea name="keterangan" readonly class="span10" placeholder="Keterangan Campaign" autocomplete='off'><?php echo $row->keterangan_campaign;?></textarea>
				</div>
			</div>
			<br>
			<br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-danger"><span class="halflings-icon white trash"></span> Nonaktifkan</button>
		</form>
	</div>
</div>
<?php endforeach;?>
