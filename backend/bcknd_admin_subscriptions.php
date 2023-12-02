<?php
    include "connection.php";

    function subscriptions()
    {
        include "connection.php";

        $get_subs = "SELECT
                        subscriptions.account_id, subscriptions.proof, subscriptions.date_submitted, subscriptions.date_approved, subscriptions.subscription_status,
                        user_account.account_id, user_account.account_firstname, user_account.account_lastname, user_account.account_email
                    FROM
                        subscriptions
                    INNER JOIN
                        user_account ON user_account.account_id = subscriptions.account_id";

        $exec = mysqli_query($con, $get_subs);

        if(mysqli_num_rows($exec) > 0)
        {
            subsTable($exec);
        }
    }

    function subsTable($exec)
    {
        echo"<table border=2>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Proof of payment</th>
                    <th>Date submitted</th>
                    <th>Date approved</th>
                    <th>Subscription status</th>
                    <th>Actions</th>
                </tr>";
            while($populate = mysqli_fetch_assoc($exec))
            {
                checkSubExpiration($populate["account_id"]);

                if($populate["subscription_status"] == "B")
                {
                    $status = "Basic user";
                    $btn = "Notify to upgrade";
                    $name = "btnToNotif";
                }
                else if($populate["subscription_status"] == "P")
                {
                    $status = "Premium user";
                    $btn = "Change to basic";
                    $name = "btnToBasic";
                }
                else if($populate["subscription_status"] == "R")
                {
                    $status = "Request to upgrade";
                    $btn = "Upgrade to premium";
                    $name = "btnToRequest";
                }

                echo"<tr>
                        <td>".$populate["account_firstname"]." ".$populate["account_lastname"]."</td>
                        <td>".$populate["account_email"]."</td>";
                    if(empty($populate["proof"]))
                    {
                        echo"<td>No image submitted.</td>";
                    }
                    else
                    {
                        echo"<td><img src='data:image/jpeg;base64,".base64_encode($populate["proof"])."' alt='proof of payment' class='plant-image'></td>";
                    }
                echo"   <td>".$populate["date_submitted"]."</td>
                        <td>".$populate["date_approved"]."</td>
                        <td>".$status."</td>
                        <td>
                        <form method='POST'>
                            <button type='submit' name='".$name."' value=".$populate["account_id"].">".$btn."</button>
                        </form>";
                        // if user requests to upgrade
                        if($populate["subscription_status"] == "R")
                        {
                            echo"<form method='POST'>
                            <button type='submit' name='btnReject' value=".$populate["account_id"].">Reject subscription</button>";
                        }      
                echo"   </form>
                       </td>
                    </tr>";
            }
        echo"
            </table>";
    }

    //reject subs
    if(isset($_POST["btnReject"]))
    {
        $account_id = $_POST["btnReject"];
        $query = "UPDATE 
                        subscriptions
                    SET
                        subscription_status = 'B', proof = NULL, date_submitted = NULL,  date_approved = NULL
                    WHERE
                        account_id = ".$account_id." ";
        mysqli_query($con, $query);
    }

    //approve subs
    if(isset($_POST["btnToRequest"]))
    {
        $account_id = $_POST["btnToRequest"];
        $query = "UPDATE 
                        subscriptions
                    SET
                        subscription_status = 'P', date_approved = NOW(),
                        date_expired = DATE_ADD(date_approved, INTERVAL 30 DAY)
                    WHERE
                        account_id = ".$account_id." ";
        mysqli_query($con, $query);
    }
    
    //premuim to basic
    if(isset($_POST["btnToBasic"]))
    {
        $account_id = $_POST["btnToBasic"];
        $query = "UPDATE 
                        subscriptions
                    SET
                        subscription_status = 'B', proof = NULL, date_submitted = NULL,  date_approved = NULL
                    WHERE
                        account_id = ".$account_id." ";
        mysqli_query($con, $query);
    }

    //basic to notif
    if(isset($_POST["btnToNotif"]))
    {
        $account_id = $_POST["btnToNotif"];
        $query = "INSERT INTO
                        post_notification(admin_id, account_id, notification_description)
                    VALUES
                        (
                        (SELECT
                            admin_id
                        FROM
                            admin
                        WHERE
                            admin_username = '".$_SESSION["admin_username"]."'), ".$account_id.", 'Subscribe to our sevice!') ";
        mysqli_query($con, $query);
            echo"<script>
                    alert('Notification sent!');
                </script>";
    }

    //check if subscription is expired
    function checkSubExpiration($account_id)
    {
        include "connection.php";

        $check = "SELECT
                        date_expired
                    FROM
                        subscriptions
                    WHERE
                        account_id = ".$account_id."";
                    
        $res = mysqli_query($con, $check);

        if(mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                if(strtotime($row["date_expired"]) <= strtotime('now') )
                {
                    $query = "UPDATE 
                                    subscriptions
                                SET
                                    subscription_status = 'B', proof = NULL, date_submitted = NULL,  date_approved = NULL
                                WHERE
                                    account_id = ".$account_id." ";
                    mysqli_query($con, $query);
                }
            }
        }
    }

    //search
    function searchSubs()
    {
        include "connection.php";
        
        if(isset($_GET["btnSearchSubs"]))
        {
            $input = $_GET["searchInput"];

            $search = "SELECT
                            subscriptions.account_id, subscriptions.proof, subscriptions.date_submitted, subscriptions.date_approved, subscriptions.subscription_status,
                            user_account.account_id, user_account.account_firstname, user_account.account_lastname, user_account.account_email
                        FROM
                            subscriptions
                        INNER JOIN
                            user_account ON user_account.account_id = subscriptions.account_id
                        WHERE
                            account_firstname LIKE '%$input%' 
                        OR
                            account_lastname LIKE '%$input%'";
                
                $exec = mysqli_query($con, $search);

                subsTable($exec);

                if(!mysqli_num_rows($exec))
                {
                    echo"<h3>No user/s found.</h3>";
                }
        }
    }
?>