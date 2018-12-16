<?php $url=$_SERVER['REQUEST_URI'];
	//header("Refresh: 30; URL=$url");?>
<style type="text/css">
	#target {
		width: 600px;
		height: 400px;
	}
	#target2 {
		width: 800px;
		height: 400px;
	}
</style>
<link href="<?php echo base_url('assets/css/TableBarChart.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/TableBarChart.js');?>"></script>
<div id="content" class="span10">
	<ul class="breadcrumb">
		<li><?php $this->load->view('admin/breadcumb.php');?></li>
	</ul>
	<a href="#cetak" data-toggle="modal" class="btn btn-md btn-success"><i class="halflings-icon print white"></i> Laporan</a>
	</br></br>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-screenshot"></i><span class="break"></span> <?php echo $langit; ?> Aktif</h2>
			</div>
			</br>
			<div class="span7">
				<table id="source2">
					<caption><u>Grafik Perolehan Suara - </u><?php $ss=$this->m_campaign->cek_id( $cmp=$this->uri->segment(3))->row_array(); echo $ss['nama_campaign'].' - '.$this->uri->segment(4);?></caption>
					<thead>
						<tr>
							<th></th>
							<th><b>Poin Suara</b></th>	
						</tr>
					</thead>
					<tbody>
					<?php $thn=date('Y');
						  $calon=$this->m_calon->ambil_data(1,$cmp,$thn)->result();
						  $no=0; foreach($calon as $row): $no++;?>
						<tr>
							<th><?php $nam=$this->m_mahasiswa->cek_id($row->nim)->row_array()['nama_mahas']; echo $nam;?></th>
							<td><?php $poin=$this->m_poling->poling($row->no_urut,$cmp,$thn)->row_array()['poin']; echo $poin;?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
				<div id="target2"></div>
			</div><div class="span1"></div>
			<div class="span3"></br>
				<table class="table table-bordered" style="font-size:10px">
					<strong><center>Keterangan :</center><br><strong>
					<thead>
					<tr bgcolor="#A7C942">
						<th>No Urut</th>
						<th>Nama Calon</th>
						<th>Poin Suara</th>
					</tr>
					</thead>
					<tbody>
					<?php $no=0; foreach($calon as $cal): $no++;?>
						<tr>
							<td><?php echo $cal->no_urut;?></td>
							<td><?php $nam=$this->m_mahasiswa->cek_id($cal->nim)->row_array()['nama_mahas']; echo $nam;?></td>
							<td><center><?php $poin=$this->m_poling->poling($cal->no_urut,$cmp,$thn)->row_array()['poin']; 
								if($poin!=null){echo $poin;}else{ echo '0';}?></center></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<script type="text/javascript">
				var $jnoc = jQuery.noConflict();
				$jnoc(function() {
					$jnoc('#source2').tableBarChart('#target2', '', true);
				});
				$jnoc("#source2").hide('Fast');
			</script>
			</div>
		</div><!--/span-->
	</div>	
</div>
<?php $this->load->view('admin/hasil/butcetak.php');?>