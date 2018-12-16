<?php $campg=$this->session->userdata('jurusan');
	$campaign=$this->m_campaign->cek_id($campg)->row_array()['nama_campaign'];
?>
<div class="row-fluid sortable">
	<div class="box span12">
	<div class="row-fluid">
			<div class="box span12">
				<div class="box-header default">
					<h2><i class="icon-user"></i><span class="break"></span><strong>Perolehan Suara Calon</h2>
				</div>
				<?php 
				$data['campg'] = $campg;
				$data['campaign'] = $campaign;
				$this->load->view('admin/dashboard/grafik.php',$data);?>
			</div>
		</div><!--/row-->
		<div class="row-fluid">	
			<div class="box span12">
					<div class="box-header default">
						<h2><i class="icon-random"></i><span class="break"></span><strong>Data Pemilih</h2>
					</div>
					<div class="box-content">
					<a class="quick-button span4 tooltipsku">
						<?php $dosmi=$this->m_pemilih->topem($campg,'dos',date('Y'))->num_rows();
								$dosmisud=$this->m_pemilih->apem(0,$campg,'dos',date('Y'))->num_rows();
								if($dosmi>0){$mi1=(($dosmi-$dosmisud)*100/$dosmi);}?>
						<table>
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
								<h2><?php if($dosmi>0){echo $mi1.'%';}?></h2>
							</div><h2 align="right"><?php echo 100-$mi1.'%';?>&nbsp;&nbsp;</h2>
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
						<table>
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
								<h2><?php echo $mi2.'%';?></h2>
							</div><h2 align="right"><?php echo 100-$mi2.'%';?>&nbsp;&nbsp;</h2>
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
						<table>
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
								<h2><?php echo $mi3.'%';?></h2>
							</div><h2 align="right"><?php echo 100-$mi3.'%';?>&nbsp;&nbsp;</h2>
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
			</div>
					<center></br>
						<span class="label label-success">Hijau</span><strong> = Belum Memilih </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span class="label label-warning">Kuning</span><strong> = Sudah Memilih </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span class="label label-inverse">Hitam</span><strong> = Pemilih Kosong </strong></br></br>
					</center>
		</div><!--/row-->
		
	</div>
</div>