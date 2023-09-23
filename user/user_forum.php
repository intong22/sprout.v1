<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum</title>
    <link rel="website icon" type="png" href="assets\logo.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_profile.css">
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
    <title> Responsive Sidebar Menu  | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
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
        <a href="user_homepage.php">
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
       <a href="user_encyclopedia.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">Encyclopedia</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Community Forum</span>
       </a>
       <span class="tooltip">Community Forum</span>
     </li>
     <li>
       <a href="user_marketplace.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Marketplace</span>
       </a>
       <span class="tooltip">Marketplace</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Cart</span>
       </a>
       <span class="tooltip">Cart</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Favorites</span>
       </a>
       <span class="tooltip">Favorites</span>
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
           
            <div class="back">
                <a href="user_homepage.php"><i class="fi fi-rr-arrow-small-left"></i></a>
            </div>
            <div class="cart">
                <a href="#"><i class="fi fi-br-shopping-cart"></i></a>
            </div>

        </div>
        <div class="child-container">
            <div class="child1">

                <form method="GET" action="forum.php">
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
                </form>

              
            <div class="child2">
               
                
     
              
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="col-lg-8">
        <div class="panel profile-cover">
            <div class="profile-cover__img">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" />
               
            </div>
            <div class="profile-cover__action bg--img" data-overlay="0.3">
                <button class="btn btn-rounded btn-info">
                    <i class="fa fa-plus"></i>
                   
                </button>
                <button class="btn btn-rounded btn-info">
                    <i class="fa fa-comment"></i>
                  
                </button>
            </div>
            <div class="profile-cover__info">
                <ul class="nav">
                 
                </ul>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Forum</h3>
            </div>
            <div class="panel-content panel-activity">
                <form action="#" class="panel-activity__status">
                    <textarea name="user_activity" placeholder="Share what you've been up to..." class="form-control"></textarea>
                    <div class="actions">
                        <div class="btn-group">
                            <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Image">
                                <i class="fa fa-image"></i>
                            </button>
                            <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Video">
                                <i class="fa fa-video-camera"></i>
                            </button>
                            <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Idea">
                                <i class="fa fa-lightbulb-o"></i>
                            </button>
                            <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Question">
                                <i class="fa fa-question-circle-o"></i>
                            </button>
                        </div>
                        <button type="submit" class="btn btn-sm btn-rounded btn-info">
                            Post
                        </button>
                    </div>
                </form>
              
                <ul class="panel-activity__list">
                    <li>
                        <i class="activity__list__icon fa fa-question-circle-o"></i>
                        <div class="activity__list__header">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                            <a href="#">John Doe</a> Posted the question: <a href="#">How can I change my annual reports for the better effect?</a>
                        </div>
                        <div class="activity__list__body entry-content">
                            <p>
                                <strong>Lorem ipsum dolor sit amet</strong>, consectetur adipisicing elit. Voluptatibus ab a nostrum repudiandae dolorem ut quaerat veniam asperiores, rerum voluptatem magni dolores corporis!
                                <em>Molestiae commodi nesciunt a, repudiandae repellendus ea.</em>
                            </p>
                        </div>
                        <div class="activity__list__footer">
                            <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                            <a href="#"> <i class="fa fa-comments"></i>23</a>
                            <span> <i class="fa fa-clock"></i>2 hours ago</span>
                        </div>
                    </li>
                    <li>
                        <i class="activity__list__icon fa fa-question-circle-o"></i>
                        <div class="activity__list__header">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                            <a href="#">John Doe</a> Posted the question: <a href="#">How can I change my annual reports for the better effect?</a>
                        </div>
                        <div class="activity__list__body entry-content">
                            <blockquote>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus ab a nostrum repudiandae dolorem ut quaerat veniam asperiores, rerum voluptatem magni dolores corporis! Molestiae commodi nesciunt a,
                                    repudiandae repellendus ea.
                                </p>
                            </blockquote>
                        </div>
                        <div class="activity__list__footer">
                            <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                            <a href="#"> <i class="fa fa-comments"></i>23</a>
                            <span> <i class="fa fa-clock"></i>2 hours ago</span>
                        </div>
                    </li>
                    <li>
                        <i class="activity__list__icon fa fa-image"></i>
                        <div class="activity__list__header">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                            <a href="#">John Doe</a> Uploaded 4 Image: <a href="#">Office Working Time</a>
                        </div>
                        <div class="activity__list__body entry-content">
                            <ul class="gallery">
                                <li>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                </li>
                                <li>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                </li>
                                <li>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                                </li>
                                <li>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="" />
                                </li>
                            </ul>
                        </div>
                        <div class="activity__list__footer">
                            <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                            <a href="#"> <i class="fa fa-comments"></i>23</a>
                            <span> <i class="fa fa-clock"></i>2 hours ago</span>
                        </div>
                    </li>
                    <li>
                        <i class="activity__list__icon fa fa-question-circle-o"></i>
                        <div class="activity__list__header">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                            <a href="#">John Doe</a> Posted the question: <a href="#">How can I change my annual reports for the better effect?</a>
                        </div>
                        <div class="activity__list__body entry-content">
                            <blockquote>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus ab a nostrum repudiandae dolorem ut quaerat veniam asperiores, rerum voluptatem magni dolores corporis! Molestiae commodi nesciunt a,
                                    repudiandae repellendus ea.
                                </p>
                            </blockquote>
                        </div>
                        <div class="activity__list__footer">
                            <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                            <a href="#"> <i class="fa fa-comments"></i>23</a>
                            <span> <i class="fa fa-clock"></i>2 hours ago</span>
                        </div>
                    </li>
                    <li>
                        <i class="activity__list__icon fa fa-lightbulb-o"></i>
                        <div class="activity__list__header">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                            <a href="#">John Doe</a> bookmarked a page: <a href="#">Awesome Idea</a>
                        </div>
                        <div class="activity__list__footer">
                            <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                            <a href="#"> <i class="fa fa-comments"></i>23</a>
                            <span> <i class="fa fa-clock"></i>2 hours ago</span>

                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
            </div>
        <div>
    </div>
</body>
</html>
