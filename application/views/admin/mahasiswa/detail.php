<?php $no=0; foreach($mahasiswa as $row): $no++?>
<?php $j=$this->m_mahasiswa->amjur($row->nim)->row_array();?>
<div class="modal hide fade " id="detail<?php echo $row->nim;?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Detail Data <?php echo $langit;?></h3>
	</div>
	<div class="modal-body">
		<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','tambahmahas'));?>" method="post">
			<?php if($this->uri->segment(4)==null){}else{ $camp=$this->uri->segment(3);$thn=$this->uri->segment(4);
				echo'<input type="hidden" name="id[]" value="'.$row->nim.'">
					 <input type="hidden" name="namajur" value="'.$this->m_campaign->cek_id($camp)->row_array()['nama_campaign'].'">
					 <input type="hidden" name="jur" value="'.$camp.'">
					 <input type="hidden" name="thn" value="'.$thn.'">';
			}?>
			<div class="control-group">
				<label class="span1"></label><label class="span3">NIM <?php echo $langit;?></label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->nim;?>" name="nim" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->nama_mahas;?>" name="nama" class="span10">
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
					<img src="<?php echo base_url('upload/'.$row->foto);?>" height="150px" width="150px">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jurusan Mahasiswa</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $j['nama_jur'];?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tahun Masuk</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->thn_masuk;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jalan</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->jalan;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">RT</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->rt;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">RW</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->rw;?>" name="rw" placeholder="RW" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Desa</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->desa;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kecamatan</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->kec;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kota</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->kota;?>" name="kot" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kode Pos</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->kode_pos;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Provinsi</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->provinsi;?>" class="span10">
				</div> 
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kota Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->kota_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Tanggal Lahir</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->tgl_lahir;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Phone</label>
				<div class="controls">
					<input type="text"  readonly value="<?php echo $row->phone;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Gol Darah</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->gol_darah;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jenis Kelamin</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->jk;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Agama</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->agama;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Bapak</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->nama_bpk;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Nama Ibu</label>
				<div class="controls">
					<input readonly type="text" value="<?php echo $row->nama_ibu;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Bapak</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->didik_bpk;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pendidikan Ibu</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->didik_ibu;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pekerjaan Bapak</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->kerja_bpk;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Pekerjaan Ibu</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->kerja_ibu;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Penghasilan Bapak</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->hasil_bpk;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Penghasilan Ibu</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->hasil_ibu;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Anak Ke</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->anak_ke;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jumlah Saudara</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->jml_saudara;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Jurusan Asal</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->jurusan_asal;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Asal Sekolah</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->asal_sekolah;?>" class="span10">
				</div>
			</div>
			<div class="control-group">
				<label class="span1"></label><label class="span3">Kota Sekolah</label>
				<div class="controls">
					<input type="text" readonly value="<?php echo $row->kota_sekolah;?>" class="span10">
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
