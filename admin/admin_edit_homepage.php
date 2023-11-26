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
    <!-- <link rel="stylesheet" href="../css/user_homepage.css"> -->

    <link rel="website icon" type="png" href="../assets/logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/swift.css">
<script src="../js/swift.js"></script>


    <style>
      .plant-image {
    text-align: center;
}

.plant-description {
    margin-top: 20px;
    font-size: 16px;


}
        h1 {
            margin-left: 32px;
        }

        .form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-top: 10px;
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%; /* Set the width to 100% to occupy the entire column */
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}
        textarea {
            resize: vertical;
        }

        input[type="file"] {
            padding: 0;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            

        }
        .button1 {
           
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 5vh; 

        }

        button:hover {
            background-color: #45a049;
        }

      .upload-photo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    /* Hide the default file input appearance */
    cursor: pointer;
    /* Show the hand cursor on hover */
}

.tooltip {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: opacity 0.3s;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}
.plant-image{
    width:50%;
    height:10%;
    padding:10px;
    align-items: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
  }
.image-container:hover .tooltip {
    opacity: 2;
}
.fi-rr-picture{
    position: relative;
    text-align: center;
    top: 25%;
    left: 50%;
    transform: translate(-50%, -5%);
    display: inline-block;
    opacity: 75%;
    transition: opacity 0.3s;
    background-color: rgba(101, 91, 91, 0.10);
    color: #fff;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}
.image-container {
    position: relative;
    display: inline-block;
    max-width: 800px;
    padding: 20px;
    flex-wrap: wrap;
    justify-content: center;

  }
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}
.card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            max-width: 1000px;
        } 
.plant{
 
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
   <div class="container">
      <div class="card">
          <form method="POST" enctype="multipart/form-data">
          <div class="image-container">
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
                   <!-- <form method="POST"> -->
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
    <script>
        Swal.fire({
            title: 'Item updated successfully!',
            icon: 'success',
            showCancelButton: false,
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(() => {
            // window.location.href = 'admin_edit_homepage.php?plant_id=".$plant_id."';
        });
    </script>
<!-- <script src="../js/swift.js"></script> -->
</body>
</html>