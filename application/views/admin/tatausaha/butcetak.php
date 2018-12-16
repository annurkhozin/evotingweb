<div class="modal hide fade" id="cetak">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">�</button>
		<h3>Cetak <?php echo $langit;?></h3>
	</div>
	<div class="modal-body"><center>
		<label class="span1"></label>
		<a href="<?php echo site_url(enkripsi('tatausaha','cetak'));?>"class="quick-button metro purple span2">
			<i class="icon-print"></i>
			<h4>Cetak</h4>
		</a>
		<a href="<?php echo site_url(enkripsi('tatausaha','ekspor'));?>"class="quick-button metro green span2">
			<i class="icon-file-alt"></i>
			<h4>Excel</h4>
		</a>
	</center>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>
