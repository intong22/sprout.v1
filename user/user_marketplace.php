<?php
    include "../backend/session_logged_in.php";
	include "../backend/bcknd_user_marketplace.php";
    include "../backend/bcknd_user_profile.php";
						  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>User Homepage</title>
	  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_marketplace.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>
    .page-heading {
	color: #1E5631;
}
.p-0.mb-3.border-bottom {
    background-color: #1E5631;
}
     </style>
   </head>
   
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="user_homepage.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">HOME</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="user_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Community Forum</span>
       </a>
       <span class="tooltip">Community Forum</span>
     </li>
     <li>
       <a href="user_encyclopedia.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">Encyclopedia</span>
     </li>
     <li>
       <a href="user_marketplace.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Marketplace</span>
       </a>
       <span class="tooltip">Marketplace</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">Order</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
         <?php 
            if($flag == true)
            {
              echo $image; 
            }
            else
            {
              echo $deflt_image;   
            } 
            ?> 
            <div class="name_job">
                <div class="name"><?php echo $fname." ".$lname; ?></div>
                <div class="job"><?php echo $status; ?></div>
            </div>
         </div>
         <a href="../backend/session_end.php">
            <i class='bx bx-log-out' id="log_out" ></i>
          </a>
     </li>
    </ul>
  </div>
  
 

<script src="../js/homepage.js"></script>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }

  </script>
	
 <section class="home-section">
  
 	<header class="p-0 mb-3 border-bottom">
		    <div class="container">
			    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
			        <a href="user_homepage.php"><img src="../assets/Sprout_logo_nobg 2.png" class="brand-logo" alt=""></a>
			        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-1">
			          <li><a href="#" class="nav-link px-2 link-body-emphasis">Homepage</a></li>
			          <li><a href="#" class="nav-link px-2 link-body-emphasis">Encyclopedia</a></li>
			          <li><a href="#" class="nav-link px-2 link-body-emphasis">Forum</a></li>
			          <li><a href="#" class="nav-link px-2 link-body-emphasis">Favorites</a></li>
			        </ul>
			        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
			          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
			        </form>
			        <div>
			        	<a href="user_cart.php"><img src="../assets/cart-plus.svg" class="cart4-icon"></a>
			        </div>
			    </div>
		    </div>
	</header>

  	<form method="POST" action="user_marketplace.php">
		<!--USER MARKETPLACE-->	
		<h1 class="page-heading">Market<span style="color:gold;">place</span></h1>

		<section class="container">
			<div class="row product-lists">
				<?php
					display();
				?>
			</div>
		</section>
	</form>
 </section>
	<script src="../js/bootstrap.bundle.min.js"></script>	
	
	</body>
</html>
