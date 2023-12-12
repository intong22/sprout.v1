<?php
    include "connection.php";

    if(isset($_GET["subscription_price"]) && isset($_GET["subscription_plan"]))
    {
        $price = $_GET["subscription_price"];
        $plan = $_GET["subscription_plan"];
    }

    //notification is opened
    if(isset($_GET["notification_id"]))
    {
        $notification_id = $_GET['notification_id'];

        $query = "UPDATE
                        post_notification
                    SET
                        viewed = '1' 
                    WHERE
                        notification_id = ".$notification_id." ";
                        
        mysqli_query($con, $query);
    }

    $query = "SELECT
                    account_email
                FROM
                    user_account
                WHERE
                    account_email = '".$_SESSION["username"]."' ";
    
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $res = mysqli_fetch_assoc($result);
        $email = $res["account_email"];
    }

    function subscription()
    {
        include "connection.php";

        global $plan, $price;

        //check user subscription status
        $user_email = $_SESSION["username"];
        $stat = "SELECT
                    subscriptions.subscription_status,
                    user_account.account_email
                FROM
                    subscriptions
                INNER JOIN
                    user_account ON user_account.account_id = subscriptions.account_id
                WHERE
                    account_email = '".$user_email."' ";

        $query = mysqli_query($con, $stat);

        if(mysqli_num_rows($query) > 0)
        {
            $res = mysqli_fetch_assoc($query);

            if($res["subscription_status"] == 'B')
            {
                //if user is nit subscribed
                basic($res["account_email"], $plan, $price);
            }
            else if($res["subscription_status"] == 'P')
            {
                //if user is subscribed
                premium();
            }
            else if($res["subscription_status"] == 'R')
            {
                //if user requested subscription
                request();
            }
        }
    }

    //subscribe button
    if(isset($_POST["btnSubscribe"]))
    {
        $user_email = $_POST["email"];
        $price = $_GET["subscription_price"];
        $plan = $_GET["subscription_plan"];
        $image = addslashes(file_get_contents($_FILES["payment"]["tmp_name"]));
        
        $subs = "UPDATE
                    subscriptions
                SET
                    proof = '".$image."', 
                    subscription_status = 'R',
                    subscription_plan = ".$plan.",
                    subscription_price = '".$price."',
                    date_submitted = NOW() 
                WHERE
                    account_id =
                    (SELECT
                        account_id
                    FROM
                        user_account
                    WHERE
                        account_email = '".$user_email. "')";
        
        $exec = mysqli_query($con, $subs);
    }

    //request subscription view
    function request()
    {
        echo"<form method='POST'>
                <h2>Subscription request submitted!</h2>
                <label for='payment'>Your subscription has been submitted and is awaiting approval.</label><br><br>
            </form>";
    }

    //basic user view
    function basic($email, $plan, $price)
    {
        echo"<br>
            <form method='POST'>
                    <h3>Purchase subscription for ₱".number_format($price, 2)."</h3><br>
                    <input type='email' name='email' placeholder='Email' value='".$email."' readonly> <br><br>
                    <label for='payment'>Please provide a screenshot as proof of payment.</label><br><br>
                    <input type='file' name='payment' accept='.jpg, .jpeg, .png' required><br>
                    <button type='submit' name='btnSubscribe' style='background-color:#1E5631'>Subscribe</button>
              </form>";
    }

    //premium user view
    function premium()
    {
        echo"
            <form method='POST'>
                <h2>Awesome!</h2>
                <label for='payment'>You are now a premium user.</label><br><br>
            </form>";
    }
?>