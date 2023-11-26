<?php
    include "connection.php";

    $data = array();
    $count = 0;

    $chart_query = "SELECT
                        SUM(s.subscription_status = 'R' AND MONTH(s.date_submitted) = MONTH(NOW())) AS pending,
                        SUM(s.subscription_status = 'P' AND MONTH(s.date_approved) = MONTH(NOW())) AS subscription_status,
                        SUM(s.subscription_status IN ('B') AND s.date_expired IS NOT NULL AND MONTH(s.date_expired) = MONTH(NOW())) AS date_expired,
                        SUM(u.account_status = 'A') AS account_status_active,
                        SUM(u.account_status = 'I') AS account_status_inactive
                    FROM
                        subscriptions s
                    JOIN
                        user_account u ON s.account_id = u.account_id";

    $result = mysqli_query($con, $chart_query);    
    
    if(mysqli_num_rows($result) > 0)
    {
        $monthNumeric = date('n', strtotime('now'));
        $year = date('Y', strtotime('now'));

        switch($monthNumeric)
        {
            case 1: $month = "January"; break;
            case 2: $month = "February"; break;
            case 3: $month = "March"; break;
            case 4: $month = "April"; break;
            case 5: $month = "May"; break;
            case 6: $month = "June"; break;
            case 7: $month = "July"; break;
            case 8: $month = "August"; break;
            case 9: $month = "September"; break;
            case 10: $month = "October"; break;
            case 11: $month = "November"; break;
            case 12: $month = "December"; break;
        }

        while($res = mysqli_fetch_array($result))
        {
            $data[$count]["label"] = "Pending Subscription";
            $data[$count]["y"] = $res["pending"];
            $count++;
            $data[$count]["label"] = "Subscribed";
            $data[$count]["y"] = $res["subscription_status"];
            $count++;
            $data[$count]["label"] = "Expired";
            $data[$count]["y"] = $res["date_expired"];
            $count++;
            $data[$count]["label"] = "Active";
            $data[$count]["y"] = $res["account_status_active"];
            $count+=1;
            $data[$count]["label"] = "Inactive";
            $data[$count]["y"] = $res["account_status_inactive"];
            $count+=1;
        }
    }
    else
    {
        $data = array( array("label" => "Statistics will display once users have registered in the app.", "y" => 0) );
    }
?>