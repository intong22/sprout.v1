<?php
    include "../backend/session_logged_in.php";
    // include "../backend/bcknd_user_see_plant.php";
    // include "../backend/bcknd_user_profile.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Plant Details</title>
    <link rel="stylesheet" type="text/css" href="../css/user_see_plant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    
    <style>
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
    opacity: 2;
}
.fi-rr-picture{
    position: relative;
    text-align: center;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -5%);
    display: inline-block;
    opacity: 75%;
    transition: opacity 0.3s;
    background-color: rgba(101, 91, 91, 0.10);
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}
.image-container {
    position: relative;
    display: inline-block;
}
    </style>
</head>
<body>
    <header style="padding:20px;">
       
    <a href="user_marketplace_profile.php"><i class='fas fa-arrow-left' style='font-size:36px; color:orange'></i></a>

       
    
    </header>
    <div class="container">
    <div class="card">

     <div class="image-container"> 
        <img src="../assets/hibiscus.jpg" alt="image" style="width:100%;height:100%;"><br><br>
        <input type="file" name="add_image" class="upload-photo" class="fi fi-rr-picture"accept=".jpg, .png, .jpeg"' id="image-upload">
        <span class="tooltip" id="tooltip"><i class="fi fi-rr-picture"></i></span>
     </div>
     <div style="text-align:center;">
                    <p><button type="submit" name="btnRemovePhoto" style="border:none;"> Remove photo </button></p>

                   
                </div>
        <div class="plant-description">
            <h2>Description</h2>
           
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        </div>
        <div class="price">
      <label>Price:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        </div>
        <br><br>

        <form method="POST">

          <button type='submit' name='btnBuyNow' class="buy" >Buy now</a></button>

          <!-- cart -->
          <button type="submit" name="btnCart" style="backgroud-color: #fff; border: none; cursor: pointer;"><img src="../assets/cart-plus.svg" style="width:40px; height:40px; align-item:right;"class="cart4-icon"></button>

        </form>

        <br><br>
          <p>Seller: </p>
        <div class="ratings">

        <div class="rating-container">

            <h3>Average Rating:<span><i class="fa fa-star" style="color: #FFB000" ></i></span> (Based on <span>
                
            </span> reviews)
            </h3>
        </div>
        
    </div>

        </div>
        <div class="reviews">
            <h2>Customer Reviews</h2>
           
        </div>
        <button type='submit' name='btnEdit' class="buy" style="background:#1e5631;color:white;">Update</a></button>
    </div>
    </div>

    

    <script src="../js/see_plant.js"></script>	

</body>
</html>