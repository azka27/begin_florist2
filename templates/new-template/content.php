	<?php
if ($_GET['module']=='home'){
	//Tampilkan Produk
	$queryproduk = "SELECT * FROM produk_tm,kategori WHERE kategori.id_kategori=produk_tm.id_kategori AND publish='Y' AND nama_kategori='Ucapan Selamat'ORDER BY id_produk DESC LIMIT 4";
	$hasilproduk = mysqli_query($konek, $queryproduk);
?>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="<?php echo "$d[alamat_website]/$f[folder]/themes/images/carousel/IMG_20170828_145755.jpg" ?>" alt="" />
						</li>
						<li>
							<img src="<?php echo "$d[alamat_website]/$f[folder]/themes/images/carousel/IMG_20170828_145819.jpg" ?>" alt="" />
						</li>
						<li>
							<img src="<?php echo "$d[alamat_website]/$f[folder]/themes/images/carousel/IMG_20170828_145842.jpg" ?>" alt="" />
						</li>
						<li>
							<img src="<?php echo "$d[alamat_website]/$f[folder]/themes/images/carousel/IMG_20170828_145922.jpg" ?>" alt="" />
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
				We stand for top quality Flower
			</section>
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
											<?php
													while($t=mysqli_fetch_array($hasilproduk)){
														echo "	<li class=\"span3\">
																	<div class=\"product-box\">
																		<p><a href=\"produk-$t[id_produk]-$t[seo].html\"><img src=\"foto_produk/$t[gambar_produk]\" alt=\"\" /></a></p>
																		<a href=\"produk-$t[id_produk]-$t[seo].html\" class=\"title\">$t[nama_produk]</a><br/>
																		<p class=\"price\">Rp$t[harga_produk]</p>
																	</div>
																</li>";
													}
											?>
											</ul>
										</div>
										<?php
											$querypilihan = "SELECT * FROM produk_tm,kategori WHERE kategori.id_kategori=produk_tm.id_kategori AND publish='Y' AND nama_kategori='Duka Cita' ORDER BY id_produk DESC LIMIT 4";
											$hasilpilihan = mysqli_query($konek, $querypilihan);
										?>
										<div class="item">
											<ul class="thumbnails">
											<?php
												while($u=mysqli_fetch_array($hasilpilihan)){
												echo "
												<li class=\"span3\">
													<div class=\"product-box\">
														<p><a href=\"produk-$u[id_produk]-$u[seo].html\"><img src=\"foto_produk/$u[gambar_produk]\" alt=\"\" /></a></p>
														<a href=\"produk-$u[id_produk]-$u[seo].html\" class=\"title\">$u[nama_produk]</a><br/>
														<p class=\"price\">Rp.$u[harga_produk]</p>
													</div>
												</li>";
												}
											?>																															
											</ul>
										</div>
									</div>									
								</div>
							</div>						
						</div>
						<br/>
						<div class="row feature_box">						
							<div class="span4">
								<div class="service">
									<div class="responsive">	
										<img src="<?php echo "$d[alamat_website]/$f[folder]/themes/images/rsz_144386.png" ?>" alt="" />
										<h4>Seluruh <strong>Indonesia</strong></h4>
										<p>Tersedia diberbagai wilayah Indonesia.</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="<?php echo "$d[alamat_website]/$f[folder]/themes/images/feature_img_1.png" ?>" alt="" />
										<h4>Produk <strong>Kekinian</strong></h4>
										<p>Menjual produk mengikuti trend <i>fashion</i> saat ini.</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="<?php echo "$d[alamat_website]/$f[folder]/themes/images/rsz_time.png" ?>" alt="" />
										<h4>24 <strong>Jam</strong></h4>
										<p>Pelayan 24 jam demi memuaskan pelanggan.</p>
									</div>
								</div>
							</div>	
						</div>		
					</div>				
				</div>
<?php
}
elseif ($_GET['module']=='semuaproduk'){
	$p		= new paging_produk;
	$batas  = 8;
	$posisi = $p->cariPosisi($batas);
	$querysemua = "SELECT * FROM produk_tm,kategori WHERE kategori.id_kategori=produk_tm.id_kategori AND publish='Y' ORDER BY rand() DESC LIMIT $posisi,$batas";
	$hasilsemua = mysqli_query($konek, $querysemua);
	
?>
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">All <strong>Products</strong></span></span></span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">
											<?php
													while($s=mysqli_fetch_array($hasilsemua)){
														echo "	<li class=\"span3\">
																	<div class=\"product-box\">
																		<p><a href=\"produk-$s[id_produk]-$s[seo].html\"><img src=\"foto_produk/$s[gambar_produk]\" alt=\"\" /></a></p>
																		<a href=\"produk-$s[id_produk]-$s[seo].html\" class=\"title\">$s[nama_produk]</a><br/>
																		<a href=\"produk-$s[id_produk]-$s[seo].html\" class=\"category\">$s[nama_kategori]</a>
																		<p class=\"price\">Rp$s[harga_produk]</p>
																	</div>
																</li>";
													}
											// query untuk paging halaman produk per kategori
											$querydata   = mysqli_query($konek, "SELECT * FROM produk_tm WHERE publish='Y'");
											$jmldata     = mysqli_num_rows($querydata);
											$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
											$linkHalaman = $p->navHalaman($_GET['halproduk'], $jmlhalaman);
									echo "
											</ul>
										</div>
									</div>	
									<div class=\"pagination\">$linkHalaman</div>";
									?>
								</div>
							</div>						
						</div>
					</div>				
				</div>
<?php
}
elseif ($_GET['module']=='detailproduk'){
	$querydetail  = "SELECT * FROM produk_tm WHERE id_produk = '$_GET[id]'";
                   
    $hasildetail  = mysqli_query($konek, $querydetail);
	$r            = mysqli_fetch_array($hasildetail);
?>
	<section class="header_text sub">
	<h4><span>Product Detail</span></h4>
	</section>
	<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<img src="<?php echo "$d[alamat_website]/foto_produk/$r[gambar_produk]";?>" class="thumbnail" data-fancybox-group="group1" alt="">												
							</div>
							<div class="span5">							
								<h4><strong>Harga: Rp<?php echo "$r[harga_produk]";?></strong></h4>
							</div>
							<div class="span5">
								<form class="form-inline">
									<p>&nbsp;</p>
									<label>Qty:</label>
									<input type="text" class="span1" placeholder="1">
									<a href="<?php echo "cart-$r[id_produk].html"?>"><button class="btn btn-inverse" >Add to cart</button></a>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</div>
								</div>							
							</div>						
						</div>
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">Category</li>
								<?php 
									$tampil_kategori = "SELECT * FROM kategori ORDER BY id_kategori";
									$hasilkategori   = mysqli_query($konek, $tampil_kategori);
									while($k=mysqli_fetch_array($hasilkategori)){
								?>
									<li><a href="<?php echo "$d[alamat_website]/kategori-$k[id_kategori]-$k[kategori_seo].html";?>"><?php echo "$k[nama_kategori]";}?></a></li>
							</ul>
						</div>
					</div>
				</div>
<?php
}
elseif ($_GET['module']=='detailkategori'){
	$querynamakategori = "SELECT nama_kategori FROM kategori WHERE id_kategori='$_GET[id]'";
    $hasilnamakategori = mysqli_query($konek, $querynamakategori);
    $n = mysqli_fetch_array($hasilnamakategori);
	
	// Gunakan fungsi/class paging
	$p = new paging_kategori;
	$batas  = 8;
	$posisi = $p->cariPosisi($batas);
	// Tampilkan daftar produk sesuai dengan kategori yang dipilih
	$querykategori = "SELECT * FROM produk_tm WHERE id_kategori='$_GET[id]' ORDER BY id_produk DESC LIMIT $posisi,$batas";		 
	$hasilkategori = mysqli_query($konek, $querykategori);
	$jumlahproduk  = mysqli_num_rows($hasilkategori);
	
?>
	<section class="header_text sub">
		<h4><span><?php echo "$n[nama_kategori]";?></span></h4>
	</section>
	<div class="row">						
					<div class="span9">								
						<ul class="thumbnails listing-products">
						<?php
						 while($m=mysqli_fetch_array($hasilkategori)){
							echo "	<li class=\"span3\">
										<div class=\"product-box\">
											<span class=\"sale_tag\"></span>												
											<a href=\"$d[alamat_website]/produk-$m[id_produk]-$m[seo].html\"><img alt=\"\" src=\"$d[alamat_website]/foto_produk/$m[gambar_produk]\"></a><br/>
											<a href=\"$d[alamat_website]/produk-$m[id_produk]-$m[seo].html\" class=\"title\">$m[nama_produk]</a><br/>
											<a href=\"$d[alamat_website]/produk-$m[id_produk]-$m[seo].html\" class=\"category\">$n[nama_kategori]</a>
											<p class=\"price\">Rp$m[harga_produk]</p>
										</div>
									</li> ";
						 }
						 // query untuk paging halaman produk per kategori
						 $querydata   = mysqli_query($konek, "SELECT * FROM produk_tm WHERE id_kategori='$_GET[id]'");
						 $jmldata     = mysqli_num_rows($querydata);
						 $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
						 $linkHalaman = $p->navHalaman($_GET['halkategori'], $jmlhalaman);  
						 
     					 echo "
						</ul>								
						<hr>
						<div class=\"pagination pagination-small pagination-centered\">
							<ul>
								<li>$linkHalaman</li>
							</ul>
						</div>";
						?>
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">Category</li>
								<?php 
									$tampil_kategori = "SELECT * FROM kategori ORDER BY id_kategori";
									$hasilkategori   = mysqli_query($konek, $tampil_kategori);
									while($k=mysqli_fetch_array($hasilkategori)){
								?>
									<li><a href="<?php echo "$d[alamat_website]/kategori-$k[id_kategori]-$k[kategori_seo].html";?>"><?php echo "$k[nama_kategori]";}?></a></li>
							</ul>
						</div>
					</div>
				</div>
<?php 
} 
elseif ($_GET['module']=='semuacart'){
	$querycart = "SELECT * FROM produk_tm WHERE id_produk='$_GET[id]'";
	$hasilcart = mysqli_query($konek, $querycart);
?>
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Remove</th>
									<th>Image</th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Total</th>
								</tr>
							</thead>
						<?php
						while($cr=mysqli_num_rows($hasilcart)){
							echo "
							<tbody>
								<tr>
									<td><input type=\"checkbox\" value=\"option1\"></td>
									<td><img alt=\"\" src=\"$d[alamat_website]/foto_produk/$cr[gambar_produk]\"></td>
									<td>$cr[nama_produk]</td>
									<td><input type=\"text\" placeholder=\"1\" class=\"input-mini\"></td>
									<td>Rp.$cr[harga_produk]</td>
								</tr> 
							</tbody>";
						}
						?>
						</table>
						<hr>
						<p class="cart-total right">
							<strong>Sub-Total</strong>:	$100.00<br>
							<strong>Eco Tax (-2.00)</strong>: $2.00<br>
							<strong>VAT (17.5%)</strong>: $17.50<br>
							<strong>Total</strong>: $119.50<br>
						</p>
						<hr/>
						<p class="buttons center">				
							<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
						</p>					
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">Category</li>
								<?php 
									$tampil_kategori = "SELECT * FROM kategori ORDER BY id_kategori";
									$hasilkategori   = mysqli_query($konek, $tampil_kategori);
									while($k=mysqli_fetch_array($hasilkategori)){
								?>
									<li><a href="<?php echo "$d[alamat_website]/kategori-$k[id_kategori]-$k[kategori_seo].html";?>"><?php echo "$k[nama_kategori]";}?></a></li>
							</ul>
						</div>
					</div>
				</div>
<?php
}
elseif ($_GET['module']=='contactperson'){
?>
				<section class="header_text sub">
					<h4><span>Contact Us</span></h4>
				</section>
				<div class="row">				
					<div class="span5">
						<div>
							<h5>ADDITIONAL INFORMATION</h5>
							<p><strong>Phone:</strong>&nbsp;(021) 822 6152 8545<br>
							<strong>Email:</strong>&nbsp;<a href="#">sammy_florist@yahoo.com</a>								
							</p>
						</div>
					</div>
					<div class="span7">
						<p>Hubungi kami secara online dengan mengisi form di bawah ini :</p>
						<form method="post" action="contact-action.html">
							<fieldset>
								<div class="clearfix">
									<label for="nama"><span>Nama:</span></label>
									<div class="input">
										<input tabindex="1" size="18" id="nama_pengirim" name="nama_pengirim" type="text" value="" class="input-xlarge" placeholder="Nama">
									</div>
								</div>
								
								<div class="clearfix">
									<label for="email"><span>Email:</span></label>
									<div class="input">
										<input tabindex="2" size="25" id="email" name="email" type="text" value="" class="input-xlarge" placeholder="Alamat Email">
									</div>
								</div>
								
								<div class="clearfix">
									<label for="message"><span>Pesan:</span></label>
									<div class="input">
										<textarea tabindex="3" class="input-xlarge" id="pesan" name="pesan" rows="7" placeholder="Pesan Anda..."></textarea>
									</div>
								</div>
								
								<div class="actions">
									<button tabindex="3" type="submit" class="btn btn-inverse">Kirim Pesan</button>
								</div>
							</fieldset>
						</form>
					</div>				
				</div>
<?php
}
elseif ($_GET['module']=='contactaction'){
	$nama_pengirim = $_POST['nama_pengirim'];
    $email  	   = $_POST['email'];
    $pesan  	   = $_POST['pesan'];

    $queryhubungi = "INSERT INTO contact_person	(nama_pengirim,
												 email,
												 pesan,
												 tanggal) 
										 VALUES('$nama_pengirim',
												'$email',
												'$pesan',
												'$tgl_sekarang')";
    $hasilhubungi = mysqli_query($konek, $queryhubungi);
?>
				<section class="header_text sub">
					<h4><span>Contact Us</span></h4>
				</section>
				<div class="row">
				<h5><span><center>Terimakasih telah menghubungi kami. Tunggu balasan Kami via Email.</center></span></h5>
				</div>	
<?php
}
?>