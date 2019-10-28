<?php
// Menghindari error cannot modify header information
ob_start(); // Initiate the output buffer
?>
<html lang = "id">
<title>Sammy-Florist</title>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="<?php echo "$d[alamat_website]/$f[folder]/bootstrap/css/bootstrap.min.css" ?>" rel="stylesheet">      
		<link href="<?php echo "$d[alamat_website]/$f[folder]/bootstrap/css/bootstrap-responsive.min.css" ?>" rel="stylesheet">
		
		<link href="<?php echo "$d[alamat_website]/$f[folder]/themes/css/bootstrappage.css" ?>" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="<?php echo "$d[alamat_website]/$f[folder]/themes/css/flexslider.css" ?>" rel="stylesheet"/>
		<link href="<?php echo "$d[alamat_website]/$f[folder]/themes/css/main.css" ?>" rel="stylesheet"/>
		<link href="<?php echo "$d[alamat_website]/$f[folder]/themes/css/font-awesome.min.css" ?>" rel="stylesheet"/>

		<!-- scripts -->
		<script src="<?php echo "$d[alamat_website]/$f[folder]/themes/js/jquery-1.7.2.min.js" ?>"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/bootstrap/js/bootstrap.min.js" ?>"></script>				
		<script src="<?php echo "$d[alamat_website]/$f[folder]/themes/js/superfish.js" ?>"></script>	
		<script src="<?php echo "$d[alamat_website]/$f[folder]/themes/js/jquery.scrolltotop.js" ?>"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="<?php echo "$d[alamat_website]/$f[folder]/js/respond.min.js" ?>"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">
							<li><a href="<?php echo "$d[alamat_website]/semua-cart.html" ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							<li><a href="<?php echo "$d[alamat_website]/$f[folder]/checkout.html" ?>"><i class="fa fa-crosshairs"></i> Checkout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<!--<a href="index.html" class="logo pull-left"><img src="themes/images/flower1.jpg" class="site_logo" alt=""></a>-->
					<nav id="menu" class="pull-right">
						<ul>
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
					</nav>
				</div>
			</section>
			<section class="main-content">
				<?php include "content.php" ?>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.html">Homepage</a></li>  
							<li><a href="./about.html">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>						
						</ul>					
					</div>			
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright © 2017 Sammy-Florist. All rights reserved.</span>
			</section>
		</div>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/themes/js/common.js" ?>"></script>
		<script src="<?php echo "$d[alamat_website]/$f[folder]/themes/js/jquery.flexslider-min.js" ?>"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>