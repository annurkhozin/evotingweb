<div class="modal hide fade " id="tambah">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Tambah <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
	<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('calon','tambah'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Campaign</label>
				<div class="controls">
					<?php $cmp=$this->uri->segment(3); $camp=$this->m_campaign->cek_id($cmp)->row_array(); $in=$camp['id_campaign'];$nm=$camp['nama_campaign'];?>
					<input type="text" readonly value="<?php echo $nm;?>" class="span10" required>
					<input type="hidden" name="camp" value="<?php echo $in;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Pemilihan </label>
				<div class="controls">
					<input readonly type="text" name="thn" value="<?php $thn=$this->uri->segment(4); echo $thn;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">No Urut <?php echo $langit;?></label>
				<div class="controls">
					<?php $nomorurut=$this->db->select_max('no_urut')->where(array('id_campaign'=>$in, 'tahun'=>$thn))->get('calon')->row_array();?>
					<input type="text" name="no" class="span10" placeholder="Nomor Urut Calon" value="<?=$nomorurut['no_urut']+1?>" readonly required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Mahasiswa</label>
				<div class="controls">
					<select required name="nim" style="width:490px;" data-rel="chosen" >
						<option value="">--Ketikkan NIM Atau Nama--</option>
						<?php
							foreach($mahasiswa->result_array() as $j)
							{ echo "<option value='".$j['nim']."'> ".$j['nim']." - ".$j['nama_mahas']."</option>"; }
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Visi Misi</label>
				<div class="controls">
					<textarea name="visimisi" class="span10" placeholder="Visi dan Misi"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gambar</label>
				<div class="controls">
					<input type="file" name="file" required>
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
