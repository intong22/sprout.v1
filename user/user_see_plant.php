<!DOCTYPE html>
<html>
<head>
    <title>Plant Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #1E5631;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .plant-image {
            text-align: center;
        }
        .plant-description {
            margin-top: 20px;
            font-size: 20px;
           
        }
        p {
            margin-top: 20px;
            font-size: 30px;
            font-family: serif;
        }
        h3{
            font-family: cursive;
        }
        .price {
            font-size: 40px;
            margin-top: 20px;
        }
        button {
            background-color: #1E5631;
            color: #fff;
            font-size: 20px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            align-items: right;
        }
        button:hover{
            background-color:orange;
            color:#1E5631;
        }
        .ratings {
            margin-top: 20px;
        }
        .reviews {
            margin-top: 20px;
        }
       
        .rating-container .fa {
            font-size: 24px;
            cursor: pointer;
            color: #ccc; /* Default star color when not clicked */
        }
        .rating-container .rated {
            color: gold; /* Star color when clicked */
        }
        * {box-sizing:border-box}
        /* .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            display: flex;
        } */

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}


@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
.i{
    margin-left:0;
}
    </style>
</head>
<body>
    <header>
        <a href="user_marketplace.php"><i class='fas fa-arrow-left'style='font-size:36px;color:white'></i></a>
            <h1>Plant Name</h1>
    </header>
    <div class="container">
    <div class="card">
    <div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../assets/hibiscus.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../assets/hibiscus.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../assets/hibiscus.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
        <div class="plant-description">
            <h2>Description</h2>
            <p>This plant is chuchu...</p>
        </div>
        <div class="price">
            ₱19.99
        </div>
        <br><br>
        <button>Add to Cart</button>
        <!-- <div class="buy-button">
           
        </div> -->
        <br><br>
        <h2>Ms/Mr.</h2>
        <div class="ratings">
        <h2>Ratings</h2>
        <div class="rating-container">
            <span class="fa fa-star" data-rating="1"></span>
            <span class="fa fa-star" data-rating="2"></span>
            <span class="fa fa-star" data-rating="3"></span>
            <span class="fa fa-star" data-rating="4"></span>
            <span class="fa fa-star" data-rating="5"></span>
        </div>
        <h3>Average Rating: <span id="average-rating">0</span> (Based on <span id="total-ratings">0</span> reviews)</h3>
    </div>
            <!-- Add star rating display here -->
        </div>
        <!-- <div class="reviews">
            <h2>Customer Reviews</h2>
          
        </div> -->
    </div>
    </div>
    <script src="../js/see_plant.js"></script>	
    
</body>
</html>
