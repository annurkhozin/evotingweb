<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/aknbjn.png');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Halaman Pemilihan</title>
	<link href="<?php echo base_url('aset/css/bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('aset/css/font-awesome.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('aset/css/style.css');?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
	<script language="javascript" type="text/javascript">
		$(document).bind("contextmenu",function(e) {
		    e.preventDefault();
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12"></br>
				<div class="col-md-2">
					<center><img src="<?php echo base_url('upload/aknbjn.png');?>" width="100px" height="100px"></center>
				</div>
				<div class="col-md-8">
					<center><h2 >
						<?php $camp=$this->m_campaign->cek_id($this->uri->segment(3))->row_array();
							echo $nama_camp=$camp['nama_campaign']; echo ' - '.date('Y');?>
					</h2>
					<h5><?=$nama_camp=$camp['keterangan_campaign'];?></h5></center>
				</div>
				<div class="col-md-2">
					<center><img src="<?php echo base_url('upload/'.$camp['logo_campaign']);?>" width="100px" height="100px"></center>
				</div>
				<div class="col-md-12"><center><hr size="+5" class="h1"/></center></div>
			</div>
		</div>
		<?php
		$level=$this->session->userdata('akses');
		$user=$this->session->userdata('id');
		$data2=$this->session->flashdata('message2');
		?>
		<div class="alert alert-info text-center" role="alert">
		<b>Selamat Datang <?=de($this->input->get('n'))?></b>, <br><span class="glyphicon glyphicon-info-sign"></span> Klik Photo Calon Untuk Memilih</strong>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<tr>
				<?php $n=0; foreach($calon as $row): $n++;?>
					<td>
						<div class="panel panel-primary">
							<div class="panel-heading"><i class="glyphicon glyphicon-user"></i>  No Urut : <?php echo $row->no_urut;?></div>
							<div class="panel-body">
								<center><a class="btn btn-md btn-default tooltipsku" data-toggle="modal" data-target="#cal<?php echo $row->no_urut;?>"
								title="<?php echo 'Pilih '.$row->nama_mahas;?>">
								<input type="image" src="<?php echo base_url('upload/'.$row->gambar);?>" height="250px" width="200px">
								</a></center>
							</div>
							<div class="panel-footer text-muted">
								<h6><center><strong><?php echo $row->nama_mahas;?></strong></center></h6>
							</div>
							<form method="post" action="<?php echo site_url('utama/prosespoling');?>" >
								<input type="hidden" value="<?php echo $row->no_urut;?>" name="nomor">
								<input type="hidden" value="<?php echo $this->m_utama->cekpoin($level)->row_array()['bobot'];?>" name="poin">
								<input type="hidden" value="<?php echo $user;?>" name="user">
								<input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="camp">
								<input type="hidden" value="<?php echo date('Y');?>" name="thn">
								<div class="modal fade" id="cal<?php echo $row->no_urut;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog primary">
										<div class="modal-content">
											<div class="modal-header">
												<label>No Urut : <?php echo $row->no_urut;?></label>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></br>
											</div>
											<div class="modal-body">
												<center><input type="image" src="<?php echo base_url('upload/'.$row->gambar);?>" height="400px" width="300px"></center>
												<center><label><?php echo $row->nama_mahas;?></label></center>
												<center><?php echo $row->visimisi;?></center>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" onclick="return confirm('Pilih Calon ini?'); "><i class="glyphicon glyphicon-ok"></i> Pilih</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</td>
				<?php endforeach;?>
				</tr>
			</table>
		</div>
	</div>
    
    <footer style="position: fixed; left: 0; bottom: 0; width: 100%; color: white; text-align: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h4>&copy;<?php echo date('Y');?> - Himpunan Mahasiswa Jurusan - AKN Bojonegoro</h4></div>
			</div>
        </div>
    </footer>
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
	<script src="<?php echo base_url('aset/js/bootstrap.js');?>"></script>
</body>
</html>