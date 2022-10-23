<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";
$pk="";
$field="tanggal";
$TB=$tbmonitoring;
$item="Monitoring";



  $sql="select * from `$TB` order by `$field` asc";
  if(isset($_GET["pk"])){
	$pk=$_GET["pk"];
		$sql="select * from `$TB` where `$field`='$pk' order by `$field` asc";
  }

  echo "<h3><center>Laporan Data $item $pk</h3>";
  ?>


 

<table width="98%" border="0">
  <tr>
  <th width="3%">No</td>
    <th width="25%">Waktu</td>
	<th width="5%"><?php echo $asensor_m1;?></td>
	<th width="5%"><?php echo $asensor_t1;?></td>
    <th width="5%"><?php echo $asensor_m2;?></td>
	<th width="5%"><?php echo $asensor_t2;?></td>
    <th width="5%">Motor</td>
    <th width="10%">Keterangan</td>
  </tr>
<?php  
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_monitoring=$d["id_monitoring"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$sensor_m1=$d["sensor_m1"];
				$sensor_t1=$d["sensor_t1"];
				$sensor_m2=$d["sensor_m2"];
				$sensor_t2=$d["sensor_t2"];
				$motor=$d["motor"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$tanggal $jam</td>
				<td>$sensor_m1</td>
				<td>$sensor_t1</td>
				<td>$sensor_m2</td>
				<td>$sensor_t2</td>
				<td>$motor</td>
				<td>$keterangan</td>
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>