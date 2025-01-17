<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar Menu  | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>
        /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
.sidebar{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 78px;
  background: #11101D;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}
.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar .bx-search{
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #FFF;
}
.sidebar.open .bx-search:hover{
  background: #1d1b31;
  color: #FFF;
}
.sidebar .bx-search:hover{
  background: #FFF;
  color: #11101d;
}
.sidebar li a{
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #11101D;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #11101D;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}

body {
    font-family: "Plus Jakarta Sans",Trebuchet MS,sans-serif;
     margin:8px; 
    padding: 0;
}

.green {
    color: green; 
}

.orange {
    color:orange; 
}
h1 {
    margin-left: 10vh;
   
 }
 .navbar {
    background-color:#1E5631;
    display: flex;
    justify-content: flex-end;
    padding: 15px;
}
.search-bar {
    display: flex;
    align-items: center;
    background-color: #1E5631;
    padding: 10px;
    border-radius: 5px;
}
.navbar a:last-child {
    margin-right: 20px;
    display: flex;
    justify-content: flex-end;
}

/* Styling for search bar */
.search-bar {
    display: flex;
    align-items: center;
    background-color: #1E5631;
    padding: 10px;
    border-radius: 5px;
}
.search-input {
    border: none;
    padding: 8px;
    width: 40%;
    border-radius: 10px;
}
@media screen and(max-widt:786px){
    .search-bar{
        width:50%;

}}
/* Styling for categories */
.categories-container {
    display: flex;
    overflow-x: auto;
    padding: 15px;
}
.category {
    width: 200px;
    border: 1px solid #ccc;
    padding: 2px 16px;
    display: flex;
    flex-direction: column;
}
.category:last-child {
    margin-right: 0;
}


 .colored-text {
    font-size: 30px; /* You can adjust the size as needed */
}

/* Styling for plant items */
.plants {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}
.plant {
    border: 1px solid #ccc;
    margin: 10px;
    padding: 10px;
    text-align: center;
    width: 200px;
}
.navbar .dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 70px;
    z-index: 2;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown-content a {
    color: black;
    padding: 10px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {
    background-color: #1E5631;
}
.notification-icon {
    color: white;
    margin-right: 10px;
}
.navbar .icon {
    font-size: 18px;
    color: white;
    margin-right: 10px;
}
.plant-details {
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    padding: 20px;
    width: 300px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}
.plant-image {
    max-width: 170px;
    height: 100px;
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}

.plant:hover .plant-image {
    transform: scale(1.1);
}
.footer {
    background-color: #333;
    color: white;
    text-align: center;
    width: 100%;
    padding: 10px;
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
    <a href="user_homepage.php">
    <i class='bx bx-home' ></i>
      <span class="links_name">Home</span>
    </a>
     <span class="tooltip">HOME</span>
  </li>
 <li>
   <a href="user_encyclopedia.php">
     <i class='bx bx-book-open' ></i>
     <span class="links_name">Encyclopedia</span>
   </a>
   <span class="tooltip">ENCYCLOPEDIA</span>
 </li>
 <li>
   <a href="user_forum.php">
     <i class='bx bx-chat' ></i>
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
     <i class='bx bxs-cart-add' ></i>
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
   <a href="user_subscription.php">
   <i class='bx bx-dollar' ></i>
     <span class="links_name">Subscription</span>
   </a>
   <span class="tooltip">Subscription</span>
 </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
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
      <div class="text">Dashboard</div>
      <h1 class="colored-text"> <span class="green">S p r</span><span class="orange"> o u t</span> </h1><br>
    <div class="search-bar">
        <input type="search" class="search-input" placeholder="Search..." autocomplete="off">
        <i class="fa fa-search"></i>
        <div class="navbar">
    
    <br>
    <!-- <a href="#">Home</a>
    <a href="#">Plant Encyclopedia</a> -->
    
    <a href="user_homepage.php"><i class="fas fa-home icon"></i></a>
    <a href="user_encyclopedia.php"><i class="fas fa-book icon"></i></a>
    <a href="user_marketplace.php"><i class="fas fa-store icon"></i></a>
    <a class="fa fa-bell" href="#"></a>
    <!-- <a href="#"><i class="fas fa-search icon"></i></a> -->
    <div class="dropdown">
    <a href="user_profile.php"><i class="fas fa-user icon"></i></a>
        <div class="dropdown-content">
            <a href="#">About us</a>
            <a href="#">Settings</a>
            <a href="../backend/session_end.php">Logout</a>
        </div>
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
  </section>
  
</body>
</html>