<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_profile.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="website icon" type="png" href="assets\logo.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>

</head>

<body>
    <div class="grand-parent">
        <div class="parent">
           
            <div class="back">
                <a href="user_homepage.php"><i class="fi fi-rr-arrow-small-left"></i></a>
            </div>
            <div class="cart">
                <a href="#"><i class="fi fi-br-shopping-cart"></i></a>
            </div>

        </div>
        <div class="child-container">
            <div class="child1">

                <form method="GET" action="user_profile.php">
                    <?php echo $image; ?> </img>
                </form>

                <br>

                <div style="text-align:center;">
                    <form method="POST" action="user_profile.php">
                        <h2 class="removeB">&nbsp <?php echo $fname." ".$lname; ?><a href="#">&nbsp<i class="fi fi-rr-pencil"></i></a>
                        </h2>
                    </form>
                </div>

                <br>

                <div style="text-align:center;">
                    <button type="submit" class="removeB" name="viewpurchasehistory">View Purchase History </button>
                </div>

            </div>

            <br>
            <br>

            <div class="child2">
               
                <div class="category">
                    <i class="fi fi-rs-social-network" style="color: #E6B400; font-size:20px"></i>&nbsp
                    <button type="submit" class="removeB" name="likedproducts">Liked Products</button>
                </div>
                <div class="category"> 
                    <form method="GET" action="user_favorites.php">
                        <i class="fi fi-rr-heart" style="color: #E6B400; font-size:20px"></i>&nbsp
                        <button type="submit" class="removeB" name="favoriteplants">Favorite Plants</button>
                    </form>
                </div>
                <div class="category">
                    <i class="fi fi-br-menu-burger" style="color: #E6B400; font-size:20px"></i></i>&nbsp
                    <button type="submit" class="removeB" name="faqs">FAQs</button>
                </div>
                <div class="category">
                    <i class="fi fi-rs-sign-out-alt" style="color: #E6B400; font-size:20px"></i>&nbsp
                    <button type="submit" class="removeB" name="logout">Logout</button>
                </div>
                <div class="category">
                    <i class="fi fi-br-question" style="color: #E6B400; font-size:20px"></i>&nbsp
                    <button type="submit" class="removeB" name="help">Help</button>
                </div>

            </div>
        <div>
    </div>
</body>
</html>