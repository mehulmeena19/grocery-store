<?php require 'inc/header.php';?>
<?php require 'inc/nav.php' ;?>
<?php include 'admin/functions/functions.php';?>
<?php include 'assets/dbconnect.php';?>

<?php
	
	$ip_add=getUserIp();
	$status="pending";
	$invoice_no=mt_rand();
	$select_cart="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($connection,$select_cart);
	
	while($row_cart=mysqli_fetch_array($run_cart)){
		$pro_id=$row_cart['p_id'];
		$qty=$row_cart['quantity'];
		$get_product="select * from product where product_id='$pro_id'";
		$run_pro=mysqli_query($connection,$get_product) or die(mysqli_error($connection));
		while($row_pro=mysqli_fetch_array($run_pro)){
			$sub_total=$row_pro['product_price']*$qty;
				$session_uname=$_SESSION['username'];
				$select_customer="select * from user where username='$session_uname'";
				$run_cust=mysqli_query($connection,$select_customer);
				$row_customer=mysqli_fetch_array($run_cust);
				$cust_id=$row_customer['id'];			
			$insert_order="insert into orders(customer_id,due_amount,invoice_no,qty,order_date,order_status) values('$cust_id','$sub_total','$invoice_no','$qty',NOW(),'$status')";
			$run_order=mysqli_query($connection,$insert_order);

			

			$delete_cart="delete from cart where ip_add='$ip_add'";
			$run_delete=mysqli_query($connection,$delete_cart);
			echo "<script>alert('Your order has been submitted')</script>";
		}
	}
?>

<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your Orders</a>
			</div>
		</div>
	</div>
	

	<div class="container">
		<h2>My Orders</h2>
		<form action="order.php" method="POST">
		<div class="table-responsive">
			<table class="table table-responsive table-bordered table-hover">
				<thead>
					<tr>
						<th>Sr. No</th>
						<th>Due Amount</th>
						<th>Invoice No</th>
						<th>Quantity</th>
						<th>Order Date</th>
						<th>Paid/Unpaid</th>
						<!--<th>Status</th>-->
					</tr>
				</thead>
				<tbody>
					<?php
						$cust_uname=$_SESSION['username'];
						$get_cust="select * from user where username='$cust_uname'";
						$run_cust=mysqli_query($connection,$get_cust);
						$row_cust=mysqli_fetch_array($run_cust);
						$cust_id=$row_cust['id'];
						$get_order="select * from orders where customer_id='$cust_id'";
						$run_order=mysqli_query($connection,$get_order);
						$i=0;
						while($row_order=mysqli_fetch_array($run_order)){
							$order_id=$row_order['order_id'];
							$due_amount=$row_order['due_amount'];
							$invoice_no=$row_order['invoice_no'];
							$qty=$row_order['qty'];
							$order_date=substr($row_order['order_date'], 0,11);
							$order_status=$row_order['order_status'];
							$i++;
							if($order_status=='pending')
								$order_status="unpaid";
							else
								$order_status="paid";						
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $due_amount; ?></td>
							<td><?php echo $invoice_no; ?></td>
							<td><?php echo $qty; ?></td>
							<td><?php echo $order_date; ?></td>
							<td><?php echo $order_status; ?></td>
														
						</tr>
						<?php } ?>
				</tbody>
			</table>
			<button class="site-btn submit-order-btn" name="payment">Make Payment</button>
		</div>
	</form>
	</div>
	
<?php 
if(isset($_POST['payment']))
	include('payment_options.php');
?>
<?php require 'inc/footer.php'; ?>