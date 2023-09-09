<?php
    include "..\backend\bcknd_user_encyclopedia.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_encyclopedia.css">
    <title>Plant Encyclopedia</title>

</head>
<body>
    <header>
        <h1>Plant Encyclopedia</h1><br>
        <div class="search-bar">
            <input type="search" class="search-input" placeholder="Search" autocomplete="off">
            <i class="fa fa-search"></i>
        </div>

    </header>
    <h3>Popular Plants</h3>
    <div class="container">
        <?php
            popular();
            //unsaon pag limit to 2 lines ra ang
            //ma display sa description?

            //e import lang nya balik ang database
            //kay naa koy ge add didto nga data sa encyclopedia
        ?>

        <div class="plant-card2">
            <img src="flowerr.jpeg" alt="Plant 1" class="plant-image">
            <h2>Plant Name 2</h2>
            <p>Description of Plant 2...</p>
        </div>

        <div class="plant-card3">
            <img src="flowering.jpeg" alt="Plant 1" class="plant-image">
            <h2>Plant Name 3</h2>
            <p>Description of Plant 3...</p>
        </div>
       
    </div><br><br><br><br>
    <div class="myDiv">
    <h2>Find a topic by its first letter:</h2>

    <button class="button">A</button>
    <button class="button">B</button>
    <button class="button">C</button>
    <button class="button">D</button>
    <button class="button">E</button>
    <button class="button">F</button>
    <button class="button">G</button>
    <button class="button">H</button>
    <button class="button">I</button>
    <button class="button">J</button>
    <button class="button">K</button>
    <button class="button">L</button>
    <button class="button">M</button>
    <button class="button">N</button>
    <button class="button">O</button>
    <button class="button">P</button>
    <button class="button">Q</button>
    <button class="button">R</button>
    <button class="button">S</button>
    <button class="button">T</button>
    <button class="button">U</button>
    <button class="button">V</button>
    <button class="button">W</button>
    <button class="button">X</button>
    <button class="button">Y</button>
    <button class="button">Z</button>
    </div>
    

    <script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    </script>
</body>
</html>
