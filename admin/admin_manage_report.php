<?php
  include "../admin_sessions/session_logged_in.php";
  include "../backend/bcknd_admin_manage_report.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/admin_manage_user.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="admin_home.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">HOME</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="admin_manage_user.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="admin_manage_post.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Posts</span>
       </a>
       <span class="tooltip">Posts</span>
     </li>
     <li>
       <a href="admin_create_encyclopedia.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">Encyclopedia</span>
     </li>
     <li>
       <a href="admin_manage_report.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Reports</span>
       </a>
       <span class="tooltip">Reports</span>
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
       <a href="admin_subscriptions.php">
         <i class='bx bxs-badge-dollar'></i>
         <span class="links_name">Subscription</span>
       </a>
       <span class="tooltip">Subscription</span>
     </li>
     <li class="profile">
         <div class="profile-details">
            <div class="name_job">
                <div class="name">Admin</div>
                <!-- <div class="job"><?php echo $status; ?></div> -->
            </div>
         </div>
         <a href="../admin_sessions/session_end.php">
            <i class='bx bx-log-out' id="log_out" ></i>
          </a>
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
    <br>
    <h1 style="margin-left: 32px;">Reported Posts</h1>

 <br>
    <div class="container">

      <form method="POST" action="admin_manage_report.php">
          <input type="search" name="searchInput" placeholder="Search for reports..." />
          <button type="submit" hidden name="btnSearch">Search</button>            
      </form>

        <?php
          if(isset($_POST["btnSearch"]))
          {
              search();
          }
          else
          {
              reports();
          }
        ?>
        
    </div>
    </section>
    <div class="modal fade" id="viewPostModal" tabindex="-1" role="dialog" aria-labelledby="viewPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPostModalLabel">View Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>Post Content</h1>
                <p id="postContent"></p>
                <img id="postImage" src="" alt="Post Image">
                <?php
                  echo "<p>Name of poster: ".$name."</p>";
                  echo "<p>Post: ".$post_description."</p>";
                  echo "<p>Compaint Details: ".$complaint_details."</p>";
                ?>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>

