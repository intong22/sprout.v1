<?php
    include "connection.php";

    //redirect to payment screen if clicked
    if(isset($_POST["btnWeekly"]))
    {
        $price = $_POST["btnWeekly"];
        header("location: user_subscription_payment.php?subscription_plan='W'&subscription_price=".$price."");
    }
    else if(isset($_POST["btnMonthly"]))
    {
        $price = $_POST["btnMonthly"];
        header("location: user_subscription_payment.php?subscription_plan='M'&subscription_price=".$price."");
    }
    else if(isset($_POST["btnYearly"]))
    {
        $price = $_POST["btnYearly"];
        header("location: user_subscription_payment.php?subscription_plan='Y'&subscription_price=".$price."");
    }

    $check = "SELECT
                    subscription_plan
                FROM
                    subscriptions
                WHERE
                    account_id = 
                    (SELECT
                        account_id
                    FROM
                        user_account
                    WHERE
                        account_email = '".$_SESSION["username"]."')";

    $res = mysqli_query($con, $check);

    $hasSubscribed = mysqli_fetch_assoc($res);
        
?>