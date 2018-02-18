<!DOCTYPE html>
<?php
	session_start();
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

								 	<?php cart();?>

										<div id="shopping_cart">
												<span style='float:right;font-size:18px;padding:5px;line-height:40px;'>
												<?php 
												if(isset($_SESSION['customer_name'])){
															echo "<b>Welcome:-&nbsp;</b>". $_SESSION['customer_name'] ."<b style='yellow'></b>";
												}else{ echo "<marquee direction='left' behavior='alternate'>Welcome Guest!</marquee>" ; }
												?>
												
												<b style='color:yellow'>Shopping Cart:-</b> Total Items:- <?php total_items(); ?>   Total Price: <?php total_price();?>
												<a href='index.php'style='color:yellow'>Back To Shop</a>
												<?php
												if(!isset($_SESSION['customer_email'])){
													echo "<a href='checkout.php' style='color:orange;'>Login</a>";
												}else{
													echo "<a href='logout.php' style='color:orange;'>Logout</a>";
												}
												?>

												</span>
										</div>
					<?php getIp();?>
	<div id="product_box">
	<form action="" method="post" enctype="multipart/form-data">
	<table align="center" width="700" bgcolor="skyblue">
		<tr align="center">
			<th>Rmove</th>
			<th>Product</th>
			<th>Quantity</th>
			<th>Total Price</th>
		</tr>
		
		
		<?php 

		$total =0;
		global $con;
		$ip=getIp();
		$sel_price="SELECT * FROM cart WHERE ip_add='$ip'";
		$run_price=mysqli_query($con,$sel_price);
		while($pro_price=mysqli_fetch_array($run_price)){
			$pro_id=$pro_price['pro_id'];
			$pro_price="SELECT * FROM products where product_id='$pro_id'";
			$run_pro_price=mysqli_query($con,$pro_price);
			while ($pp_price=mysqli_fetch_array($run_pro_price)) {
				
				$product_price=array($pp_price['product_price']);
				$product_title=$pp_price['product_title'];
				$product_image=$pp_price['product_image'];
				$single_price=$pp_price['product_price'];
				$value=array_sum($product_price);
			
				$total+=$value;
		
	
		?>
		<tr align="center">
			<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
			<td><?php echo $product_title;?><br><img src="admin/product_images/<?php echo $product_image;?>" width="60" height="60"/></td>
			 <td><select name="qty">
					<option>01</option>
					<option>02</option>
					<option>03</option>
					<option>04</option>
					<option>05</option>
					<option>06</option>
					<option>07</option>
					<option>08</option>
					<option>09</option></td>

			<?php

			if (isset($_POST['update_cart'])) {
			 	$qty=$_POST['qty'];
			 	$update_qty="UPDATE cart SET qty='$qty'";
			 	$run_qty=mysqli_query($con,$update_qty);
			 	$_SESSION['qty']=$qty;
			 	$total=$total*$qty;
			 } 
			?>
			<td><?php echo "$".$single_price;?></td>
		</tr>
		<?php }}?>
		<tr align="right">
			<td colspan="4"><b> Sub Total:</b></td>
			<td><?php echo "$ "  . $total;?></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
			<td><input type="submit" name="continue" value="Continue Shopping"/></td>
			<td><button><a href="checkout.php" style="text-decoration:none;color:black;">Checkout</a></button></td>
		</tr>
	</table>
		
	</form>
	<?php 
	
	//function updatecart(){
	global $con;
	$ip=getIp();
	if (isset($_POST['update_cart'])) {
		foreach ($_POST['remove'] as $remove_id ) {
		//$remove_id=$_POST['remove'];
			$delete_product="DELETE FROM cart WHERE pro_id='$remove_id' AND ip_add='$ip'";
			//$run_delete=$con->query($delete_product);
			$run_delete=mysqli_query($con,$delete_product);
			if ($run_delete) {
				echo "<script>window.open('cart.php','_self')</script>";
			}
		}
	}
	
	//echo @$up_cart=updatecart();

//}
if (isset($_POST['continue'])) {
		echo "<script>window.open('index.php','_self')</script>";
	}
	?>
		<br><br><br><br><br><br><br><br><br><br><br><br>										
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