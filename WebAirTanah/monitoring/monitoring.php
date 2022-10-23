<?php

$tanggal=WKT(date("Y-m-d"));
$jam=date("H:i:s");
$pro="simpan";
$gambar0="avatar.jpg";
$sensor_m1=rand(300,1000);
$sensor_t1=rand(20,40);
$sensor_m2=rand(300,1000);
$sensor_t2=rand(20,40);
$motor="ON";
$keterangan="";
//$PATH="ypathcss";
?>
  

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('monitoring/monitoring_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, sensor_t2=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_monitoring=$_GET["kode"];
	$sql="select * from `$tbmonitoring` where `id_monitoring`='$id_monitoring'";
	$d=getField($conn,$sql);
				$id_monitoring=$d["id_monitoring"];
				$id_monitoring0=$d["id_monitoring"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$sensor_m1=$d["sensor_m1"];
				$sensor_t1=$d["sensor_t1"];
				$sensor_m2=$d["sensor_m2"];
				$sensor_t2=$d["sensor_t2"];
				$motor=$d["motor"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>
 <link rel="stylesheet" href="jsacordeon/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
  <script src="jsacordeon/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
	
	
    <div id="accordion">
  <h3>Masukan Data Monitoring</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table" >

			

<tr>
<td height="24"><label for="sensor_m1"><?php echo $asensor_m1;?></label>
<td>:<td><input  required   name="sensor_m1" type="number" class="form-control" id="sensor_m1" value="<?php echo $sensor_m1;?>" size="25" />
<td height="24"><label for="sensor_t1"><?php echo $asensor_t1;?></label>
<td>:<td><input  required name="sensor_t1" type="number" class="form-control" id="sensor_t1" value="<?php echo $sensor_t1;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="sensor_m2"><?php echo $asensor_m2;?></label>
<td>:<td><input  required   name="sensor_m2" type="number" class="form-control" id="sensor_m2" value="<?php echo $sensor_m2;?>" size="25" />
<td height="24"><label for="sensor_t2"><?php echo $asensor_t2;?></label>
<td>:<td><input  required name="sensor_t2" type="number" class="form-control" id="sensor_t2" value="<?php echo $sensor_t2;?>" size="25" />
</td>
</tr>


<tr>
<td height="24"><label for="motor">Motor</label>
<td>:<td colspan="6"> <input type="radio" name="motor" id="motor"  checked="checked" value="ON" <?php if($motor=="ON"){echo"checked";}?>/>ON
<input type="radio" name="motor" id="motor" value="OFF" <?php if($motor=="OFF"){echo"checked";}?>/>OFF
</td>
</tr>
<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td colspan="6"><textarea name="keterangan" cols="55" class="form-control" rows="2"><?php echo $keterangan; ?></textarea>
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
       
        <input name="id_monitoring" type="hidden" id="id_monitoring" value="<?php echo $id_monitoring;?>" />
        <input name="id_monitoring0" type="hidden" id="id_monitoring0" value="<?php echo $id_monitoring0;?>" />
        <a href="?mnu=monitoring"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
  $sqlc="select distinct(`tanggal`) from `$tbmonitoring` order by `tanggal` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data monitoring belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$tanggal=$dc["tanggal"];
				?>
<h3>Data Monitoring <?php echo WKT($tanggal)?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $tanggal;?>')"> |
<br>

<table class="table">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
    <th width="25%">Waktu</td>
	<th width="5%"><?php echo $asensor_m1;?></td>
	<th width="5%"><?php echo $asensor_t1;?></td>
    <th width="5%"><?php echo $asensor_m2;?></td>
	<th width="5%"><?php echo $asensor_t2;?></td>
    <th width="5%">Motor</td>
    <th width="10%">Keterangan</td>
    <th width="10%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbmonitoring` where  `tanggal`='$tanggal' order by `id_monitoring` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page=1;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}


$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
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
				<td><div align='center'>
<a href='?mnu=monitoring&pro=ubah&kode=$id_monitoring'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=monitoring&pro=hapus&kode=$id_monitoring'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tanggal pada data monitoring ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data monitoring belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=monitoring'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=monitoring'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=monitoring'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";

echo"</div>";
}//for atas
?>


</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$tanggal = date("Y-m-d");
	$jam = date("H:i:s");
	$sensor_m1=strip_tags($_POST["sensor_m1"]);
	$sensor_t1=strip_tags($_POST["sensor_t1"]);
	$sensor_m2=strip_tags($_POST["sensor_m2"]);
	$sensor_t2=strip_tags($_POST["sensor_t2"]);
	$motor=strip_tags($_POST["motor"]);
	$keterangan=strip_tags($_POST["keterangan"]);
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbmonitoring` (
`tanggal` ,
`jam` ,
`sensor_m1` ,
`sensor_t1` ,
`sensor_m2` ,
`sensor_t2` ,
`motor`,
`keterangan`

) VALUES (
'$tanggal',
'$jam',
'$sensor_m1', 
'$sensor_t1',
'$sensor_m2',
'$sensor_t2',
'$motor',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $tanggal berhasil disimpan !');document.location.href='?mnu=monitoring';</script>";}
		else{echo"<script>alert('Data $tanggal gagal disimpan...');document.location.href='?mnu=monitoring';</script>";}
	}
	else{
	$id_monitoring=strip_tags($_POST["id_monitoring"]);
	$id_monitoring0=strip_tags($_POST["id_monitoring0"]);
	$sql="update `$tbmonitoring` set ,
	`sensor_m1`='$sensor_m1',
	`sensor_t1`='$sensor_t1' ,
	`sensor_m2`='$sensor_m2',
	`sensor_t2`='$sensor_t2',
	`motor`='$motor',
	`keterangan`='keterangan'
	 where `id_monitoring`='$id_monitoring0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $tanggal berhasil diubah !');document.location.href='?mnu=monitoring';</script>";}
		else{echo"<script>alert('Data $tanggal gagal diubah...');document.location.href='?mnu=monitoring';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_monitoring=$_GET["kode"];
$tanggal=$_GET["tanggal"];
$sql="delete from `$tbmonitoring` where `id_monitoring`='$id_monitoring'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $tanggal berhasil dihapus !');document.location.href='?mnu=monitoring';</script>";}
	else{echo"<script>alert('Data $tanggal gagal dihapus...');document.location.href='?mnu=monitoring';</script>";}
}

if(isset($_GET["pro"]) && $_GET["pro"]=="generate"){
$sql="Truncate `$tbmonitoring`";
$hapus=process($conn,$sql);

for($j=1;$j<30;$j++){
	$tg=$j;
	if($j<10){$tg="0".$j;}
	
	$tanggal="2022-03-$tg";
for($i=1;$i<=50;$i++){
	$sensor_m1=rand(25,40);
	$sensor_m2=rand(25,40);
	$rata_m=($sensor_m1+$sensor_m2)/2;
	$sensor_t1=rand(60,90);
	$sensor_t2=rand(60,90);
	$rata_t=($sensor_t1+$sensor_t2)/2;
	$motor="OFF";
	if($rata_m>30 || $rata_t>80){
		$motor="ON";
	}
	
	
	
	
 $sql=" INSERT INTO `$tbmonitoring` (
`tanggal` ,
`jam` ,
`sensor_m1` ,
`sensor_t1` ,
`sensor_m2` ,
`sensor_t2` ,
`motor`,
`keterangan`
) VALUES (
'$tanggal',
'".date('H:i:s')."',
'$sensor_m1', 
'$sensor_t1',
'$sensor_m2',
'$sensor_t2',
'$motor',
'Generate'
)";
	
$simpan=process($conn,$sql);
}
}
echo "<script>alert('Generate Data Monitoring berhasil  !');document.location.href='?mnu=monitoring';</script>";
}
?>

