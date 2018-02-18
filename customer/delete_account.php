
<h2 style="text-align:center; color:red;">Do you really want to DELETE Your Account?</h2><br>

<form action="" method="post">
<input type="submit" name="yes" value="Yes I want"/>
<input type="submit" name="no" value="No I was Joking"/>
	<br><br><br><br><br><br><br><br><br><br>
</form>


<?php
include_once("../includes/db.php");
$user=$_SESSION['customer_email'];
if(isset($_POST['yes'])){
	$delete_customer="DELETE FROM customers WHERE customer_email='$user'";
	$run_customer=mysqli_query($con,$delete_customer);
	echo "<script>alert('We are really sorry, Your account has been deleted!')</script>";
	echo "<script>window.open('../index.php','_self')</script>";

}

if(isset($_POST['no'])){
	echo "<script>alert('oh! do not joke again!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";



}
?>