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
   <style>
    
   </style>
</head>
<body>
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
        <a href="admin_manage_user.php">
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
       <a href="#">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Posts</span>
       </a>
       <span class="tooltip">Posts</span>
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
  <section class="home-section">
    <br>
  <button class="button button1">Active User</button>
  <button class="button button1">Inactive User</button>


  </section>
<!--  
<div class="container-fluid">
        <div class="main-container">
            <nav>
                <img src="../assets/logo.png" alt="Logo">
            </nav>
            <div id="sidebar" class="bg-light">
            <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-menu" role="button" data-toggle="dropdown" >
                    Manage
                </a>
                <div class="dropdown-menu" >
                    <a class="dropdown-item" href="#">Users</a>
                    <a class="dropdown-item" href="#">Posts</a>
                    <a class="dropdown-item" href="#">Encyclopedia</a>
                    <a class="dropdown-item" href="#">Tech Support</a>
                </div>
            </div>
                <a class="nav-link" href="#">Reports</a>
                <a class="nav-link" href="#">Inactive Users</a>
            </div>
            <main>
                <div class="d-flex justify-content-between align-items-center bg-success p-3">
                    <div id="dashboard">DASHBOARD</div>
                    <a href="#" class="text-white">Logout</a>
                </div>
                <div id="cont1" class="bg-light p-3">Users</div>
                <div id="cont2" class="bg-light p-3">Posts</div>
                <div id="cont3" class="bg-light p-3">Tech Support</div>
            </main>
        </div>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>
</html>
