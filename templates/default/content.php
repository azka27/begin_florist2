    <h2 class="title text-center">Items</h2>
	<?php
    /*** BEGIN .Halaman Utama (Beranda atau Home) ***/
    if ($_GET['module']=='home'){
		$queryterbaru = "SELECT * FROM produk_tm WHERE publish='Y' ORDER BY id_produk";
        $hasilterbaru = mysqli_query($konek, $queryterbaru);
		// Gunakan fungsi/class paging
        $p = new paging_produk;
	    $batas  = 9;
	    $posisi = $p->cariPosisi($batas);
		// query untuk paging halaman berita per kategori
        $querydata   = mysqli_query($konek, "SELECT * FROM produk_tm WHERE publish='Y'");
        $jmldata     = mysqli_num_rows($querydata);
        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET['halberita'], $jmlhalaman);
		
		while($t=mysqli_fetch_array($hasilterbaru)){
			echo "<div class=\"col-sm-4\">
						<div class=\"product-image-wrapper\">
							<div class=\"single-products\">
									<div class=\"productinfo text-center\">
										<p>
										<img src=\"foto_produk/$t[gambar_produk]\" alt=\"\" />
										<h2>Rp.$t[harga_produk]</h2>
										<p><a href=\"produk-$t[id_produk]/$t[seo].html\">$t[nama_produk]</a></p>
										<a href=\"#\" class=\"btn btn-default add-to-cart\"><i class=\"fa fa-shopping-cart\"></i>Add to cart</a>
									</div>
							</div>
						</div>
				  </div>";
		}
	}
	elseif ($_GET['module']=='detailproduk'){
 	    $querydetail   = "SELECT * FROM produk_tm WHERE id_produk='$_GET[id]'";
		$hasildetail   = mysqli_query($konek, $querydetail);
		$r			   = mysqli_fetch_array($hasildetail);
		echo "<div class=\"col-sm-4\">
				<div class=\"product-image-wrapper\">
					<img src=\"$d[alamat_website]/foto_produk/$r[gambar_produk]\"></p>
					<p>$r[deskripsi_produk]</p>
				</div>
			 ";
	}
    ?>
	