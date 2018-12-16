<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<div class="control-group">
	<label class="span1"></label>
	<label class="span3">Status Akses</label>
	<div class="controls">
		<select id="sela2" required name="akses" class="span10">
			<option  value="">Status Akses</option>
			<option  value="admin">Admin</option>
			<option  value="super">SuperAdmin</option>
		</select>
	</div>
</div>
<div id="tampil2">
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#sela2").change(function(){
			var coba2 = $("#sela2").val();
			$.ajax({
				type: "POST",
				url : "<?php echo site_url('admin/loadcoy2');?>",
				data: "coba2="+coba2,
				cache:false,
				success: function(data){
					$('#tampil2').html(data);
				}
			});
		});
	})
</script>