	<?php require'inc/header.php';?>
	<?php require'inc/nav.php'; ?>
	<?php include 'admin/functions/functions.php';?>
	<?php include 'assets/dbconnect.php';?>
	<!-- Header section end -->


	<!-- Page info -->
	
	<?php 
	if(isset($_GET['pro_id'])){
		$pro_id=$_GET['pro_id'];
		$get_product="select * from product where product_id='$pro_id'";
		$run_product=mysqli_query($connection,$get_product);
		$row=mysqli_fetch_array($run_product);
		$p_cat_id=$row['c_id'];
		$p_title=$row['product_title'];
		$p_image=$row['product_img'];
		$p_price=$row['product_price'];
		$p_desc=$row['product_description'];
		$title=$p_title;
	}
	else{
		$pro_id=6;
		$p_cat_id=3;
		$p_title="Maggie";
		$p_image="21.jpg";
		$p_price="RS 40";
		$p_desc="Have this maggie";
	}
	?>
	<div class="page-top-info">
		<div class="container">
			<h4>Details Page</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- product section -->
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">            <!--add_cart=<?php #echo $pro_id; ?>-->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="./category.php"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="admin/images/<?php echo"$p_image" ?>" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="admin/images/<?php echo"$p_image" ?>"><img src="admin/images/<?php echo"$p_image" ?>" alt=""></div>
							<div class="pt" data-imgbigurl="admin/images/<?php echo"$p_image" ?>"><img src="admin/images/<?php echo"$p_image" ?>" alt=""></div>
							<div class="pt" data-imgbigurl="admin/images/<?php echo"$p_image" ?>"><img src="admin/images/<?php echo"$p_image" ?>" alt=""></div>
							
						</div>
					</div>
				</div>
				
				<div class="col-lg-6 product-details">
					
					<h2 class="p-title"><?php echo"$p_title" ?></h2>
					<h3 class="p-price"><?php echo"Rs $p_price" ?></h3>
					<h4 class="p-stock">Available: <span>In Stock</span></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					
					
					<input type="hidden" name="add_cart" value="<?php echo $pro_id; ?>">
					<input type="hidden" name="pro_title" value="<?php echo $p_title; ?>">
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty"><input type="text" name="product_qty" value="1"></div>
                    </div>
					<!--<a href="./product.php?add_cart=<?php $pro_id; ?>" class="site-btn">SHOP NOW</a>-->
					<button type="submit" name="submit" class="site-btn" value="click"><b>ADD CART</b></button>
					
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									
									<p><?php echo"$p_desc" ?></p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="./img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div><br>
					
				</div>
			</div>

		</div>
	</section>
</form>
<?php

if(isset($_POST['add_cart']))  
{
echo $_POST['add_cart'];
echo $_POST['product_qty']; 
echo $_POST['pro_title'];
$ip_add=getUserIp();    

			$p_id=$_POST['add_cart'];
			$p_title=$_POST['pro_title'];
			$product_qty=$_POST['product_qty'];

			$check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
			$run_check=mysqli_query($connection,$check_product);
			$num=mysqli_num_rows($run_check);
			
			if($num!=0)
			{
				echo "<script>alert('This product is already added in the cart')</script>";
				echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
			}
			if($num==0){
				$query="insert into cart(p_id,ip_add,quantity) values('$p_id','$ip_add','$product_qty')";
				echo "jj";
				$run_query=mysqli_query($connection,$query);
				echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";	
			}
			else{
				echo "<script>alert('This product is already added in the cart')</script>";
				echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
			}
}  
?>

	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				

			</div>
			<div class="row">
			<?php
					getpro();
				?>
			</div>
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->


	<!-- Footer section -->
		<?php require'inc/footer.php' ?>