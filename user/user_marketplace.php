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
     <link rel="stylesheet" href="../css/user_sidebar.css">
     <link rel="stylesheet" href="../css/user_marketplace.css">
     

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
   	<header class="p-0 mb-3 border-bottom" style="background-color:#1E5631">
		    <div class="container">
			    <!-- <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> -->
            <a href="user_marketplace.php" style="text-decoration: none;"><h1 class="page-heading" style="color:white; padding:30px">Market<span style="color:orange;">place</span></h1></a>
			        <form method="GET" action="user_marketplace.php" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
			          
              <input name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button name="btnSearch" class="search-button" type="submit">Search</button> 

			        </form>
			        <div class="icons">
                <!-- cart -->
			        	<a href="user_like.php">
                  <img src="../assets/cart-plus.svg" style="width:40px; height:40px; align-item:right;color:white;"class="cart4-icon">
                  <sub>
                    <?php
                      if($total_cart > 0)
                      {
                        echo"<span style='background-color: red; padding: 5px; border-radius: 50%;'>".$total_cart."</span>";
                      }
                    ?>
                  </sub>
                </a>
                <!-- messaging -->
                &nbsp;
                  <a href="user_messaging.php">
                    <img src="../assets/message.png" class="cart4-icon" style="width:40px; height:40px align-item:right;">
                    <sub>
                      <?php
                        if($total > 0)
                        {
                          echo"<span style='background-color: red; padding: 5px; border-radius: 50%;'>".$total."</span>";
                        }
                      ?>
                    </sub>
                  </a>
                <!-- for premium users only -->
                <?php
                  if($status == 'Premium User')
                  {
                    // add item
                    echo"<img src='../assets/plus.png' class='cart4-icon plus-icon' id='myBtn' style='width:50px; height:50px; align-items: right; cursor: pointer;' class='cart4-icon'>";

                    //seller profile 
                    echo"<a href='user_marketplace_profile.php'><img src='../assets/sellerprofile.png' class='cart4-icon plus-icon' id='myBtn' style='width:50px; height:50px; align-items: right;' class='cart4-icon'></a>";
                  }
                ?>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Marketplace</h2>
    </div>
    <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
         <br>
                <label for="plant_name"style="color:black">ITEM NAME:</label>
                <input type="text" id="plant_name" name="plant_name" required><br><br>
               
                <!-- CATEGORY -->         
              <label class="checkbox-label">
                  <input type="checkbox" name="category[]" value="plant"/>Plant
              </label>
              <label class="checkbox-label">
                  <input type="checkbox" name="category[]" value="soil"/>Soil
              </label>
              <label class="checkbox-label">
                  <input type="checkbox" name="category[]" value="seed"/>Seeds
              </label>
              <label class="checkbox-label">
              <input type="checkbox" name="category[]" value="pot"/>Pots
              </label>
              <label class="checkbox-label">
              <input type="checkbox" name="category[]" value="tool"/>Tools
              </label>
              <label class="checkbox-label">
              <input type="checkbox" name="category[]" value="decor"/>Decoration
              </label>
              <label class="checkbox-label">
              <input type="checkbox" name="category[]" value="food"/>Food
              </label>

                <br><br>
                <label for="description"style="color:black">Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

                <label for="price" style="color:black">Price:</label><br>
                <input type="number" name="price" step=".01" required><br><br>


                <label for="image_url"style="color:black">Image URL:</label>
                <input type="file" id="image_url" name="plant_sale_image[]" accept=".jpg, .png, .jpeg" multiple required>
                <br><br>

                <button name="btnAddItem" class="button" style="width:80px;background-color:#1E5631;color:white;">Submit</button>   
                <br><br>
          </form>   
                </div>
</div>
    <!-- <div class="modal-footer">
     <h3>Marketplace</h3>
    </div> -->
    </header>
    
  </div> 
     
     
      <form method="POST">
      <div class="categories-container">

<h2 class="category-label" style="margin-left:25px">Categories</h2>

      <div class="box">
      <div class="saple-plants">
        <div class="div">
        <button type="submit" name="btnPlants" value="plant"class="button-category">Plants</button>
        <button type="submit" name="btnSoil" value="soil"class="button-category">Soil</button>
        <button type="submit" name="btnSeed" value="seed"class="button-category">Seeds</button>
        <button type="submit" name="btnPots" value="pot"class="button-category">Pots</button>
        <button type="submit" name="btnTools" value="tool"class="button-category">Tools</button>
        <button type="submit" name="btnDecor" value="decor"class="button-category">Decoration</button>
        <button type="submit" name="btnFood" value="food"class="button-category">Food</button><br>
      </form>

        <div class='row product-lists'>
            <?php
              if (isset($_POST["btnPlants"])) {
                $category = "Plants";
              } else if (isset($_POST["btnSoil"])) {
                $category = "Soil";
              } else if (isset($_POST["btnSeed"])) {
                $category = "Seeds";
              } else if (isset($_POST["btnPots"])) {
                $category = "Pots";
              } else if (isset($_POST["btnTools"])) {
                $category = "Tools";
              } else if (isset($_POST["btnDecor"])) {
                $category = "Decorations";
              } else if (isset($_POST["btnFood"])) {
                $category = "Food";
              }

              if(!empty($category))
              {
                echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Filter by: ".$category."<br><br>";
              }

              //display items for sale
              if(isset($_GET["searchInput"]))
              {
                searchMarket();
              }
              else
              {
                categories();
              } 
            ?>

            </div>
        </div>
      </div>
            </div>
    <!-- </section> -->
    </section>
    

    <script>

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

    function validateForm() {
            // Get all checkboxes with the name "plant_type[]"
            var checkboxes = document.getElementsByName("category[]");

            // Check if at least one checkbox is checked
            var isChecked = false;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            // Display an alert if no checkbox is checked
            if (!isChecked) {
                alert("Please select at least one category.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
</script>
	</body>

</html>
