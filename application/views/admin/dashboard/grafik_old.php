<style type="text/css">
	caption {
		background: #D3D3D3;
	}
	#target {
		width: 500px;
		height: 280px;
	}
	#target2 {
		width: 800px;
		height: 280px;
	}
</style>
<link href="<?php echo base_url('assets/css/TableBarChart.css');?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/TableBarChart.js');?>"></script>
<div class="span7">
	<table id="source2">
		<caption><u>Grafik Perolehan Suara - </u><?php echo $campaign;?></caption>
		<thead>
			<tr>
				<th></th>
				<th><b>Suara</b></th>	
			</tr>
		</thead>
		<tbody>
		<?php $thn=date('Y');
			  $calon=$this->m_calon->ambil_data(1,$campg,$thn)->result();
			  $no=0; foreach($calon as $row): $no++;?>
			<tr>
				<th><?php $nam=$this->m_mahasiswa->cek_id($row->nim)->row_array()['nama_mahas']; echo $nam;?></th>
				<td><?php $poin=$this->m_poling->poling($row->no_urut,$campg,$thn)->row_array()['poin']; echo $poin;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	<div id="target2"></div>
</div><div class="span1"></div>
<div class="span3"></br>
	<table class="table table-bordered" style="font-size:11px; width:100%">
		<strong><center>Keterangan :</center><br><strong>
		<thead>
		<tr style="bg-color:#fff000;">
			<th style="width:19%" >No Urut</th>
			<th style="width:50%" >Nama Calon</th>
			<th style="width:25%" >Poin Suara</th>
		</tr>
		</thead>
		<tbody>
		<?php $no=0; foreach($calon as $cal): $no++;?>
			<tr>
				<td><?php echo $cal->no_urut;?></td>
				<td><?php $nam=$this->m_mahasiswa->cek_id($cal->nim)->row_array()['nama_mahas']; echo $nam;?></td>
				<td><center><?php $poin=$this->m_poling->poling($cal->no_urut,$campg,$thn)->row_array()['poin']; 
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