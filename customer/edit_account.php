<?php $con =mysqli_connect("localhost","root","","ecommerce");
?>
<?php 

// $user=$_SESSION['customer_email'];
// 	$run_customer=mysqli_query($con,"SELECT * FROM WHERE customer_email='$user'")
	
// 	$row =mysqli_fetch_array($run_customer);
// 	if($row==1){
// 		$name=$row['customer_name'];
// 	}
	$user=$_SESSION['customer_email'];
	$get_customer="SELECT * FROM `customers` WHERE  customer_email='$user'";
	//$run_customer=mysqli_query($con,$get_customer);
	$run_customer=mysqli_query($con,$get_customer) or die(mysqli_error($con));
	$row_customer=mysqli_fetch_array($run_customer);
	$c_id=$row_customer['customer_id'];
	$name=$row_customer['customer_name'];
	$email=$row_customer['customer_email'];
	$pass=$row_customer['customer_pass'];
	$country=$row_customer['customer_country'];
	$city=$row_customer['customer_city'];
	$contant=$row_customer['customer_contact'];
	$address=$row_customer['customer_address'];
	?>
	<!-- <form action="customer_register.php?c_id=<?php //echo $c_id; ?>" method="post" enctype="multipart/form-data"> -->
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="750">
			<tr align="center">
				<td colspan="6"><h2>Update Your Account</h2></td>
			</tr>
			<tr>
				<td align="right">Customer Name:</td>
				<td><input type="text" name="c_name" value="<?php echo $name; ?>" required></td>
			</tr>
			<tr>
				<td align="right">Customer Email:</td>
				<td> <input type="email" name="c_email" value="<?php echo $email; ?>"required></td>
			</tr>
			<tr>
				<td align="right">Customer Password:</td>
				<td><input type="text" name="c_pass" value="<?php echo $pass; ?>" required></td>
			</tr>
			<!-- <tr>
				<td align="right">Customer Image:</td>
				<td><input type="file" name="c_image"></td>
			</tr> -->
			<tr>
				<td align="right">Customer Country:</td>
				<td><select name="c_country">
					<option>Select a Country</option>
					<option>India</option>
					<option>Japan</option>
					<option>Nepal</option>
					<option>Afghanistan</option>
					<option>Paskistan</option>
					<option>Israel</option>
					<option>United Arab Emirales</option>
					<option>United States</option>
					<option>United Kingdom</option>
				</select></td>
			</tr>
			<tr>
				<td align="right">Customer City:</td>
				<td><input type="text" name="c_city"value="<?php echo $city; ?>" required></td>
			</tr>
			<tr>
				<td align="right">Customer Contact:</td>
				<td><input type="text" name="c_contact" value="<?php echo $contant; ?>" required></td>
			</tr>
			<tr>
				<td align="right">Customer Address</td>
				<td><input type="rext" name="c_address" value="<?php echo $address; ?>" required></td>
			</tr>
			<tr align="center">
				<td colspan="6"><input type="submit" name="update" value="Update Account"></td>
			</tr>

		</table>
	</form>

<!-- content wrapper end -->

<!-- main container  end here -->
</body>
</html>

<?php
if(isset($_POST['update'])){

	$id=getIp();
	$customer_id=$c_id;
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST[ 'c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address']; 

	
	  $update_c="UPDATE `customers` SET customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address' where customer_id='$customer_id'";
	$run_update=mysqli_query($con,$update_c);
	
	if($run_update){
		echo "<script>alert('Your account successful updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
}
?>