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
				<label class="span3">Jurusan</label>
				<div class="controls">
					<?php $jrs=$this->uri->segment(3); $jurs=$this->m_jurusan->cek_id($jrs)->row_array(); $in=$jurs['id_jur'];$nm=$jurs['nama_jur'];?>
					<input type="text" readonly value="<?php echo $nm;?>" class="span10" required>
					<input type="hidden" name="jur" value="<?php echo $in;?>">
					<input type="hidden" name="id_cal" value="<?php echo $row->id_calon;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Pemilihan </label>
				<div class="controls">
					<select name="thn" class="span10">
						<option value="<?php echo substr($row->id_calon,0,4);?>"><?php echo substr($row->id_calon,0,4);?></option>
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
					<input type="text" name="no" class="span10" value="<?php echo $row->no_urut;?>" placeholder="Nomor Urut Calon" required>
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
				<label class="span3">Gambar</label>
				<div class="controls">
					<img src="<?php echo base_url('upload/'.$row->gambar);?>" height="150px" width="150px"><input type="file" name="file">
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