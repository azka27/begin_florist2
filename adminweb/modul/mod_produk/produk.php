<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href=\"../../css/style_login.css\" rel=\"stylesheet\" type=\"text/css\" />
        <div id=\"login\"><h1 class=\"fail\">Untuk mengakses modul, Anda harus login dulu.</h1>
        <p class=\"fail\"><a href=\"../../index.php\">LOGIN</a></p></div>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_produk/aksi_produk.php";
  include "../config/koneksi.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    // Tampil produk
    default:
      echo "<h2>Produk</h2>
          <p><input type=\"button\" value=\"Tambah produk\" onclick=window.location.href=\"?module=produk&act=tambahproduk\"></p>
          <table>
          <thead>
          <tr>
			 <th>No</th>
			 <th>Foto</th>
			 <th>Nama Produk</th>
			 <th>Kategori</th>
			 <th>Harga Produk</th>
			 <th>Deskripsi Produk</th>
			 <th>Publish</th>
			 <th>Aksi</th>
		  </tr>
          </thead>
            <tbody>";

      if ($_SESSION['leveluser']=='admin'){
        $query  = "SELECT * FROM produk_tm,kategori WHERE produk_tm.id_kategori = kategori.id_kategori ORDER BY id_produk DESC";
        $tampil = mysqli_query($konek, $query);
      }
      else{
        $query  = "SELECT * FROM produk_tm,kategori WHERE username='$_SESSION[namauser]' AND produk_tm.id_kategori = kategori.id_kategori ORDER BY id_produk DESC";
        $tampil = mysqli_query($konek, $query);
      }
      $tampil = mysqli_query($konek, $query);
 
      $no = 1;
      while ($r=mysqli_fetch_array($tampil)){
        echo "<tr><td>$no</td>
				  <td><img src=\"../foto_produk/small_$r[gambar_produk]\" width=\"100\" height=\"75\"></td>
                  <td>$r[nama_produk]</td>
                  <td>$r[nama_kategori]</td>
				  <td>$r[harga_produk]</td>
				  <td>$r[deskripsi_produk]</td>
				  <td>$r[publish]</td>
		          <td><a href=\"?module=produk&act=editproduk&id=$r[id_produk]\">Edit</a> | 
		              <a href=\"$aksi?module=produk&act=hapus&id=$r[id_produk]\">Hapus</a>
				  </td>
		       </tr>";
        $no++;
      }
      echo "</tbody>
        </table><br>";
    break;
  
    case "tambahproduk":
      echo "<h2>Tambah produk</h2>
          <form method=\"POST\" enctype=\"multipart/form-data\" action=\"$aksi?module=produk&act=input\">
          <table>
          <tr>
			 <td>Nama Produk</td>
			 <td> : <input type=\"text\" name=\"nama_produk\"></td>
		  </tr>
          <tr>
			 <td>Kategori</td>
			 <td> : <select name=\"kategori\">
						<option value=\"0\" selected>- Pilih Kategori -</option>";
							$query  = "SELECT * FROM kategori ORDER BY nama_kategori";
							$tampil = mysqli_query($konek, $query);
							while($r=mysqli_fetch_array($tampil)){
							  echo "<option value=\"$r[id_kategori]\">$r[nama_kategori]</option>";
							}
			  echo "</select>
			 </td>
	      </tr>
          <tr>	
			  <td>Harga Produk</td>
			  <td> : <input type=\"text\" name=\"harga_produk\"></td>
		  </tr>
		  <tr>	
			  <td>Deskripsi Produk</td>
			  <td> : <input type=\"text\" name=\"deskripsi_produk\"></td>
		  </tr>
		  <tr>
		      <td>Publish</td>
			  <td> : <input type=\"radio\" name=\"publish\" value=\"Y\" checked> Y  
                     <input type=\"radio\" name=\"publish\" value=\"N\"> N </td>
		  </tr>
          <tr>
			  <td>Foto</td><
			  <td> : <input type=\"file\" name=\"fupload\" size=\"50\"><br> 
                                        - Tipe foto harus JPG/JPEG</td></tr>
          <tr><td colspan=\"2\"><input type=\"submit\" value=\"Simpan\">
                                <input type=\"button\" value=\"Batal\" onclick=\"self.history.back()\"></td></tr>
          </table>
          </form>";
     break;
    
    case "editproduk":
      $query = "SELECT * FROM produk_tm WHERE id_produk='$_GET[id]'";
      $hasil = mysqli_query($konek, $query);
      $r    = mysqli_fetch_array($hasil);

      echo "<h2>Edit produk</h2>
          <form method=\"POST\" action=\"$aksi?module=produk&act=update\" enctype=\"multipart/form-data\">
          <input type=\"hidden\" name=\"id\" value=\"$r[id_produk]\">
          <table>
          <tr><td>Nama Produk</td><td> : <input type=\"text\" name=\"nama_produk\" value=\"$r[nama_produk]\"></td></tr>
          <tr><td>Kategori   </td><td> : <select name=\"kategori\">";
 
          if ($r['id_kategori']==0){
            echo "<option value=\"0\" selected>- Pilih Kategori -</option>";
          }   

          $query2 = "SELECT * FROM kategori ORDER BY nama_kategori";
          $tampil = mysqli_query($konek, $query2);

          while($w=mysqli_fetch_array($tampil)){
            if ($r['id_kategori']==$w['id_kategori']){
			  echo "<option value=\"$w[id_kategori]\" selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=\"$w[id_kategori]\">$w[nama_kategori]</option>";
            }
          }
      echo "</select></td></tr>
          <tr><td>Harga Produk</td><td> : <input type=\"text\" name=\"harga_produk\" value=\"$r[harga_produk]\"></td></tr>
		  <tr><td>Deskripsi Produk</td><td> : <input type=\"text\" name=\"deskripsi_produk\" value=\"$r[deskripsi_produk]\"></td></tr>";
		  if ($r['publish']=='Y'){
		      echo "<tr><td>Publish </td><td> : <input type=\"radio\" name=\"publish\" value=\"Y\" checked> Y  
                                                <input type=\"radio\" name=\"publish\" value=\"N\"> N </td></tr>";
          }
          else{
              echo "<tr><td>Publish </td><td> : <input type=\"radio\" name=\"publish\" value=\"Y\"> Y  
                                                <input type=\"radio\" name=\"publish\" value=\"N\" checked> N </td></tr>";
      }
	  echo "<tr><td>Foto</td><td> ";
          if ($r['gambar_produk']!=''){
            echo "<img src=\"../foto_produk/small_$r[gambar_produk]\">";  
          }
          else{
            echo "Belum ada foto";
          }
      echo "</td></tr>
          <tr><td>Ganti Foto</td><td> : <input type=\"file\" name=\"fupload\" size=\"50\"><br>
                                        - Apabila foto tidak diganti, dikosongkan saja.</td></tr>
          <tr><td colspan=\"2\"><input type=\"submit\" value=\"Update\">
                                <input type=\"button\" value=\"Batal\" onclick=\"self.history.back()\"></td></tr>
          </table>
          </form>";
    break;  
  }
}
?>
