<?php
include '../assets/dbconnect.php';
?>

<?php
	if(isset($_GET['del'])){
		$del_id=$_GET['del'];
		$del_brand="delete from brand where b_id='$del_id'";
		$run_delete=mysqli_query($connection,$del_brand);
		if($run_delete){
			echo "<script>alert('Selected product has been deleted')</script>";
			echo "<script>window.open('view_brand.php','_self')</script>";
		}
	}