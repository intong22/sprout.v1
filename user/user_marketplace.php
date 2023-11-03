<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_marketplace.php";
    include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Marketplace</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/user_sidebar.css">
		<link rel="stylesheet" type="text/css" href="../css/user_marketplace.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
      

.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
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
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
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

.modal-header {
  padding: 2px 16px;
  background-color: #1E5631;
  color: white;
}

.modal-body {padding: 2px 16px;
}

.modal-footer {
  padding: 2px 16px;
  background-color: #1E5631;
  color: white;
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
    <span class="tooltip">Subscription</span>
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
   	<header class="p-0 mb-3 border-bottom" style="background-color:#1E5631">
		    <div class="container">
			    <!-- <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> -->
            <h1 class="page-heading" style="color:white">Market<span style="color:orange;">place</span></h1>
			        <form method="GET" action="user_marketplace.php" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
			          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
			        </form>
			        <div>
			        	<a href="user_like.php"><img src="../assets/cart-plus.svg" style="width:40px; height:40px; align-item:right;"class="cart4-icon"></a>
                &nbsp;<a href="user_messaging.php"><img src="../assets/message.png" class="cart4-icon" style="width:40px; height:40px align-item:right; "></a>
                <img src="../assets/plus.png" class="cart4-icon plus-icon" id="myBtn" style="width:50px; height:50px; align-items: right;">
              </a>
              <!-- <button id="myBtn">Create Post</button> -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Marketplace</h2>
    </div>
    <div class="modal-body">
    <form action="admin_create_encyclopedia.php" method="POST" enctype="multipart/form-data">
                <label for="plant_name">PLANT NAME:</label>
                <input type="text" id="plant_name" name="plant_name" required><br><br>
               
                <label for="plant_name">PLANT TYPE:</label>
                <select id="plant_type" name="plant_type" required>
                    <option value="flowering">Flowering</option>
                    <option value="s&c">Succulents & Cacti</option>
                    <option value="fern">Fern</option>
                    <option value="climber">Climbers</option>
                    <option value="fruit">Fruit Bearing</option>
                    <option value="vegetable">Vegetable Bearing</option>
                    <option value="herbal">Herbal</option>
                    <option value="fungi">Fungi</option>
                    <option value="carnivorous">Carnivorous</option>
                    <option value="toxic">Toxic</option>
                    <option value="onramental">Ornamental</option>
                </select><br><br>
                

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

                <label for="price">Price:</label><br>
                <input type="number" name="price" rows="4" cols="50" required></textarea><br><br>


                <label for="image_url">Image URL:</label>
                <input type="file" id="image_url" name="plant_image[]" accept=".jpg, .png, .jpeg" multiple required>
                <br><br>

                <button name="btnSubmit" class="button">Submit</button>   
                
            </form>   
    </div>
    <div class="modal-footer">
     <h3>Marketplace</h3>
    </div>
  </div>

</div>
    
</div>
    </div>
  
    <br>
 

 


              </div>
          </div>
        </div>
       
    </header>
   
     
      <section class="container">
        <div class='row product-lists'>
            <?php
              //display items for sale
              // displayDeflt();
            ?>

          <div class='col-sm-3 mt-4'>
           <div class='card'>
            <img src='../assets/echeveria.jpg' class='plantimg' alt='Plant image' />
                   <div class='card-body'>
                       <h5 class='card-title'>Sample Plant Name</h5>
                <!-- Product Price -->
                           <div class='card-price'>
                               <span class='text-start'>Seller 1</span>
                               <span class='text-end'>₱ 100</span>                
                           </div>
                  <!-- Add to cart  -->
                <form method='POST'>
                    <button type='submit' name='btnAddCart' class='btn btn-primary' >Add To Cart</button>
                </form>

                </div>
            </div>
          </div>

        </div>
    </section>
    </section>
   
		<script src="../js/slim.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
    

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
	</body>

</html>
