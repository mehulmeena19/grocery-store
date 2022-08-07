<?php
	$db=mysqli_connect("localhost","root","","grocery");

	function getUserIp(){
		
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
	}

	function addCart($p_id,$product_qty,$p_title){
		global $db;
		#if(isset($_REQUEST['add_cart'])){
			$ip_add=getUserIp();                                 #getUserIp();
			#$p_id=$_GET['add_cart'];
			#$p_title=$_GET['pro_title'];
			#$product_qty=$_POST['product_qty'];
			$check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
			$run_check=mysqli_query($db,$check_product);
			$num=mysqli_num_rows($run_check);
			/*if($num!=0)
			{
				echo "<script>alert('This product is already added in the cart')</script>";
				echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>"
			}*/
			if($num==0){
				$query="insert into cart(p_id,ip_add,quantity,p_title) values('$p_id','$ip_add','$product_qty','$p_title')";
				$run_query=mysqli_query($db,$query);
				echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";	
			}
			else{
				echo "<script>alert('This product is already added in the cart')</script>";
				echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
			}
		#}
	}
	#To display number of items in the cart
	function item(){
		global $db;
		$ip_add=getUserIp();
		$get_items="select * from cart where ip_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count=mysqli_num_rows($run_items);
		#echo $count;
		return $count;

	}

	function getpro(){
		global $db;
		$get_product="select * from product order by 1 DESC LIMIT 0,9";
		$run_products=mysqli_query($db,$get_product);
		while ($row=mysqli_fetch_array($run_products)) {
			$pro_id=$row['product_id'];
			$pro_title=$row['product_title'];
			$pro_price=$row['product_price'];
			$pro_img=$row['product_img'];

			echo "<div class='col-md-4 col=sm-6'>
					<div class='product'>
						<a href='#'>
							<img src='admin/images/$pro_img' class='img-responsive'>
						</a>
						<div class='text'>
							<h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>INR $pro_price </p>
							<p class='buttons'>
								<a href='product.php?pro_id=$pro_id' class='btn btn-default' style='background-color:orange;color:white'>View Details</a>
								<a href='product.php?pro_id=$pro_id' class='btn btn-default' style='background-color:dodgerblue;color:white'>Add to cart</a>
							</p>
						</div>
					</div>
				   </div>";
				#product.php?pro_id=$pro_id	
		}
	}
	function getbrand(){
		global $db;
		$get_brand="select * from brand";
		$run_brand=mysqli_query($db,$get_brand);
		while ($row=mysqli_fetch_array($run_brand)){
			$brand_id=$row['b_id'];
			$brand_name=$row['b_name'];
			echo "<li><a href='category.php?p_brand=$brand_id'>$brand_name</a></li>";
			#<a href='shop.php?p_brand=$brand_id'>
		}
	}
	function getcategory(){
		global $db;
		$get_cat="select * from category";
		$run_cat=mysqli_query($db,$get_cat);
		while ($row=mysqli_fetch_array($run_cat)){
			$cat_id=$row['c_id'];
			$cat_name=$row['c_name'];
			echo "<li><a href='category.php?p_cat=$cat_id'>$cat_name</a></li>";
			#<a href='shop.php?p_cat=$cat_id'>
		}
	}
	function getcattitle(){
		global $db;
		if(isset($_GET['p_cat'])){
			$p_cat_id=$_GET['p_cat'];
			$get_p_cat="select * from category where c_id='$p_cat_id' ";
			$run_p_cat=mysqli_query($db,$get_p_cat);
			$row=mysqli_fetch_array($run_p_cat); 
			$p_cat_title=$row['c_name'];

			$get_product="select * from product where c_id='$p_cat_id' ";
			$run_product=mysqli_query($db,$get_product);
			$count=mysqli_num_rows($run_product);
			if($count==0)
			{
				echo "<div class='box'><h3>No product found in this category</h3><br></div>";
			}
			else
			{
				echo "<div class='box'>
						<h3>$p_cat_title</h3><br>
					</div>	
				";
			}
		}
	}
	function getcatpro(){
		global $db;
		if(isset($_GET['p_cat'])){
			$p_cat_id=$_GET['p_cat'];
		
		$get_product="select * from product where c_id='$p_cat_id' ";
		$run_product=mysqli_query($db,$get_product);

		while($row=mysqli_fetch_array($run_product))
			{
				$pro_id=$row['product_id'];
				$pro_title=$row['product_title'];
				$pro_price=$row['product_price'];
				$pro_img=$row['product_img'];

				echo "<div class='col-md-4 col-sm-6 center-responsive'>
					<div class='row'>
						<a href='product.php?pro_id=$pro_id'>
						<img src='admin/images/$pro_img' class='img-responsive'>
						</a>
						<div class='text'>
							<h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>INR $pro_price </p>
							<p class='buttons'>
								<a href='product.php?pro_id=$pro_id' class='btn btn-default' style='background-color:orange;color:white'>View Details</a>
								<a href='product.php?pro_id=$pro_id' class='btn btn-default' style='background-color:dodgerblue;color:white'>Add to cart</a>
							</p>
						</div>
					</div>
				   </div>";
			}
		}
	}
	function getbrandtitle(){
		global $db;
		if(isset($_GET['p_brand'])){
			$p_brand_id=$_GET['p_brand'];
			$get_p_brand="select * from brand where b_id='$p_brand_id' ";
			$run_p_brand=mysqli_query($db,$get_p_brand);
			$row=mysqli_fetch_array($run_p_brand); 
			$p_brand_title=$row['b_name'];

			$get_product="select * from product where b_id='$p_brand_id' ";
			$run_product=mysqli_query($db,$get_product);
			$count=mysqli_num_rows($run_product);
			if($count==0)
			{
				echo "<div class='box'><h3>No product found in this brand</h3><br></div>";
			}
			else
			{
				echo "<div class='box'>
						<h3>$p_brand_title</h3><br>
					</div>	
				";
			}
		}
	}
	function getbrandpro(){
		global $db;
		if(isset($_GET['p_brand'])){
			$p_brand_id=$_GET['p_brand'];
		
		$get_product="select * from product where b_id='$p_brand_id' ";
		$run_product=mysqli_query($db,$get_product);

		while($row=mysqli_fetch_array($run_product))
			{
				$pro_id=$row['product_id'];
				$pro_title=$row['product_title'];
				$pro_price=$row['product_price'];
				$pro_img=$row['product_img'];

				echo "<div class='col-md-4 col-sm-6 center-responsive'>
					<div class='row'>
						<a href='product.php?pro_id=$pro_id'>
						<img src='admin/images/$pro_img' class='img-responsive'>
						</a>
						<div class='text'>
							<h3><a href='product.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>INR $pro_price </p>
							<p class='buttons'>
								<a href='product.php?pro_id=$pro_id' class='btn btn-default' style='background-color:orange;color:white'>View Details</a>
								<a href='product.php?pro_id=$pro_id' class='btn btn-default' style='background-color:dodgerblue;color:white'>Add to cart</a>
							</p>
						</div>
					</div>
				   </div>";
			}
		}
	}


?>