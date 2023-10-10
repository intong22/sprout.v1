<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile.php";
    include "../backend/bcknd_user_marketplace.php";
						  
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Marketplace</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/user_marketplace.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	</head>
	<body>
		<header class="p-0 mb-3 border-bottom">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="user_homepage.php"><img src="../assets/Sprout_logo_nobg 2.png" class="brand-logo" alt=""></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Homepage <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Encyclopedia</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Forum</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Favorites</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Dropdown
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Test</a>
			          <a class="dropdown-item" href="#">Test</a>
			          <div class="dropdown-divider"></div>
			          <a class="dropdown-item" href="#">Test</a>
			        </div>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			      </li>
			    </ul>
			    <form method="GET" action="user_marketplace.php" class="form-inline my-2 my-lg-0">
			      <input name="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button type="submit" name="searchMarket" hidden>Search</button>
			      <a href="user_cart.php"><img src="../assets/cart-plus.svg" class="cart4-icon"></a>
			    </form>
			  </div>
			</nav>
		</header>
		<h1 class="page-heading"><a href="user_marketplace.php" style="text-decoration: none;">Market<span style="color:gold;">place</a></span></h1>
		<section class="container">
			<div class="row product-lists">

				<?php
					if(isset($_GET["searchMarket"]))
					{
						searchMarket();
					}
					else
					{
						displayDeflt();
					}
				?>
			</div>
		</section>
		<script src="../js/slim.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
