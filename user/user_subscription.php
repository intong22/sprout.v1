<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/user_sidebar.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <title>User Subscription</title>

        <link rel="stylesheet" href="../css/user_subscription.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <style>
            
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #ecf0f3;
}

.card{
 background-color:whitesmoke;
  position: relative;
  width: 400px;
  padding: 30px;
  border-radius: 10px;
  display: flex;
  margin-top: 20vh;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.card .icon{
  font-size: 17px;
  color: #1E5631;
  position: absolute;
  cursor: pointer;
  opacity: 0.7;
  top: 15px;
  height: 35px;
  width: 35px;
  text-align: center;
  line-height: 35px;
  border-radius: 50%;
  font-size: 16px;
}
.card .icon i{
  position: relative;
  z-index: 9;
}
.card .icon.arrow{
  left: 15px;
}

.card .icon.dots{
  right: 15px;
}

.card .icon.arrow,
.card .icon.dots:hover {
    color: orange;
}


.card .img-area{
  height: 150px;
  width: 150px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.img-area .inner-area{
  height: calc(100% - 25px);
  width: calc(100% - 25px);
  border-radius: 50%;
}
.inner-area img{
  height: 100%;
  width: 100%;
  border-radius: 50%;
  object-fit: cover;
}
.card .name{
  font-size: 24px;
  font-weight: 500;
  color: #31344b;
  margin: 10px 0 5px 0;
}

.card .button button {
    position: relative;
    width: 100%;
    border: none;
    outline: none;
    padding: 12px 0;
    color: white; 
    font-size: 17px;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    z-index: 4;
    background: green;
    transition: background 0.3s; 
}

.card .button button:hover {
    background: orange; // Change the background color to orange on hover
}
.alert {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: green;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            z-index: 999; /* Make sure it's on top of other content */
        }
</style>
    </head>
    <body>
    <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus icon'></i> -->
       <i class='bx bx-menu' id="btn" ></i>
      <img src="..\assets\logo.png" alt="Logo" class="logo-details">
        <div class="logo_name">Sprout</div>
       
    </div>
    <ul class="nav-list">
      <li>
        <a href="user_homepage.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">HOME</span>
      </li>
     <li>
       <a href="user_encyclopedia.php">
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
       <a href="user_settings.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">SETTINGS</span>
     </li>
     <li class="profile">
         <div class="profile-details">
         <div class="profile-image-container" onclick="toggleUploadButton()">
            <?php 
                if($flag == true)
                {
                  echo $image; 
                }
                else
                {
                  echo "<img src='../assets/user_image_def.png' alt='User image' class='user-image' </img>";   
                } 
            ?> 
             <input type="file" id="upload-photo" accept="image/*" style="display: none;">
        </div>
        <!-- Button to trigger file input -->
        <label for="upload-photo" id="upload-button" class="upload-button">
            <i class="bx bx-camera"></i> Upload Profile
        </label>
            <div class="name_job">
              <div class="name"><?php echo $fname." ".$lname; ?></div>
              <div class="job"><?php echo $status; ?></div>
            </div>
        </div>
		   <a href="../backend/session_end.php">
         <i class='bx bx-log-out' id="log_out" ></i>
		 </a>
		   <span class="tooltip">LOGOUT</span>
     </li>
    </ul>
  </div>
  
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
  <section class="home-section">
        <div class="card">
            <form method="POST" action="user_subscription.php" enctype="multipart/form-data">
            <!-- <div class="wrapper"> -->
    <div class="img-area">
      <div class="inner-area">
        <img src="../assets/messi.jpg" alt="">
      </div>
    </div>
    <div class="icon arrow"><i class="fas fa-arrow-left"></i></div>
    <div class="icon dots"><i class="fas fa-ellipsis-v"></i></div>
    <div class="form">
                    <h2>Subscribe to Our Service</h2>
                    <input type="email" name="email" placeholder="Email"><br>
                    <label for="payment">Please provide a screenshot as proof of payment:</label>
                    <input type="file" name="payment[]" accept=".jpg, .jpeg, .png" multiple required><br>
                    <button type="submit" id="subscribeButton">Subscribe</button>
            </form>
        </div>
    
    <script>
        const subscribeButton = document.getElementById("subscribeButton");

        subscribeButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent form submission (if the button is inside a form)
            // Display an alert message
            const alertMessage = document.createElement("div");
            alertMessage.className = "alert";
            alertMessage.innerText = "Subscription submitted successfully!";
            document.body.appendChild(alertMessage);
            // Remove the alert message after a certain time (e.g., 3 seconds)
            setTimeout(function () {
                alertMessage.remove();
            }, 3000);
        });
    </script>
    </section>
    </body>
</html>

