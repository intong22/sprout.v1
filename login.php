
<?php
    include "backend\bcknd_login.php";
    include "backend\bcknd_signup.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        body {
            background-color: #f8f9fa;
        }
        
        .green-header {
            background-color: green;
            padding: 60px 0;
            text-align: center;
        }
        .logo {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            margin: 0 auto;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .green {
            color: green; 
        }
        .white {
            color: white; 
        }
        .orange {
            color:orange; 
        }
        .button{
            background-color: #4CAF50; 
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        input[type=text] {
        border: 2px solid green;
        border-radius: 4px;
        }
        input[type=password] {
        border: 2px solid green;
        border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="green-header">
        <h1 class="colored-text"> <span class="white">Spr</span><span class="orange">out</span></h1>
        <p style="color:white;">Your No. 1 guide to plant care</p><br>
    </div>

    <div class="logo">
           <!-- <img src="assets\logo.png" alt="Logo"> -->
        <div class="logo" style="position: absolute; top: 15%; left: 50%; transform: translateX(-50%);">
            <img src="assets\logo.png" alt="Logo" class="logo">
        </div>
    </div> 

    <!-- LOG IN -->
    <div class="container login-container">

        <form nethod="GET" action="login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="email" class="form-control" name="username" id="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type= "password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
            <input type="checkbox" name="showPass">&nbsp;&nbsp;Show password
            </div><br>
            <button type="submit" name="btnLogin" class="btn btn-success btn-block">Log in</button><br>
            <div class="form-group">
               <center> Forgot <a href="#"> password? </a></center>
            </div>
            <div class="form-group">
                <center>No account yet? <a href="#"  data-toggle="modal" data-target="#signupModal">Sign Up</a><br></center>
            </div>
        </form>
        
    </div>
   
    <!-- SIGN UP -->
    <form method="POST" action="login.php">
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
                            <input type="email" name="email" class="form-control" id="signup-username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" name="password" class="form-control" id="signup-password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Confirm password</label>
                            <input type="password" name="confirmpass" class="form-control" id="cpassword" placeholder="Confirm password" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox">&nbsp;&nbsp;Show password
                        </div><br>
                        
                        <button type="submit" name="btnSignup" class="btn btn-warning btn-block">Sign Up</button><br>

                    </div>
                </div>
            </div>
        </div>
    </form>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

