<?php
  include "../admin_sessions/session_logged_in.php";
  include "../backend/bcknd_admin_manage_user.php";
  include "../backend/bcknd_admin_subscriptions.php";
  include "admin_sidebar.php";
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
    <link rel="stylesheet" href="../css/user_homepage.css">

   <style>
    th {
    background-color: orange;
    color: white;
    padding: 10px;
    }
.button {
  background-color: orange;
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
width: 40%;
}

/* Style for the search button */
button[name="btnSearch"] {
background-color:orange;
color: white;
border: none;
padding: 10px 20px;
border-radius: 5px;
margin-left: 10px;
cursor: pointer;
}

/* Hover effect for the search button */
button[name="btnSearch"]:hover {
  background-color: orange;
color:#1E5631;
}
button[name="btnToBasic"], button[name="btnToNotif"]{
background-color: #1E5631;
color: white;
padding: 5px 10px;
border: none;
cursor: pointer;
}

</style>
</head>
<body>
  <?php
    sidebar();
  ?>
 
  <section class="home-section">
    
    <header style="background: #1E5631; padding:10px; color:white">
    <h1 style="margin-left: 32px;">Users</h1>
    <form method="GET" action="admin_create_encyclopedia.php">
    <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form>
        </header>
   
    <div style="overflow-x:auto;">
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
    </div>

    <br><br>
      <h3>Subscriptions</h3>
        <form method="GET" action="admin_create_encyclopedia.php">
          <input name="searchInput" class="search-input" type="text" placeholder="Search...">
          <button name="btnSearch" class="search-button" type="submit">Search</button>
        </form>
      <div style="overflow-x:auto;">
        <?php
          subscriptions();
        ?>
      </div>

  </section>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>
</html>
