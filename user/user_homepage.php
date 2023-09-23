<?php
    include "../backend/session_logged_in.php";
    include "../backend/bcknd_user_homepage.php";
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");



header a {
  text-decoration: none;
}

header {
  padding: 0 20px;
  background-color: #1d1f1d;
  height: 50px;
  display: flex;
  justify-content: space-between;
}

#brand {
  font-weight: bold;
  font-size: 18px;
  display: flex;
  align-items: center;
}

#brand a {
  color: #09c372;
}

ul {
  list-style: none;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: space-around;
}

ul a {
  color: white;
}

ul li {
  padding: 5px;
  margin-left: 10px;
}

ul li:hover {
  transform: scale(1.1);
  transition: 0.3s;
}



#hamburger-icon {
  margin: auto 0;
  display: none;
  cursor: pointer;
}

#hamburger-icon div {
  width: 35px;
  height: 3px;
  background-color: white;
  margin: 6px 0;
  transition: 0.4s;
}

.open .bar1 {
  -webkit-transform: rotate(-45deg) translate(-6px, 6px);
  transform: rotate(-45deg) translate(-6px, 6px);
}

.open .bar2 {
  opacity: 0;
}

.open .bar3 {
  -webkit-transform: rotate(45deg) translate(-6px, -8px);
  transform: rotate(45deg) translate(-6px, -8px);
}

.open .mobile-menu {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
}

.mobile-menu {
  display: none;
  position: absolute;
  top: 50px;
  left: 0;
  height: calc(100vh - 50px);
  width: 100%;
}

.mobile-menu li {
  margin-bottom: 10px;
}

@media only screen and (max-width: 600px) {
  header nav {
    display: none;
  }

  #hamburger-icon {
    display: block;
  }
}
    </style>
</head>
<body>
    

    <form method="GET" action="user_homepage.php">
    

        
<div class="content">

    <div class="search-bar">
        <input type="search" class="search-input" placeholder="Search..." autocomplete="off">
        <i class="fa fa-search"></i>
        <div class="navbar">
    
    <br>
    <!-- <a href="#">Home</a>
    <a href="#">Plant Encyclopedia</a> -->
        <ul>
            <li><a href="user_homepage.php"><i class="fas fa-home icon"></i></a></li>
            <li><a href="user_encyclopedia.php"><i class="fas fa-book icon"></i></a></li>
            <li><a href="user_encyclopedia.php"><i class="fa fa-comments-o"></i></a></li>
            <li><a href="user_marketplace.php"><i class="fas fa-store icon"></i></a></li>
            <li><a class="fa fa-bell" href="#"></a></li>
            <!-- <a href="#"><i class="fas fa-search icon"></i></a> -->
            <div class="dropdown">
            <li><a href="user_profile.php"><i class="fas fa-user icon"></i></a></li>
                <div class="dropdown-content">
                    <a href="#">About us</a>
                    <a href="#">Settings</a>
                    <a href="../backend/session_end.php">Logout</a>
                </div>
        </ul>
        </div>
        <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
        <li><a href="user_homepage.php">HOME</a></li>
            <li><a href="user_encyclopedia.php">Encyclopedia</a></li>
            <li><a href="user_marketplace.php">Marketplace</a></li>
            <li><a  href="#"></a></li>
            <!-- <a href="#"><i class="fas fa-search icon"></i></a> -->
            <div class="dropdown">
            <li><a href="user_profile.php"><i class="fas fa-user icon"></i></a></li>
                <div class="dropdown-content">
                    <a href="#">About us</a>
                    <a href="#">Settings</a>
                    <a href="../backend/session_end.php">Logout</a>
                </div>
        </ul>
      </div>
</div>
    </div>
    </form>
    <br>
    <!-- CATEGORIES -->
    <form method="GET" action="user_homepage.php">
        <h2 class="category-label">Categories</h2>
        <div class="box">
      <div class="saple-plants">
        <div class="div">
          
       
        <div class="categories-container">
            
            <div class="category" id="flowering-plants">
                <img src="assets\sampleplant.jpg" class="plant-image"></img>
                <button type="submit" name="floweringPlants">Flowering Plants</button>
                <p>Flowering plants are a type of vascular <p>
                    <p>plant that produces flowers in order to reproduce.</p> 
              
               
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
            if(isset($_GET["btnSearch"]))
            {
                search();
            }
            else
            {
                categories();
            }
        ?>        

    </div>
        </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
            <h1 class="colored-text"> <span class="green">S p r</span><span class="orange"> o u t</span> </h1><br>
                </div>
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

   
        function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}
    </script>
    
</body>
</html>
