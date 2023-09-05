<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Plant Encyclopedia</title>

    <style>
        
        body, h1, h2, h3, p {
            margin:30px 10px 30px 10px ;
            padding: 0;
        }
        
        body {
            font-family: "Plus Jakarta Sans",Trebuchet MS,sans-serif;
            background-color: #f4f4f4;
            color: rgba(0,0,0,.95);
        }
        
        header {
            background-color:#EEF1FF ;
            color: #black;
            text-align:left 15px;
            padding: 1rem 0;
        }
        
        .container {
            max-width: 35%;
            width:600px;
            height:190px;
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            padding: 1rem;
            margin-left: 20px; 
            margin-right: 20px;
           
        }
        
        h1 {
           margin-left: 20vh;
        }
        
        h2 {
           /* margin-left: 20vh; */
           text-align: center;
        }
        p{
            /* margin-left: 20vh; */
            text-align: center;
        }
        h3{
            margin:center;
            text-align: center;
            align-items: center;
            justify-content: space-between;
        }
        
         .plant-card {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 1rem;
            display: flex;
            margin-left: 20vh;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        } 
        
        
        .plant-card:hover {
            transform: translateY(-3px);
        }
        .search-input {
            border-color: black;
            padding: 8px;
            width: 50%;
            margin-left: 20vh;
        }
        .plant-image {
            max-width: 100%;
            width: 100%;
            /* margin-left: 20vh; */
            align-items: center;
            height: auto;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }
        .button {
        background-color: #ffff; /* Green */
        border:1px;
        border-color: black;
        color: black;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        }
        
    </style>
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
        <div class="plant-card1">
            <img src="flower.jpeg" alt="Plant 1" class="plant-image">
            <h2>Plant Name 1</h2>
            <p>Description of Plant 1...</p>
        </div>

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
