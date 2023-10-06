<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPROUT</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="./css/index.css">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                <a href="./user/user_login.php">
                        <img src="./assets/logo.png"  alt="Logo" class="clickable-photo">
                    </a>
                </div>
                
            </div>
        </div><br>
        <!-- <div class="options-container">
            <div>
            <a href='./user/user_login.php' class="button1"> USER</a>
            </div><br>
            <div>
            <a href='./admin/admin_login.php' class="button">ADMIN</a>
            </div>
        </div> -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const clickablePhoto = document.querySelector(".clickable-photo");
                const optionsContainer = document.querySelector(".options-container");
                
                clickablePhoto.addEventListener("click", function() {
               
                    optionsContainer.style.display = optionsContainer.style.display === "none" ? "block" : "none";
                });
            });
        </script>

    </body>
</html>
