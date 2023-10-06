<?php
    include "../backend/session_start.php";
    include "../backend/bcknd_user_login.php";
    include "../backend/bcknd_user_signup.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/user_login.css">
    
    <style>
   
    </style>
</head>
<body>

    <div class="green-header">
    <a href="../index.php">
    <i class='bx bx-arrow-back arrow-icon'></i>
         
        </a>
        <h1 class="colored-text"> <span class="white">Spr</span><span class="orange">out</span></h1>
        <p style="color:white;">Your No. 1 guide to plant care</p><br>
    </div>

    <div class="logo">
           <!-- <img src="assets\logo.png" alt="Logo"> -->
        <div class="logo" style="position: absolute; top: 15%; left: 50%; transform: translateX(-50%);">
            <img src="..\assets\logo.png" alt="Logo" class="logo">
        </div>
    </div> 

    <!-- LOG IN --> 
    <div class="container login-container">

        <form method="GET" action="user_login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="email" class="form-control" name="username" id="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type= "password" class="form-control" name="password"  id="myInput" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;Show password
            </div><br>
            <button type="submit" name="btnLogin" class="btn btn-warning btn-block">Log in</button><br>
            <div class="form-group">
               <center> Forgot <a href="user_forgot_pass.php"> password? </a></center>
            </div>
            <div class="form-group">
                <center>No account yet? <a href="#"  data-toggle="modal" data-target="#signupModal">Sign Up</a><br></center>
            </div>
        </form>
        
    </div>
   
    <!-- SIGN UP -->
    <form method="POST" action="user_login.php">
        <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="colored-text"id="signupModalLabel"><span class="green">CREATE</span> <span class="orange">an account</span></h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="username">Firstname</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter Firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Lastname</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" name="username" class="form-control" id="signup-username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" name="password" class="form-control" id="signup-password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Confirm password</label>
                            <input type="password" name="confirmpass" class="form-control" value="FakePSW" id="myInput"placeholder="Confirm password" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;Show password
                        </div><br>
                        
                        <button type="submit" name="btnSignup" class="btn btn-warning btn-block">Sign Up</button><br>

                    </div>
                </div>
            </div>
        </div>
    </form>

   <script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
   </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

