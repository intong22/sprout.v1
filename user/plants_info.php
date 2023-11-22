<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Plants</title>

   <link rel="stylesheet" href="../css/marketplace.css">
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<?php include 'components/header.php'; ?>

  <iframe width="100%" height="650px" src="https://www.youtube-nocookie.com/embed/LZhnCxG5c6s?si=x-tJiazKYA7YktY5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></iframe><br><br>

   <h2>Christmas Cactus</h2>
      <div class="container">
            <img src="../assets/Christmas Cactus.jpg" alt="Trulli" width="500" height="333">
            <p>Cactus is the Christmas cactus, which hails from Brazil and does not have prickly parts. Unlike many cacti, the Christmas cactus has smooth, segmented leaves and soft spines with colorful flowers in red, pink, orange, and white shades. The plant originates in the rainforest and does well with some moisture and cool conditions. </p>
      </div>
   <h2>Pencil Cactus</h2>
      <div class="container">
            <img src="../assets/Pencil Cactus.jpg" alt="Trulli" width="500" height="333">
            <p>The pencil cactus is another favorite for indoor spaces. Ohler says these shrubs grow quickly and have no spikes or thorns, making them a family-friendly option for indoor growers. The pencil cactus has thick brown branches with smaller green branches that are cylindrical, in the shape of a pencil. Pencil cactus plants can grow to over 9 feet tall. “Pencil cactus is one of my favorite ones to propagate as it only takes a tiny piece of stem a few weeks to start forming new roots,” Ohler says.  </p>
      </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>