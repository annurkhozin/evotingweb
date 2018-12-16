
<script src="<?=base_url()?>assets/highcharts/highcharts.js"></script>
<script src="<?=base_url()?>assets/highcharts/highcharts-3d.js"></script>
<?php $thn=$this->uri->segment(3);
	$campg=$this->uri->segment(2);
	$campaign=$this->m_campaign->cek_id($campg)->row_array()['nama_campaign'];
	$calon=$this->m_calon->ambil_data(1,$campg,$thn)->result();
?>

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
<div class="pie"></div>

<script>
chartpie();
function chartpie(){
	$('.pie').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 25,
				beta: 0
			}
		},
		title: {
			text: 'Persentase <?=$campaign.' '.$this->uri->segment(3)?>'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
			allowPointSelect: true,
			cursor: 'pointer',
			depth: 65,
			dataLabels: {
				enabled: true,
				format: '<b>{point.name}</b>: {point.percentage:.1f} %',
				style: {
				color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
				}
			}
			}
		},
		series: [{
			name: 'Persentase',
			colorByPoint: true,
			data: [
				<?php $no=1;foreach($calon as $row) { 
						$cln=$this->m_mahasiswa->cek_id($row->nim)->row_array();
						$poin=$this->m_poling->poling($row->no_urut,$campg,$thn)->row_array()['poin'];
						if($poin>0){
							$point = $poin;
						}else{
						$point = 0;
						}?>
				{
					name: "<?=$cln['nama_mahas'];?>",
					y: <?=$point?>
					<?php if($no!=count($calon)){?>
					},
					<?php }else{?>
					}
					<?php }?>
				<?php $no++;}?>
				
			],
			showInLegend: true
		}]
	});

	}
</script>
