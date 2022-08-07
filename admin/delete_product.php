<?php
include '../assets/dbconnect.php';
?>

<?php
	if(isset($_GET['del'])){
		$del_id=$_GET['del'];
		$del_pro="delete from product where product_id='$del_id'";
		$run_delete=mysqli_query($connection,$del_pro);
		if($run_delete){
			echo "<script>alert('Selected product has been deleted')</script>";
			echo "<script>window.open('view_product.php','_self')</script>";
		}
	}