<!-- start: Content -->
<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<?php 
					include "breadcumb.php";
				?>
			</li>
		</ul>
	<a href="<?php echo site_url(enkripsi('akses','index'));?>" class="btn btn-success"><i class="halflings-icon star white"></i> Ke <?php echo $langit; ?> Aktif</a>
	</br></br>
	<div class="row-fluid sortable">

		<!--Pejabat Penetap -->
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-screenshot"></i><span class="break"></span> <?php echo $langit; ?> Aktif</h2>
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
							  <th>ID <?php echo $langit; ?></th>
							  <th><?php echo $langit; ?></th>
							  <th><center>Bobot</center></th>
							  <th><center>Kelola</center></th>
						  </tr>
					  </thead>   
					  <tbody>
						<?php $n=0; foreach($akses as $baris): $n++; ?>
						<tr>
							<td><?php echo $baris->Id_akses;?></td>
							<td class="center"><?php echo $baris->nm_akses;?></td>
							<td class="center"><?php echo $baris->bobot;?></td>
							<td class="center" >
								<center>
									<a class="btn btn-md btn-success tooltipsku" href="#aktifkan<?php echo $baris->Id_akses;?>" data-toggle="modal"
										title="<?php echo 'Aktifkan Data '.$baris->nm_akses;?>">
										<i class="halflings-icon white star"></i>  
									</a>
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
<?php $this->load->view('admin/master/akses/aktifkan.php');?>