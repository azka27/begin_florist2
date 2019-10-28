<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href=\"css/style_login.css\" rel=\"stylesheet\" type=\"text/css\" />
        <div id=\"login\"><h1 class=\"fail\">Untuk mengakses modul, Anda harus login dulu.</h1>
        <p class=\"fail\"><a href=\"index.php\">LOGIN</a></p></div>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
  include "../config/koneksi.php";
  include "../config/library.php";

  // Home (Beranda)
  if ($_GET['module']=='beranda'){               
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_beranda/beranda.php";
    }  
  }

  // Identitas Website
  elseif ($_GET['module']=='identitas'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_identitas/identitas.php";
    }
  }

  // Manajemen User
  elseif ($_GET['module']=='user'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_user/user.php";
    }
  }

  // Manajemen Modul
  elseif ($_GET['module']=='modul'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_modul/modul.php";
    }
  }

  // Manajemen Kategori
  elseif ($_GET['module']=='kategori'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kategori/kategori.php";
    }
  }
  
  // Bagian Produk
  elseif ($_GET['module']=='produk'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
      include "modul/mod_produk/produk.php";                            
    }
  }

  // Contact Person
  elseif ($_GET['module']=='kontak'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_kontak/kontak.php";
    }
  }

  // Templates
  elseif ($_GET['module']=='templates'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_templates/templates.php";
    }
  }

  // Menu Website
  elseif ($_GET['module']=='menu'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_menu/menu.php";
    }
  }

  // Apabila modul tidak ditemukan
  else{
    echo "<p>Modul tidak ada.</p>";
  }
}
?>
