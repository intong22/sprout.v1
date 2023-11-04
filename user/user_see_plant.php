<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_see_plant.php";
    include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Plant Details</title>
    <link rel="stylesheet" type="text/css" href="../css/user_see_plant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>
<body>
    <header>
       
    <a href="user_marketplace.php"><i class='fas fa-arrow-left' style='font-size:36px; color:orange'></i></a>

        <h1><?php echo $plant_name; ?></h1>
    
    </header>
    <div class="container">
    <div class="card">

    <?php
      //display sale images
      displayImages();
    ?>

        <div class="plant-description">
            <h2>Description</h2>
            <p><?php echo $description; ?></p>
        </div>
        <div class="price">
            ₱ <?php echo $price; ?>
        </div>
        <br><br>

        <button class="buy">Buy now</button>

        <!-- cart -->
        <button style="backgroud-color: #fff; border: none; cursor: pointer;"><img src="../assets/cart-plus.svg" style="width:40px; height:40px; align-item:right;"class="cart4-icon"></button>
        
        <!-- <div class="buy-button">
           
        </div> -->
        <br><br>
          <p>Seller: <?php echo $name; ?></p>
        <div class="ratings">
        <h2>Ratings</h2>
        <div class="rating-container">
            <span class="fa fa-star" data-rating="1"></span>
            <span class="fa fa-star" data-rating="2"></span>
            <span class="fa fa-star" data-rating="3"></span>
            <span class="fa fa-star" data-rating="4"></span>
            <span class="fa fa-star" data-rating="5"></span>
        </div>
        <h3>Average Rating: <span id="average-rating">0</span> (Based on <span id="total-ratings">0</span> reviews)</h3>
    </div>
            <!-- Add star rating display here -->
        </div>
        <!-- <div class="reviews">
            <h2>Customer Reviews</h2>
          
        </div> -->
    </div>
    </div>
    <script src="../js/see_plant.js"></script>	
    
</body>
</html>
