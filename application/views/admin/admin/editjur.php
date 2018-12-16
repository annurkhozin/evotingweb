<div class="control-group">
	<label class="span1"></label>
	<label class="span3">Admin Camapign</label>
	<div class="controls">
		<select required name="camp" class="span10">
		<option  value="<?php echo $idj;?>"><?php if($idj==null){echo $nj;}else{echo'Pilih Campaign';};?></option>
		<?php $campg=$this->m_campaign->ambil_data(1); foreach($campg->result_array() as $j)
			{ echo "<option value='".$j['id_campaign']."'>".$j['id_campaign']." - ".$j['nama_campaign']."</option>";}?>
		</select>
	</div>
</div>