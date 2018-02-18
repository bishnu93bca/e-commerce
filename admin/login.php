

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>This is Admin Panel</title>
    
    
    <link rel="stylesheet" href="logins/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="logins/css/style.css" media="all">
    
    
        <script src="js/prefixfree.min.js"></script>

    
  </head>

  <body>

    <div class="login">
    <h2 style="color:white;text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
        <h2 style="color:white;text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>

	<h1>Admin Login</h1>
    <form method="post">
    	<input type="email" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Admin Login</button>
    </form>
</div>
    
        <script src="logins/js/index.js"></script>

    
    
    
  </body>
</html>
<?php
session_start();
include_once("includes/db.php");

if (isset($_POST['login'])) {
	$email=mysql_real_escape_string($_POST['email']);
	$pass=mysql_real_escape_string($_POST['pass']);
	$sel_user="SELECT * FROM `admins` WHERE user_email='$email' AND user_pass='$pass'";
	$run_user=mysqli_query($con,$sel_user);
	$check_uesr=mysqli_num_rows($run_user);
	if($check_uesr==0){
		echo "<script>alert('Email or Password is wrong, try again! ')</script>";
	}else{
		$_SESSION['user_email']=$email;
		echo "<script>alert('You have successfully Logged in!')</script>";
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";

	}

}



?>