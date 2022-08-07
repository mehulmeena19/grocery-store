<div class="box">
	<?php
		$session_uname=$_SESSION['username'];
		$select_customer="select * from user where username='$session_uname'";
		$run_cust=mysqli_query($connection,$select_customer);
		$row_customer=mysqli_fetch_array($run_cust);
		$cus_id=$row_customer['id'];
	?>
	<h1 class="text-center">
		Payment Options
	</h1>
	
	<p class="lead text-center">
	<a href="javascript:AlertIt();"><b>Cash On Delivery</b></a></p>                      <!--order.php?c_id=<?php #echo $cus_id; ?>-->
	<center>
		<p class="lead">
			<!--<a href="#"><b>Pay with paypal</b>
				<img src="img/paypal.png" class="img-responsive">
			</a><br><br>-->
			<a href="./payment.php"><b>Credit/Debit Card</b>
				<img src="img/cards.png"  class="img-responsive">
			</a>
		</p>
	</center>
</div>