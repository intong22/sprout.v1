<?php

    include "connection.php";

    //verify the OTP and update password
    if(isset($_GET["btnVerify"]))
    {
        $otp = $_GET["otp"];

            //check if otp is correct
            $get_otp = "SELECT
                            otp
                        FROM
                            reset
                        WHERE
                            otp = '".md5($otp)."' ";
            
            $check_otp = mysqli_query($con, $get_otp);

            if(mysqli_num_rows($check_otp) > 0)
            {
                //$correct = true;
                //form to verify pass shows
                // echo '<script type="text/javascript">';
                // echo 'setTimeout(function () {';
                // echo '  $("#verifyModal").modal("show");';
                // echo '}, 100);'; 
                // echo '</script>';

                $verify_otp = true;
            }
            else
            {
                echo "<script>
                        alert('Invalid! Please try again.');
                    </script>";

                $verify_otp = false;
            }
    }

    //send the OTP to email
    if(isset($_GET["send_email"]))
    {
        $get_email = $_GET["forgot_pass_username"];

        //check if email is in database
        $email_query = "SELECT
                            account_email
                        FROM
                            user_account
                        WHERE
                            account_email = '$get_email' ";
        
        $check = mysqli_query($con, $email_query);

        if($get_email == "")
        {
            echo"Please enter you email";
        }
        else
        {
            if(mysqli_num_rows($check) > 0 )
            {
                //check if id already exists in reset table
                $check_email = "SELECT
                                    reset.account_id,
                                    user_account.account_email, user_account.account_id
                                FROM
                                    reset
                                INNER JOIN
                                    user_account ON user_account.account_id = reset.account_id
                                WHERE
                                    account_email = '".$get_email."' ";
                $email_exists = mysqli_query($con, $check_email);

                if(mysqli_num_rows($email_exists) > 0)
                {
                    //get account id
                    $id = "SELECT 
                                account_id
                            FROM
                                user_account
                            WHERE
                                account_email = '".$get_email."' ";
                    $res = mysqli_query($con, $id);

                    $account_id = mysqli_fetch_assoc($res);
                    
                    //update only the OTP
                    $update_otp = "UPDATE
                                        reset
                                    SET
                                        otp = '".api($get_email)."' 
                                    WHERE
                                        account_id = '".$account_id["account_id"]."' ";
                    mysqli_query($con, $update_otp);

                    echo "<script>
                            alert('Email has been sent. Please enter OTP.');
                        </script>";

                    $emai_sent = true;
                }
                else
                {
                    //get account id
                    $id = "SELECT 
                                account_id
                            FROM
                                user_account
                            WHERE
                                account_email = '".$get_email."' ";
                    $res = mysqli_query($con, $id);

                    $account_id = mysqli_fetch_assoc($res);

                    //insert email and otp into database
                    $insert_email = "INSERT INTO
                                            reset(account_id, otp)
                                        VALUES
                                            ('".$account_id["account_id"]."', '".api($get_email)."')";
                    mysqli_query($con, $insert_email);
                    
                    echo "<script>
                            alert('Email has been sent. Please enter OTP.');
                        </script>";
                
                $emai_sent = true;
                }
            }
            else
            {
                echo "<script>
                        alert('Email is not registered as user. Please try again.');
                    </script>";
            }
        }

    }

    // API OTP
    function api($email)
    {  

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://email-authentication-system.p.rapidapi.com/?recipient=".urlencode($email)."&app=Login%20System",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: email-authentication-system.p.rapidapi.com",
                "X-RapidAPI-Key: fa5985b5acmshda26e3b0d8c9370p187a96jsn24a381c37424"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) 
        {
            echo "cURL Error #:" . $err;
        } else 
        {
            // get the authetnication code
            $data = json_decode($response, true);

            if(isset($data['authenticationCode']))
            {
                $code = $data['authenticationCode'];
                return $code;
            }
            else 
            {
                echo "Authentication Code not found in response.";
            }

        }
        
    }

    //change pass
    if(isset($_POST["btnNewpass"]))
    {
        global $otp;
        $password = $_POST["new_pass"];
        $conf_pass = $_POST["conf_pass"];

        if($password == $conf_pass)
        {
            //change pass
            $change = "UPDATE
                            user_account
                        SET
                            account_password = '".$conf_pass."'
                        WHERE
                            account_id = 
                            (SELECT
                                account_id
                            FROM
                                reset
                            WHERE
                                otp = '".md5($otp)."')";
            mysqli_query($con, $change);

            echo "<script>
                        alert('Password has been changed.');
                        window.location.href='user_login.php';
                    </script>";
        }
        else
        {
            echo "<script>
                        alert('Passwords do not match. Please try again.');
                    </script>";
        }
    }

?>