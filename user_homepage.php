<?php

    include "backend/bcknd_user_homepage.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="website icon" type="png"
    href="assets\logo.png">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/user_homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

       
    </style>
</head>
<body>
    <form method="GET" action="user_homepage.php">
        <div class="search-bar">
            <input type="search" name="searchInput" class="search-input" placeholder="Search...." autocomplete="off">
            <!-- <i class="fa fa-search"></i> -->
            <button type="search" name="btnSearch">Search</button>
        </div>
    </form>

    <div class="navbar">
    
        <br>
        <!-- <a href="#">Home</a>
        <a href="#">Plant Encyclopedia</a> -->
        
        <a href="#"><i class="fas fa-home icon"></i></a>
        <a href="user_encyclopedia.php"><i class="fas fa-book icon"></i></a>
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
    <form method="GET" action="user_homepage.php">
        <h2 class="category-label">Categories</h2>
        <div class="categories-container">
            
            <div class="category" id="flowering-plants">
                <img src="assets\sampleplant.jpg" class="plant-image"></img>
                <button type="submit" name="floweringPlants">Flowering Plants</button>
                <p>Flowering plants are a type of vascular <p>
                    <p>plant that produces flowers in order to reproduce.</p>
                    <p>Flowering plants produce seeds within a fruit. </p>
                   <p> The scientific name for flowering plants is angiosperms.</p>
               
            </div>
            <div class="category">
                <button type="submit" name="succulents&cacti">Succulents & Cacti</button>
            </div>
            <div class="category">
                <button type="submit" name="ferns">Ferns</button>
            </div>
            <div class="category">
                <button type="submit" name="climbers">Climbers</button>
            </div>
            <div class="category">
                <button type="submit" name="fruitBearing">Fruit-bearing Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="vegetableBearing">Vegetable-bearing Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="herbal">Herbal Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="fungi">Fungi</button>
            </div>
            <div class="category">
                <button type="submit" name="carnivorous">Carnivorous Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="toxic">Toxic Plants</button>
            </div>
            <div class="category">
                <button type="submit" name="ornamental">Ornamental Plants</button>
            </div>
        </div>
    </form>
        <br>
    <h2 class="category-label">Plants</h2>

    <!-- PLANTS -->
    <div class="plants">

        <?php
            categories();
        ?>        

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
