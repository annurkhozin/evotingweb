<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/aknbjn.png');?>">
	<title><?php echo $title;?></title>
	<link id="bootstrap-style" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url('assets/css/style-responsive.css');?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
	<script language="javascript" type="text/javascript">
		$(document).bind("contextmenu",function(e) {
		    e.preventDefault();
		});
	</script>
	<style type="text/css">
	.row-fluid.toggled{
	}
	.row-fluid.toggled #sidebar-left{
		background: #3A3A3A;
		margin-left: 0px !important;
		margin: 40px 0px;
		height: 100%;
		overflow:scroll;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	.row-fluid.toggled #content{
		width: 85.578%;
		padding: 28px;
		margin: 40px 0px;
		margin-bottom:0px;
		margin-left: 14.422% !important;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	.row-fluid.toggled .nav-tabs.nav-stacked > li > ul > li > a{
		padding: 15px 10px 14px 30px;
		display: block;
	}
	.row-fluid.toggled .hidden-tablet{
		padding: 11.7px;
		left: 81px;
		top: 1px;
		min-width: 160px;
	}
	.hidden-tablet{
		padding: 11.7px;
		left: 81px;
		top: 1px;
		min-width: 160px;
	}
</style>	
</head>
<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo site_url(enkripsi('Dashboard','index'));?>"><span><strong>Pemilihan Umum</strong></span></a>
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> 
								<?php $user=$this->session->userdata('user');
								$akses=$this->session->userdata('akses');
								$campg=$this->session->userdata('jurusan');
								$campaign=$this->m_campaign->cek_id($campg)->row_array()['nama_campaign'];
								$idas=$this->m_akses->cekak($akses)->row_array()['id_akses'];
								$cekas=$this->m_akses->cekak($akses)->row_array()['nama_akses'];
								$nama1=$this->m_dosen->cek_id($user)->row_array();
								$nama2=$this->m_tatausaha->cek_id($user)->row_array();
								$nama3=$this->m_mahasiswa->cek_id($user)->row_array();
								if($nama1>1){$nama_user=$nama1['nama_dos'];
								}elseif($nama2>1){$nama_user=$nama2['nama_tu'];
								}elseif($nama3>0){$nama_user=$nama3['nama_mahas'];
								}if($idas=='admin'){
								echo "<strong>".$nama_user."</strong> as <strong>".$cekas." - ".$campaign. "</strong>"; 
								}elseif($idas=='super'){
								echo "<strong>".$nama_user."</strong> as <strong>".$cekas."</strong>"; 
								}
								?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Setting Akun</span>
								</li>
								<li><a href="<?php echo site_url('dashboard/profil/'.$user);?>"><i class="halflings-icon user"></i> Profil</a></li>
								<li><a href="<?php echo site_url('dashboard/logout');?>" onclick="return confirm('Anda yakin ingin Keluar!'); "><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
			<?php include $menu;?>
			<!-- start: Content -->
			<?php include $konten;?>

		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-migrate-1.0.0.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui-1.10.0.custom.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.ui.touch-punch.js');?>"></script>
	<script src="<?php echo base_url('assets/js/modernizr.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.cookie.js');?>"></script>
	<script src="<?php echo base_url('assets/js/fullcalendar.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/excanvas.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.pie.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.stack.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.flot.resize.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.chosen.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.uniform.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.cleditor.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.raty.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.noty.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.elfinder.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.iphone.toggle.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.uploadify-3.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.gritter.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.imagesloaded.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.masonry.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.knob.modified.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.sparkline.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/counter.js');?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js');?>"></script>
	<script>
		$("#sidebar-left").mouseover(function(e) {
			e.preventDefault();
			$(".row-fluid").addClass("toggled");
		});
		 $("#sidebar-left").mouseout(function(e) {
			e.preventDefault();
			$(".row-fluid").removeClass("toggled");
		});
    </script><script type="text/javascript">
			$(function () {
				$(".tooltipsku").tooltip();
			});
	</script>
</body>
</html>