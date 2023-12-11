<?php
  include "../backend/session_logged_in.php";
  include "../backend/bcknd_user_subscription.php";
  include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/user_sidebar.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <title>User Subscription</title>

        <link rel="stylesheet" href="../css/user_subscription.css">
        <link rel="stylesheet" href="../css/user_subs.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/pricing-plan.css">
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
   <main>
    <div class="container">
      <h2 class="text-center pricing-table-subtitle">SUBSCRIPTION PLAN</h2>
      <div class="row">

        <!-- WEEKLY -->
        <div class="col-md-4">
          <div class="card pricing-card pricing-plan-basic" id="basicCard">
            <div class="card-body">
              <i class="mdi mdi-cube-outline pricing-plan-icon"></i>
              <p class="pricing-plan-title">Weekly</p>
              <h3 class="pricing-plan-cost ml-auto">₱ 50</h3>
              <ul class="pricing-plan-features">
                <li>Post items for sale on Marketplace</li>
                <li>Access to Seller Profile</li>
              </ul>
              <a href="#!" class="btn pricing-plan-purchase-btn"onclick="handlePurchaseClick('basicCard')">Purchase</a>
            </div>
          </div>
        </div>

        <!-- MONTHLY -->
        <div class="col-md-4">
          <div class="card pricing-card pricing-card-highlighted  pricing-plan-pro"id="proCard">
            <div class="card-body">
                <i class="mdi mdi-trophy pricing-plan-icon"></i>
              <p class="pricing-plan-title">Monthly</p>
              <h3 class="pricing-plan-cost ml-auto">₱ 150</h3>
              <ul class="pricing-plan-features">
                <li>Post items for sale on Marketplace</li>
                <li>Access to Seller Profile</li>
                <li>Save up to ₱ 50</li>
              </ul>
              <a href="#!" class="btn pricing-plan-purchase-btn" onclick="handlePurchaseClick('proCard')">Purchase</a>
            </div>
          </div>
        </div>

        <!-- YEARLY -->
        <div class="col-md-4">
          <div class="card pricing-card pricing-plan-enterprise" id="enterpriseCard">
            <div class="card-body">
              <i class="mdi mdi-wallet-giftcard pricing-plan-icon"></i>
              <p class="pricing-plan-title">Yearly</p>
              <h3 class="pricing-plan-cost ml-auto">₱ 1,600</h3>
              <ul class="pricing-plan-features">
                <li>Post items for sale on Marketplace</li>
                <li>Access to Seller Profile</li>
                <li>Save up to ₱ 500</li>
              </ul>
              <a href="#!" class="btn pricing-plan-purchase-btn"onclick="handlePurchaseClick('enterpriseCard')">Purchase</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
        <div class="card">
            <form method="POST" action="user_subscription.php" enctype="multipart/form-data">
            <!-- <div class="wrapper"> -->
    <div class="img-area">
      <div class="inner-area">
        <?php
          if ($flag == true) 
          {
            echo $image;
          } else 
          {
            echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' />";
            //echo $fname." ".$lname; 
          }
        ?>
      </div>
    </div>          
            <div class="form">
              <?php
                subscription();
              ?>
          </div>
        </div>
    </section>
    
    <div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeModalButton">&times;</span>
    <div class="checkmark">&#10003;</div>
    <p>Subscription submitted successfully!</p>
  </div>
</div>
   
    
    </body>
    <script>
  // Get the modal and buttons
  const modal = document.getElementById("myModal");
  const openModalButton = document.getElementById("openModalButton");
  const closeModalButton = document.getElementById("closeModalButton");

  // When the "Subscribe" button is clicked, show the modal
  openModalButton.addEventListener("click", function() {
    modal.style.display = "block";
  });

  // When the close button in the modal is clicked, hide the modal
  closeModalButton.addEventListener("click", function() {
    modal.style.display = "none";
  });

  // Close the modal if the user clicks outside of it
  window.addEventListener("click", function(event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });

  function handlePurchaseClick(cardId) {
  // Change the color of the clicked card
  const card = document.getElementById(cardId);
  const originalColor = 'white'; // Change this to the original color of the card

  // Check the current color of the card
  const currentColor = card.style.backgroundColor;

  // Toggle the color
  if (currentColor !== originalColor) {
    card.style.backgroundColor = originalColor;
  } else {
    card.style.backgroundColor = 'orange'; // Change to the desired color
  }

  // For example, if you want to scroll to the subscription form
  scrollToForm();
}

// Your existing scrollToForm function
function scrollToForm() {
  // Get the top offset of the form section
  const formOffset = document.querySelector('.form').offsetTop;

  // Scroll to the form section
  window.scrollTo({
    top: formOffset,
    behavior: 'smooth'
  });
}
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>

