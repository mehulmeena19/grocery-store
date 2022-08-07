	<?php require 'inc/header.php'; ?>
	<?php require 'inc/nav.php'; ?>
	<?php include 'admin/functions/functions.php';?>
	<!-- Header section end -->


	<!-- Page info -->
	
	<div class="page-top-info">
		<div class="container">
			<h4>Category Page</h4>
			<div class="site-pagination">
				<a href="./index.php">Home</a> /
				<a href="./cart.php">Shop</a> <br><br>
				<p>Click on particular brand or category to get items of that brand or category respectively.</p>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							
							<?php
								getcategory();
							?>
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">refine by</h2>
						<div class="price-range-wrap">
							<h4>Price</h4>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
					</div>
					
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Amount</h2>
						<div class="fw-size-choose">
							<div class="sc-item">
								<input type="radio" name="sc" id="xs-size">
								<label for="xs-size">1-200</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="s-size">
								<label for="s-size">201-500</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="m-size"  checked="">
								<label for="m-size">501-1000</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="l-size">
								<label for="l-size">1001-1500</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xl-size">
								<label for="xl-size">1501-2000</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xxl-size">
								<label for="xxl-size">2001 and above</label>
							</div>
						</div>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">Popular Brands</h2>
						<ul class="category-menu">
							<?php
							getbrand();
							?>
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<?php 
						if(!isset($_GET['p_cat']))
						{
							if(!isset($_GET['p_brand']))
							{
								echo "<div class='box'>
								<h3>SHOP</h3>
								<p>You will get all fresh products here</p>
								</div>
								";
							}
						}
						if(isset($_GET['p_cat']))
							getcattitle();
						if(isset($_GET['p_brand']))
							getbrandtitle();
					?>
					<div class="row">
						<?php
							
						if(!isset($_GET['p_cat']))
						{
							if(!isset($_GET['p_brand']))
							{
								getpro();
							}
						}
						if(isset($_GET['p_cat']))
							getcatpro();
						if(isset($_GET['p_brand']))
							getbrandpro();
						?>
						
						
					</div>
				</div>

				
			</div>

		</div>


	</section>
	
	<!-- Category section end -->


	<!-- Footer section -->
	<?php require 'inc/footer.php'; ?>