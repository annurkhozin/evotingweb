<?php $no=0; foreach($dosen as $d): $no++?>
<div class="modal hide fade " id="detail<?php echo $d->id_dos;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Detail Data <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','tambahdos'));?>" method="post">
			<?php if($this->uri->segment(4)==null){}else{ $jrs=$this->uri->segment(3);$thn=$this->uri->segment(4);
				echo'<input type="hidden" name="id[]" value="'.$d->id_dos.'">
					 <input type="hidden" name="namajur" value="'.$this->m_jurusan->cek_id($jrs)->row_array()['nama_jur'].'">
					 <input type="hidden" name="jur" value="'.$jrs.'">
					 <input type="hidden" name="thn" value="'.$thn.'">';
			}?>
			<div class="control-group">
				<label class="span1"></label><label class="span3">ID Dosen</label>
				<div class="controls">
					<input type="text" readonly readonly value="<?php echo $d->id_dos;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Dosen</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $d->nama_dos;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Email</label>
				<div class="controls">
					<input type="text" readonly name="email" placeholder="Email" class="span10" value="<?php echo $d->email;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Gambar</label>
				<div class="controls">
					<img src="<?php echo base_url('upload/'.$d->foto);?>" height="150px" width="150px">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tempat Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $d->tmp_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label>
				<label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $d->tgl_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jenis Kelamin</label>
				<div class="controls">
					<input type="text" readonly value="<?php $a=$d->jk; if($a='L'){echo "Laki-laki";}elseif($a='P'){echo "Perempusan";}else{echo "-";}?>" class="span10">
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Agama</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $d->agama;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Terakhir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $d->pendidikan_akhir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Alamat</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $d->alamat;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Status Kepegawaian</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $d->status_pegawai;?>" class="span10">
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