<?php
include '../assets/dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<title>View Orders</title>
</head>
<body style="background-color:lightgrey;">
	<div class="container">
		<h1 style="text-align: center;">ADMIN PANEL</h1><br>
		<h3 style="text-align: center;">All Orders</h3><br><br>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped" style="background-color:lightyellow;">
								<thead>
									<tr>
										<th>Order No</th>
										<th>Username</th>
										<th>Invoice No</th>
										
										<!--<th>Product Sold</th>-->
										<th>Order Date</th>
										<th>Total Amount</th>
										<th>Order Status</th>
										<th>Delete Order</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=0;
									$get_order="select * from orders";
									$run_order=mysqli_query($connection,$get_order);
									while($row=mysqli_fetch_array($run_order))
									{
										$order_id=$row['order_id'];
										$c_id=$row['customer_id'];
										$invoice_no=$row['invoice_no'];
										$due_amount=$row['due_amount'];
										$order_date=$row['order_date'];
										$order_status=$row['order_status'];
										$i++;
									?>
									
									
									<tr>
										<td><?php echo $i; ?></td>
										<td>
											<?php
											$get_customer="select * from user where id='$c_id'";
											$run_customer=mysqli_query($connection,$get_customer);
											$row_customer=mysqli_fetch_array($run_customer);
											$c_name=$row_customer['username'];
											echo $c_name;
											?>
										</td>
										<td><?php echo $invoice_no; ?></td>
										<td><?php echo $order_date; ?></td>
										<td><?php echo $due_amount; ?></td>
										<td><?php echo $order_status; ?></td>
										<td>
											<a href="delete_order.php?del=<?php echo $order_id?>">Delete</a>
										</td>
										
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<a href="admin_index.php" style="text-align: center;">Click here to go to Admin Dashboard</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>