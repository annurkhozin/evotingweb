<div class="modal hide fade " id="editpass<?php echo $passtu['id_user'];?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit Username Password</h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('dashboard/editpass/'.$passtu['id_user']);?>" method="post">
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID </label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $passtu['id_user'];?>" class="span10">
					<input type="hidden" value="<?php echo $passtu['id_akses'];?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Username</label>
				<div class="controls">
					<input type="text" required name="username" value="<?php echo $passtu['username'];?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Password Lama</label>
				<div class="controls">
					<input type="password" required name="password" placeholder="Password Lama" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Password Baru</label>
				<div class="controls">
					<input type="password" required name="password1" placeholder="Password Baru" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Konfirmasi Password Baru</label>
				<div class="controls">
					<input type="password" required name="password2" placeholder="Password Baru" class="span10">
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