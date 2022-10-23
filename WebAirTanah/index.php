<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu="";
if(isset($_GET["mnu"])){
	$mnu=$_GET["mnu"];
}

date_default_timezone_set("Asia/Jakarta");

if(!isset($_SESSION["cid"])){
	die("<script>location.href='login.php'</script>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title><?php echo $tittle;?></title>

    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">
	<link rel="stylesheet" href="assets/css/ollie.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
        <!-- //45 logo pojok -->
            <a class="navbar-brand" href="#"><img src="assets/imgs/brand.svg" alt="" class="brand-img"></a>  
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
  				<?php
if(isset($_SESSION["cid"])){	
      echo"
	  <li class='nav-item' ";if($mnu=="home"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=home'><font color='red'>Home</font></a></li>
      <li class='nav-item'";if($mnu=="admin"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=admin'><font color='red'>Admin</font></a></li>
	  <li class='nav-item'";if($mnu=="monitoring"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=monitoring'><font color='red'>Monitoring</font></a></li>
	  <li class='nav-item'";if($mnu=="controlling"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=controlling'><font color='red'>Controlling</font></a></li>
	   <li class='nav-item'";if($mnu=="rekapitulasi"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=rekapitulasi'><font color='red'>Rekapitulasi</font></a></li>
	   <li class='nav-item'";if($mnu=="grafik"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=grafik'><font color='red'>Grafik</font></a></li>
      <li class='nav-item'";if($mnu=="logout"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=logout'><font color='red'>Logout</font></a></li>";
}
else{
	 echo"<li class='nav-item'";if($mnu=="home"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=home'>Home</a></li>";
	 echo"<li class='nav-item'";if($mnu=="login"){echo"class='active'";} echo"><a class='nav-link smoothScroll' href='index.php?mnu=login'>Login</a></li>";	 
	}
      ?>  
              
                </ul>
            </div>
        </div>
    </nav>

<?php if($mnu=="home" || $mnu==""){?>
    <header id="home" class="header">
        <div class="overlay"></div>

        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">  
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">Aplikasi Monitoring<br>  Ketersediaan Air Tanah</h1>
                        </div>
                    </div>
                </div>
            </div>        
        </div>

        <div class="infos container mb-4 mb-md-2">
            <div class="title">
                <h5>Nama Mahasiswa</h5>
                <p class="font-small">NIM</p>
            </div>
            <div class="socials text-right">
                <div class="row justify-content-between">
                    <div class="col">
                        <a class="d-block subtitle"><i class="ti-microphone pr-2"></i> 081-949-642-681</a>
                        <a class="d-block subtitle"><i class="ti-email pr-2"></i> nama1831049@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php }?>

<?php if($mnu=="home" || $mnu==""){} else {echo"<br><br><br><br><br>";}?>
    <section class="section" id="about">

        <div class="container">

 	           <?php 

				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="monitoring"){require_once"monitoring/monitoring.php";}
else if($mnu=="controlling"){require_once"controlling/controlling.php";}
else if($mnu=="rekapitulasi"){require_once"rekapitulasi.php";}
else if($mnu=="grafik"){require_once"grafik.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else {require_once"home.php";}
 ?>
          
        </div>
    </section>


    <!-- <section id="contact" class="section pb-0">

        <div class="container">
            <h3 class="section-title mb-5">Contact Us</h3>

            <div class="row align-items-center justify-content-between">
                <div class="col-md-8 col-lg-7">

                    <form class="contact-form">
                        <div class="form-row">
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Your Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Send Message">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 d-none d-md-block order-1">
                    <ul class="list">
                        <li class="list-head">
                            <h6>CONTACT INFO</h6>
                        </li>
                        <li class="list-body">
                            <p class="py-2">Contact us and we'll get back to you within 24 hours.</p>
                            <p class="py-2"><i class="ti-location-pin"></i> Institut Teknologi PLN Jakarta</p>
                            <p class="py-2"><i class="ti-email"></i>  gema1831049@itpln.com</p>
                            <p class="py-2"><i class="ti-microphone"></i> 081-949-642-681</p>

                        </li>
                    </ul> 
                </div>
            </div> -->

             <footer class="footer mt-5 border-top">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 text-center text-md-left">
                        <p class="mb-0">Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a target="_blank" href="http://www.devcrud.com">DevCRUD</a></p>
                    </div>
                </div> 
            </footer> 
        </div>
    </section>
	
	<!-- core  --><?php if($mnu=="home" || $mnu==""){?>

    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script><?php } ?>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    
    <!-- Owl carousel  -->
    <script src="assets/vendors/owl-carousel/js/owl.carousel.js"></script>


    <!-- Ollie js -->
    <script src="assets/js/Ollie.js"></script>

</body>
</html>
