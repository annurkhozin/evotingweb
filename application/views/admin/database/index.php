<div id="content" class="span10">
		<ul class="breadcrumb">
			<li><?php $this->load->view('admin/breadcumb.php');?></li>
		</ul>
	</br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
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
				<table>
					<tr>
						<legend>Backup Database</legend>
						Klik pada tombol &quot;Backup&quot; Disamping Untuk Proses Back Up &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url(enkripsi('database','backup'));?>" class="btn btn-success"><i class="halflings-icon download-alt white"></i> Backup</a> <br />
						</br></br>
						<legend></legend>
					</tr>
				</table>
			</div>
		</div><!--/span-->
	</div>	
</div>