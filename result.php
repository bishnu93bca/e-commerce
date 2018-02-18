<!DOCTYPE html>
<?php
	include_once ("function/function.php");

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
	<div id="shopping_cart">
	<span style='float:right;font-size:18px;padding:5px;line-height:40px;'>
	Welcome Guest ! <b style='color:yellow'>Shopping Cart:-</b> Total Items: Total Price:
	<a href='cart.php'style='color:yellow'>Go to Cart</a>
	</span>
	</div>
	<div id="product_box">
	<?php

	if(isset($_GET['search'])){
		$search_query=$_GET['user_query'];

		$get_pro = "SELECT * FROM products where product_keywords like '%$search_query%'";
			$run_pro = mysqli_query($con,$get_pro);

			while ($row_pro =mysqli_fetch_array($run_pro)) {
				$pro_id =$row_pro['product_id'];
				$pro_cat =$row_pro['product_cat'];
				$pro_brand =$row_pro['product_brand'];
				$pro_title =$row_pro['product_title'];
				$pro_price =$row_pro['product_price'];
				$pro_image =$row_pro['product_image'];
			
				echo "
					<div id='single_product'>
					<h3>$pro_title</h3>
					
					<img src='admin/Product_images/$pro_image'width='180' height='160'/>
					
					<p><b>Price: $ $pro_price</b></p>

					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
					</div>";

			}
		}
			?>
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