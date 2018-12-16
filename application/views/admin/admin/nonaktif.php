<div id="content" class="span10">
		<ul class="breadcrumb">
			<li><?php $this->load->view('admin/breadcumb.php');?></li>
		</ul>
	<a href="<?php echo site_url(enkripsi('admin','index'));?>" class="btn btn-success"><i class="halflings-icon star white"></i> Ke <?php echo $langit; ?> Aktif</a>
	</br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-certificate"></i><span class="break"></span> <?php echo $langit; ?> Aktif</h2>
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
							  <th>ID <?php echo $katalangit; ?></th>
							  <th>Nama <?php echo $katalangit; ?></th>
							  <th>Hak Akses</th>
							  <th><center>Kelola</center></th>
						  </tr>
					  </thead>   
					  <tbody>
						<?php $n=0; foreach($admin as $baris): $n++; ?>
						<tr>
							<td><?php echo $idu=$baris->id_user;?></td>
							<td class="center">
								 <?php	$cek_tu=$this->m_tatausaha->ambil_data_aktif($idu)->row_array();
										$cek_dos=$this->m_dosen->ambil_data_aktif($idu)->row_array();
										$cek_mahas=$this->m_mahasiswa->ambil_data_aktif($idu)->row_array();
										if($cek_tu>0){
											$nama=$cek_tu['nama_tu'];
											$nama=$cek_tu['nama_tu'];
										}elseif($cek_dos>0){
											$nama=$cek_dos['nama_dos'];
										}elseif($cek_mahas>0){
											$nama=$cek_mahas['nama_mahas'];
										}
										echo $nama; ?>
							</td>
							<td class="center">
								<?php $hak=$this->m_admin->cek_hak($idu)->row_array(); echo $hak['nama_akses'];
									if($baris->id_akses=='admin'){ echo' - <strong>'.$this->m_campaign->cek_id($baris->id_campaign)->row_array()['nama_campaign'].'</strong>';
								}?>
							</td>
							<td class="center" >
								<center>
									<a class="btn btn-md btn-success tooltipsku" href="#aktifkanad<?php echo $baris->id_user;?>" data-toggle="modal"
										title="<?php echo 'Aktifkan Data '.$baris->id_user;?>">
										<i class="halflings-icon white star"></i>  
									</a>
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
<?php $this->load->view('admin/admin/aktifkan.php');?>