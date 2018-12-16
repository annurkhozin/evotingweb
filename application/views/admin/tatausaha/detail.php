<?php $no=0; foreach($tatausaha as $tu): $no++?>
<div class="modal hide fade " id="detail<?php echo $tu->id_tu;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Detail Data <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','tambahtu'));?>" method="post">
			<?php if($this->uri->segment(4)==null){}else{ $jrs=$this->uri->segment(3);$thn=$this->uri->segment(4);
				echo'<input type="hidden" name="id[]" value="'.$tu->id_tu.'">
					 <input type="hidden" name="namajur" value="'.$this->m_jurusan->cek_id($jrs)->row_array()['nama_jur'].'">
					 <input type="hidden" name="jur" value="'.$jrs.'">
					 <input type="hidden" name="thn" value="'.$thn.'">';
			}?>
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Tata Usaha</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->id_tu;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Tata Usaha</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->nama_tu;?>" class="span10">
				</div>
			</div>		
			<div class="control-group">
				<label class="span1"></label><label class="span3">Email</label>
				<div class="controls">
					<input type="text" readonly name="email" placeholder="Email" class="span10" value="<?php echo $row->email;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gambar</label>
				<div class="controls">
					<img src="<?php echo base_url('upload/'.$tu->foto);?>" height="150px" width="150px">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tempat Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->tmp_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->tgl_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jenis Kelamin</label>
				<div class="controls">
					<input type="text" readonly value="<?php $a=$tu->jk; if($a='L'){echo "Laki-laki";}elseif($a='P'){echo "Perempusan";}else{echo "-";}?>" class="span10">
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Agama</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->agama;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Terakhir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->pendidikan_akhir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Alamat</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->alamat;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Status Kepegawaian</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $tu->status_pegawai;?>" class="span10">
				</div>
			</div>
			</br>
			</br>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<?php if($this->uri->segment(4)==null){ }else{ echo'
		<button type="submit" class="btn btn-md btn-info"><span class="halflings-icon white plus"></span> Tambahkan</button>';
		}?>
		</form>
	</div>
</div>
<?php endforeach;?>
