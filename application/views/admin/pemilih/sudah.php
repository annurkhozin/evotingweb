<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<?php $this->load->view('admin/breadcumb.php');?>
		</li>
	</ul>
	<a href="<?php $camp=$this->uri->segment(3);$th=$this->uri->segment(4); echo site_url('pemilih/detail/'.$camp.'/'.$th);?>" class="btn btn-info"><i class="icon-user-md white"></i> Ke <?php echo $langit; ?> Belum</a>
	<a href="#cetak" data-toggle="modal" class="btn btn-md btn-success"><i class="halflings-icon print white"></i> Cetak</a></br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-user-md"></i><span class="break"></span><i class="halflings-icon white user"></i> Pemilih yang Sudah Bersuara di campaign
				<?php $n=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign']; echo $n.' - '.$th;?></h2>
			</div>
			</br>
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
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>ID Pemilih</th>
								<th>Nama Pemilih</th>
								<th>Status Pemilih</th>
								<th>Tahun Pemilihan</th>
								<th>Status Pemilihan</th>
								<?php $super=$this->session->userdata('akses'); if($super=='super'){?> <th>Memilih Calon</th><?php }?>								
								<th><center>Kelola</center></th>
							</tr>
						</thead>   
						<tbody>
						<?php $n=0; foreach($pemilih as $row): $n++; ?>
						<?php $mahas=$this->m_mahasiswa->cek_id($row->id_user)->row_array();
							$tu=$this->m_tatausaha->cek_id($row->id_user)->row_array();
							$dos=$this->m_dosen->cek_id($row->id_user)->row_array();
							$akses=$this->m_akses->cek_id($row->id_akses)->row_array();
							$poling=$this->m_poling->ambil_data($row->id_user,$row->tahun)->row_array();
							if($mahas>0){
								$nama=$mahas['nama_mahas'];
							}elseif($tu>0){
								$nama=$tu['nama_tu'];
							}if($dos>0){
								$nama=$dos['nama_dos'];
							}
						?>
						<tr>
							<input type="hidden" name="id_pem" value="<?php echo $row->id_pemilih;?>">
							<td class="center"><?php echo $row->id_user;?></td>
							<td><?php echo $nama;?></td>
							<td class="center"><?php echo $akses['nama_akses'];?></td>
							<td class="center"><?php echo $row->tahun;?></td>
							<td class="center"><?php $s=$row->status; if($s=='0'){echo"Sudah";}elseif($s=='1'){echo"Belum";}elseif($s=='2'){echo"Di Nonaktifkan";};?></td>
							<?php if($super=='super'){?> <td><center><?php if($s=='0'){echo $poling['no_urut'];}elseif($s=='2'){echo'-----';};?></center></td><?php }?>
							<td class="center" >
								<center>
								<?php if($s=='2'){ echo'
									<a class="btn btn-md btn-success tooltipsku" href="#aktifkan'.$row->id_user.'" data-toggle="modal"
									title="Aktifkan Data '.$nama.'">
									<i class="halflings-icon white star"></i> 
									</a>';
								}else{ echo'-----';}?>
								</center>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>  
			</div>
		</div><!--/span-->
	</div>	
</div>
<?php $this->load->view('admin/pemilih/aktifkan.php');
	  $this->load->view('admin/pemilih/butcetaksud.php');?>