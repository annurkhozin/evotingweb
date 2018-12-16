<?php
	if (($angkasa!=null) AND ($langit==null) AND ($awan==null) AND ($tanah==null) AND ($air==null) AND ($bumi==null)){
		echo "<i class='icon-home'></i>";
		echo anchor("$hangkasa",$angkasa);
	} elseif (($angkasa!=null) AND ($langit!=null) AND ($awan==null) AND ($tanah==null) AND ($air==null) AND ($bumi==null)){
		echo "<i class='icon-home'></i>";
		echo anchor("$hangkasa",$angkasa);
		echo $corong;
		echo anchor("$hlangit",$langit);
	} elseif (($angkasa!=null) AND ($langit!=null) AND ($awan!=null) AND ($tanah==null) AND ($air==null) AND ($bumi==null)){
		echo "<i class='icon-home'></i>";
		echo anchor("$hangkasa",$angkasa);
		echo $corong;
		echo anchor("$hlangit",$langit);
		echo $corong;
		echo anchor("$hawan",$awan);
	} elseif (($angkasa!=null) AND ($langit!=null) AND ($awan!=null) AND ($tanah!=null) AND ($air==null) AND ($bumi==null)){
		echo "<i class='icon-home'></i>";
		echo anchor("$hangkasa",$angkasa);
		echo $corong;
		echo anchor("$hlangit",$langit);
		echo $corong;
		echo anchor("$hawan",$awan);
		echo $corong;
		echo anchor("$htanah",$tanah);
	} elseif (($angkasa!=null) AND ($langit!=null) AND ($awan!=null) AND ($tanah!=null) AND ($air!=null) AND ($bumi==null)){
		echo "<i class='icon-home'></i>";
		echo anchor("$hangkasa",$angkasa);
		echo $corong;
		echo anchor("$hlangit",$langit);
		echo $corong;
		echo anchor("$hawan",$awan);
		echo $corong;
		echo anchor("$htanah",$tanah);
		echo $corong;
		echo anchor("$air",$air);
	}elseif (($angkasa!=null) AND ($langit!=null) AND ($awan!=null) AND ($tanah!=null) AND ($air!=null) AND ($bumi!=null)){
		echo "<i class='icon-home'></i>";
		echo anchor("$hangkasa",$angkasa);
		echo $corong;
		echo anchor("$hlangit",$langit);
		echo $corong;
		echo anchor("$hawan",$awan);
		echo $corong;
		echo anchor("$htanah",$tanah);
		echo $corong;
		echo anchor("$hair",$air);
		echo $corong;
		echo anchor("$hbumi",$bumi);
	}
?>