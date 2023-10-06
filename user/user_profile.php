<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile.php";
    include "../backend/bcknd_user_profile_edit.php";
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="website icon" type="png" href="assets\logo.png">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_profile.css">
    <link rel="stylesheet" href="../css/user_profile_edit.css">
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
    <title> User Profile </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body></style>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
       <i class='bx bx-menu' id="btn" ></i>
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
       
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
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="user_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">USER PROFILE</span>
     </li>
     <li>
       <a href="user_encyclopedia.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">ENCYCLOPEDIA</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Community Forum</span>
       </a>
       <span class="tooltip">COMMUNITY FORUM</span>
     </li>
     <li>
       <a href="user_marketplace.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Marketplace</span>
       </a>
       <span class="tooltip">MARKETPLACE</span>
     </li>
     <li>
       <a href="user_order.php">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Order</span>
       </a>
       <span class="tooltip">ORDER</span>
     </li>
     <li>
       <a href="user_favorite.php">
       <i class='bx bx-book-bookmark' ></i>
         <span class="links_name">Favorites</span>
       </a>
       <span class="tooltip">Favorites</span>
     </li>
     <li>
       <a href="user_like.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
 <li>
       <a href="user_settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">SETTINGS</span>
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
        <h1 class="colored-text"> <span class="white">S p r</span><span class="orange"> o u t </span><span class="white">| User Profile</span><i class="fi fi-br-time-past"></i> </h1>
        <form method="POST" action="user_profile.php">
        </form> 
      </div>
        <div class="child-container">
            <div class="child1">

                <form method="GET" action="user_profile.php">
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
                </form>

                <br>

                <div style="text-align:center;">
                    <form method="POST" action="user_profile.php">
                        <h2 class="removeB">&nbsp <?php echo $fname." ".$lname; ?><a href="user_profile_edit.php">&nbsp<i class="fi fi-rr-pencil"></i></a>
                        </h2>
                    </form>
                </div>

                <br>

                <div style="text-align:center;">
                    <a href="#" class="removeB">View Purchase History </a>
                </div>

            </div>

            <br>
            <br>

            <div class="child2">
            <input type="text" name="firstname" placeholder="Firstname" readonly value="<?php echo $fname; ?>">

            <input type="text" name="lastname" placeholder="Lastname" readonly value="<?php echo $lname; ?>">

            <input type="text" name="mobilenumber" placeholder="Mobile Number" readonly value="<?php echo $mobile; ?>">	

            <input type="text" name="emailaddress" placeholder="Email Address" readonly value="<?php echo $email; ?>">		

            <input type="text" name="homeaddress" placeholder="Home Address" readonly value="<?php echo $address; ?>" >
 
            
            </div>
        <div>
    </div>
  </body>
</html>
