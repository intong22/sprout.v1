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

    //approve subscription
    if(isset($_POST["btnSubs"]))
    {
        $account_id = $_POST["btnSubs"];

        //check subscription status
        $check = "SELECT
                        subscription_status
                    FROM
                        subscriptions
                    WHERE
                        account_id = ".$account_id." ";
        
        $res = mysqli_query($con, $check);

        if(mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                if($row["subscription_status"] == 'R')
                {
                    $query = "UPDATE 
                                    subscriptions
                                SET
                                    subscription_status = 'P', date_approved = NOW()
                                WHERE
                                    account_id = ".$account_id." ";
                    mysqli_query($con, $query);
                }
                else if($row["subscription_status"] == 'P')
                {
                    $query = "UPDATE 
                                    subscriptions
                                SET
                                    subscription_status = 'B', proof = NULL, date_submitted = NULL,  date_approved = NULL
                                WHERE
                                    account_id = ".$account_id." ";
                    mysqli_query($con, $query);
                }
                else if($row["subscription_status"] =='B' )
                {
                    echo"<script>
                            alert('Notification sent!');
                        </script>";
                }
            }
        }
    }

    function subsTable($exec)
    {
        echo"<form method='POST'>
            <table border=1>
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
                if($populate["subscription_status"] == "B")
                {
                    $status = "Basic user";
                    $btn = "Notify to upgrade";
                }
                else if($populate["subscription_status"] == "P")
                {
                    $status = "Premium user";
                    $btn = "Change to basic";
                }
                else if($populate["subscription_status"] == "R")
                {
                    $status = "Request to upgrade";
                    $btn = "Upgrade to premium";
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
                            <button type='submit' name='btnSubs' value='".$populate["account_id"]."'>".$btn."</button>
                        </td>
                    </tr>";
            }
        echo"
            </table>
            </form>";
    }
?>