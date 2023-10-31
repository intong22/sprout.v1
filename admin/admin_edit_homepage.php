<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_display_home.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Edit</title>
    <link rel="website icon" type="png" href="assets\logo.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_profile_edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>

    <style>
        body {
    font-family: "Plus Jakarta Sans",Trebuchet MS,sans-serif;
    padding: 0;
}

.grand-parent {
    position: relative;
    background-color: white;

}

.parent {
    padding: 100px;
    position: relative;
    background: #1e5631;
    color: white;
    font-size: 40px;
  }

.child-container{
    position: absolute;
    width: 50%;
    top: 82.5%;
    left: 50%;
    transform: translate(-50%, -6%)
}

.child1{
    position: relative;
    text-align: center;
    width: 50%;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -5%)
}

.child2{
    position: relative;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -1%);
    max-width: 600px;
    padding: 5px;
    color:#1e5631;
}
.textarea{
    position: relative;
    top: 20%;
    left: 50%;
    width: 50%;
    transform: translate(-50%, -1%);
    max-width: 600px;
    padding: 5px;
    color:#1e5631;
}
.back {
    padding: 50;
    position: absolute;
    top: 15%;
    left: 3%;
}

.back .fi-rr-arrow-small-left {
    font-size: 40px;
    color: white;
    margin-right: 10px;
    text-decoration: none;
}

.title {
    padding: 50;
    position: absolute;
    top: 15%;
    left: 6%;
    font-size: 30px;
    color: white;
    margin-right: 10px;
    text-decoration: none;
}

.fi-rr-pencil {
    font-size: 20px;
    color: #1e5631;
    margin-right: 10px;
    text-decoration: none;
}

.category {
    border: 5px solid #1e5631;
    border-top-color: white;
    border-left-color: white;
    border-right-color: white;
    border-bottom-color: #1e5631;
    max-width: 300px;
    text-align: left;
    cursor: pointer;
    padding: 5px;
}

.removeB {
    border: none; 
    background-color: white; 
    color: #1e5631;
}

.user-image {
    border-radius: 50%;
    height: 190px;
    width: 190px;
    object-fit: cover;
    cursor: pointer;
}

::placeholder{
    color: #1e5631;
}

table {
            width: 50%;
            border-collapse: collapse;
            display: flexbox;
            align-items: center;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }
.upload-photo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    /* Hide the default file input appearance */
    cursor: pointer;
    /* Show the hand cursor on hover */
}

.tooltip {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.image-container:hover .tooltip {
    opacity: 1;
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
            <div class="name_job">
              <div class="name"><?php echo $fname." ".$lname; ?></div>
              <div class="job"><?php echo $status; ?></div>
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
<table>
        <tr>
            <th>Header 1</th>
            <th>Header 2</th>
        
        </tr>
        <tr>
            <td>Row 1, Cell 1</td>
            <td>Row 1, Cell 2</td>
         
        </tr>
        <tr>
            <td>Row 2, Cell 1</td>
            <td>Row 2, Cell 2</td>
           
        </tr>
        <tr>
            <td>Row 3, Cell 1</td>
            <td>Row 3, Cell 2</td>
          
        </tr>
    </table>
</section>
</body>
</html>

<script>
    document.getElementById('image-upload').addEventListener('change', function () 
    {
        const fileInput = this;
        const tooltip = document.getElementById('tooltip');
        
        if (fileInput.files.length > 0) {
            tooltip.textContent = fileInput.files[0].name;
        } else {
            tooltip.textContent = 'Upload Photo';
        }
    });
</script>