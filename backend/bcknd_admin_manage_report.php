<?php
    include "connection.php";

    //get admin id
    $admin = "SELECT
                    admin_id
                FROM
                    admin
                WHERE
                    admin_username = '".$_SESSION["admin_username"]."' ";
    
    $get_id = mysqli_query($con, $admin);
    $admin_id = mysqli_fetch_assoc($get_id);

    $counter = 0;

    //delete
    if(isset($_POST["delete"]))
    {
        $account_id = $_POST["delete"];

        // //delete post
        $delete_post = "DELETE FROM
                            post_information
                        WHERE
                            account_id = ".$account_id." ";

        mysqli_query($con, $delete_post);
    }

    //deactivate acc
    if(isset($_POST["deact"]))
    {
        $account_id = $_POST["deact"];

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
                    alert('Account is already inactive.');
                </script>";
        }
        else
        {
            $deact = "UPDATE
                        user_account
                    SET
                        account_status = 'I' 
                    WHERE 
                        account_id = ".$account_id." ";

            mysqli_query($con, $deact);

            echo"<script>
                    alert('Account has been deactivated');
                </script>";
        } 
    }

    //reports table display
    function reports()
    {
        include "connection.php";

        //query to get reports                            
        $getReports = "SELECT
                            complaints.complaints_id, complaints.complaints_details, complaints.complaints_image,
                            post_information.post_id, post_information.post_description,
                            user_account.account_id,
                            user_account.account_firstname, user_account.account_lastname
                            FROM 
                                complaints
                            INNER JOIN 
                                post_information ON complaints.post_id = post_information.post_id
                            INNER JOIN 
                                user_account ON post_information.account_id = user_account.account_id";

       $exec = mysqli_query($con, $getReports);

       if(mysqli_num_rows($exec) > 0)
       {
            reportsTable($exec);
       }
       else
       {
            echo"<center><h3>No reports available.</h3></center>";
       }
    }
    
    //table
    function reportsTable($exec)
    {
        include "connection.php";

        global $counter;
        echo'<form method="POST">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reported Post</th>
                        <th>Posted By</th>
                        <th>Complaint Image</th>
                        <th>Report Reason</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';
        while($populate = mysqli_fetch_assoc($exec))
        {
            echo'<tr>
                        <td>'.$populate["complaints_id"].'</td>
                        <td>'.$populate["post_description"].'</td>
                        <td>'.$populate["account_firstname"].' '.$populate["account_lastname"].'</td>
                        <td>';
                if (!empty($populate["complaints_image"])) 
                {
                        echo"<img src='data:image/jpeg;base64,".base64_encode($populate["complaints_image"])."' alt='Plant image'/>";

                }
                else
                {
                    echo"No image submitted.";
                }
            echo'   </td>         
                    <td>';
                    if(!empty($populate["complaints_details"]))
                    {
                        echo $populate["complaints_details"];
                    }
                    else
                    {
                        echo"No complaint details submitted.";
                    }
            echo'   </td>
                    <td>      
                        <button type="submit" name="delete" value='.$populate["account_id"].' class="btn btn-danger" style"border: none;">Delete</button>
                    </td>
                    <td>           
                        <button type="submit" name="deact" value='.$populate["account_id"].' class="btn btn-danger">Deactivate account</a>
                    </td>
                    </tr>';
        }
        echo'          
                </tbody>
            </table>
            </form>';
    }

    //search for report
    function search()
    {
        include "connection.php";

        if(isset($_POST["btnSearch"]))
        {
            // echo"<center><h1>CLICKED!<h1></center>";
            $search_input = $_POST["searchInput"];

            $searchQuery = "SELECT
                                complaints.complaints_id, complaints.complaints_details, complaints.complaints_image,
                                post_information.post_id, post_information.post_description,
                                user_account.account_id,
                                user_account.account_firstname, user_account.account_lastname
                            FROM
                                complaints
                            INNER JOIN 
                                post_information ON complaints.post_id = post_information.post_id
                            INNER JOIN 
                                user_account ON post_information.account_id = user_account.account_id
                            WHERE
                                account_firstname LIKE '%$search_input%' 
                            OR
                                account_lastname LIKE '%$search_input%'
                            OR
                                post_description LIKE '%$search_input%'
                            OR
                                complaints_details LIKE '%$search_input%' ";
            
            $exec = mysqli_query($con, $searchQuery);

            if(mysqli_num_rows($exec) > 0)
            {
                reportsTable($exec);
            }
        }
    }
?>
