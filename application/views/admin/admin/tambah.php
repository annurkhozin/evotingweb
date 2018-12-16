<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('admin','tambah'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Pilih <?php echo $langit;?></label>
				<div class="controls">
					<select id="sela" required name="id" style="width:490px;" class="span10" data-rel="chosen">
						<option  value="">Pilih Admin</option>
							<?php
								$tu=$this->m_tatausaha->ambil_data();
								foreach($tu->result_array() as $s)
								{ echo "<option value='".$s['id_tu']."'>Tata Usaha - ".$s['id_tu']." - ".$s['nama_tu']."</option>";}
							?>
							<?php
								$dos=$this->m_dosen->ambil_data();
								foreach($dos->result_array() as $s)
								{ echo "<option value='".$s['id_dos']."'>Dosen - ".$s['id_dos']." - ".$s['nama_dos']."</option>"; }
							?>
							<?php
								$maha=$this->m_mahasiswa->ambil_data(1);
								foreach($maha->result_array() as $s)
								{ echo "<option value='".$s['nim']."'>Mahasiswa - ".$s['nim']." - ".$s['nama_mahas']."</option>"; }
							?>
					</select>
				</div>
			</div>
			<div id="tampil">
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Username </label>
				<div class="controls">
					<input type="text" name="username" placeholder="Username" data-validation-required-message="Harus Diisi" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Password </label>
				<div class="controls">
					<input type="password" name="password1" placeholder="Password" data-validation-required-message="Harus Diisi" class="span10" required autocomplete='off'>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Confir Password </label>
				<div class="controls">
					<input type="password" name="password2" placeholder="Konfirmasi Password" data-validation-required-message="Harus Diisi" class="span10" required autocomplete='off'>
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
<script type="text/javascript">
	$(document).ready(function(){
		$("#sela").change(function(){
			var coba = $("#sela").val();
			$.ajax({
				type: "POST",
				url : "<?php echo site_url('admin/loadcoy');?>",
				data: "coba="+coba,
				cache:false,
				success: function(data){
					$('#tampil').html(data);
				}
			});
		});
	})
</script>