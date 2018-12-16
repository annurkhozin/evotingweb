<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/aknbjn.png');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<?php date_default_timezone_set('Asia/Jakarta'); $jam=date('Y-m-d H:i:s');?>
    <title>Grafik Campaign :: Pemilu <?php echo date('Y'); ?></title>
	<link href="<?php echo base_url('aset/css/bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('aset/css/font-awesome.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('aset/css/style.css');?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
	<script language="javascript" type="text/javascript">
		$(document).bind("contextmenu",function(e) {
		    e.preventDefault();
		});
	</script>

    <link rel="stylesheet" href="<?=base_url()?>assets/growl/vanilla-notify.css" />
    <script src="<?=base_url()?>assets/growl/vanilla-notify.js"></script>
</head>
<body>
    
<div class="modal fade modalshow" id="admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modalbody"></div>
    </div>
</div>
    <header>
        <div class="container">
			<div class="row">
				<div class="col-md-4">
					<a href="#" style="color:white;" onclick="showModal('campaign')"><i class="glyphicon glyphicon-stats"></i> HASIL SUARA&nbsp;&nbsp;</a>
					<a href="<?=base_url()?>Login" style="color:white;"><i class="glyphicon glyphicon-user"></i> Login Pemilih&nbsp;&nbsp;</a>
				
				</div>
				<div class="col-md-8">
					<a href="#" style="color:white;" onclick="showModal('admin')"><i class="glyphicon glyphicon-lock"></i> Admin</a>
				</div>
            </div>
        </div>
    </header>
    </header>
	<?php $thn=$this->uri->segment(3);
	$campg=$this->uri->segment(2);
	$campaign=$this->m_campaign->cek_id($campg)->row_array()['nama_campaign'];
	$calon=$this->m_calon->ambil_data(1,$campg,$thn)->result();
	?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
				
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home"><i class="glyphicon glyphicon-stats"></i> PEROLEHAN SUARA</a></li>
					<li><a data-toggle="tab" href="#menu1"><i class="fa fa-pie-chart"></i> PERSENTASE CALON</a></li>
					<li><a data-toggle="tab" href="#menu2"><i class="fa fa-users"></i> PERSENTASE PEMILIH</a></li>
				</ul>

				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
					<?php 
						$data['campg'] = $campg;
						$data['campaign'] = $campaign;
						$this->load->view('utama/batang',$data);?>
					</div>
					<div id="menu1" class="tab-pane fade">
					<?php 
						$data['campg'] = $campg;
						$data['campaign'] = $campaign;
						$this->load->view('utama/pie',$data);?>
					</div>
					<div id="menu2" class="tab-pane fade">
					<?php 
						$data['campg'] = $campg;
						$data['campaign'] = $campaign;
						$this->load->view('utama/pemilih',$data);?>
					</div>
				</div>
            </div>
        </div>
    </div>
    <footer style="position: fixed; left: 0; bottom: 0; width: 100%; color: white; text-align: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h4>&copy;<?php echo date('Y');?> - Pemilihan Umum</h4></div>
			</div>
        </div>
    </footer>
</body>
</html>

<script>
	function showModal(page){
		$.ajax({
          type:"GET",
          url:"<?=base_url()?>showModal",
          data:{page:page},
          cache:false,
          success:function(a){
            $('.modalbody').html(a);
            $('.modalshow').modal();
          },
		  error: function (status) {
			$.growl.error({ message: status.status+' '+status.statusText, duration:5000 });
			$.growl.warning({ message: 'Refresh this page and try again', duration:5000 });
		  }
        });
	}
	
</script>
<script src="<?php echo base_url('aset/js/jquery-1.11.1.js');?>"></script>
<script src="<?php echo base_url('aset/js/bootstrap.js');?>"></script>