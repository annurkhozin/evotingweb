<script src="<?php echo base_url('assets/js/jquery-1.5.2.min.js');?>"></script>
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<?php $this->load->view('admin/breadcumb.php');?>
		</li>
	</ul>
	<?php $data=$this->session->flashdata('m_sukses');
	if($data!=null){
		echo "<div class='alert alert-success'><strong>Sukses!</i></strong>
			".$data."
		</div>";
	} 
	$data2=$this->session->flashdata('m_error');
	if($data2!=null){
		echo "<div class='alert alert-error'><strong>Error!</strong>
			".$data2."
		</div>";
	}?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header red">
				<h2><i class="icon-screenshot"></i><span class="break"></span><i class="halflings-icon white user"></i> Tambah Pemilih di
				<?php $camp=$this->uri->segment(3);$n=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign']; echo $n;?> Tahun 
				<?php $thn=$this->uri->segment(4); echo $thn;?></h2>
			</div>
			<div class="box-content">
				<ul class="nav tab-menu nav-tabs" id="myTab">
					<li class="active"><a href="#mahas"><strong>Mahasiswa</strong></a></li>
					<li><a href="#tatausaha"><strong>Tata Usaha</strong></a></li>
					<li><a href="#dosen"><strong>Dosen</strong></a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active" id="mahas">
					<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','tambahmahas'));?>" method="post">
						<input type="hidden" name="namacamp" value="<?php echo $n;?>">
						<input type="hidden" name="camp" value="<?php echo $camp;?>">
						<input type="hidden" name="thn" value="<?php echo $thn;?>">
						<button type="submit" class="btn btn-md btn-success" onclick="return confirm('Data Yang dipilih Akan Ditambahkan!');"><span class="halflings-icon white plus"></span> Tambahkan</button>
						</br></br>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th><center><input type="checkbox" id="checkall" name="checkall"></center></th>
									<th>NIM</th>
									<th>Nama Mahasiswa</th>
									<th>Jurusan</th>
									<th><center>Aksi</center></th>
								</tr>
							</thead>   
							<tbody>
							<?php $n=0; foreach($mahasiswa as $row): $n++; 
							$ceknim=$this->m_pemilih->ceknim($row->nim,$thn,$camp)->num_rows();
							if($ceknim>0){
							}else{ echo'
								<tr>
								<td align="center"><center><input type="checkbox" value="'.$row->nim.'" name="id[]" ></center></td>
								<td class="center">'.$row->nim.'</td>
								<td>'.$row->nama_mahas.'</td>
								<td class="center">'.$row->nama_jur.'</td>
								<td class="center" >
									<center>
										<a class="btn btn-md btn-success tooltipsku" href="#detail'.$row->nim.'" data-toggle="modal"
										title="Tambahkan '.$row->nama_mahas.'">
										<i class="halflings-icon white plus"></i> 
										</a>
									</center>
								</td>
							</tr>';
							} endforeach;?>
							</tbody>
						</table>
					</form>
					</div>
					<div class="tab-pane" id="tatausaha">
						<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','tambahtu'));?>" method="post">
						<input type="hidden" name="namacamp" value="<?php echo $this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];?>">
						<input type="hidden" name="camp" value="<?php echo $camp;?>">
						<input type="hidden" name="thn" value="<?php echo $thn;?>">
						<button type="submit" class="btn btn-md btn-success" onclick="return confirm('Data Tatausaha Yang dipilih Akan Ditambahkan!');"><span class="halflings-icon white plus"></span> Tambahkan</button>
						</br></br>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th><center><input type="checkbox" id="checkall" name="checkall"></center></th>
									<th>ID Tata Usaha</th>
									<th>Nama Tata Usaha</th>
									<th>Jenis Kelamin</th>
									<th>Status Kepegawaian</th>
									<th>Alamat</th>
									<th><center>Aksi</center></th>
								</tr>
							</thead>   
							<tbody>
							<?php $n=0; foreach($tatausaha as $tu): $n++;
							$cektu=$this->m_pemilih->ceknim($tu->id_tu,$thn,$camp)->num_rows();
							if($cektu>0){
							}else{ echo'
								<tr>
								<td align="center"><center><input type="checkbox" value="'.$tu->id_tu.'" name="id[]" ></center></td>
								<td class="center">'.$tu->id_tu.'</td>
								<td>'.$tu->nama_tu.'</td>
								<td>'.$tu->jk.'</td>
								<td>'.$tu->status_pegawai.'</td>
								<td>'.$tu->alamat.'</td>
								<td class="center" >
									<center>
										<a class="btn btn-md btn-success tooltipsku" href="#detail'.$tu->id_tu.'" data-toggle="modal"
										title="Tambahkan '.$tu->nama_tu.'">
										<i class="halflings-icon white plus"></i> 
										</a>
									</center>
								</td>
							</tr>';
							} endforeach;?>
							</tbody>
						</table>
					</form>
					</div>
					<div class="tab-pane" id="dosen">
						<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('pemilih','tambahdos'));?>" method="post">
						<input type="hidden" name="namacamp" value="<?php echo $this->m_campaign->cek_id($camp)->row_array()['nama_campaign'];;?>">
						<input type="hidden" name="camp" value="<?php echo $camp;?>">
						<input type="hidden" name="thn" value="<?php echo $thn;?>">
						<button type="submit" class="btn btn-md btn-success" onclick="return confirm('Data Dosen Yang dipilih Akan Ditambahkan!');">
						<span class="halflings-icon white plus"></span> Tambahkan</button>
						</br></br>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th><center><input type="checkbox" id="checkall" name="checkall"></center></th>
									<th>ID Dosen</th>
									<th>Nama Dosen</th>
									<th>Jenis Kelamin</th>
									<th>Status Kepegawaian</th>
									<th>Alamat</th>
									<th><center>Aksi</center></th>
								</tr>
							</thead>   
							<tbody>
							<?php $n=0; foreach($dosen as $d): $n++;
							$cekdos=$this->m_pemilih->ceknim($d->id_dos,$thn,$camp)->num_rows();
							if($cekdos>0){
							}else{ echo'
								<tr>
								<td align="center"><center><input type="checkbox" value="'.$d->id_dos.'" name="id[]" ></center></td>
								<td class="center">'.$d->id_dos.'</td>
								<td>'.$d->nama_dos.'</td>
								<td>'.$d->jk.'</td>
								<td>'.$d->status_pegawai.'</td>
								<td>'.$d->alamat.'</td>
								<td class="center" >
									<center>
										<a class="btn btn-md btn-success tooltipsku" href="#detail'.$d->id_dos.'" data-toggle="modal"
										title="Tambahkan '.$d->nama_dos.'">
										<i class="halflings-icon white plus"></i> 
										</a>
									</center>
								</td>
							</tr>';
							} endforeach;?>
							</tbody>
						</table>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<?php $this->load->view('admin/mahasiswa/detail.php');
	  $this->load->view('admin/tatausaha/detail.php');
	  $this->load->view('admin/dosen/detail.php');
?>
<script>
 	var jumlah=<?php echo count($oke);?>;
 	if(jumlah>200){
 		alert("Data Anda Terlalu Banyak Lakukan Penghapusan Data Yang Tidak Diperlukan Untuk Menghindari Loading Yang Lambat");
 	}
</script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$("input[name=checkall]").click(function(){
        if(!$(this).is(':checked'))
            $(this).parents('table').find('.checker span').removeClass('checked').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('.checker span').addClass('checked').find('input[type=checkbox]').attr('checked',true);
   		});    
	});
</script>