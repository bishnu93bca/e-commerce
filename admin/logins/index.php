<?php
session_start();
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}else{



?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>This is Admin Panel</title>
    
    
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    
    
        <script src="js/prefixfree.min.js"></script>

    
  </head>

  <body>

    <div class="login">
	<h1>Admin Login</h1>
    <form method="post">
    	<input type="email" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Admin Login</button>
    </form>
</div>
    
        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
<?php } ?>