<?php
// Menghindari error cannot modify header information
ob_start(); // Initiate the output buffer
?>
<html lang = "id">
<title></title>
<head>
	<!-- Stylesheets -->
	
    <link href="<?php echo "$d[alamat_website]/$f[folder]/css/bootstrap.min.css" ?>" rel="stylesheet">
    <link href="<?php echo "$d[alamat_website]/$f[folder]/css/font-awesome.min.css" ?>" rel="stylesheet">	
    <link href="<?php echo "$d[alamat_website]/$f[folder]/css/prettyPhoto.css" ?>" rel="stylesheet">
    <link href="<?php echo "$d[alamat_website]/$f[folder]/css/price-range.css" ?>" rel="stylesheet">
    <link href="<?php echo "$d[alamat_website]/$f[folder]/css/animate.css" ?>" rel="stylesheet">
	<link href="<?php echo "$d[alamat_website]/$f[folder]/css/main.css" ?>" rel="stylesheet">
	<link href="<?php echo "$d[alamat_website]/$f[folder]/css/responsive.css" ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo "$d[alamat_website]/$f[folder]/images/ico/apple-touch-icon-144-precomposed.png" ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo "$d[alamat_website]/$f[folder]/images/ico/apple-touch-icon-114-precomposed.png" ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo "$d[alamat_website]/$f[folder]/images/ico/apple-touch-icon-72-precomposed.png" ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo "$d[alamat_website]/$f[folder]/images/ico/apple-touch-icon-57-precomposed.png" ?>">

	<!-- Menu/CSS -->
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo "$d[alamat_website]/$f[folder]/css/styles-menu.css" ?>">
	

	
	<!-- JavaScripts/jQuery -->
	<script src="<?php echo "$d[alamat_website]/$f[folder]/js/jquery.js" ?>"></script>
	<script src="<?php echo "$d[alamat_website]/$f[folder]/js/bootstrap.min.js" ?>"></script>
	<script src="<?php echo "$d[alamat_website]/$f[folder]/js/jquery.scrollUp.min.js" ?>"></script>
	<script src="<?php echo "$d[alamat_website]/$f[folder]/js/price-range.js" ?>"></script>
    <script src="<?php echo "$d[alamat_website]/$f[folder]/js/jquery.prettyPhoto.js" ?>"></script>
    <script src="<?php echo "$d[alamat_website]/$f[folder]/js/main.js" ?>"></script>
</head>
<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +62 812 900 942 68</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> sammy_florist@yahoo.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo "$d[alamat_website]/index.php" ?>"><img src="<?php echo "$d[alamat_website]/$f[folder]/images/home/flower1.jpg" ?>" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-shopping-cart"></i> <span class="badge badge-notify my-cart-badge"></span> Cart</a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row-menu">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
							 <?php  
							  // query menu utama 
							  $querymenu = "SELECT * FROM menu_tm WHERE id_parent='0' AND aktif='Y'";
							  $hasilmenu = mysqli_query($konek, $querymenu);
					  
							  while ($r=mysqli_fetch_array($hasilmenu)) {
								echo "<li><a href=\"$r[link]\">$r[nama_menu]</a>";
								// query submenu
								$querysubmenu = "SELECT * FROM menu_tm WHERE id_parent='$r[id_menu]' AND aktif='Y'";
								$hasilsubmenu = mysqli_query($konek, $querysubmenu);
								$jumlah   = mysqli_num_rows($hasilsubmenu);
								// apabila ada submenu
								if ($jumlah > 0){
								  echo "<ul role=\"menu\" class=\"sub-menu\">";  // <ul> untuk submenu
								  while($w=mysqli_fetch_array($hasilsubmenu)){
									echo "<li class=\"has-sub\"><a href=\"$w[link]\">$w[nama_menu]</a></li>";
								  }
								  echo "</ul>";      
								}
								echo "</li>";
							  }       
							?>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-FLOWER</h1>
									<h2>Free Flower</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo "$d[alamat_website]/$f[folder]/images/slider/slider1.jpg" ?>" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-FLOWER</h1>
									<h2>100% Rapih</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo "$d[alamat_website]/$f[folder]/images/slider/slider2.jpg" ?>" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-FLOWER</h1>
									<h2>Free Ongkir</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo "$d[alamat_website]/$f[folder]/images/slider/slider3.jpg" ?>" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Karangan Bunga
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Ucapan Selamat </a></li>
											<li><a href="#">Duka Cita </a></li>
											<li><a href="#">Pernikahan </a></li>
											<li><a href="#">Ulang Tahun</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Bunga
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Tulip</a></li>
											<li><a href="#">Mawar</a></li>
											<li><a href="#">Melati</a></li>
											<li><a href="#">Bangkai</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!--/category-products-->				
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<?php include "content.php" ?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	<footer id="footer"><!--Footer-->	
		<div class="footer-widget">
			<div class="container">
				<div class="row">
				    <div class="col-sm-2">
						<div class="single-widget">
							<h2>Profil</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Store Location</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">How To Buy</a></li>
								<li><a href="#">How To Sell</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Us</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 Sammy-Florist. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
</body>