<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<?php $this->load->view('admin/breadcumb.php');?>
			</li>
		</ul>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-random"></i><span class="break"></span>Jurusan Pemilih Aktif</h2>
			</div></br>
			<?php $data=$this->session->flashdata('m_sukses');
			if($data!=null){
				echo "<div class='alert alert-success'><strong>Sukses!</i></strong>
					".$data."</div>";
			} 
			$data2=$this->session->flashdata('m_error');
			if($data2!=null){
				echo "<div class='alert alert-error'><strong>Error!</strong>
					".$data2."</div>";
			}?>
			<div class="box-content">
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>ID Campaign</th>
								<th>Nama Campaign</th>
								<th>Jumlah Tahun Pemilihan</th>
								<th><center>Kelola</center></th>
							</tr>
						</thead>   
						<tbody>
							<?php $campaign = $this->db->where('status_campaign',1)->get('campaign')->result();
							 $n=0; foreach($campaign as $row): $n++; 
							$jthn=$this->m_pemilih->jthn($row->id_campaign)->num_rows();
							?>
							<tr>
								<td><?php echo $row->id_campaign ;?></td>
								<td class="center"><?php echo $row->nama_campaign; ?></td>
								<td class="center"><?php echo $jthn; ?></td>
								<td class="center" >
									<center>
										<center>
										<a href="<?php echo site_url('pemilih/tahun/'.$row->id_campaign);?>" class="btn btn-md  btn-default tooltipsku" title="Detail <?php echo $row->nama_campaign;?>"><i class="halflings-icon search white"></i> Lihat</a>
										</center>
									</center>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>    
				</div>
			</div>
		</div><!--/span-->
	</div>	
</div>