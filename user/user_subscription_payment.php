<?php
include "../backend/session_logged_in.php";
include "../backend/bcknd_user_subscription_payment.php";
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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <style>

    </style>
</head>

<body>
    <section class="home-section"><br>
        <a href="user_subscription.php"><box-icon name='arrow-back'></box-icon></a>

        <div class="card">
            <form method="POST" enctype="multipart/form-data">
                <!-- <div class="wrapper"> -->
                <div class="img-area">
                    <div class="inner-area">
                        <?php
                        if ($flag == true) {
                            echo $image;
                        } else {
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
</body>
</html>