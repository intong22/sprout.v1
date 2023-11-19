<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_subscriptions.php";
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="website icon" type="png" href="assets\logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    

        <title>Manage subscriptions</title>
    </head>
    <body>
    <div class="sidebar">
    <div class="logo-details">
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
       <i class='bx bx-menu' id="btn" > </i>         
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
 <li>
       <a href="user_settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">SETTINGS</span>
     </li>
     <li class="profile">
         <div class="profile-details">
            <img src='../assets/user_image_def.png' alt='User image' class='user-image' />
            <div class="name_job">
              <div class="name">Admin</div>
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
  <section class="home-section">
  <header style="background: #1E5631; padding:40px; color:white">
  <h1 class="colored-text"><span class="white">Manage</span> <span class="orange">Subscription</span></h1>
    <form method="GET" action="admin_create_encyclopedia.php">
    <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form>
        </header>
        <?php
            subscriptions();
        ?>
  </section>
    </body>
</html>