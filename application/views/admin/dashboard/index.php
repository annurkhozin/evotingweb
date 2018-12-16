<?php $thn=date('Y');
	$campg=$this->session->userdata('jurusan');
	$campaign=$this->m_campaign->cek_id($campg)->row_array()['nama_campaign'];
	$calon=$this->m_calon->ambil_data(1,$campg,$thn)->result();
?>
	
<div id="content" class="col-md-10 viewContent">
<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href=".hasilbatang">PEROLEHAN SUARA</a></li>
    <li><a data-toggle="pill" href=".hasilpie">PERSENTASE KANDIDAT</a></li>
    <li><a data-toggle="pill" href=".pemilih">PERSENTASE PEMILIH</a></li>
  </ul>
  
  <div class="tab-content">
    <div class="tab-pane col-md-10 fade in hasilbatang active">
		<?php 
			$data['campg'] = $campg;
			$data['campaign'] = $campaign;
			$this->load->view('admin/dashboard/grafik',$data);?>
    </div>
    <div class="tab-pane col-md-10 fade hasilpie">
		<?php 
			$data['campg'] = $campg;
			$data['campaign'] = $campaign;
			$this->load->view('admin/dashboard/pie',$data);?>
    </div>
    <div class="tab-pane span11 fade pemilih">
		<h1 class="text-center">Persentase Data Pemilih aktif</h1>

		<div class="box-content span12">
			<a class="quick-button span4 tooltipsku">
				<?php $dosmi=$this->m_pemilih->topem($campg,'dos',date('Y'))->num_rows();
						$dosmisud=$this->m_pemilih->apem(0,$campg,'dos',date('Y'))->num_rows();
						if($dosmi>0){$mi1=(($dosmi-$dosmisud)*100/$dosmi);}?>
				<table style="margin:10px;">
					<tr>
						<td align="left">Dosen</td>
						<td> = </td>
						<td><strong><?php echo $dosmi;?></strong> Suara</td>
					</tr>
					<tr>
						<td align="left">Sudah Memilih</td>
						<td width="50px"> = </td>
						<td><strong><?php echo $dosmisud;?></strong> Suara</td>
					</tr>
					<tr>
						<td align="left">Belum Memilih</td>
						<td> = </td>
						<td><strong><?php echo $dosmi-$dosmisud;?></strong> Suara</td>
					</tr>
				</table></br>
				<?php if($dosmi>0){ ?>
				<div class="progress progress-success">
					<div class="bar" style="width: <?php echo $mi1;?>%;" title="">
						<?php if($mi1>0){ ?>
							<h2><?php echo round($mi1,2).'%';?></h2>
						<?php }?>
						
					</div><h2 align="center"><?php echo round(100-$mi1,2).'%';?>&nbsp;&nbsp;</h2>
				</div>							
				<?php }else{ ?>
					<div class="progress progress-striped">
					<div bgcolor="#000" class="bar" style="width: 100%;" title="">
						<h2>Pemilih Kosong</h2>
					</div>
				</div>
				<?php }?>
				<span class="notification white"><i class="halflings-icon certificate"></i><font color="#000"> Dosen</font></span>
			</a>
			<a class="quick-button span4 tooltipsku">
				<?php $mahmi=$this->m_pemilih->topem($campg,'mahas',date('Y'))->num_rows();
						$mahmisud=$this->m_pemilih->apem(0,$campg,'mahas',date('Y'))->num_rows();
						if($mahmi>0){$mi2=(($mahmi-$mahmisud)*100/$mahmi);}?>
				<table style="margin:10px;">
					<tr>
						<td align="left">Mahasiswa</td>
						<td> = </td>
						<td><strong><?php echo $mahmi;?></strong> Suara</td>
					</tr>
					<tr>
						<td align="left">Sudah Memilih</td>
						<td width="50px"> = </td>
						<td><strong><?php echo $mahmisud;?></strong> Suara</td>
					</tr>
					<tr>
						<td align="left">Belum Memilih</td>
						<td> = </td>
						<td><strong><?php echo $mahmi-$mahmisud;?></strong> Suara</td>
					</tr>
				</table></br>
				<?php if($mahmi>0){ ?>
				<div class="progress progress-success">
						
					<div class="bar" style="width: <?php echo $mi2;?>%;" title="">
						<?php if($mi2>0){ ?>
								<h2><?php echo round($mi2,2).'%';?></h2>
							<?php }?>
					</div><h2 align="center"><?php echo round(100-$mi2,2).'%';?>&nbsp;&nbsp;</h2>
				</div>							
				<?php }else{ ?>
					<div class="progress progress-striped">
					<div bgcolor="#000" class="bar" style="width: 100%;" title="">
						<h2>Pemilih Kosong</h2>
					</div>
				</div>
				<?php }?>
				<span class="notification white"><i class="halflings-icon user"></i><font color="#000"> Mahasiswa</font></span>
			</a>
			<a class="quick-button span4 tooltipsku">
				<?php $tumi=$this->m_pemilih->topem($campg,'tu',date('Y'))->num_rows();
						$tumisud=$this->m_pemilih->apem(0,$campg,'tu',date('Y'))->num_rows();
						if($tumi>0){$mi3=(($tumi-$tumisud)*100/$tumi);}?>
				<table style="margin:10px;">
					<tr>
						<td align="left">Tata Usaha</td>
						<td> = </td>
						<td><strong><?php echo $tumi;?></strong> Suara</td>
					</tr>
					<tr>
						<td align="left">Sudah Memilih</td>
						<td width="50px"> = </td>
						<td><strong><?php echo $tumisud;?></strong> Suara</td>
					</tr>
					<tr>
						<td align="left">Belum Memilih</td>
						<td> = </td>
						<td><strong><?php echo $tumi-$tumisud;?></strong> Suara</td>
					</tr>
				</table></br>
				<?php if($tumi>0){ ?>
				<div class="progress  progress-success">
					<div class="bar" style="width: <?php echo $mi3;?>%;" title="">
						<?php if($mi3>0){ ?>
							<h2><?php echo round($mi3,2).'%';?></h2>
						<?php }?>
					</div><h2 align="center"><?php echo round(100-$mi3,2).'%';?>&nbsp;&nbsp;</h2>
				</div>							
				<?php }else{ ?>
					<div class="progress progress-striped">
					<div bgcolor="#000" class="bar" style="width: 100%;" title="">
						<h2>Pemilih Kosong</h2>
					</div>
				</div>
				<?php }?>
				<span class="notification white"><i class="halflings-icon pencil"></i><font color="#000"> Tata Usaha</font></span>
			</a>	
		</div>

		<center>
			<span class="label label-success">Hijau</span><strong> = Belum Memilih </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<span class="label label-warning">Kuning</span><strong> = Sudah Memilih </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<span class="label label-inverse">Hitam</span><strong> = Pemilih Kosong </strong></br></br>
		</center>
    </div>
  </div>
</div>