<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/aknbjn.png');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<?php date_default_timezone_set('Asia/Jakarta'); $jam=date('Y-m-d H:i:s');?>
    <title>Login :: Pemilu <?php echo date('Y'); ?></title>
	<link href="<?php echo base_url('aset/css/bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('aset/css/font-awesome.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('aset/css/style.css');?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
	<script language="javascript" type="text/javascript">
		$(document).bind("contextmenu",function(e) {
		    // e.preventDefault();
		});
	</script>
	
    <link rel="stylesheet" href="<?=base_url()?>assets/growl/vanilla-notify.css" />
    <script src="<?=base_url()?>assets/growl/vanilla-notify.js"></script>
</head>
<body>
<?php $sukses=$this->session->flashdata('sukses');
	if($sukses!=null){
	$url=$_SERVER['REQUEST_URI'];
	header("Refresh: 10; URL=$url");
}?>
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
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
				<center><img src="<?php echo base_url('assets/Maskot_Pemilu.png');?>" width="200px"></center>
			</div>
            <div class="row">
                <div class="col-md-12">
				<center><h2 >Pemilihan Umum <?php echo date('Y');?></h2></center>
				</div>
                <div class="col-md-2"></div>
                
			</div>
            <div class="row">
				<div class="col-md-2"></div>
					<div class="well col-md-8 center login-box">
						<?php if ($sukses!=null){ ?>
						<div>
							<div class="col-md-10 col-md-offset-1">
								<div class="alert alert-success" role="alert">
									<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
									<span class="sr-only"></span>
									<?php echo $sukses;?>
								<br>Automatically refesh page in <span id="timer"></span> second
								</div>
							</div>
							<div class="col-md-1"></div>
						</div></br>
						<script>
							vNotify.success({text: '<?=$sukses?>', title:'Success Notification.'});
							var timeleft = 10;
							var downloadTimer = setInterval(function(){
							var down=  10 - --timeleft;
							var span = document.getElementById("timer");
							while( span.firstChild ) {
								span.removeChild( span.firstChild );
							}
							span.appendChild( document.createTextNode(timeleft-1+2) );
							if(timeleft <= 0)
								clearInterval(downloadTimer);
							},1000);
						</script>
						<?php } ?>
						<div>
							<div class="input-group input-group-lg col-md-10 col-md-offset-1">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" onkeyup="allcase(this)" placeholder="Kode Pemilih" autofocus required id="id" class="form-control" />
							</div>
						</div></br>
						<div>
							<div class="input-group input-group-lg col-md-10 col-md-offset-1">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" onkeyup="allcase(this)" placeholder="PIN" required id="pin" class="form-control" />
							</div>
						</div><hr />
						<center><button onclick="auth()" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-lock"></i> Login</button></center>
					</div>
				</div>
				<div class="col-md-2"></div>
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
<script src="<?php echo base_url('aset/js/jquery-1.11.1.js');?>"></script>
<script src="<?php echo base_url('aset/js/bootstrap.js');?>"></script>
<script language="javascript" type="text/javascript">
	function allcase(obj) {
	obj.value=obj.value.toUpperCase();
	}
	function auth(){
		var id = document.getElementById("id").value;
		var pin = document.getElementById("pin").value;
		
		if(id==''){
			vNotify.warning({text:'Kode Pemilih Kosong', title:'Warning'});
		}else if(pin==''){
			vNotify.warning({text:'PIN Kosong', title:'Warning'});
		}else{
			$.ajax({
				type:"POST",
				url:"<?=base_url()?>loginProses",
				data:{id:id, pin:pin},
				cache:false,
				success:function(a){
					if(a=='key'){
						vNotify.warning({text:'Captcha tidak sesuai', title:'Warning'});
					}else if(a=='time'){
						vNotify.error({text: 'Waktu Pemilihan tidak sesuai', title:'Error'});
					}else if(a=='status'){
						vNotify.error({text: 'Kode Pemilih sudah digunakan', title:'Error'});
					}else if(a=='failed'){
						vNotify.error({text: 'Kode Pemilih atau pin tidak sesuai', title:'Error'});
					}else if(a=='validasi'){
						vNotify.error({text: 'Kode Pemilih kosong', title:'Error'});
					}else{
						window.location = a;
					}
				},
				error: function (status) {
					vNotify.error({text: status.status+' '+status.statusText, title:'Error'});
					vNotify.warning({text:'Refresh this page and try again', title:'Warning'});
				}
			});
		}
	}
</script>
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