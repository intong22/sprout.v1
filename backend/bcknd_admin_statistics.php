<?php
include "connection.php";

//bar chart
$data = array();
$count = 0;

//subs chart
$subs = array();
$subcount = 0;

    if(isset($_POST["btnMonth"])) 
    {
        $btnMonth = $_POST["btnMonth"];
        
        switch($btnMonth) 
        {
            case 1: $month_selected = "January"; break;
            case 2: $month_selected = "February"; break;
            case 3: $month_selected = "March"; break;
            case 4: $month_selected = "April"; break;
            case 5: $month_selected = "May"; break;
            case 6: $month_selected = "June"; break;
            case 7: $month_selected = "July"; break;
            case 8: $month_selected = "August"; break;
            case 9: $month_selected = "September"; break;
            case 10: $month_selected = "October"; break;
            case 11: $month_selected = "November"; break;
            case 12: $month_selected = "December"; break;
        }
        switch($btnMonth) 
        {
            case 1: $month = "01"; break;
            case 2: $month = "02"; break;  
            case 3: $month = "03"; break;
            case 4: $month = "04"; break;
            case 5: $month = "05"; break;
            case 6: $month = "06"; break;
            case 7: $month = "07"; break;
            case 8: $month = "08"; break;
            case 9: $month = "09"; break;
            case 10: $month = "10"; break;
            case 11: $month = "11"; break;
            case 12: $month = "12"; break;
        }

        //bar chart
        $chart_query = "SELECT
                    SUM(s.subscription_status = 'R' AND MONTH(s.date_submitted) = MONTH(NOW())) AS pending,
                    SUM(s.subscription_status = 'P' AND MONTH(s.date_approved) = MONTH(NOW())) AS subscription_status,
                    SUM(s.subscription_status IN ('B') AND s.date_expired IS NOT NULL AND MONTH(s.date_expired) = MONTH(NOW())) AS date_expired,
                    SUM(u.account_status = 'A') AS account_status_active,
                    SUM(u.account_status = 'I') AS account_status_inactive
                FROM
                    subscriptions s
                JOIN
                    user_account u ON s.account_id = u.account_id
                WHERE
                    MONTH(date_submitted) = '".$month."'";
        
        //subs chart
        $subs_query = "SELECT
                    SUM(subscription_status = 'P' AND MONTH(date_approved) = '".$month."') AS subscription_status,

                    SUM(subscription_status IN ('B') AND date_expired IS NOT NULL AND MONTH(date_expired) = '".$month."') AS date_expired,

                    SUM(subscription_status IN ('R') AND date_approved IS NULL AND MONTH(date_submitted) = '".$month."') AS pending
                FROM
                    subscriptions";
    }
    else
    {
        //bar chart
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
        
        //subs chart
        $subs_query = "SELECT
                    SUM(subscription_status = 'P' AND MONTH(date_approved) = MONTH(NOW())) AS subscription_status,

                    SUM(subscription_status IN ('B') AND date_expired IS NOT NULL AND MONTH(date_expired) = MONTH(NOW())) AS date_expired,

                    SUM(subscription_status IN ('R') AND date_approved IS NULL AND MONTH(date_submitted) = MONTH(NOW())) AS pending
                FROM
                    subscriptions";
    }

$result = mysqli_query($con, $chart_query);

if (mysqli_num_rows($result) > 0) {
    $monthNumeric = date('n', strtotime('now'));
    $year = date('Y', strtotime('now'));

    switch ($monthNumeric) {
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

    while ($res = mysqli_fetch_array($result)) {
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
        $count++;
        $data[$count]["label"] = "Inactive";
        $data[$count]["y"] = $res["account_status_inactive"];
        $count++;
    }
} else {
    $data = array(array("label" => "Statistics will display once users have registered in the app.", "y" => 0));
}

//subs chart
$subs_result = mysqli_query($con, $subs_query);

if (mysqli_num_rows($subs_result) > 0) {
    while ($res = mysqli_fetch_array($subs_result)) {
        $subs[$subcount]["label"] = "Subscribed";
        $subs[$subcount]["y"] = $res["subscription_status"];
        $subcount++;
        $subs[$subcount]["label"] = "Expired";
        $subs[$subcount]["y"] = $res["date_expired"];
        $subcount++;
        $subs[$subcount]["label"] = "Pending";
        $subs[$subcount]["y"] = $res["pending"];
        $subcount++;
    }
}

//statistics subscription table
function subsTable()
{
    include "connection.php";

    if(isset($_POST["btnMonth"])) 
    {
        $btnMonth = $_POST["btnMonth"];
        
        switch($btnMonth) 
        {
            case 1: $month = "01"; break;
            case 2: $month = "02"; break;  
            case 3: $month = "03"; break;
            case 4: $month = "04"; break;
            case 5: $month = "05"; break;
            case 6: $month = "06"; break;
            case 7: $month = "07"; break;
            case 8: $month = "08"; break;
            case 9: $month = "09"; break;
            case 10: $month = "10"; break;
            case 11: $month = "11"; break;
            case 12: $month = "12"; break;
        }
        switch($btnMonth) 
        {
            case 1: $month_selected = "January"; break;
            case 2: $month_selected = "February"; break;
            case 3: $month_selected = "March"; break;
            case 4: $month_selected = "April"; break;
            case 5: $month_selected = "May"; break;
            case 6: $month_selected = "June"; break;
            case 7: $month_selected = "July"; break;
            case 8: $month_selected = "August"; break;
            case 9: $month_selected = "September"; break;
            case 10: $month_selected = "October"; break;
            case 11: $month_selected = "November"; break;
            case 12: $month_selected = "December"; break;
        }
        

        $query = "SELECT
                    user_account.account_firstname, user_account.account_lastname,
                    subscriptions.subscription_plan, subscriptions.subscription_price, subscriptions.date_submitted, subscriptions.date_approved, subscriptions.date_expired
                FROM
                    user_account
                INNER JOIN
                    subscriptions ON subscriptions.account_id = user_account.account_id
                WHERE
                    MONTH(date_approved) = '".$month."'
                OR
                    MONTH(date_expired) = '".$month."'
                OR
                    MONTH(date_submitted) = '".$month."'";
    }
    else
    {
        $query = "SELECT
                    user_account.account_firstname, user_account.account_lastname,
                    subscriptions.subscription_plan, subscriptions.subscription_price, subscriptions.date_submitted, subscriptions.date_approved, subscriptions.date_expired
                FROM
                    user_account
                INNER JOIN
                    subscriptions ON subscriptions.account_id = user_account.account_id
                WHERE
                    MONTH(date_approved) = MONTH(NOW())
                OR
                    MONTH(date_expired) = MONTH(NOW())
                OR
                    MONTH(date_submitted) = MONTH(NOW())";
    }

    $exec = mysqli_query($con, $query);

    $total = 0;

    echo "<table id='subsTable'>
                <tr>
                    <th colspan='7'>Subscriptions";
                    if(isset($_POST["btnMonth"]))
                    {
                        echo " : ".$month_selected;
                    }
    echo"           </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Subscription Plan</th>
                    <th>Price</th>
                    <th>Date Submitted</th>
                    <th>Approved On</th>
                    <th>Expire</th>
                    <th>Total</th>
                </tr>";
    if (mysqli_num_rows($exec) > 0) {
        while ($data = mysqli_fetch_assoc($exec)) {
            if ($data["subscription_plan"] == "W") {
                $status = "Weekly Subscription";
            } else if ($data["subscription_plan"] == "M") {
                $status = "Monthly Subscription";
            } else if ($data["subscription_plan"] == "Y") {
                $status = "Yearly Subscription";
            } else{
                $status = "";
            }

            if (!empty($data["date_approved"])) {
                $approved = date('F j, Y, g:i a', strtotime($data["date_approved"]));
            } else {
                $approved = "";
            }

            if (!empty($data["date_expired"])) {
                $expired = date('F j, Y, g:i a', strtotime($data["date_expired"]));
            } else {
                $expired = "";
            }

            if(!empty($data["date_submitted"]))
            {
                $submitted = date('F j, Y, g:i a', strtotime($data["date_submitted"]));
            } else {
                $submitted = "";
            }

            //calculate total
            $subscriptionPrice = $data["subscription_price"];
            $total += $subscriptionPrice;

            echo "<tr>
                    <td>".$data["account_firstname"]." ".$data["account_lastname"]."</td>
                    <td>".$status."</td>
                    <td> ₱ ".number_format($data["subscription_price"], 2)."</td>
                    <td>".$submitted."</td>
                    <td>".$approved."</td>
                    <td>".$expired."</td>
                    <td> ₱ ".number_format($data["subscription_price"], 2)."</td>
                </tr>";
        }
        echo"<tr>
                <td colspan='6'><b>Total subscription sales</b></td>
                <td><b> ₱ ".number_format($total, 2)."</b></td>
            </tr>";
    }
    echo "</table>";
}

//user chart
$user = array();
$usercount = 0;

$user_query = "SELECT
                        account_email, account_firstname, account_lastname, account_status,
                        COUNT(CASE WHEN account_status = 'I' THEN 1 END) AS inactive, COUNT(CASE WHEN account_status = 'A' THEN 1 END) AS active
                    FROM
                        user_account";

$user_result = mysqli_query($con, $user_query);

if (mysqli_num_rows($user_result) > 0) {
    while ($res = mysqli_fetch_array($user_result)) {
        $user[$usercount]["label"] = "Active";
        $user[$usercount]["y"] = $res["active"];
        $usercount++;
        $user[$usercount]["label"] = "Inactive";
        $user[$usercount]["y"] = $res["inactive"];
        $usercount++;
    }
}

//statistics users table
function usersTable()
{
    include "connection.php";

    $query = "SELECT
                    account_email, account_firstname, account_lastname, account_status,
                    COUNT(CASE WHEN account_status = 'I' THEN 1 END) AS inactive, COUNT(CASE WHEN account_status = 'A' THEN 1 END) AS active
                FROM
                    user_account
                GROUP BY 
                    account_email, account_firstname, account_lastname, account_status";

    $exec = mysqli_query($con, $query);

    $activeCount = 0;
    $inactiveCount = 0;

    echo "<table>
                <tr>
                    <th colspan='3'>Users</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Account Status</th>
                </tr>";
    if (mysqli_num_rows($exec) > 0) {
        while ($data = mysqli_fetch_assoc($exec)) {
            if ($data["account_status"] == "A") {
                $status = "Active";
                $activeCount += $data["active"];
            } else if ($data["account_status"] == "I") {
                $status = "Inactive";
                $inactiveCount += $data["inactive"];
            }

            echo "<tr>
                            <td>" . $data["account_email"] . "</td>
                            <td>" . $data["account_firstname"] . " " . $data["account_lastname"] . "</td>
                            <td>" . $status . "</td>
                        </tr>";
        }
    }
    echo "</table>";
}
?>