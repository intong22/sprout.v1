<?php

    include "backend/bcknd_user_homepage.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/user_homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

       
    </style>
</head>
<body>
    <div class="search-bar">
        <input type="search" class="search-input" placeholder="Search...." autocomplete="off">
        <i class="fa fa-search"></i>
    </div>

    <div class="navbar">
    
        <br>
        <!-- <a href="#">Home</a>
        <a href="#">Plant Encyclopedia</a> -->
        
        <a href="#"><i class="fas fa-home icon"></i></a>
        <a href="encyclopedia.php"><i class="fas fa-book icon"></i></a>
        <a href="#"><i class="fas fa-store icon"></i></a>
        <a class="fa fa-bell" href="#"></a>
        <!-- <a href="#"><i class="fas fa-search icon"></i></a> -->
        <div class="dropdown">
        <a href="#"><i class="fas fa-user icon"></i></a>
            <div class="dropdown-content">
                <a href="#">About us</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
    <br>
    <!-- CATEGORIES -->
    <h2 class="category-label">Categories</h2>
    <div class="categories-container">
        
        <div class="category" id="flowering-plants">
            Flowering Plants
           
        </div>
        <div class="category">Category 2</div>
        <div class="category">Category 3</div>
        <div class="category">Category 4</div>
        <div class="category">Category 5</div>
        <div class="category">Category 6</div>
        <div class="category">Category 7</div>
        <div class="category">Category 8</div>
        <div class="category">Category 9</div>
        <div class="category">Category 10</div>
    </div>
    <br>
    <h2 class="category-label">Plants</h2>

    <!-- PLANTS -->
    <div class="plants">

        <?php
            if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {
                    echo"<div class='plant'>".$plant["plant_name"];
                    echo" <p class='plant-image'>PLANT IMAGE GOES HERE</p>";//echo"<img src=".$plant["plant_image"]." alt='plant image' class='plant-image'>";
                    echo"   <div class='plant-details'>";
                    echo"       <h3>".$plant["plant_genus_name"]."</h3>";
                    echo"       <p>".$plant["plant_type_details"]."</p>";
                    echo"   </div>";
                    echo"</div>";
                }
                
            }
        ?>        

        <div class="plant">Plant 4</div>
        <div class="plant">Plant 5</div>
        <div class="plant">Plant 6</div>
        <div class="plant">Plant 7</div>
        <div class="plant">Plant 8</div>
        <div class="plant">Plant 9</div>
        <div class="plant">Plant 10</div>
        <div class="plant">Plant 11</div>
        <div class="plant">Plant 12</div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>About Us</h3>
                    <p>We are dedicated to providing you with information about plants and helping you take care of them.</p>
                </div>
                <div class="col-md-6">
                    <h3>Contact Us</h3>
                    <p>Email: @Sprout.com<br>Phone: 123-456-7890</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    const plantImages = document.querySelectorAll('.plant-image');
    const plantDetails = document.querySelectorAll('.plant-details');

   

    // Add click event listener to each plant image
    plantImages.forEach((image, index) => {
        image.addEventListener('click', () => {
            if (plantDetails[index].style.display === 'block') {
                plantDetails[index].style.display = 'none'; // Close details if already open
            } else {
                plantDetails.forEach(details => {
                    details.style.display = 'none'; // Close other details
                });
                plantDetails[index].style.display = 'block'; // Open clicked details
            }
        });
    });

    // Add click event listener to flowering plants category
    const categoryFloweringPlants = document.getElementById('flowering-plants');
    const floweringPlantDetails = categoryFloweringPlants.querySelector('.plant-details');

    categoryFloweringPlants.addEventListener('click', () => {
        if (floweringPlantDetails.style.display === 'block') {
            floweringPlantDetails.style.display = 'none';
        } else {
            floweringPlantDetails.style.display = 'block';
        }
    });


   
    </script>
    
</body>
</html>
