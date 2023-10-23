<?php
  include "../admin_sessions/session_logged_in.php";
  include "../backend/bcknd_admin_manage_user.php";
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
   <style>
    
.button {
  background-color: #037518;
border: none;
border-radius: 10px;
color: white;
padding: 15px 30px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 10px 2px;
cursor: pointer;
}
.button :hover{
  background-color: orange;
}

/* Style for the entire table */
table {
width: 100%;
border-collapse: collapse;
margin: 20px;
}

/* Style for table header cells */
th {
background-color: #1E5631;
color: white;
padding: 10px;
}

/* Style for table data cells */
td {
padding: 8px;
border: 1px solid #ccc;
}

/* Style for even rows */
tr:nth-child(even) {
background-color: #f2f2f2;
}

/* Style for odd rows */
tr:nth-child(odd) {
background-color: #e6e6e6;
}

/* Style for the Delete button */
button[name="btnDeleteUser"] {
background-color: #ff5722;
color: white;
padding: 5px 10px;
border: none;
cursor: pointer;
}

/* Style for the Activate and Deactivate buttons */
button[name="btnStatus"], button[name="btnSubs"]{
background-color: #1E5631;
color: white;
padding: 5px 10px;
border: none;
cursor: pointer;
}

/* Style for checkboxes */
input[type="checkbox"] {
width: 16px;
height: 16px;
}
.search-container {
float: right;
margin-left: 20vh;
display: flex; 
}
form {
display: flex;
align-items: center;
margin: 20px;
}

/* Style for the search input field */
input[type="text"] {
padding: 10px;
border: 1px solid #ccc;
border-radius: 5px;
width: 300px;
}

/* Style for the search button */
button[name="btnSearch"] {
background-color: #1E5631;
color: white;
border: none;
padding: 10px 20px;
border-radius: 5px;
margin-left: 10px;
cursor: pointer;
}

/* Hover effect for the search button */
button[name="btnSearch"]:hover {
background-color: #147c40;
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
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
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
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
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
  <script src="../js/homepage.js"></script>	
 
  <section class="home-section">
    <br>
    <header>
        <br><h1 style="margin-left: 32px;" >Users</h1>
    </header>
    <form method="GET" action="admin_manage_user.php">
        <input type="text" name="search" />
        <button type="submit" hidden name="btnSearch">Search</button>
    </form>
   
    <?php
      if(isset($_GET["btnSearch"]))
      {
        search();
      }
      else
      {
        active_users();
      }
    ?>
  </section>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>
</html>
