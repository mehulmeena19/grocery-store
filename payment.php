<?php require 'inc/header.php';?>
<?php require 'inc/nav.php' ;?>
<?php include 'admin/functions/functions.php';?>
<?php include 'assets/dbconnect.php';?>

<?php
	$query="update orders set order_status='completed' where order_status='pending'";
	$run_query=mysqli_query($connection,$query);

?>
<div class="page-top-info">
	<div class="container">
		<h4>Make Payemnt</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Make Payment</a>
			</div>
	</div>
</div>

<div class="container">
	<div class="box">
		<form action="payment.php" method="POST">
			<label>Account no</label><br>
  			<input type="text" name="acc_no" placeholder="XXX-XXX-XXX-XXX"><br><br>

  			<label>Account Holder's Name</label><br>
  			<input type="text" name="acc_name" placeholder="NAME"><br><br>

  			<label>Expiry Month/Year</label>
  			<input type="text" name="exp" placeholder="XX/XXXX">

  			<label>CVV</label>
  			<input type="text" name="cvv" placeholder="CVV"><br><br>
  			<button class="btn btn-primary btn-sm" name="submit">Pay Now</button>
		</form>
	</div>
</div>

<?php
	if(isset($_POST['submit']))
	{
		$acc_no=$_POST['acc_no'];
		$acc_name=$_POST['acc_name'];
		$exp=$_POST['exp'];
		$cvv=$_POST['cvv'];
		$query1="insert into payment(pay_date,acc_name,acc_no,exp,cvv) values(NOW(),'$acc_name','$acc_no','$exp','$cvv')";
		$run1=mysqli_query($connection,$query1);
		if($run1){
    	echo "<script>alert('You have successfully made payment')</script>";
    	echo "<script>window.open('thankyou.php','_self')</script>";

		} else{
    	echo "<script>alert('Something went wrong! Try Again')</script>" . mysqli_error($connection);
		}
	}
?>

<?php require 'inc/footer.php'; ?>