<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href=\"css/style_login.css\" rel=\"stylesheet\" type=\"text/css\" />
        <div id=\"login\"><h1 class=\"fail\">Untuk mengakses modul, Anda harus login dulu.</h1>
        <p class=\"fail\"><a href=\"index.php\">LOGIN</a></p></div>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
?>
<!DOCTYPE html>
<html>
<head><title>Administrator</title>
  <!-- style CSS utama -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />

  <!-- dataTables -->
  <link href="dataTables/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />   
  <script src="dataTables/media/js/jquery.js"></script>
  <script src="dataTables/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
	     $('#tabelku').dataTable({
	       "sPaginationType": "full_numbers", 
         "oLanguage": {
            "sLengthMenu": "Tampilkan _MENU_ data",
            "sSearch": "Pencarian: ",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "oPaginate": {
	          	"sFirst": "Awal",
		          "sLast": "Akhir", 
	          	"sPrevious": "Balik", 
	          	"sNext": "Lanjut"
		        }
          }
        });        
    })    
  </script>

  <!-- TinyMCE (WYSIYWG Editor) -->
  <script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_lokomedia.js"></script>

</head>
  <body>
    <div id="wrapper">

      <div id="header">
		  <?php
		  if ($_SESSION['leveluser']=='admin'){
			echo "<h3>Administrator</h3>";
		  }
		  elseif ($_SESSION['leveluser']=='user'){
			echo "<h3>User</h3>";
		  }
		  ?> 
      </div>

	    <div id="menu">               
        <ul>
          <li><a href="?module=beranda">&#187; Beranda</a></li>
              <?php include "menu.php"; ?>
          <li><a href="logout.php">&#187; Keluar</a></li>
        </ul>
 	    </div>

      <div id="content">
		    <?php include "content.php"; ?>
      </div>
  
		  <div id="footer">
			   Copyright &copy; 2017 by Azka Wicaksana. All rights reserved.
		  </div>
    </div> 
  </body>
</html>
<?php } ?>
