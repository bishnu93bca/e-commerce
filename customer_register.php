<!DOCTYPE html>
<?php
session_start();
	include_once ("function/function.php");
	
	//include_once("admin/includes/db.php");


?>
<?php
//session_start();
$con = new mysqli("localhost","root","","ecommerce");
if(!$con){die("unable to connection");}


?>

<html>
<head>
	<title>onlineshop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>
</head>
<body>
<!-- main container  starts here -->
<div class="main_wrapper">
<!-- header starts here -->
<div class="header_wrapper">

<a href ="index.php"><img src="images/header.jpg" width="1000px" height="150px"></a>
</div>
<!-- header end here -->

<!-- Navagation Bar starts -->	
<div id="menubar">
	<ul id="menu">
		<li><a href="index.php">Home</a></li>
		<li><a href="all_products.php">All Products</a></li>
		<li><a href="customer/my_account.php">My Account</a></li>
		<li><a href="#">Sign Up</a></li>
		<li><a href="cart.php">Shopping Cart</a></li>
		<li><a href="#">Contact Us</a></li>
	</ul>
	<div id="form">
		<form method="get" action="result.php" enctype="multipart/form-data">
			<input type="text" name="user_query" placeholder="Suarch a Parduct"/>
			<input type="submit" name="search" value="Search"/>

		</form>
	</div>
	
</div>
<!-- Navagation end starts -->

 <!-- content wrapper starts -->
<div class="content_wrapper">

<div id="sidebar">
	<div id="sidebar_title">categare</div>
	<ul id="cats">
		<!-- <li><a href="#">Laptops</a></li>
		<li><a href="#">Computers</a></li>
		<li><a href="#">Mobiles</a></li>
		<li><a href="#">Cameras</a></li>
		<li><a href="#">iPads</a></li>
		<li><a href="#">Tablets</a></li> -->
		
		<?php getCats(); ?>
		
	</ul>

	<div id="sidebar_title">Brands</div>
	<ul id="cats">
		<!-- <li><a href="#">HP</a></li>
		<li><a href="#">DELL</a></li>
		<li><a href="#">Motorola</a></li>
		<li><a href="#">Sony Eracson</a></li>
		<li><a href="#">LG</a></li>
		<li><a href="#">Apple</a></li> -->
		<?php getBrands();?>

	</ul>
</div> 

<div id="content_area">

 <?php cart();?>

	<div id="shopping_cart">
	<span style='float:right;font-size:18px;padding:5px;line-height:40px;'>
	Welcome Guest ! <b style='color:yellow'>Shopping Cart:-</b> Total Items:- <?php total_items(); ?>   Total Price: <?php total_price();?>
	<a href='cart.php'style='color:yellow'>Go to Cart</a>
	</span>
	</div>
	
	<form action="customer_register.php" method="post" enctype="multipart/form-data">
		<table align="center" width="750">
			<tr align="center">
				<td colspan="6"><h2>Create an Account</h2></td>
			</tr>
			<tr>
				<td align="right">Customer Name:</td>
				<td><input type="text" name="c_name" required></td>
			</tr>
			<tr>
				<td align="right">Customer Email:</td>
				<td> <input type="email" name="c_email" required></td>
			</tr>
			<tr>
				<td align="right">Customer Password:</td>
				<td><input type="password" name="c_pass" required></td>
			</tr>
			<tr>
				<td align="right">Customer Image:</td>
				<td><input type="file" name="c_image"></td>
			</tr>
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
				<td><input type="text" name="c_city" required></td>
			</tr>
			<tr>
				<td align="right">Customer Contact:</td>
				<td><input type="text" name="c_contact" required></td>
			</tr>
			<tr>
				<td align="right">Customer Address</td>
				<td><input type="rext" name="c_address" required></td>
			</tr>
			<tr align="center">
				<td colspan="6"><input type="submit" name="register" value="Create Account"></td>
			</tr>

		</table>
	</form><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
<!-- content wrapper end -->
<div id="footer">
	<h2 style="text-align:center;padding-top:30px">	&copy; 2016 by onlineshopping.com &reg;</h2>
</div>
</div>
<!-- main container  end here -->
</body>
</html>

<?php
if(isset($_POST['register'])){

	$id=getIp();
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST[ 'c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address']; 

	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	  $insert_c="INSERT INTO `customers`( `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES('$id','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address')";
	$run_c=$con->query($insert_c);

	// if($run_c){
	// 	echo "<script>alert('Registration successful!');</script>";
	// }
	$sel_cart="SELECT * FROM cart where ip_add='$ip'";
	$run_cart=$con->query($sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart==0)
	{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account has been create successful,Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	}else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account has been create successful,Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
}
?>