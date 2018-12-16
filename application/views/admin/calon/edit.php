<?php $no=0; foreach($calon as $row): $no++?>
<div class="modal hide fade " id="edit<?php echo $row->id_calon;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('calon','edit'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Campaign</label>
				<div class="controls">
					<?php $cmp=$this->uri->segment(3); $camp=$this->m_campaign->cek_id($cmp)->row_array(); $in=$camp['id_campaign'];$nm=$camp['nama_campaign'];?>
					<input type="text" readonly value="<?php echo $nm;?>" class="span10" required>
					<input type="hidden" name="camp" value="<?php echo $in;?>">
					<input type="hidden" name="id_cal" value="<?php echo $row->id_calon;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Pemilihan </label>
				<div class="controls">
					<input type="hidden" name="thnlama" value="<?php echo $row->tahun;?>">
					<select name="thn"  style="width:475px;" data-rel="chosen">
						<option value="<?php echo $row->tahun;?>"><?php echo $row->tahun;?></option>
						<?php
							for($i=date('Y')-5; $i<=date('Y')+5; $i+=1){
								echo"<option value='$i'> $i </option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">No Urut <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="no" class="span10" value="<?php echo $row->no_urut;?>" readonly placeholder="Nomor Urut Calon" required>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Nama Mahasiswa</label>
				<div class="controls">
					<select required name="nim" style="width:490px;" data-rel="chosen" >
						<option value="<?php echo $row->nim;?>"><?php echo $row->nim.' - '.$row->nama_mahas;?></option>
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
					<textarea name="visimisi" class="span10" placeholder="Visi dan Misi"><?=$row->visimisi?></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gambar</label>
				<div class="controls">
					<img src="<?php echo base_url('upload/'.$row->gambar);?>" height="200px" width="150px">&nbsp;&nbsp;&nbsp;Ubah Foto ...<input type="file" name="file">
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