<?php
    error_reporting(0);
    include "../backend/bcknd_user_forgot_pass.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/user_login.css">
    
</head>
<body>

    <div style='padding-left: 2%; padding-top: 2%;'>
        <a href="user_login.php"><i class='fas fa-arrow-left' style='font-size:36px; color:orange'></i></a><br>
    </div>

    <!-- LOG IN --> 
    <div class="container login-container">

    <?php
        global $emai_sent, $verify_otp;

        if(isset($_GET["send_email"]) && $emai_sent == true || ($verify_otp == false))
        {
    ?>
            <form method="GET">
                <div class="form-group">
                    <label for="password">OTP</label>
                    <input type= "text" class="form-control" name="otp" id="otp" placeholder="Enter OTP" required>
                </div><br>
                
                <button type="submit" name="btnVerify" class="btn btn-warning btn-block">Verify</button><br>

                <p><center> Please check your email and enter the code. </center></p>
            </form>
    <?php
        }
        else if($verify_otp == true && isset($_GET["btnVerify"]))
        {
    ?>
            <form method="POST">
                <div class="form-group">
                    <label for="password">New password</label>
                    <input type= "password" class="form-control" name="new_pass" id="otp" placeholder="Enter new password" required>
                </div><br>
                 <div class="form-group">
                    <label for="password">Confirm password</label>
                    <input type= "password" class="form-control" name="conf_pass" id="otp" placeholder="Confirm new password" required>
                </div><br>
                
                <button type="submit" name="btnNewpass" class="btn btn-warning btn-block">Change password</button><br>
            </form>
    <?php
        }
        else
        {
    ?>
            <form method="GET">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="email" class="form-control" name="forgot_pass_username" id="forgot_pass_username" placeholder="Enter username" required>
                </div><br>
                
                <button type="submit" name="send_email" class="btn btn-warning btn-block">Send email</button><br>
            </form>
    <?php        
        }    
    ?>
            <div class="form-group">
                <center> Already have an account? <a href="user_login.php"> Log in </a></center>
            </div>
    </div>

    <!--FORM TO RESET PASS-->
    <form id="verifyForm" method="GET" action="user_login.php">
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
                            <input type="checkbox" onclick="myFunction()">&nbsp;&nbsp;Show password
                        </div><br>
                        
                        <button type="submit" name="btnSubmit" class="btn btn-warning btn-block">Submit</button><br>

                    </div>
                </div>
            </div>
        </div>
    </form>

   <script>

   </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

