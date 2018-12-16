
<script src="<?=base_url()?>assets/highcharts/highcharts.js"></script>
<script src="<?=base_url()?>assets/highcharts/highcharts-3d.js"></script>
<?php $thn=$this->uri->segment(3);
	$campg=$this->uri->segment(2);
	$campaign=$this->m_campaign->cek_id($campg)->row_array()['nama_campaign'];
	$calon=$this->m_calon->ambil_data(1,$campg,$thn)->result();
?>

<div style="width:100%" class="batang"></div>
<div>
	<table class="table table-bordered" style="font-size:11px; width:100%">
	<thead>
		<tr style="background: #D3D3D3;">
				<th style="width:19%" >No Urut</th>
				<th style="width:50%" >Nama Calon</th>
				<th style="width:25%; text-align:center;" >Poin Suara</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach($calon as $cal): $no++;?>
			<tr>
				<td><?php echo $cal->no_urut;?></td>
				<td><?php $nam=$this->m_mahasiswa->cek_id($cal->nim)->row_array()['nama_mahas']; echo $nam;?></td>
				<td><center><?php $poin=$this->m_poling->poling($cal->no_urut,$campg,$thn)->row_array()['poin']; 
		if($poin!=null){echo $poin;}else{ echo '0';}?> poin</center></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>	
<script>
chart();
function chart(){
	$('.batang').highcharts({
		chart: {
			type: 'column',
			options3d: {
				enabled: true
			}
		},
		title: {
			text: 'Perolehan Suara <?=$campaign.' '.$this->uri->segment(3)?>'
		},
		xAxis: {
			type: 'category',
			labels: {
			skew3d: true,
				style: {
					fontSize: '14px'
				}
			}
		},
		yAxis: {
			title: {
				text: 'Perolehan poin suara'
			}

		},
		legend: {
			enabled: false
		},
		plotOptions: {
			column: {
				depth: 250
			},
			series: {
				borderWidth: 0,
				animation: false,
				dataLabels: {
					enabled: true,
					useHTML: true,
					formatter : function(){
						var img = this.point.photo;
						return '<svg version="1.1"><image xlink:href="<?php echo base_url();?>upload/'+img+'" height="100%" width="100%"/></svg>'  ; 
					},
				}
			}
		},

		tooltip: {
			pointFormat: '<b>{point.y}</b> point suara<br/>'
		},
		// showInLegend: true,

		"series": [
			{
				"name": "Kandidat",
				"colorByPoint": true,
				"data": [
					<?php $no=1;foreach($calon as $row) { 
						$cln=$this->m_mahasiswa->cek_id($row->nim)->row_array();
						$poin=$this->m_poling->poling($row->no_urut,$campg,$thn)->row_array()['poin'];
						if($poin>0){
							$point = $poin;
						}else{ 
						$point = 0;
						}?>
					{
						"name": "<?=$cln['nama_mahas'];?> :: <?=$point?> poin",
						"y": <?=$point?>,
						"photo": "<?=$row->gambar;?>",
						"namacalon": "<?=$cln['nama_mahas'];?>"
					<?php if($no!=count($calon)){?>
					},
					<?php }else{?>
					}
					<?php }?>
				<?php $no++;}?>
				]
			}
		]
	});

	}
</script>
