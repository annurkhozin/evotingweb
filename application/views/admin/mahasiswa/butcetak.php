<div class="modal hide fade" id="cetak">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Cetak <?php echo $langit;?></h3>
	</div>
	<div class="modal-body"><center>
		<label class="span3"></label>
		<a href="<?php echo site_url(enkripsi('mahasiswa','cetak'));?>"class="quick-button metro purple span3">
			<i class="icon-print"></i>
			<h4>Cetak</h4>
		</a>
		<a href="<?php echo site_url(enkripsi('mahasiswa','ekspor'));?>"class="quick-button metro green span3">
			<i class="icon-file-alt"></i>
			<h4>Excel</h4>
		</a>
	</center>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>
