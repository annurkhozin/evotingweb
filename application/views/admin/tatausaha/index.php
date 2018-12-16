<script src="<?php echo base_url('assets/js/jquery-1.5.2.min.js');?>"></script>
<div id="content" class="span10">
		<ul class="breadcrumb">
			<li><?php $this->load->view('admin/breadcumb.php');?></li>
		</ul>
	<a href="<?php echo site_url(enkripsi('tatausaha','nonaktif'));?>" class="btn btn-danger"><i class="halflings-icon trash white"></i> Ke Tata Usaha Nonaktif</a>
	<a href="#tambah" data-toggle="modal" class="btn btn-md btn-primary"><i class="halflings-icon plus white"></i> Tambah</a>
	<a href="#cetak" data-toggle="modal" class="btn btn-md btn-success"><i class="halflings-icon print white"></i> Cetak</a></br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-pencil"></i><span class="break"></span> Tata Usaha Aktif</h2>
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
			<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url(enkripsi('tatausaha','nonaktifkan'));?>" method="post">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<button type="submit" class="btn btn-md btn-danger" onclick="return confirm('Hati-Hati dengan Tindakan Anda! Tata Usaha yang dipilih akan di Non-Aktifkan !'); ">
					<i class="halflings-icon trash white"></i> Tata Usaha</button></br></br>
					<thead>
						<tr>
							<th><center><input type="checkbox" id="checkall" name="checkall"></center></th>
							<th>ID Tata Usaha</th>
							<th>Nama Tata Usaha</th>
							<th>Alamat</th>
							<th><center>Kelola</center></th>
						</tr>
					</thead>   
					<tbody>
						<?php $n=0; foreach($tatausaha as $baris): $n++; ?>
						<tr>
							<td align="center"><center><input type="checkbox" value="<?php echo $baris->id_tu;?>" name="id[]" ></center></td>
							<td><?php echo $baris->id_tu;?></td>
							<td class="center"><?php echo $baris->nama_tu;?></td>
							<td class="center"><?php echo $baris->alamat;?></td>
							<td class="center" >
								<center>
									<a class="btn btn-md btn-default tooltipsku" href="#detail<?php echo $baris->id_tu;?>" data-toggle="modal"
										title="<?php echo 'Detail Data '.$baris->nama_tu;?>">
										<i class="halflings-icon white search"></i>  
									</a>
									<a class="btn btn-md btn-info tooltipsku" href="#edit<?php echo $baris->id_tu;?>" data-toggle="modal"
										title="<?php echo 'Edit Data '.$baris->nama_tu;?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-md btn-danger tooltipsku" href="#nonaktifkantu<?php echo $baris->id_tu;?>" data-toggle="modal"
									title="<?php echo 'Nonaktifkan Data '.$baris->nama_tu;?>">
										
										<i class="halflings-icon white trash"></i> 
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
<?php 
	$this->load->view('admin/tatausaha/tambah.php');
	$this->load->view('admin/tatausaha/detail.php');
	$this->load->view('admin/tatausaha/edit.php');
	$this->load->view('admin/tatausaha/nonaktifkan.php');
	$this->load->view('admin/tatausaha/butcetak.php');
?>
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