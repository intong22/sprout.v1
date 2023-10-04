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
        
.header{
      background-color:#1E5631;
    } 
.green {
    color: green; 
}

.orange {
    color:orange; 
}
h2 {
   /* margin-left: 20vh; */
   text-align: center;
}
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 10px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 5px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
.modal {
  display: none; 
  position: fixed; 
  z-index: 1; /* Sit on top */
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4); 
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  margin-left: auto;
  margin-right: auto;

}
h1 {
   margin-left: 5vh;
   margin-top: 10vh;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
/* .home-section2{
          position: relative;
          background: whitesmoke;
          min-height: 50px;
          top: 0;
          left: 78px;
          width: calc(100% - 78px);
          transition: all 0.5s ease;
          z-index: 2;
        } */
.column {
  float: left;
  
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
.table{
  margin-left: auto;
  margin-right: auto;
}


.search-container {
  float: right;
  margin-left: 20vh;
  display: flex; 
}

        .search-input {
            border-color: black;
            padding: 10px;
            width: 50%;
            border-radius: 20px;
            margin-left: 5vh; 
        }

        .search-button {
            padding: 8px;
            background-color: orange; 
            color: white; 
            border: none;
            border-radius: 5px; 
            cursor: pointer;
        }

        .search-button:hover{
            color: #1E5631; 
           
        }
        h3{
    margin:center;
    text-align: center;
    align-items: center;
    font-size: 24px;;
    justify-content: space-between;
}
.center-image {
    display: block;
    margin: 0 auto;
    max-width: 100%;
}
.image-card {
    border: 1px solid #ddd; /* Add a border for the card */
    padding: 10px; /* Add some padding */
    text-align: center; /* Center the image and text */
}

.image-card img {
    max-width: 100%; /* Ensure the image doesn't exceed the width of its container */
    height: auto; /* Maintain the image's aspect ratio */
}
.button {
background-color: #ffff; /* Green */
border:1px solid black;
color: black;
width:60px;
height:45px;
margin-right:10px;
margin-left:10px; 
margin-top:10px;
padding: 10px;
text-align: center;
text-decoration: none;
justify-content:center;
display: center;
font-size: 16px;
position: relative;

}
.button:hover{
    background-color: green;
    color:white;
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
    <header style="background: #1E5631">
        
    <h1 class="colored-text"><span class="orange">Pl</span><span class="orange">ant </span> <span class="white">Encyclopedia</h1><br>
    <form method="GET" action="user_encyclopedia.php">
            <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button>
    </form><br>
    </header>
    
    <h3>Plants</h3>
    <div class="row">
    
        <?php
            //plants();
        ?> 

        <div class="column">
          <!-- Trigger/Open The Modal -->
          <div class="image-card">
            <img src="../assets/hibiscus.jpg" alt="Plant 2" class="plant-image">

<!-- The Modal -->
<div id="myModal" class="modal" >

  <!-- Modal content -->
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
      <form method="GET" action="#">
        <br><br>
    <h2 style="text-align:left">Find a topic by its first letter:</h2>

    <button class="button">A</button>
    <button class="button">B</button>
    <button class="button">C</button>
    <button class="button">D</button>
    <button class="button">E</button>
    <button class="button">F</button>
    <button class="button">G</button>
    <button class="button">H</button>
    <button class="button">I</button>
    <button class="button">J</button>
    <button class="button">K</button>
    <button class="button">L</button>
    <button class="button">M</button>
    <button class="button">N</button>
    <button class="button">O</button>
    <button class="button">P</button>
    <button class="button">Q</button>
    <button class="button">R</button>
    <button class="button">S</button>
    <button class="button">T</button>
    <button class="button">U</button>
    <button class="button">V</button>
    <button class="button">W</button>
    <button class="button">X</button>
    <button class="button">Y</button>
    <button class="button">Z</button>
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
