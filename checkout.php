	<?php require 'inc/header.php';?>
	<?php require 'inc/nav.php' ;?>
	<?php include 'admin/functions/functions.php';?>
	<?php include 'assets/dbconnect.php';?>

	<!-- Header section end -->
	<?php 
	#session_start();
	$ip_add=getUserIp();
	$select_cart="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($connection,$select_cart);
	$count=mysqli_num_rows($run_cart);
	?>

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
				<div class="col-lg-9">
		
	</div>
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" action="checkout.php" method="post">
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>
							
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Address" name="address">
								<input type="text" placeholder="Address line 2" name="address2">
								<input type="text" placeholder="Country" name="country">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Zip code" name="zip">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no." name="phone_no">
							</div>
						</div>
						<div class="cf-title">Delievery Info</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Standard</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-1">
										<label for="ship-1">Free</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Next day delievery  </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-2">
										<label for="ship-2">$3.45</label>
									</div>
								</div>
							</div>
						</div>
						
						<input type="hidden" name="total_price" value="<?php echo $total; ?>">
						<button class="site-btn submit-order-btn" name="order">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						<ul class="product-list">
							<?php 
								$total=0;
								while($row=mysqli_fetch_array($run_cart)){

									$pro_id=$row['p_id'];
									$pro_qty=$row['quantity'];
									$get_product="select * from product where product_id='$pro_id'";
									$run_pro=mysqli_query($connection,$get_product);
									while($row=mysqli_fetch_array($run_pro))
									{
										$p_title=$row['product_title'];
										$p_img=$row['product_img'];
										$p_price=$row['product_price'];
										$sub_total=$row['product_price']*$pro_qty;
										$total+=$sub_total;
									
								?>
							<li>
								<div class="pl-thumb"><img src="admin/images/<?php echo $p_img ?>" alt=""></div>
								<h6><?php echo $p_title ?></h6>
								<p><?php echo $p_price ?></p>
							</li>
							
							<?php } } ?>
						</ul>
						<ul class="price-list">
							<li>Total<span><?php echo $total ?></span></li>
							<li>Shipping<span>free</span></li>
							<li class="total">Total<span><?php echo $total ?></span></li>
						</ul>
					</div>
				</div>
			</div>
		
		</div>
	</section>

	<?php
		if(isset($_POST['order'])){
			$u_name=$_SESSION['username'];
			$add1=$_POST['address'];
			$add2=$_POST['address2'];
			$country=$_POST['country'];
			$zip=$_POST['zip'];
			$contact=$_POST['phone_no'];
			$query1="select * from shipping_details where user='$u_name'";
			$run1=mysqli_query($connection,$query1);
			if(!$row=mysqli_fetch_array($run1)){
			$query="insert into shipping_details(user,address1,address2,country,zip,contact) values('$u_name','$add1','$add2','$country','$zip','$contact')";
				$run=mysqli_query($connection,$query);
				}
			}
		if(isset($_POST['order']) && !(isset($_SESSION['logged_in'])))
		{
			
			echo "<script>alert('Please login first')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}
		if(isset($_POST['order']) && $count==0)
		{
			echo "<script>alert('No items in the cart')</script>";
			echo "<script>window.open('category.php','_self')</script>";
		}
		if(isset($_POST['order']))                                 #$_SESSION['username']     if($_SESSION['logged_in']) 
		{			
			echo "<script>window.open('order.php?c_id=<?php echo $cus_id; ?>','_self')</script>";
		}
		?>
	<!-- checkout section end -->

	<!-- Footer section -->
	<?php require 'inc/footer.php'; ?>