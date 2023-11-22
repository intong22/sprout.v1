<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_edit_homepage.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Edit</title>
    
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/admin_edit_home.css">
    <link rel="website icon" type="png" href="../assets/logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
  * {box-sizing:border-box}

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
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  background-color: rgba(0, 0, 0, 0.8); /* Add a background color to make them more visible */
  z-index: 1; /* Make sure they are above the slides */
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.prev {
  left: 0;
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
.arrow-icon {
    position: absolute;
    color: white;
    top:25px;
    left: 20px; 
    font-size: 32px;
    transform: translateY(-50%);
}
.image-container {
    position: relative;
    display: inline-block;
    margin: auto;

}


@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
    </style>
</head>

<body>
<div class="sidebar">
    <div class="logo-details">
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
       <i class='bx bx-menu' id="btn" > </i>         
        <div class="logo_name">Sprout</div>
      
    </div>
    <ul class="nav-list">
      <li>
        <a href="admin_home.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
      <li>
       <a href="admin_create-encyclopedia.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Encyclopedia</span>
       </a>
       <span class="tooltip">ENCYCLOPEDIA</span>
     </li>
     <li>
       <a href="user_forum.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Community Forum</span>
       </a>
       <span class="tooltip">COMMUNITY FORUM</span>
     </li>
     <li>
       <a href="user_marketplace.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Marketplace</span>
       </a>
       <span class="tooltip">MARKETPLACE</span>
     </li>
     <li>
       <a href="user_bookmark.php">
       <i class='bx bx-book-bookmark' ></i>
         <span class="links_name">Bookmark</span>
       </a>
       <span class="tooltip">BOOKMARK</span>
     </li>
     <li>
       <a href="user_like.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="user_profile.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">USER PROFILE</span>
     </li>
     <li>
 <li>
       <a href="user_settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">SETTINGS</span>
     </li>
     <li class="profile">
         <div class="profile-details">
            <img src='../assets/user_image_def.png' alt='User image' class='user-image' />
            <div class="name_job">
              <div class="name">Admin</div>
            </div>
		   <a href="../backend/session_end.php">
         <i class='bx bx-log-out' id="log_out" ></i>
		 </a>
		   <span class="tooltip">LOGOUT</span>
     </li>
    </ul>
  </div>
  
  <section class="home-section">
  <header style="background: #1E5631; padding:20px">
    <a href="user_encyclopedia.php" style="text-decoration: none;">
        <i class='bx bx-arrow-back arrow-icon'></i>
    </a>
         
    <h1 class="colored-text"><span class="orange">Ho</span><span class="orange">me</span> <span class="white">Page</h1><br>
    
    </header>
    <div class="image-container">
      <form method="POST" enctype="multipart/form-data">
            <?php
              displayImages();
            ?>
            <input type="file" name="add_images[]" class="upload-photo" class="fi fi-rr-picture"accept=".jpg, .png, .jpeg" id="image-upload" multiple>
            <span class="tooltip" id="tooltip"><i class="fi fi-rr-picture"></i></span>
        </div>
        <div style="text-align:center;">
            <p><button type="submit" name="btnRemovePhoto" style="border:none;"> Remove photos </button></p>             
        </div>

        <div class="plant-description">
        <form method="POST">
                <label for="plant_name">PLANT NAME:</label>
                <input type="text" id="plant_name" name="plant_name" required value="<?php echo $plant_name; ?>"><br><br>
                <label for="plant_name">GENUS NAME:</label>
                <input type="text" id="genus_name" name="genus_name" required value="<?php echo $genus_name; ?>"><br><br>
                <label for="plant_name">PLANT CATEGORY:</label>
                <select id="plant_type" name="plant_type" required>
                    <option value="flowering" <?php if($category == "flowering"){ echo "selected"; } ?>>Flowering</option>
                    <option value="s&c" <?php if($category == "s&c"){ echo "selected"; } ?>>Succulents & Cacti</option>
                    <option value="fern" <?php if($category == "fern"){ echo "selected"; } ?>>Fern</option>
                    <option value="climber" <?php if($category == "climber"){ echo "selected"; } ?>>Climbers</option>
                    <option value="fruit" <?php if($category == "fruit"){ echo "selected"; } ?>>Fruit Bearing</option>
                    <option value="vegetable" <?php if($category == "vegetable"){ echo "selected"; } ?>>Vegetable Bearing</option>
                    <option value="herbal" <?php if($category == "herbal"){ echo "selected"; } ?>>Herbal</option>
                    <option value="fungi" <?php if($category == "fungi"){ echo "selected"; } ?>>Fungi</option>
                    <option value="carnivorous" <?php if($category == "carnivorous"){ echo "selected"; } ?>>Carnivorous</option>
                    <option value="toxic" <?php if($category == "toxic"){ echo "selected"; } ?>>Toxic</option>
                    <option value="onramental" <?php if($category == "ornamental"){ echo "selected"; } ?>>Ornamental</option>
                </select><br><br>
                <label>Soil Reccomendation</label>
                  <textarea name="soil_recco" required><?php echo $soil_recco; ?></textarea>
                  <br><br>
                <label>Water Reccomendation</label>
                  <textarea name="water_recco" required><?php echo $water_recco; ?></textarea>
                  <br><br>
                <label>Sunlight Reccomendation</label>
                  <textarea name="sunlight_recco" required><?php echo $sunlight_recco; ?></textarea>
                  <br><br>
                <label>Plant Care Tips</label>
                  <textarea name="tips" required><?php echo $tips; ?></textarea>
                <br><br>
                <label>Plant Details</label>
                  <textarea name="details" required><?php echo $details; ?></textarea>
                <br><br>
                <button name="btnUpdate" class="button">Update</button>        
            </form>   
        </div>
</section>

<script src="../js/see_plant.js"></script>	

    <script>
        document.getElementById('image-upload').addEventListener('change', function () {
            const fileInput = this;
            const tooltip = document.getElementById('tooltip');
            
            if (fileInput.files.length > 0) {
                // Display all file names
                tooltip.textContent = Array.from(fileInput.files).map(file => file.name).join(', ');
            } else {
                tooltip.textContent = 'Upload Photo';
            }
        });
    </script>

</body>
</html>