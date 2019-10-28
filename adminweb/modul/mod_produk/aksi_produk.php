<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href=\"../../css/style_login.css\" rel=\"stylesheet\" type=\"text/css\" />
        <div id=\"login\"><h1 class=\"fail\">Untuk mengakses modul, Anda harus login dulu.</h1>
        <p class=\"fail\"><a href=\"../../index.php\">LOGIN</a></p></div>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_seo.php";
  include "../../../config/fungsi_thumbnail.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus produk
  if ($module=='produk' AND $act=='hapus'){
    // cari informasi nama file foto yang ada di tabel produk
    $query = "SELECT gambar_produk FROM produk_tm WHERE id_produk='$_GET[id]'";
    $hapus = mysqli_query($konek, $query);
    $r     = mysqli_fetch_array($hapus);
    
    // kalau ada file fotonya
    if ($r['gambar_produk']!=''){
      $namafile = $r['gambar_produk'];
      
      // hapus file foto yang berhubungan dengan produk tersebut
      unlink("../../../foto_produk/$namafile");   
      unlink("../../../foto_produk/small_$namafile");   

      // kemudian baru hapus data produk di database 
      mysqli_query($konek, "DELETE FROM produk_tm WHERE id_produk='$_GET[id]'");      
    }
    // kalau tidak ada file fotonya
    else{
      mysqli_query($konek, "DELETE FROM produk_tm WHERE id_produk='$_GET[id]'");
    }
    header("location:../../media.php?module=".$module);
  }


  // Input produk
  elseif ($module=='produk' AND $act=='input'){
    $lokasi_file = $_FILES['fupload']['tmp_name'];
    $tipe_file   = $_FILES['fupload']['type'];
    $nama_file   = $_FILES['fupload']['name'];
    $acak        = rand(1,99);
    $nama_foto   = $acak.$nama_file; 
  
    $nama_produk  	  = $_POST['nama_produk'];
	$seo  			  = seo_title($_POST['nama_produk']);
    $kategori     	  = $_POST['kategori'];
	$harga_produk     = $_POST['harga_produk'];
	$deskripsi_produk = $_POST['deskripsi_produk'];
	$publish          = $_POST['publish'];

    // Apabila tidak ada foto yang di upload
    if (empty($lokasi_file)){
      $input = "INSERT INTO produk_tm(nama_produk,
									  seo,
									  id_kategori,
									  username,
									  harga_produk,
									  deskripsi_produk,
									  publish) 
                            VALUES('$nama_produk',
								   '$seo',
                                   '$kategori',
                                   '$_SESSION[namauser]',
								   '$harga_produk',
								   '$deskripsi_produk',
								   '$publish')";
      mysqli_query($konek, $input);

      header("location:../../media.php?module=".$module);
    }
    // Apabila ada foto yang di upload
    else{
      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal! Pastikan file yang di upload bertipe *.JPG');
              window.location=('../../media.php?module=produk')</script>";
      }
      else{
        $folder = "../../../foto_produk/"; // folder untuk foto produk
        $ukuran = 180;                     // foto diperkecil jadi 180px (thumb)
        UploadFoto($nama_foto, $folder, $ukuran);
        
        $input = "INSERT INTO produk_tm(nama_produk,
									  seo,
									  id_kategori,
									  username,
									  harga_produk,
									  deskripsi_produk,
									  publish,
									  gambar_produk) 
                            VALUES('$nama_produk', 
								   '$seo',
                                   '$kategori',
                                   '$_SESSION[namauser]',
								   '$harga_produk',
								   '$deskripsi_produk',
								   '$publish',
								   '$nama_foto')";
        mysqli_query($konek, $input);

        header("location:../../media.php?module=".$module);
      }
    }
  }

  // Update galeri foto
  elseif ($module=='produk' AND $act=='update'){
    $lokasi_file    = $_FILES['fupload']['tmp_name'];
    $tipe_file      = $_FILES['fupload']['type'];
    $nama_file      = $_FILES['fupload']['name'];
    $acak           = rand(1,99);
    $nama_foto      = $acak.$nama_file; 

    $id           = $_POST['id'];
    $nama_produk  = $_POST['nama_produk'];
	$seo		  = seo_title($_POST['nama_produk']);
    $kategori	  = $_POST['kategori'];
	$harga_produk     = $_POST['harga_produk'];
	$deskripsi_produk = $_POST['deskripsi_produk'];
	$publish          = $_POST['publish'];

    // Apabila foto tidak diganti
    if (empty($lokasi_file)){
      $update = "UPDATE produk_tm SET nama_produk  	   = '$nama_produk',
									  seo			   = '$seo',
                                      id_kategori  	   = '$kategori',
									  harga_produk 	   = '$harga_produk',
									  deskripsi_produk = '$deskripsi_produk',
                                      publish		   = '$publish' 
                                WHERE id_produk        = '$id'";
      mysqli_query($konek, $update);
      
      header("location:../../media.php?module=".$module);
    }
    else{
      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal! Pastikan file yang di upload bertipe *.JPG');
              window.location=('../../media.php?module=galerifoto)</script>";
      }
      else{
        $folder = "../../../foto_produk/"; // folder untuk foto produk
        $ukuran = 180;                     // foto diperkecil jadi 180px (thumb)
        UploadFoto($nama_foto, $folder, $ukuran);

        $update = "UPDATE produk_tm SET nama_produk  	 = '$nama_produk',
										seo				 = '$seo',
										id_kategori 	 = '$kategori',
										harga_produk 	 = '$harga_produk',
										deskripsi_produk = '$deskripsi_produk',
										publish			 = '$publish',
										gambar_produk    = '$nama_foto' 
                                  WHERE id_produk	     = '$id'";
        mysqli_query($konek, $update);
      
        header("location:../../media.php?module=".$module);
      }
    }
  }
}
?>
