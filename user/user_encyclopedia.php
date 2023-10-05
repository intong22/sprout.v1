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
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
        <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
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
       <a href="user_forum.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Community Forum</span>
       </a>
       <span class="tooltip">Community Forum</span>
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
         <span class="links_name">Marketplace</span>
       </a>
       <span class="tooltip">Marketplace</span>
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
              echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";   
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
    <header style="background: #1E5631; padding:20px">
        
    <h1 class="colored-text"><span class="orange">Pl</span><span class="orange">ant </span> <span class="white">Encyclopedia</h1><br>
    <form method="GET" action="user_encyclopedia.php">
            <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form><br>
    </header>
    
    <h3>Plants</h3>
    <div class="row">

        <div class="column">
        
          <div class="image-card">
            <img src="../assets/hibiscus.jpg" alt="Plant 2" class="plant-image">
            <?php
              //plants();
            ?> 


<div id="myModal" class="modal" >

  
  <div class="modal-content">

    <span class="close">&times;</span>
    <h3>Hibiscus</h3>
    <img src="../assets/hibiscus.jpg" alt="Plant 2" class="modal-image center-image" style="width:100%;max-width:300px;">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </p>

            <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
            
  </div>

</div>

      <button type="button" id="myBtn" style="margin-left:5vh;width:100px;background-color:orange ">Flower 1</button>
    </div>       
</div>

<div class="column">
         
          <div class="image-card">
            <img src="../assets/hibiscus.jpg" alt="Plant 3" class="modal-image center-image" >


<div id="myModal1" class="modal">

 
  <div class="modal-content">
  <span class="close">&times;</span>
  <h3>Herbs</h3>
  
  <img src="../assets/hibiscus.jpg" class="modal-image center-image" style="max-width:100%; width: 50%;" >
   
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </p>
  </div>

</div>
            <button type="button" id="myBtn1" style="margin-left:5vh;width:100px;background-color:orange ">Herbs</button>
          </div>   
        </div>
        <div class="column">
         
          <div class="image-card">
            <img src="../assets/hibiscus.jpg" alt="Plant 4" class="modal-image center-image">


<div id="myModal2" class="modal">

  
  <div class="modal-content">
  <span class="close">&times;</span>
  <h3>Succulent</h3>
  <img src="../assets/hibiscus.jpg" class="modal-image center-image" style="max-width:100%; width: 50%;h" >
   
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </p>
  </div>

</div>
            <button type="button" id="myBtn2" style="margin-left:5vh;width:100px;background-color:orange ">Succulent</button>
            <br>
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
