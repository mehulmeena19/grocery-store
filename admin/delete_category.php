<?php
include '../assets/dbconnect.php';
?>

<?php
	if(isset($_GET['del'])){
		$del_id=$_GET['del'];
		$del_cat="delete from category where c_id='$del_id'";
		$run_delete=mysqli_query($connection,$del_cat);
		if($run_delete){
			echo "<script>alert('Selected product has been deleted')</script>";
			echo "<script>window.open('view_category.php','_self')</script>";
		}
	}