<!-- start: Content -->
<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<?php $this->load->view('admin/breadcumb.php');?>
			</li>
		</ul>
	<a href="<?php $jrs=$this->uri->segment(3); echo site_url('calon/detail/'.$jrs);?>" class="btn btn-success"><i class="halflings-icon trash white"></i> Ke <?php echo $langit; ?> Aktif</a>
	</br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-screenshot"></i><span class="break"></span><i class="halflings-icon white user"></i> Calon Nonaktif 
				<?php $n=$this->m_jurusan->cek_id($jrs)->row_array()['nama_jur']; echo $n;?></h2>
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
								  <th>Tahun Pemilihan</th>
								  <th>No Urut Calon</th>
								  <th>Nama Calon</th>
								  <th>Gambar</th>
								  <th><center>Kelola</center></th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php $n=0; foreach($calon as $row): $n++; ?>
							<tr>
								<td class="center"><?php echo substr($row->id_calon,0,4);?></td>
								<td><?php echo $row->no_urut;?></td>
								<td class="center"><?php $nam=$this->m_mahasiswa->cek_id($row->nim)->row_array()['nama_mahas']; echo $nam?></td>
								<td class="center">
									<center><img src="<?php echo base_url('upload/'.$row->gambar);?>" height="80px" width="80px"></center>
								</td>
								<td class="center" >
									<center>
										<center>
											<a href="#aktifkan<?php echo $row->id_calon;?>" data-toggle="modal" class="btn btn-md btn-success tooltipsku" title="Aktifkan <?php echo $nam;?>"><i class="halflings-icon star white"></i></a>
										</center>
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
<?php 
	$this->load->view('admin/calon/aktifkan.php');
?>