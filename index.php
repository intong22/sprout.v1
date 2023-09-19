<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPROUT</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/styles.css">
        <style>
            img {
                max-width: 100%;
                height: auto;
            }
            body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /* .container {
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: flex-end;
            overflow: hidden;
        } */
        .container {
                height: 100vh; 
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }
        .clickable-photo {
            max-width: 120%;
            height: auto;
            animation: photoAnimation 2s forwards;
            opacity: 0;
            filter: drop-shadow(12px 12px 7px rgba(0, 0, 0, 0.7));
        }
       
        
        @keyframes photoAnimation {
            0% { transform: translateY(100%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="user_login.php">
                        <img src="./assets/logo.png" alt="Clickable Photo" class="img-fluid clickable-photo">
                    </a>
                </div>
            </div>
        </div>
        <div class="options-container">
            <div>
                <a href="./user/user_login.php">User</a>
            </div>
            <div>
                <a href="./admin/admin_login.php">Admin</a>
            </div>
        </div>
        <!-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                const clickablePhoto = document.querySelector(".clickable-photo");
                clickablePhoto.addEventListener("click", function() {
                    window.location.href = "user_login.php";
                });
            });
        </script> -->
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