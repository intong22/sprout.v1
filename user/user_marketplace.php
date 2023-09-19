<?php
	include "../backend/session_logged_in.php";
	include "../backend/bcknd_user_marketplace.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sprout</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/user_marketplace.css">
	</head>
	<body>
		<header class="p-0 mb-3 border-bottom">
		    <div class="container">
		      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
		        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
		          <a href="user_marketplace.html"><img src="images/Sprout_logo_nobg 2.png" class="brand-logo" alt=""></a>
		        </a>

		        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-1">
		          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
		          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
		          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
		          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
		        </ul>

		        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
		          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
		        </form>
		        <div>
		        	<a href="cart.html"><img src="images/cart-plus.svg" class="cart4-icon"></a>
		        </div>
		      </div>
		    </div>
		  </header>
		<h1 class="page-heading">Market<span style="color:gold;">place</span></h1>

		<section class="container">
			<div class="row product-lists">

				<?php
					//display
					if($flag == true)
					{
						display("plant_image"); 
					}
					else
					{
						display("plant_image_default");
					}
				?>

				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/Group 15.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					   <p class="card-text">Item: Indoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$100.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/Group 15.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Indoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$100.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/Group 15.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Indoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$100.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 14.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Outdoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$300.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 14.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Outdoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$300.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 14.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Outdoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$300.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 14.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Outdoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$300.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 19.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Indoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$250.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 19.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Indoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$250.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 19.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Indoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$250.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/heart.svg" class="heart-icon">
					  <img src="images/image 19.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Item: Indoor</p>
					    <!-- Product Price -->
						  <div class="card-price">
						    <span class="text-start">Air Purifier</span>
						    <span class="text-end">$250.00</span>
						  </div>
					  </div>
					</div>
				</div>
				<div class="col-sm-3 mt-4">
					<div class="card">
					  <img src="images/Group 15.jpg">
					  <div class="card-body">
					    <h5 class="card-title">Plant Name</h5>
					    <p class="card-text">Some quick example text to build on the Plant Name and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
			
			</div>
		</section>
		<script src="js/bootstrap.bundle.min.js"></script>	
	</body>
</html>
