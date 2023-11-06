<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_history.php";
    include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
      #plants {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #plants td{
        padding: 8px;
      }

      #plants tr:nth-child(even){
        background-color: #ffff;
      }

      #plants tr:hover {
        background-color: #ddd;
      }
    </style>
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
        <i class='bx bx-home' ></i>
        <span class="links_name">Home</span>
      </a>
      <span class="tooltip">HOME</span>
      </li>
    <li>
    <a href="user_encyclopedia.php">
      <i class='bx bx-book-open' ></i>
        <span class="links_name">Encyclopedia</span>
    </a>
      <span class="tooltip">ENCYCLOPEDIA</span>
    </li>
    <li>
    <a href="user_forum.php">
      <i class='bx bx-chat' ></i>
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
      <i class='bx bxs-cart-add' ></i>
        <span class="links_name">Cart</span>
    </a>
      <span class="tooltip">CART</span>
    </li>
    <li>
    <a href="user_profile.php">
    <i class='bx bx-user' ></i>
      <span class="links_name">User</span>
    </a>
    <span class="tooltip">USER PROFILE</span>
    </li>
    <li>
    <a href="user_subscription.php">
    <i class='bx bx-dollar' ></i>
      <span class="links_name">Subscription</span>
    </a>
    <span class="tooltip">SUBSCRIPTION</span>
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
    <script src="../js/homepage.js"></script>	

    <section class="home-section">
      <div class="search-bar">
        <h1 class="colored-text header"> <span class="white">S p r</span><span class="orange"> o u t </span><span class="white">| Purchase History</span></h1><br>
          <div class="navbar">   
          </div>
      </div>
      
      <!-- display rowa of purchase history -->
      <?php
        rows();
      ?>
      
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>

    <script>
        var rated = -1;

        $(document).ready(function ()
        {
            resetStarColors();

            $('.fa-star').on('click', function()
            {
                rated = parseInt($(this).data('index'));
                saveToDB();
            });

            $('.fa-star').mouseover(function () 
            {
                resetStarColors();

                var current = parseInt($(this).data('index'));

                for(var i = 0; i <= current; i++)
                    $('.fa-star:eq('+ i + ')').css('color', '#FFB000');
            });

            $('.fa-star').mouseleave(function () 
            {
                resetStarColors();

                if(rated != -1)
                    for(var i = 0; i <= rated; i++)
                        $('.fa-star:eq('+ i + ')').css('color', '#FFB000');
            });
        });

        function resetStarColors()
        {
            $('.fa-star').css('color', '#D0D4CA');
        }

        function saveToDB()
        { //add variables nga isud sa db
            $.ajax
            ({
                url: "user_see_plannt.php",
                method: "POST",
                dataType: "json",
                data: {
                    save: 1,
                    rated: rated
                }, success: function(r){}
            })
        }
    </script>

  </body>
</html>