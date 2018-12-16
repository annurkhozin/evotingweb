<script src="<?php echo base_url('assets/js/jquery-1.5.2.min.js');?>"></script>
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li>
			<?php $this->load->view('admin/breadcumb.php');?>
		</li>
	</ul>
	<a href="<?php $cmp=$this->uri->segment(3);$th=$this->uri->segment(4); echo site_url('pemilih/sudah/'.$cmp.'/'.$th);?>" class="btn btn-default"><i class="icon-user-md white"></i> Ke <?php echo $langit; ?> Sudah</a>
	<a href="<?php echo site_url('pemilih/tambah/'.$cmp.'/'.$th);?>" class="btn btn-info"><i class="halflings-icon plus white"></i> Tambahkan <?php echo $langit; ?></a>
	<a href="#cetak" data-toggle="modal" class="btn btn-md btn-success"><i class="halflings-icon print white"></i> Cetak</a></br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-user-md"></i><span class="break"></span> Pemilih yang Belum Bersuara di campaign
				<?php $n=$this->m_campaign->cek_id($cmp)->row_array()['nama_campaign']; echo $n.' - '.date('Y');?></h2>
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
				<form id="frm" name="frm" class="form-horizontal" action="<?php echo site_url('pemilih/kartu/'.$cmp.'/'.$th.'/1');?>" method="post">
				<select required name="action" style="width:200px;" data-rel="chosen">
					<option value="email">Kirim Email</option>
					<option value="kartu">Cetak Kartu</option>
				</select>
					<button type="submit" class="btn btn-md btn-success">
					<span class="halflings-icon white share-alt"></span> Proses</button><br><br>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th><center><input type="checkbox" id="checkall" name="checkall"></center></th>
								<th>ID Pemilih</th>
								<th>Password</th>
								<th>Nama Pemilih</th>
								<th>Asal Pemilih</th>
								<th>Status Pemilihan</th>
								<th><center>Kelola</center></th>
							</tr>
						</thead>   
						<tbody>
							<?php $n=0; foreach($pemilih as $row): $n++;
								$mahas=$this->m_mahasiswa->cek_id($row->id_user)->row_array();
								$tu=$this->m_tatausaha->cek_id($row->id_user)->row_array();
								$dos=$this->m_dosen->cek_id($row->id_user)->row_array();
								$akses=$this->m_akses->cek_id($row->id_akses)->row_array();
								if($mahas>0){
									$nama=$mahas['nama_mahas'];
								}elseif($tu>0){
									$nama=$tu['nama_tu'];
								}if($dos>0){
									$nama=$dos['nama_dos'];
								}
							?>
							<tr>
								<td align="center"><center><input type="checkbox" value="<?php echo $row->id_pemilih;?>" name="id[]" ></center></td>
								<td class="center"><input type="hidden" name="id_pem" value="<?php echo $row->id_pemilih;?>"><?php echo $row->id_user;?></td>
								<td class="center"><?php echo $row->password;?></td>
								<td><?php echo $nama;?></td>
								<td class="center"><?php echo $akses['nama_akses'];?></td>
								<td class="center"><?php $s=$row->status; if($s=='1'){echo"Belum";}elseif($s=='0'){echo"Sudah";};?></td>
								<td class="center" >
									<center>
										<a class="btn btn-md btn-danger tooltipsku" href="#nonaktifkan<?php echo $row->id_user;?>" data-toggle="modal"
										title="<?php echo 'Nonaktifkan Data '.$nama;?>">
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
<?php $this->load->view('admin/pemilih/nonaktifkan.php');
	  $this->load->view('admin/pemilih/butcetak.php');
?>
<?php $kosong=$this->session->flashdata('m_kosong'); 
	if($kosong!=null){
		echo "<script>alert('$kosong');</script>"; 
	}?>
<script>
 	// var jumlah=<?php //echo count($oke);?>;
 	// if(jumlah>200){
 	// 	alert("Data Anda Terlalu Banyak, Lakukan Pengurangan Data Yang Tidak Diperlukan Untuk Menghindari Proses yang lama");
 	// }
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