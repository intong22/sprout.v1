<?php
  include "../admin_sessions/session_logged_in.php";
  include "../backend/bcknd_admin_manage_user.php";
  include "../backend/bcknd_admin_subscriptions.php";
  include "admin_sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="../css/admin_manage_user.css">
    <link rel="stylesheet" href="../css/admin_manage.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">

   
</head>
<body>
  <?php
    sidebar();
  ?>
 
  <section class="home-section">
    
    <header style="background: #1E5631; padding:10px; color:white">
    <br>
    <h1 style="margin-left: 32px;">Users</h1>

    <form method="GET">
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

        <form method="GET">
          <input name="searchInput" class="search-input" type="text" placeholder="Search...">
          <button name="btnSearchSubs" class="search-button" type="submit">Search</button>
        </form>
      <div style="overflow-x:auto;">
        <?php
          if(isset($_GET["btnSearchSubs"]))
          {
            searchSubs();
          }
          else
          {
            subscriptions();
          }
        ?>
       

        <div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <img id='modalContent' class='modal-image'>
  </div>
</div>
      
      </div>

  </section>


<Script>
  function viewImage(imageData) {
    var modal = document.getElementById('myModal');
    var modalContent = document.getElementById('modalContent');
    
    // Set the image source
    modalContent.src = imageData;

    // Display the modal
    modal.style.display = 'block';

    // When the user clicks on <span> (x), close the modal
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = 'none';
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
}

</Script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
