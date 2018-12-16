<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="56%">&nbsp;</td>
    <td width="44%"><br>
    <center>Bojonegoro <?php
	date_default_timezone_set('Asia/Jakarta'); $jam=date('Y-m-d H:i:s');
/* script menentukan hari */  
 $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
 $hr = $array_hr[date('N')];

/* script menentukan tanggal */    
$tgl= date('d');
/* script menentukan bulan */ 
  $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
  $bln = $array_bln[date('n')];
/* script menentukan tahun */ 
$thn = date('Y');
/* script perintah keluaran*/ 
 echo $hr . ", " . $tgl . " " . $bln . " " . $thn;
 ?>  <br />Ttd,<br />
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    (________________)</center>
    </td>
  </tr>
</table>