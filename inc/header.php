

<!DOCTYPE html>
<?php session_start(); ?>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	
	<script type="text/javascript">
	function AlertIt() {
	var answer = confirm ("Your'll shortly recieve you order");
	if (answer)
	window.location="thankyou.php";
}
</script>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<?php if(!isset($_SESSION['logged_in'])) {?>
								<a href="./login.php">Sign</a>In or <a href="./home.php">Create Account</a>
								<?php } else 
								echo $_SESSION['username'];
								?>

							</div>
							<div class="up-item">
								<?php if(isset($_SESSION['logged_in']))
									echo "<a href='./logout.php'>Logout</a>";
								?>
							</div>
							<div class="up-item">
								<!--<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span></span>                    <?php #echo item(); ?>
								</div>-->
								<a href="./cart.php" style="background-color: deeppink;">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>