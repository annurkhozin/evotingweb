
<script src="<?=base_url()?>assets/highcharts/highcharts.js"></script>
<script src="<?=base_url()?>assets/highcharts/highcharts-3d.js"></script>
<?php $thn=$this->uri->segment(3);
	$campg=$this->uri->segment(2);
	$campaign=$this->m_campaign->cek_id($campg)->row_array()['nama_campaign'];
	$calon=$this->m_calon->ambil_data(1,$campg,$thn)->result();
?>
<div class="col-md-4" style="background:#E6E6FA">
	<div class="piedosen"></div>
</div>
<div class="col-md-4" style="background:#E6E6FA">
	<div class="piemahasiswa"></div>
</div>
<div class="col-md-4" style="background:#E6E6FA">
	<div class="pietu"></div>
</div>
<?php 
	$dosmi=$this->m_pemilih->topem($campg,'dos',date('Y'))->num_rows();
	$dosmisud=$this->m_pemilih->apem(0,$campg,'dos',date('Y'))->num_rows();

	$mahmi=$this->m_pemilih->topem($campg,'mahas',date('Y'))->num_rows();
	$mahmisud=$this->m_pemilih->apem(0,$campg,'mahas',date('Y'))->num_rows();

	$tumi=$this->m_pemilih->topem($campg,'tu',date('Y'))->num_rows();
	$tumisud=$this->m_pemilih->apem(0,$campg,'tu',date('Y'))->num_rows();
?>
<script>
	piedosen();
	piemahasiswa();
	pietu();
	function piedosen(){
		$('.piedosen').highcharts({	
			chart: {
				styledMode: true
			},

			title: {
				text: 'Pemilih Dosen'
			},

			series: [{
				type: 'pie',
				allowPointSelect: true,
				keys: ['name', 'y', 'selected', 'sliced'],
				data: [
					['Sudah<br>memilih', <?=$dosmisud?>, false],
					['Belum<br>memilih', <?=$dosmi-$dosmisud?>, false]
				],
				showInLegend: true
			}]
		});
	}
	
function piemahasiswa(){
	$('.piemahasiswa').highcharts({
		chart: {
				styledMode: true
			},

			title: {
				text: 'Pemilih Mahasiswa'
			},

			series: [{
				type: 'pie',
				allowPointSelect: true,
				keys: ['name', 'y', 'selected', 'sliced'],
				data: [
					['Sudah<br>memilih', <?=$mahmisud?>, false],
					['Belum<br>memilih', <?=$mahmi-$mahmisud?>, false]
				],
				showInLegend: true
			}]
		});

	}
		
	function pietu(){
		$('.pietu').highcharts({
			chart: {
				styledMode: true
			},

			title: {
				text: 'Pemilih Tatausaha'
			},

			series: [{
				type: 'pie',
				allowPointSelect: true,
				keys: ['name', 'y', 'selected', 'sliced'],
				data: [
					['Sudah<br>memilih', <?=$tumisud?>, false],
					['Belum<br>memilih', <?=$tumi-$tumisud?>, false]
				],
				showInLegend: true
			}]
		});

	}
</script>
