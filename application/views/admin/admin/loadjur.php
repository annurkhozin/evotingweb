<div class="control-group">
	<label class="span1"></label>
	<label class="span3">Admin Campaign</label>
	<div class="controls">
		<select required name="camp" class="span10">
		<option  value="">Pilih Campaign</option>
		<?php $camp=$this->m_campaign->ambil_data(1); foreach($camp->result_array() as $j)
			{ echo "<option value='".$j['id_campaign']."'>".$j['id_campaign']." - ".$j['nama_campaign']."</option>";}?>
		</select>
	</div>
</div>