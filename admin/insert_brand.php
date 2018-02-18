<?php

if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}else{



?>


<form action="" method="post" style="padding:80px;">
	
	<b>Insert new Brand:</b>
	<input type="text" name="new_brand" required/>
	<input type="submit" name="add_brand" value="Add Brand"/>
</form>

<?php
include_once("includes/db.php");
?><?php
if(isset($_POST['add_brand'])){
$new_brand=$_POST['new_brand'];
$insert_brand="INSERT INTO `brands`(`brand_title`) VALUES('$new_brand')";
$run_brand=mysqli_query($con,$insert_brand);
if($run_brand){
	echo "<script> alert('New Brand has been Inserted!')</script>";
	echo "<script> window.open('index.php?view_brands','_self')</script>";

}

}

?>

<?php } ?>