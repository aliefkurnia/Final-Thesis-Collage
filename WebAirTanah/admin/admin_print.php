<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";
$pk="";
$field="status";
$TB=$tbadmin;
$item="Admin";



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
    <th width="10%">IDAdm</td>
    <th width="20%">Nama Admin</td>
    <th width="20%">Email</td>
	<th width="20%">Telepon</td>
	 <th width="20%">Keterangan</td>
  </tr>
<?php  
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_admin=$d["id_admin"];
				$nama_admin=ucwords($d["nama_admin"]);
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_admin</td>
				<td><b>$nama_admin</b></td>
				<td>$email</td>	
				<td>$telepon</td>	
				<td>$keterangan</td>
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>