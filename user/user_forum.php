<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_forum.php";
?>


<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum</title>
    <link rel="website icon" type="png" href="assets\logo.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_profile.css">
    <link rel="stylesheet" href="../css/user_forum.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*
  .topright {
  position: absolute;
  top: 8px;
  right: 16px;
  font-size: 18px;
}


     </style>
   </head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <!--<i class='bx bxl-c-plus-plus icon'></i>-->
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
       <a href="user_encyclopedia.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">Encyclopedia</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Community Forum</span>
       </a>
       <span class="tooltip">Community Forum</span>
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
              echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";    
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
				<span class="tooltip">LOGOUT</span>
     </li>
    </ul>
  </div>
  
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
  <div class="grand-parent">
        <div class="parent">
           
            <div class="back">
                <a href="user_homepage.php"><i class="fi fi-rr-arrow-small-right"></i></a>
            </div>
           

  </div>
        
  <div class="child-container">
            <div class="child1">
  <section class="container">
      <form>
      
        <div class="form-group">
        <header class="p-0 mb-3 border-bottom">
		    <div class="container">
			    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <div class="container">
           <div class="topright"><img src="../assets/basil_notification-on-solid.png" class="brand-logo" alt=""></div>
           </div>

          
          <div id="header">
          <h1 class="page-heading"><span style="color:white;">Community<span style="color:orange;">Forum</span></h1>

         
			        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-1">
			       
			        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" >
			   
			    </div>
		    </div>
        </div>
		  </header>
     
 <div class="card">
  <div class="card-body">
  <div style='text-align:left'>
  <div class="img">
    
    <div style='image-align:left'>
    <p style="display:inline-block;">
   
    <a href="user_forum_profile.php">
    <?php 
        if($flag == true)
        {
          echo $image; 
        }
        else
        {
          echo "<img src='../assets/user_image_def.png' alt='User image' class='forum-image' </img>";   
        } 
      ?>
       <?php echo $fname." ".$lname; ?>
    </a>
    
    </p>

    <form method="POST" action="user_forum.php" enctype="multipart/form-data">
        <textarea name="postDetails" class="form-control status-box" rows="2" placeholder="What's on your mind?"></textarea>
          </div>
        </form>
        <div class="button-group pull-right">
          <p class="counter"></p>
        <center>  <button type="submit" name="btnPost" class="btn btn-primary">Post</button>
        <!--<input type="file" name="addPhotos[]" class="btn btn-primary" multiple>-->
        <button type="submit" name="addPhotos[]" class="btn btn-primary" multiple>Add photos</button></center>
        </div>
    </form>
    
      <ul class="posts">
      </ul>
    </div>
    <br >

    <?php
        postInfo();
    ?>

        
  </div>

</div>

      </div>
    </div>
  </body>
</html>

