<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
$nama_admin="";
$username="";
$password="";
$telepon="";
$email="";
$keterangan="";
//$PATH="ypathcss";
?> 

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('admin/admin_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_admin` from `$tbadmin` order by `id_admin` desc";
  $jum= getJum($conn,$sql);
  $kd="ADM";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['id_admin'];	
				$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
  $id_admin=$idmax;
?>
<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_admin=$_GET["kode"];
	$sql="select * from `$tbadmin` where `id_admin`='$id_admin'";
	$d=getField($conn,$sql);
				$id_admin=$d["id_admin"];
				$id_admin0=$d["id_admin"];
				$nama_admin=$d["nama_admin"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
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
  <h3>Masukan Data Admin</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table">
<tr>
<th width="119"><label for="id_admin">ID Admin</label>
<th width="10">:
<th colspan="2"><b><?php echo $id_admin;?></b></tr>
<tr>
<td><label for="nama_admin">Nama Admin</label>
<td>:<td width="396"><input required name="nama_admin" class="form-control" type="text" id="nama_admin" value="<?php echo $nama_admin;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="telepon">Telepon</label>
<td>:<td><input  required name="telepon" type="number" class="form-control" id="telepon" value="<?php echo $telepon;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:<td><input  required name="email" type="email" class="form-control" id="email" value="<?php echo $email;?>" size="25" />
</td>
</tr>
<tr>
<td height="24"><label for="username">Username</label>
<td>:<td><input required  name="username" type="text" class="form-control" id="username" value="<?php echo $username;?>" size="25" /></td>
</tr>

<tr>
<td height="24"><label for="password">Password</label>
<td>:<td><input  required   name="password" type="password" class="form-control" id="password" value="<?php echo $password;?>" size="25" /></td>
</tr>
<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td>
<textarea name="keterangan" cols="55" class="form-control" rows="2"><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_admin" type="hidden" id="id_admin" value="<?php echo $id_admin;?>" />
        <input name="id_admin0" type="hidden" id="id_admin0" value="<?php echo $id_admin0;?>" />
        <a href="?mnu=admin"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
  $sqlc="select distinct(`status`) from `$tbadmin` order by `status` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data Admin belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$status=$dc["status"];
				?>
<h3>Data Admin <?php echo $status?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status;?>')"> |
<br>

<table class="table">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
    <th width="10%">IDAdm</td>
    <th width="20%">Nama Admin</td>
    <th width="20%">Telepon</td>
	 <th width="20%">Keterangan</td>
    <th width="15%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbadmin` where  `status`='$status' order by `id_admin` desc";
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
				<td><a href='$mailto:$email' title='$email'><b>$nama_admin</b></a></td>
				<td>$telepon</td>	
				<td>$keterangan</td>
				<td><div align='center'>
<a href='?mnu=admin&pro=ubah&kode=$id_admin'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=admin&pro=hapus&kode=$id_admin&nama_admin=$nama_admin'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_admin pada data admin ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data admin belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=admin'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=admin'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=admin'>Next »</a></span>";
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
	$id_admin=strip_tags($_POST["id_admin"]);
	$id_admin0=strip_tags($_POST["id_admin0"]);
	$username=strip_tags($_POST["username"]);
	$nama_admin=strip_tags($_POST["nama_admin"]);
	$password=strip_tags($_POST["password"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbadmin` (
`id_admin` ,
`nama_admin` ,
`username` ,
`password` ,
`telepon` ,
`email` ,
`status` ,
`keterangan`
) VALUES (
'$id_admin', 
'$nama_admin',
'$username',
'$password', 
'$telepon',
'$email',
'$status',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $nama_admin berhasil disimpan !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $nama_admin gagal disimpan...');document.location.href='?mnu=admin';</script>";}
	}
	else{
	$sql="update `$tbadmin` set 
	`nama_admin`='$nama_admin',
	`username`='$username',
	`password`='$password',
	`telepon`='$telepon' ,
	`email`='$email',
	`status`='$status',
	`keterangan`='$keterangan'
	 where `id_admin`='$id_admin0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $nama_admin berhasil diubah !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $nama_admin gagal diubah...');document.location.href='?mnu=admin';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_admin=$_GET["kode"];
$nama_admin=$_GET["nama_admin"];
$sql="delete from `$tbadmin` where `id_admin`='$id_admin'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $nama_admin berhasil dihapus !');document.location.href='?mnu=admin';</script>";}
	else{echo"<script>alert('Data $nama_admin gagal dihapus...');document.location.href='?mnu=admin';</script>";}
}
?>
