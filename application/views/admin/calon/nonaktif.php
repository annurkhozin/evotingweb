<!-- start: Content -->
<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<?php $this->load->view('admin/breadcumb.php');?>
			</li>
		</ul>
	<a href="<?php $camp=$this->uri->segment(3);$thn=$this->uri->segment(4); echo site_url('calon/detail/'.$camp.'/'.$thn);?>" class="btn btn-success"><i class="halflings-icon star white"></i> Ke <?php echo $langit; ?> Aktif</a>
	</br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-screenshot"></i><span class="break"></span><i class="halflings-icon white user"></i> Calon Nonaktif 
				<?php $n=$this->m_campaign->cek_id($camp)->row_array()['nama_campaign']; echo $n;?></h2>
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
							<th>No Urut Calon</th>
							<th><center>NIM - Nama Calon</center></th>
							<th>Hasil Suara</th>
							<th><center>Kelola</center></th>
						</tr>
					</thead>   
					<tbody>
						<?php $n=0; foreach($calon as $row): $n++; 
							$h=$this->m_poling->poling($row->no_urut,$row->id_campaign,$row->tahun)->row_array();
						?>
						<tr>
							<td><?php echo $row->no_urut;?></td>
							<td>
								<center><img src="<?php echo base_url('upload/'.$row->gambar);?>" height="100px" width="80px"></br>
								<?php $nam=$this->m_mahasiswa->cek_id($row->nim)->row_array()['nama_mahas']; echo $row->nim.' - '.$nam?></center>
							</td>
							<td><?php if($h['poin']!=null){echo $h['poin'];}else{echo '0';}?> Suara</td>
							<td class="center" >
								<center>
									<a href="#aktifkan<?php echo $row->id_calon;?>" data-toggle="modal" class="btn btn-md btn-success tooltipsku" title="Aktifkan <?php echo $nam;?>"><i class="halflings-icon star white"></i></a>
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