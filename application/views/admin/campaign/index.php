<div id="content" class="span10">
	<ul class="breadcrumb">
		<li><?php $this->load->view('admin/breadcumb.php');?></li>
	</ul>
	<a href="<?php echo site_url(enkripsi('campaign','nonaktif'));?>" class="btn btn-danger"><i class="halflings-icon trash white"></i> Ke <?php echo $langit; ?> Nonaktif</a>
	<a href="#tambah" data-toggle="modal" class="btn btn-md btn-primary"><i class="halflings-icon plus white"></i> Tambah</a>
	</br></br>
	<?php print_r($campaign);?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-random"></i><span class="break"></span> <?php echo $langit; ?> Aktif</h2>
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
							  <th><center>Kelola</center></th>
						  </tr>
					  </thead>   
					  <tbody>
						<?php $campaign = $this->db->where('status_campaign',1)->get('campaign')->result();
						foreach ($campaign as $baris) { ?>
							<tr>
								<td><?php echo $baris->id_campaign;?></td>
								<td class="center"><?php echo $baris->nama_campaign;?></td>
								<td class="center" >
									<center>
										<a class="btn btn-md btn-info tooltipsku" href="#edit<?php echo $baris->id_campaign;?>" data-toggle="modal"
											title="<?php echo 'Edit Data '.$baris->nama_campaign;?>">
											<i class="halflings-icon white edit"></i>  
										</a>
										<a class="btn btn-md btn-danger tooltipsku" href="#nonaktifkan<?php echo $baris->id_campaign;?>" data-toggle="modal"
										title="<?php echo 'Nonaktifkan Data '.$baris->nama_campaign;?>">
											
											<i class="halflings-icon white trash"></i> 
										</a>
									</center>
								</td>
							</tr>
						
						<?php } ?>
					</tbody>
				</table>    
			</div>
		</div><!--/span-->
	</div>	
</div>
<?php 
	$this->load->view('admin/campaign/tambah.php');
	$this->load->view('admin/campaign/edit.php');
	$this->load->view('admin/campaign/nonaktifkan.php');
?>