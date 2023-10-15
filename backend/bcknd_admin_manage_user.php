<?php
    include "connection.php";

    //search
    function search()
    {
        include "connection.php";

        if(isset($_GET["btnSearch"]))
        {
            $input = $_GET["search"];

            $search = "SELECT
                            account_id, account_email, account_firstname, account_lastname, account_subscribed, account_status
                        FROM
                            user_account
                        WHERE
                            account_firstname
                        LIKE
                            '%$input%' 
                        OR
                            account_lastname
                        LIKE
                            '%input%' ";
            
            $exec = mysqli_query($con, $search);

            userTable($exec);

            if(!mysqli_num_rows($exec))
            {
                echo"<h3>No user/s found.</h3>";
            }
        }
    }

    //delete users
    if(isset($_POST["btnDeleteUser"]))
    {
        if(isset($_POST["deleteUser"]))
        {
            $account_id = $_POST["deleteUser"];

            for($i = 0; $i < count($account_id); $i++)
            {
                $del = "DELETE FROM
                            user_account
                        WHERE
                            account_id = ".$account_id[$i]." ";
                
                mysqli_query($con, $del);
            }
        }
        else
        {
            echo"
                <script>
                    alert('No user selected.');
                </script>";
        }
    }

    //activate users
    if(isset($_POST["btnActivate"]))
    {
        $account_id = $_POST["btnActivate"];
        
        //get user status
        $user_stat = "SELECT
                        account_status
                    FROM
                        user_account
                    WHERE
                        account_id = ".$account_id." ";
        
        $exec = mysqli_query($con, $user_stat);

        $status = mysqli_fetch_assoc($exec);

        if($status["account_status"] == "A")
        {
            echo"<script>
                    alert('User is already active.');
                </script>";
        }
        else
        {
            $activate_user = "UPDATE
                                user_account
                            SET
                                account_status = 'A' 
                            WHERE
                                account_id = ".$account_id." ";
            
            mysqli_query($con, $activate_user);
        }
    }

    //deactivate users
    if(isset($_POST["btnDeactivate"]))
    {
        $account_id = $_POST["btnDeactivate"];

        //check user status
        $user_stat = "SELECT
                        account_status
                    FROM
                        user_account
                    WHERE
                        account_id = ".$account_id." ";
        
        $exec = mysqli_query($con, $user_stat);

        $status = mysqli_fetch_assoc($exec);

        if($status["account_status"] == "I")
        {
            echo"<script>
                    alert('User is already inactive.');
                </script>";
        }
        else
        {
            $deactivate_user = "UPDATE
                                user_account
                            SET
                                account_status = 'I' 
                            WHERE
                                account_id = ".$account_id." ";
            
            mysqli_query($con, $deactivate_user);
        }   
    }

    //display active users
    function active_users()
    {
        include "connection.php";

        $active = "SELECT
                        account_id, account_email, account_firstname, account_lastname, account_subscribed, account_status
                    FROM
                        user_account";
            
        $exec = mysqli_query($con, $active);

        userTable($exec);

        if(!mysqli_num_rows($exec))
        {
            echo"<h3>No active users.</h3>";
        }
    }

    //user table
    function userTable($exec)
    {
        include "connection.php";

        if(mysqli_num_rows($exec))
        {
            echo"<form method='POST' action='admin_manage_user.php'>";
            echo"<table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Subscription</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th><button type='submit' name='btnDeleteUser'>DELETE</button></th>
                </tr>";          
            while($user = mysqli_fetch_assoc($exec))
            {
                if($user["account_subscribed"] == 0)
                {
                    $subscription = "Basic user";
                }
                else
                {
                    $subscription = "Premium user";
                }

                if($user["account_status"] == "A")
                {
                    $status = "Active";
                }
                else
                {
                    $status = "Inactive";
                }
                echo"<tr>
                        <td>".$user["account_id"]."</td>
                        <td>".$user["account_email"]."</td>
                        <td>".$user["account_firstname"]." ".$user["account_lastname"]."</td>
                        <td>".$subscription."</td>
                        <td>".$status."</td>
                        <input type='hidden' name='account_id' value='".$user["account_id"]."' />
                        <td align='center'><button type='submit' name='btnActivate' value='".$user["account_id"]."'>Activate</button></td>
                        <td align='center'><button type='submit' name='btnDeactivate' value='".$user["account_id"]."'>Deactivate</button></td>
                        <td align='center'><input type='checkbox' name='deleteUser[]' value='".$user["account_id"]."' /></td>
                    </tr>";
            }

            echo"</table>";
            echo"</form>";
        }
    }
?>