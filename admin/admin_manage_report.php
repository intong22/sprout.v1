<?php
  include "../admin_sessions/session_logged_in.php";
  include "../backend/bcknd_admin_manage_report.php";
  include "admin_sidebar.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin_manage_user.css">
    <link rel="stylesheet" href="../css/user_sidebar.css">

</head>

<body>
	<?php
        sidebar();
    ?>
  <section class="home-section">
  <header style="background: #1E5631; padding:10px; color:white">
    <h1 style="margin-left: 32px;">User Reports</h1>
    <form method="POST" action="admin_manage_report.php">
          <input type="search" name="searchInput" placeholder="Search for reports..." />
          <button type="submit" hidden name="btnSearch">Search</button>            
      </form>
        </header>

 <br>
    <div class="container">
        <div style="overflow-x:auto;">
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

