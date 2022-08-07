<?php
//$connection=mysqli_connect("localhost","root","","grocery");
	include 'assets/dbconnect.php';
	if(isset($_POST['register_btn'])){
		session_start();
	  $username=$_POST['username'];//mysqli_real_escape_string($_POST['username']);
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$address=$_POST['address'];
		if($password==$password2){
			$password=md5($password);
			$sql="INSERT INTO user(username,email,password,address) VALUES('$username','$email','$password2','$address')";
			mysqli_query($connection,$sql);
			$_SESSION['message']="You are now logged in";
			$_SESSION['username']=$username;
			header("location: index.php");
		}
		else{
			$_SESSION['message']="The two passwords do not match";
		}
	}
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Registration</title>
  	<link rel="stylesheet" href="css/style.css"/>
  </head>
  <center><body style="background-color:lightgrey;">
  	<div class="header">
  		<h1>REGISTRATION FORM</h1>
  	</div>
  	<form method="post" action="home.php">
  		<table border="5" width="400" height="300">
  			<tr>
  				<td>Name:</td>
  				<td><input type="text" name="username" class="textInput"></td>
  			</tr>
  			<tr>
  				<td>Email:</td>
  				<td><input type="email" name="email" class="textInput"></td>
  			</tr>
  			<tr>
  				<td>Password:</td>
  				<td><input type="password" name="password" class="textInput"></td>
  			</tr>
  			<tr>
  				<td>Confirm Password:</td>
  				<td><input type="password" name="password2" class="textInput"></td>
  			</tr>
  			<tr>
  				<td>Address:</td>
  				<td><input type="text" name="address" class="textInput"></td>
  			</tr>
  			<tr>
  				<td></td>
  				<td><input type="submit" name="register_btn" value="Register"></td>
  			</tr>
  		</table>
  	</form>
  </body></center>
  </html>