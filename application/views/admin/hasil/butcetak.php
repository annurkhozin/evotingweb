<div class="modal hide fade" id="cetak">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">x</button>
		<h3>Cetak <?php echo $langit;?></h3>
	</div>
	<div class="modal-body"><center>
		<span class="span2"></span>
		<a href="<?php echo site_url('hasil/cetak/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>"class="quick-button metro purple span3">
			<i class="icon-print"></i>
			<h4>Cetak</h4>
		</a>
	</center>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>
