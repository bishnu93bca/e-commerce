<?php
//getting the categories

 function getCats(){
 	$con = new mysqli("localhost","root","","ecommerce");

		$get_cats = "SELECT * FROM categories";

		$run_cats =$con->query($get_cats);

		while ($row_cats=$run_cats->fetch_array(MYSQLI_ASSOC)) {
			
			$cat_id = $row_cats['cat_id'];
			$cat_title = $row_cats['cat_title'];

			echo "<li><a href='#'>$cat_title</a></li>";
			
		}

}
//getting the Bran

 function getbrands(){
 	$con = new mysqli("localhost","root","","ecommerce");

		$get_brands = "SELECT * FROM brands";

		$run_brands =$con->query($get_brands);

		while ($row_brands=$run_brands->fetch_array(MYSQLI_ASSOC)) {
			
			$brand_id = $row_brands['brand_id'];
			$brand_title = $row_brands['brand_title'];

			echo "<li><a href='#'>$brand_title</a></li>";
			
		}

}

?>