<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPROUT</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
        <style>
            img {
                max-width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="login.php">
                        <img src="assets\logo.png" alt="Clickable Photo" class="img-fluid clickable-photo">
                    </a>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const clickablePhoto = document.querySelector(".clickable-photo");
                clickablePhoto.addEventListener("click", function() {
                    window.location.href = "login.html";
                });
            });
        </script>

    </body>
</html>