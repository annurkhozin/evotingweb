<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<?php $no=0; foreach($admin as $row): $no++?>
<div class="modal hide fade " id="edit<?php echo $row->id_user;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('admin/edit');?>" method="post">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">ID <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $idu=$row->id_user;?>" name="id" class="span10" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3"><?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="nama" readonly
					value="<?php	$jr=$this->m_campaign->cek_id($row->id_campaign)->row_array();
									$hak=$this->m_admin->cek_hak($idu)->row_array(); 
									$cek_tu=$this->m_tatausaha->ambil_data_aktif($idu)->row_array();
									$cek_dos=$this->m_dosen->ambil_data_aktif($idu)->row_array();
									$cek_mahas=$this->m_mahasiswa->ambil_data_aktif($idu)->row_array();
									if($cek_tu>0){
										$nama=$cek_tu['nama_tu'];
									}elseif($cek_dos>0){
										$nama=$cek_dos['nama_dos'];
									}elseif($cek_mahas>0){
										$nama=$cek_mahas['nama_mahas'];
									}
									echo $nama; ?>" class="span10" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Status Akses </label>
				<div class="controls">
					<?php if($cek_mahas>0){ ?>
						<input type="text" readonly value="<?php echo $hak['nama_akses'];?>" name="akses" class="span10">
						<input type="hidden" value="<?php echo $hak['id_akses'];?>" name="akses" class="span10">
					<?php }else{ ?>
						<select id="sel<?php echo $no;?>" required name="akses" class="span10">
							<option value="<?php echo $hak['id_akses'];?>"><?php echo $hak['nama_akses'];?></option>
							<option value="admin">Admin</option>
							<option value="super">SuperAdmin</option>
						</select>
						<input type="hidden" id="idj<?php echo $no;?>" value="<?php echo $jr['id_campaign'];?>" class="span10">
						<input type="hidden" id="nj<?php echo $no;?>" value="<?php echo $jr['nama_campaign'];?>" class="span10">
					<?php }?>
				</div>
			</div>
		<?php if($row->id_akses=='admin'){
			if($cek_mahas>0){ ?>
				<div class="control-group">
					<label class="span1"></label>
					<label class="span3">Admin Campaign </label>
					<div class="controls">
						<input type="text" readonly value="<?php echo $jr['nama_campaign'];?>" class="span10">
						<input type="hidden" name="jur" value="<?php echo $jr['id_campaign'];?>">
					</div>
				</div>
			<?php }else{ ?>
				<div id="tampi<?php echo $no;?>" class="control-group">
					<label class="span1"></label>
					<label class="span3">Admin Campaign</label>
					<div class="controls">
						<select required name="camp" class="span10">
						<option  value="<?php echo $jr['id_campaign'];?>"><?php echo $jr['nama_campaign'];?></option>
						<?php $camp=$this->m_campaign->ambil_data(1); foreach($camp->result_array() as $j)
							{ echo "<option value='".$j['id_campaign']."'>".$j['id_campaign']." - ".$j['nama_campaign']."</option>";}?>
						</select>
					</div>
				</div>
			<?php }
			}elseif($row->id_akses=='super'){ ?>
				<div id="tampi<?php echo $no;?>">
				</div>
			<?php };?>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Username </label>
				<div class="controls">
					<input type="text" value="<?php echo $row->username;?>" name="username" class="span10" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Password Baru</label>
				<div class="controls">
					<input type="password" name="password1" placeholder="Masukkan Password Baru" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Confirm Password </label>
				<div class="controls">
					<input type="password" name="password2" placeholder="Konfirmasi Password Baru" class="span10">
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-info"><span class="halflings-icon white edit"></span> Edit Data</button>
		</form>
	</div>
</div>
<?php endforeach;?>
<script type="text/javascript">
	$(document).ready(function(){
		<?php $nos=0; foreach($admin as $row): $nos++?>
		$("#sel<?php echo $nos;?>").change(function(){
			var idj<?php echo $nos;?> = $("#idj<?php echo $nos;?>").val();
			var nj<?php echo $nos;?> = $("#nj<?php echo $nos;?>").val();
			var coba<?php echo $nos;?> = $("#sel<?php echo $nos;?>").val();
			$.ajax({
				type: "POST",
				url : "<?php echo site_url('admin/loadcoy3');?>",
				data: {"coba":coba<?php echo $nos;?>,"idj":idj<?php echo $nos;?>,"nj":nj<?php echo $nos;?>},
				cache:false,
				success: function(data){
				$('#tampi<?php echo $nos;?>').html(data);
				}
			});
		});
		<?php endforeach;?>
	})
</script>