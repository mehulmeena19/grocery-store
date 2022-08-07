<?php 
session_start();

include 'inc/loginconfirm.php';
?>


<html>
<head>
 	<title> Login Form in HTML5 and CSS3</title>
 	<link rel="stylesheet" a href="css\loginstyle.css">
 	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
	<body style="background-color:lightgrey;">
 		<div class="container">
 			<img src="img/login.jpg"/>
 			<form method="POST">
 				<div class="form-input">
 					<input type="text" name="usrname" placeholder="Enter the User Name"/> 
 				</div>
 				<div class="form-input">
 					<input type="password" name="password2" placeholder="password"/>
 				</div>
 					<input type="submit" type="submit" name="login" value="LOGIN" class="btn-login"/>
 			</form>
 		</div>
	</body>
</html>