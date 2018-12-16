<script src="<?php echo base_url('assets/js/jquery-1.5.2.min.js');?>"></script>
<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<?php $this->load->view('admin/breadcumb.php');?>
			</li>
		</ul>
	<a href="<?php echo site_url(enkripsi('mahasiswa','index'));?>" class="btn btn-success"><i class="halflings-icon star white"></i> Ke <?php echo $langit; ?> Aktif</a>
	</br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-group"></i><span class="break"></span> <?php echo $langit; ?> Aktif</h2>
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
			<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('mahasiswa','aktifkan'));?>" method="post">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<button type="submit" class="btn btn-md btn-success" onclick="return confirm('Hati-Hati dengan Tindakan Anda! Tata Usaha yang dipilih akan di Aktifkan !'); ">
					<i class="halflings-icon star white"></i> Mahasiswa</button></br></br>
					<thead>
						<tr>
							<th><center><input type="checkbox" id="checkall" name="checkall"></center></th>
							<th>NIM <?php echo $langit; ?></th>
							<th>Nama <?php echo $langit; ?></th>
							<th>JUrusan</th>
							<th><center>Kelola</center></th>
						</tr>
					</thead>   
					<tbody>
						<?php $n=0; foreach($mahasiswa as $baris): $n++; ?>
						<tr>
							<td align="center"><center><input type="checkbox" value="<?php echo $baris->nim;?>" name="id[]" ></center></td>
							<td><?php echo $baris->nim;?></td>
							<td class="center"><?php echo $baris->nama_mahas;?></td>
							<td class="center"><?php echo $baris->nama_jur;?></td>
							<td class="center" >
								<center>
									<a class="btn btn-md btn-success tooltipsku" href="#aktifkanmaha<?php echo $baris->nim;?>" data-toggle="modal"
										title="<?php echo 'Aktifkan Data '.$baris->nama_mahas;?>">
										<i class="halflings-icon white star"></i>  
									</a>
								</center>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</form>    
			</div>
		</div><!--/span-->
	</div>	
</div>
<?php $this->load->view('admin/mahasiswa/aktifkan.php');?>
<script>
 	var jumlah=<?php echo count($oke);?>;
 	if(jumlah>200){
 		alert("Data Anda Terlalu Banyak Lakukan Penghapusan Data Yang Tidak Diperlukan Untuk Menghindari Loading Yang Lambat");
 	}
</script>
<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(document).ready(function() {
		$("input[name=checkall]").click(function(){
        if(!$(this).is(':checked'))
            $(this).parents('table').find('.checker span').removeClass('checked').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('.checker span').addClass('checked').find('input[type=checkbox]').attr('checked',true);
   		});    
	});
</script>