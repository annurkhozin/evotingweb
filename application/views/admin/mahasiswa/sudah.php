<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<?php 
					include "breadcumb.php";
				?>
			</li>
		</ul>
	</br></br>
	<div class="row-fluid sortable">
		<!--mahasiswa -->
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
			<div class="box-content"><table class="table table-striped table-bordered bootstrap-datatable datatable">
	  <thead>
		  <tr>
			  <th>ID <?php echo $katalangit; ?></th>
			  <th><?php echo $katalangit; ?></th>
		  </tr>
	  </thead>   
	  <tbody>
		<?php $n=0; foreach($mahasiswa as $baris): $n++; ?>
		<tr>
			<td><?php echo $baris->NIM;?></td>
			<td class="center"><?php echo $baris->Nm_mahasiswa;?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table> 
</div>
		</div><!--/span-->
	</div>	
</div>