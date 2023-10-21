<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile.php";
    include "../backend/bcknd_user_forum.php";
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>User Homepage</title>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>
   
   .container {
       width: 500px;
       margin: 0 auto;
       background-color: #fff;
       border-radius: 5px;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       padding: 20px;
       margin-top: 20px;
   }
   .post-box {
       padding: 10px;
       border: 1px solid #ccc;
       border-radius: 5px;
       margin-bottom: 10px;
   }
   .post-header {
       display: flex;
       justify-content: space-between;
       align-items: center;
   }
   .user-avatar {
       width: 40px;
       height: 40px;
       border-radius: 50%;
       background-color: #ccc;
   }
   .user-info {
       margin-left: 10px;
   }
   .post-content {
       margin-top: 10px;
   }
   .post-actions {
       margin-top: 10px;
       display: flex;
       align-items: center;
       color: #555;
   }
   .post-actions a {
       text-decoration: none;
       color: #555;
       margin-right: 10px;
   }
   .like-button {
       display: inline-block;
       cursor: pointer;
   }
   .comment-box {
       width: 100%;
       border: 1px solid #ccc;
       border-radius: 5px;
       padding: 10px;
       margin-top: 10px;
   }
   .comment {
       margin-top: 10px;
       border-bottom: 1px solid #ccc;
       padding-bottom: 10px;
   }
</style>
   </head>
 
   

<body>
  <!--SIDEBAR-->
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
       <i class='bx bx-menu' id="btn" ></i>
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
       
    </div>
    <ul class="nav-list">
      <li>
        <a href="user_homepage.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">HOME</span>
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
       <a href="user_bookmark.php">
       <i class='bx bx-book-bookmark' ></i>
         <span class="links_name">Bookmark</span>
       </a>
       <span class="tooltip">BOOKMARK</span>
     </li>
     <li>
       <a href="user_like.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="user_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">USER PROFILE</span>
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
         <div class="profile-image-container" onclick="toggleUploadButton()">
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
             <input type="file" id="upload-photo" accept="image/*" style="display: none;">
        </div>
        <!-- Button to trigger file input -->
        <label for="upload-photo" id="upload-button" class="upload-button">
            <i class="bx bx-camera"></i> Upload Profile
        </label>
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
  
 
    <script src="../js/homepage.js"></script>	

  <section class="home-section">
    <header style="padding:20px;">
    <a href="user_forum.php" style="text-decoration: none">
      <h1 class="colored-text"> <span class="white">C O M M U N I T Y</span><span class="orange">  F O R U M</span> </h1><br>
    </a>
    <form method="GET" action="user_forum.php">
            <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
            <div class="topright"><img src="../assets/basil_notification-on-solid.png" class="brand-logo" alt=""></div>
    </form>
       
    <br>    
    </header>
    
</div>
    </div>
  
    <br>

     
    
 
          
  <div class="child-container">
            <div class="child1">
          
        <div class="form-group">
        <header class="p-0 mb-3 border-bottom">
		    <div class="container">
			    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      
           </div>
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
        <div class="button-group pull-right">
          <p class="counter"></p>
        <center>  <button type="submit" name="btnPost" class="btn btn-primary">Post</button>
        <!--<input type="file" name="addPhotos[]" class="btn btn-primary" multiple>-->
        <button type="submit" name="addPhotos" class="btn btn-primary" multiple>Add photos</button></center>
        </div>
    </form>
    
      <ul class="posts">

    <?php
        postInfo();
    ?>
             
                
             
                    <button name="btnUpvote" class="button">Upvote</button>    

                    <button name="btnComment" class="button">Comment</button>  

                    <button name="btnReport" class="button">Report</button>  

                    <br>
              <label for="comment_name">Comment:</label>

                    <input type="text" id="comment_name" name="comment_name" ><button name="btnComment" class="button">Comment</button>  <br><br>
</form>
</div>
</ul>
</div>
<br >
      </div>
    </div>

    </div>
  </body>
</html>
