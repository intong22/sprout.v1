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
    <header style="background: #1E5631; padding:5px">  <br>
    <a href="user_encyclopedia.php"><i class='fas fa-arrow-left' style='font-size:36px; color:orange'></i></a>
      <h1 class="colored-text"><span class="orange">Pl</span><span class="orange">ant </span> <span class="white">Encyclopedia</h1><br>
    </a>
    <form method="GET" action="user_encyclopedia.php">
            <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form><br>
    </header>
    <form method="GET" >      
      <h2 style="text-align:left">Find a topic by its first letter:</h2>
     
      <button name="A" value="A" class="button">A</button>
      <button name="B" value="B" class="button">B</button>
      <button name="C" value="C" class="button">C</button>
      <button name="D" value="D" class="button">D</button>
      <button name="E" value="E" class="button">E</button>
      <button name="F" value="F" class="button">F</button>
      <button name="G" value="G" class="button">G</button>
      <button name="H" value="H" class="button">H</button>
      <button name="I" value="I" class="button">I</button>
      <button name="J" value="J" class="button">J</button>
      <button name="K" value="K" class="button">K</button>
      <button name="L" value="L" class="button">L</button>
      <button name="M" value="M" class="button">M</button>
      <button name="N" value="N" class="button">N</button>
      <button name="O" value="O" class="button">O</button>
      <button name="P" value="P" class="button">P</button>
      <button name="Q" value="Q" class="button">Q</button>
      <button name="R" value="R" class="button">R</button>
      <button name="S" value="S" class="button">S</button>
      <button name="T" value="T" class="button">T</button>
      <button name="U" value="U" class="button">U</button>
      <button name="V" value="V" class="button">V</button>
      <button name="W" value="W" class="button">W</button>
      <button name="X" value="X" class="button">X</button>
      <button name="Y" value="Y" class="button">Y</button>
      <button name="Z" value="Z" class="button">Z</button>
     
    </form>
    <br><br>
    <h3>Plants <?php plantLetterStart(); ?></h3>

    <?php
      if(isset($_GET["btnSearch"]))
      {
        search();
      }
      else
      {
        filterByFirstLetter();
      }
    ?>
    <br><br>

 
    
        <br><br>

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


// Get the button that opens the modal
var btn = document.getElementById("myBtn");




// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
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

</body>
</html>
