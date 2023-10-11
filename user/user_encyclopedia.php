<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_encyclopedia.php";
    include "../backend/bcknd_user_profile.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_encyclopedia.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Plant Encyclopedia</title>


    <style>
    .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.2s;
            max-width: 500px; /* Set the maximum width of the card */
        }

.card:hover {
    transform: scale(1.05);
}

.card img {
    max-width: 100%;
    height: auto;
}

.card-info {
    text-align: center;
}

.card h3 {
    margin: 10px 0;
}

.card p {
    color: #777;
}
@media screen and (max-width: 768px) {
            .column {
                width: 100%; /* Set the width of the column to 100% */
            }

            .card {
                max-width: 100%; /* Set the maximum width of the card to 100% */
            }
        }
    </style>

</head>
<body>
<div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
       <i class='bx bx-menu' id="btn" ></i>
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
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
       <a href="user_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">USER PROFILE</span>
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
       <a href="user_favorite.php">
       <i class='bx bx-book-bookmark' ></i>
         <span class="links_name">Favorites</span>
       </a>
       <span class="tooltip">Favorites</span>
     </li>
     <li>
       <a href="user_like.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
 <li>
       <a href="user_settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">SETTINGS</span>
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
        <!-- Button to trigger file input -->
        <label for="upload-photo" id="upload-button" class="upload-button">
            <i class="bx bx-camera"></i> Upload Profile
        </label>
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
    <header style="background: #1E5631; padding:20px">
        
    <h1 class="colored-text"><span class="orange">Pl</span><span class="orange">ant </span> <span class="white">Encyclopedia</h1><br>
    <form method="GET" action="user_encyclopedia.php">
            <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form><br>
    </header>
    
    <h3>Plants</h3>
    <div class="column">
    <div class="card">
        <img src="../assets/hibiscus.jpg" alt="Hibiscus" class="plant-image">
        <div class="card-info">
            <h3>Hibiscus</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <a href="hibiscus_details.php">See More</a></p>
        </div>
    </div>
</div>

<div class="column">
    <div class="card">
        <img src="../assets/rose.jpg" alt="Rose" class="plant-image">
        <div class="card-info">
            <h3>Rose</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor <a href="hibiscus_details.php">See More</a></p>
        </div>
    </div>
</div>
<div class="column">
    <div class="card">
        <img src="../assets/hibiscus.jpg" alt="Hibiscus" class="plant-image">
        <div class="card-info">
            <h3>Hibiscus</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <a href="hibiscus_details.php">See More</a></p>
        </div>
    </div>
</div>


        <br>
        <br>
      
    
   
      <br>
      <form method="GET" action="user_encyclopedia.php">
        <br><br>
      
    <h2 style="text-align:left">Find a topic by its first letter:</h2>

    <button name="A" class="button">A</button>
    <button name="B" class="button">B</button>
    <button name="C" class="button">C</button>
    <button name="D" class="button">D</button>
    <button name="E" class="button">E</button>
    <button name="F" class="button">F</button>
    <button name="G" class="button">G</button>
    <button name="H" class="button">H</button>
    <button name="I" class="button">I</button>
    <button name="J" class="button">J</button>
    <button name="K" class="button">K</button>
    <button name="L" class="button">L</button>
    <button name="M" class="button">M</button>
    <button name="N" class="button">N</button>
    <button name="O" class="button">O</button>
    <button name="P" class="button">P</button>
    <button name="Q" class="button">Q</button>
    <button name="R" class="button">R</button>
    <button name="S" class="button">S</button>
    <button name="T" class="button">T</button>
    <button name="U" class="button">U</button>
    <button name="V" class="button">V</button>
    <button name="W" class="button">W</button>
    <button name="X" class="button">X</button>
    <button name="Y" class="button">Y</button>
    <button name="Z" class="button">Z</button>
    </div>
    <br><br>
          </form>
        
        </section>
       
 
   
    <script>
        var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

    </script>
    <script>
// Get the modal
var modal = document.getElementById("myModal");
var modal1 = document.getElementById("myModal1");
var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  modal1.style.display = "block";
}

btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span.onclick = function() {
  modal1.style.display = "none";
}
span.onclick = function() {
  modal2.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    
  }
}
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </script>
</body>
</html>
