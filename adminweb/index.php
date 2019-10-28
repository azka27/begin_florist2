<!DOCTYPE html>
<html>
<head><title>Login Administrator</title>

<link href="css/style_login.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery-validation.js"></script>

</head>
  <body OnLoad="document.login.username.focus();">
  <body>
    <form id="login" name="login" method="POST" action="cek_login.php"> 
    <h1>Login Administrator</h1>
    
    <div>
    	<label for="username">Username</label> 
    	<input type="text" name="username" id="username" class="field required" title="Username harus di isi" />
    </div>			

    <div>
    	<label for="password">Password</label>
    	<input type="password" name="password" id="password" class="field required" title="Password harus di isi" />
    </div>			
    
    <div class="submit"><button type="submit">Login</button></div>
    
    <p class="back"><a href="http://sammy-florist.com">Kembali ke Website Utama</a></p>
    <p class="copyright">Copyright &copy; 2014 by <a href="http://sammy-florist.com">Sammy Florist</a>. All rights reserved.</p>
    </form>	
  </body>
</html>
