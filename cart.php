	<?php require 'inc/header.php'; ?>
	<?php require 'inc/nav.php'; ?>
	<?php include 'admin/functions/functions.php';?>
	<?php include 'assets/dbconnect.php';?>
	<!-- Header section end -->
	<?php 
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
				<a href="./index.php">Home</a> /
				<a href="./cart.php">Your cart</a><br>
				<p>Click on particular brand or category to get items of that brand or category respectively.</p>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<form action="cart.php" method="post">
		<div class="container">
			<b><?php echo "Currently you have ".item()." items in your cart" ?></b>
			<div class="row">
				
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Product</th>
									<th class="quy-th">Quantity</th>
									<th class="size-th">Remove item</th>
									<th class="total-th">Price</th>
								</tr>
							</thead>
							<tbody>
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
								<tr>
									<td class="product-col">
										<img src="admin/images/<?php echo $p_img ?>" alt="">
										<div class="pc-title">
											<h4><?php echo $p_title ?></h4>
											<p><?php echo $p_price ?></p>
										</div>
									</td>

									<td class="quy-col">
										
                    					<?php echo $pro_qty ?>
									</td>
									<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
									<td class="total-col"><h4><?php echo $sub_total ?></h4></td>
								</tr>
								<?php } } ?>
								
								</tr>
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<div class="text-left"><button type="submit" name="update" value="Update Cart">Update Cart</button></div>
							<h6>Total <span><?php echo $total ?></span></h6>
						</div>
					</div>
				</div>
			<!--</form>-->
				
				<div class="col-lg-4 card-right">
					
					<a href="./checkout.php" class="site-btn">Proceed to checkout</a>
					<a href="./category.php" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</form>
	<?php
					function update_cart(){
						#echo "ayushi";
						global $connection;
						if(isset($_POST['update'])){
							foreach($_POST['remove'] as $remove_id)
							{
								echo "ayushi";
								$delete_product="delete from cart where p_id='$remove_id'";
								$run_del=mysqli_query($connection,$delete_product);
								if($run_del){
									echo "<script>window.open('cart.php','_self')</script>";
								}
							}
						}
					}
					echo @$up_cart=update_cart();
				?>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Continue Shopping</h2>
			</div>
			<div class="row">
				
				<?php
					getpro();
				?>
			</div>
		</div>
	</section>
	<!-- Related product section end -->



	<!-- Footer section -->
	<?php require 'inc/footer.php' ;?>