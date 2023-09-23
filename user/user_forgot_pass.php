<?php
    include "../backend/bcknd_user_forgot_pass.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user_login.css">
    
</head>
<body>

    <div class="green-header">
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

        <form method="GET" action="user_forgot_pass.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="email" class="form-control" name="forgot_pass_username" id="forgot_pass_username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">OTP</label>
                <input type= "password" class="form-control" name="otp" id="otp" placeholder="Enter OTP">
            </div>
            <div class="form-group">
                <input type="checkbox" name="showOTP">&nbsp;&nbsp;Show OTP
            </div><br>
            <button type="submit" name="btnVerify" class="btn btn-warning btn-block" data-toggle="modal" data-target="#verifyModal">Verify</button><br>
            <div class="form-group">
                <p><center> <button name="send_email">Send email</button> </center></p>
                <p><center> Please check your email and enter the code. </center></p>
                <center> Already have an account? <a href="user_login.php"> Log in </a></center>
            </div>
        </form>

    </div>
    <form method="POST" action="user_login.php">
        <div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="verifyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        
                       
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
                        
                        <button type="submit" name="btnSignup" class="btn btn-warning btn-block">Submit</button><br>

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

