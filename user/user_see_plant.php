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
       
    <a href="user_marketplace.php"><i class='fas fa-arrow-left' style='font-size:36px; color:orange'></i></a><br>

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

        <form method="POST">

          <button type='submit' name='btnBuyNow' class="buy" value="<?php echo $plant_sale_id;?>">Buy now</a></button>

          <!-- cart -->
          <button type="submit" name="btnCart" style="backgroud-color: #fff; border: none; cursor: pointer;"><img src="../assets/cart-plus.svg" style="width:40px; height:40px; align-item:right;"class="cart4-icon"></button>

        </form>

        <br><br>
          <p>Seller: <?php echo $name; ?></p>
        <div class="ratings">

        <div class="rating-container">

            <h3>Average Rating:<span><i class="fa fa-star" style="color: #FFB000" ></i> <?php echo $sale_rating; ?></span> (Based on <span>
                <?php echo $total_reviews; ?>
            </span> reviews)
            </h3>
        </div>
        
    </div>

        </div>
        <div class="reviews">
            <h2>Customer Reviews</h2>
            <?php reviews(); ?>
        </div>
    </div>
    </div>

    <script src="../js/see_plant.js"></script>	
</body>
</html>