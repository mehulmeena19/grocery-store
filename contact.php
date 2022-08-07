	<?php require'inc/header.php'; ?>
	<?php require'inc/nav.php'; ?>
	<?php include 'admin/functions/functions.php';?>
	<?php include 'assets/dbconnect.php';?>
	<!-- Header section end -->


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Contact</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Contact</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info">
					<h3>Get in touch</h3>
					<p>Your Nearest shopping store</p>
					<p>+546 990221 123</p>
					<p>ayushi54@jnu.ac.in</p>
					<div class="contact-social">
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
					<form class="contact-form" action="contact.php" method="POST">
						<input type="text" placeholder="Your name" name="sname">
						<input type="text" placeholder="Your e-mail" name="mail">
						<input type="text" placeholder="Subject" name="subject">
						<textarea placeholder="Message" name="message"></textarea>
						<button class="site-btn" name="submit">SEND NOW</button>
					</form>
				</div>
			</div>
		</div>
		<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe></div>
	</section>
	<!-- Contact section end -->


	<!-- Related product section -->
	<section class="related-product-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Your Favorites</h2>
			</div>
			<div class="row">
			
				<?php
					getpro();
				?>
			</div>
		</div>
	</section>
	<!-- Related product section end -->
	<?php
	if(isset($_POST['submit'])){
		//Admin mail
		$sname=$_POST['sname'];
		$smail=$_POST['mail'];
		$subject=$_POST['subject'];
		$smsg=$_POST['message'];
		$rmail="ayushi54_scs@jnu.ac.in";
		mail($rmail,$sname,$subject,$smsg,$smail);

		//Customer mail
		$email=$_POST['mail'];
		$subject="Welcome to our website";
		$msg="I shall get you soon,thanks for sending email";
		$from="ayushi54_scs@jnu.ac.in";
		mail($email,$subject,$msg,$from);
		echo "<h2 align='center'>Your mail has been sent</h2>";
	}
	?>

	<!-- Footer section -->
	<?php require'inc/footer.php'; ?>