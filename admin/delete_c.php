<?php
include_once("includes/db.php");
if(isset($_GET['delete_c'])){
	$delete_id=$_GET['delete_c'];
	$delete_c="DELETE FROM customers WHERE customer_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_c);
	if($run_delete){
		echo "<script>alert('Customer has been Deleted!')</script>";
		echo "<script>window.open('index.php?view_customers','_self')</script>";

	}
}

?>