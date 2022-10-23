<?php

$tanggal=WKT(date("Y-m-d"));
$jam=date("H:i:s");
$pro = "simpan";
$status = "0";
$perintah = "";
$keterangan = "";
//$PATH="ypathcss";
?>

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('controlling/controlling_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
if (isset($_GET["pro"]) && $_GET["pro"] == "ubah") {
	$id_controlling=$_GET["kode"];
	$sql="select * from `$tbcontrolling` where `id_controlling`='$id_controlling'";
	$d=getField($conn,$sql);
				$id_controlling=$d["id_controlling"];
				$id_controlling0=$d["id_controlling"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$id_admin=$d["id_admin"];
				$perintah=$d["perintah"];
				$status=$d["status"];
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
  <h3>Masukan Data Controlling</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table  class="table table-bordered" >


<tr>
<td><label for="perintah">Perintah</label>
<td>:<td colspan="2">
<input type="radio" name="perintah" id="perintah"  checked="checked" value="Motor ON" <?php if($perintah=="Motor ON"){echo"checked";}?>/>Motor ON 
<input type="radio" name="perintah" id="perintah" value="Motor OFF" <?php if($perintah=="Motor OFF"){echo"checked";}?>/>Motor OFF 
</td></tr>


<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan"  class="btn btn-primary" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_controlling" type="hidden" id="id_controlling" value="<?php echo $id_controlling;?>" />
        <input name="id_controlling0" type="hidden" id="id_controlling0" value="<?php echo $id_controlling0;?>" />
        <a href="?mnu=controlling"><input name="Batal" type="button" class="btn btn-danger" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
  $sqlc="select distinct(`tanggal`) from `$tbcontrolling` order by `tanggal` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data controlling belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$tanggal=$dc["tanggal"];
				?>
<h3>Data Controlling <?php echo WKT($tanggal)?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $tanggal;?>')"> |
<br>

<table  class="table table-bordered">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
	<th width="20%">Waktu</td>
    <th width="15%">Perintah</td>
	<th width="2%">Status</td>
    <th width="13%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbcontrolling` where  `tanggal`='$tanggal' order by `id_controlling` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
if (empty($page)) {
	$posawal  = 0;
	$page = 1;
	} else {
	$posawal = ($page - 1) * $batas;
}

$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_controlling=$d["id_controlling"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$perintah=$d["perintah"];
				$status=$d["status"];
						$exe="<strike>$perintah</strike>";
							if($status==0){$exe="$perintah";}
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$tanggal $jam</td>
				<td>$exe</td>
				<td>$status</td>				
				<td><div align='center'>
<a href='?mnu=controlling&pro=ubah&kode=$id_controlling'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=controlling&pro=hapus&kode=$id_controlling&perintah=$perintah'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $perintah pada data controlling ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data controlling belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=controlling'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=controlling'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=controlling'>Next »</a></span>";
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
	$id_controlling=strip_tags($_POST["id_controlling"]);
	$id_controlling0=strip_tags($_POST["id_controlling0"]);
	$perintah=strip_tags($_POST["perintah"]);
	$status=0;
	$keterangan=strip_tags($_POST["keterangan"]);
	
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbcontrolling` (
`tanggal` ,
`jam` ,
`perintah` ,
`status` ,
`keterangan`
) VALUES (
'".date('Y-m-d')."',
'".date('H:i:s')."',
'$perintah',
'$status',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $perintah berhasil disimpan !');document.location.href='?mnu=controlling';</script>";}
		else{echo"<script>alert('Data $perintah gagal disimpan...');document.location.href='?mnu=controlling';</script>";}
	}
	else{
	$sql="update `$tbcontrolling` set 
	`perintah`='$perintah' ,
	`status`='$status',
	`keterangan`='$keterangan'
	 where `id_controlling`='$id_controlling0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $perintah berhasil diubah !');document.location.href='?mnu=controlling';</script>";}
		else{echo"<script>alert('Data $perintah gagal diubah...');document.location.href='?mnu=controlling';</script>";}
	}//else simpan
}
?>

<?php
if (isset($_GET["pro"]) && $_GET["pro"] == "hapus") {
$id_controlling=$_GET["kode"];
$perintah=$_GET["perintah"];
$sql="delete from `$tbcontrolling` where `id_controlling`='$id_controlling'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $perintah berhasil dihapus !');document.location.href='?mnu=controlling';</script>";}
	else{echo"<script>alert('Data $perintah gagal dihapus...');document.location.href='?mnu=controlling';</script>";}
}
?>

