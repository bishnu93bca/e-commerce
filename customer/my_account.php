<!DOCTYPE html>
<?php
	session_start();
	include_once ("../function/function.php");
	

?>
<?php if(!isset($_SESSION['customer_email'])==1){
	echo "<script>window.open('../checkout.php','_self')</script>";
}
?>
<html>
<head>
	<title>onlineshop</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css" media="all"/>
</head>
<body>
<!-- main container  starts here -->
<div class="main_wrapper">
<!-- header starts here -->
		<div class="header_wrapper">

			<a href ="index.php"><img src="../images/header.jpg" width="1000px" height="150px"></a>
		</div>
<!-- header end here -->

			<!-- Navagation Bar starts -->	
			<div id="menubar">
				<ul id="menu">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../all_products.php">All Products</a></li>
					<li><a href="my_account.php">My Account</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<div id="form">
					<form method="get" action="../result.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Suarch a Parduct"/>
						<input type="submit" name="search" value="Search"/>

					</form>
				</div>
				
			</div>
			<!-- Navagation end starts -->

 <!-- content wrapper starts -->
<div class="content_wrapper">

	<div id="sidebar">
					<div id="sidebar_title">My Account:</div>
							<ul id="cats">
								<?php 
								
								$user=$_SESSION['customer_email'];
								$get_img="SELECT * FROM `customers` WHERE customer_email='$user'";
								$run_img=mysqli_query($con,$get_img);
								//$run_img=mysqli_query($con,$get_img) or die(mysqli_error($con));
								//$run_img=$con->query($get_img);
								$row_img=mysqli_fetch_array($run_img);
								$c_image=$row_img['customer_image'];
								$name=$_SESSION['customer_name']=$row_img['customer_name']; ?>
								<p align="center"><img src="customer_images/<?php echo $c_image;?>" width='150' height='150' style="border:2px solid:white;padding:4px;"/></p>
							
							
								
	<li><a href="my_account.php?my_orders">My Orders</a></li>
	<li><a href="my_account.php?edit_account">Edit Account</a></li>
	<li><a href="my_account.php?change_pass">Change Password</a></li>
	<li><a href="my_account.php?delete_account">Delete Account</a></li>
	<li><a href="../logout.php">Logout</a></li>
								
			</ul>

							<div id="sidebar_title"></div>
							<ul id="cats">
								<!-- <li><a href="#">HP</a></li>
								<li><a href="#">DELL</a></li>
								<li><a href="#">Motorola</a></li>
								<li><a href="#">Sony Eracson</a></li>
								<li><a href="#">LG</a></li>
								<li><a href="#">Apple</a></li> -->
								
							</ul>
							</div>

								<div id="content_area">

								 	<?php cart();?>

										<div id="shopping_cart">
												<span style='float:right;font-size:18px;padding:5px;line-height:40px;'>

		<?php 
		if(isset($_SESSION['customer_email'])){
		echo "<b>Welcome:-&nbsp;</b>" . $_SESSION['customer_name'] ."<b style='yellow'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>";
			}else{ echo "Welcome Guest!" ; }

			?>
												
												
			<?php
				if(!isset($_SESSION['customer_email'])){
				echo "<a href='../checkout.php' style='color:orange;'>Login</a>";
					}else{
						echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
						}
					?>

				</span>
		</div>
			<?php getIp();?>
			<div id="product_box">				
			</h2><br>
			<?php 
			if(!isset($_GET['my_orders'])){
			if (!isset($_GET['edit_account'])) {
			if (!isset($_GET['change_pass'])) {
			if(!isset($_GET['delete_account'])){
		echo "<h2 style='padding:20px;color:green;'>Welcome:-&nbsp;$name</h2> 
		<b>You can see your order progress by clicking this <a href='my_account.php?my_order'>Link</a></b>";
				}
			}
		}
		}
			?>
			<?php

		if (isset($_GET['edit_account'])) {
			include_once("edit_account.php");
			}

			if (isset($_GET['change_pass'])) {
			include_once("change_pass.php");
			}
			if (isset($_GET['delete_account'])) {
			include_once("delete_account.php");
			}
			?><br><br><br><br><br>
											</div>
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