<?php $no=0; foreach($calon as $row): $no++?>
<div class="modal hide fade " id="nonaktifkan<?php echo $row->id_calon;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Edit <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('calon','nonaktifkan'));?>" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Campaign</label>
				<div class="controls">
					<?php $cmp=$this->uri->segment(3); $camps=$this->m_campaign->cek_id($cmp)->row_array(); $in=$camps['id_campaign'];$nm=$camps['nama_campaign'];?>
					<input type="text" readonly value="<?php echo $nm;?>" class="span10" required>
					<input type="hidden" name="camp" value="<?php echo $in;?>">
					<input type="hidden" name="id_cal" value="<?php echo $row->id_calon;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tahun Pemilihan </label>
				<div class="controls">
					<input type="text" readonly name="thn" class="span10" value="<?php echo $row->tahun;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">No Urut <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" name="no" readonly class="span10" value="<?php echo $row->no_urut;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Nama Mahasiswa</label>
				<div class="controls">
					<input type="text" name="no" readonly class="span10" value="<?php echo $row->nim.' - '.$row->nama_mahas;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gambar</label>
				<div class="controls">
					<img src="<?php echo base_url('upload/'.$row->gambar);?>" height="200px" width="150px">
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<button type="submit" class="btn btn-md btn-danger"><span class="halflings-icon white edit"></span> Nonaktifkan Data</button>
		</form>
	</div>
</div>
<?php endforeach;?>