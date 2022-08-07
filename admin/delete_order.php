<?php
include '../assets/dbconnect.php';
?>

<?php
	if(isset($_GET['del'])){
		$del_id=$_GET['del'];
		$del_order="delete from orders where order_id='$del_id'";
		$run_delete=mysqli_query($connection,$del_order);
		if($run_delete){
			echo "<script>alert('Selected order has been deleted')</script>";
			echo "<script>window.open('view_order.php','_self')</script>";
		}
	}