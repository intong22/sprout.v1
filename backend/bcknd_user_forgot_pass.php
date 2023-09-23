<?php

    include "connection.php";

    //verify the OTP and update password
    if(isset($_GET["btnVerify"]))
    {
        $email = $_GET["forgot_pass_username"];
        $otp = $_GET["otp"];

        if($otp == "")
        {
            echo "Please enter your OTP.";
        }
        else
        {
            //check if otp is correct
            $get_otp = "SELECT
                            otp
                        FROM
                            reset
                        WHERE
                            account_email = '".$email."' 
                        AND
                            otp = '".md5($otp)."' ";
            
            $check_otp = mysqli_query($con, $get_otp);

            if(mysqli_num_rows($check_otp) > 0)
            {
                //form to verify pass shows
                
            }
            else
            {
                echo "Invalid! Please try again.";
            }
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
                //check if email already exists in reset table
                $check_email = "SELECT
                                    account_email
                                FROM
                                    reset
                                WHERE
                                    account_email = '".$get_email."' ";
                $email_exists = mysqli_query($con, $check_email);

                if(mysqli_num_rows($email_exists) > 0)
                {
                    //update only the OTP
                    $update_otp = "UPDATE
                                        reset
                                    SET
                                        otp = '".api($get_email)."' 
                                    WHERE
                                        account_email = '".$get_email."' ";
                    mysqli_query($con, $update_otp);

                    echo "Email has been sent. Please enter OTP.";
                }
                else
                {
                    //insert email and otp into database
                    $insert_email = "INSERT INTO
                                            reset(account_email, otp)
                                        VALUES
                                            ('".$get_email."', '".api($get_email)."')";
                    
                    echo "Email has been sent. Please enter OTP.";
                }
            }
            else
            {
                echo "Email is not registered as user. Please try again.";
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

?>