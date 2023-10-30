<?php
    include "connection.php";

    function subscriptions()
    {
        include "connection.php";

        $get_subs = "SELECT
                        subscriptions.account_id, subscriptions.proof, subscriptions.date_submitted, subscriptions.date_approved, subscriptions.subscription_status,
                        user_account.account_id, user_account.account_firstname, user_account.account_lastname
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
        echo"<form method='POST'>
            <table border=1>
                <tr>
                    <th>Name</th>
                    <th>Proof of payment</th>
                    <th>Date submitted</th>
                    <th>Date approved</th>
                    <th>Subscription status</th>
                    <th></th>
                </tr>";
            while($populate = mysqli_fetch_assoc($exec))
            {
                if($populate["subscription_status"] == "B")
                {
                    $status = "Basic user";
                }
                else if($populate["subscription_status"] == "P")
                {
                    $status = "Premium user";
                }
                else if($populate["subscription_status"] == "R")
                {
                    $status = "Request to upgrade";
                }

                echo"<tr>
                        <td>".$populate["account_firstname"]." ".$populate["account_lastname"]."</td>";
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
                        <td><button type='submit' name='btnSubs'>Approve</button></td>
                    </tr>";
            }
        echo"
            </table>
            </form>";
    }
?>