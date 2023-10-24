<?php
    include "connection.php";

    //reports table
    function reports()
    {
        include "connection.php";

        //query to get reports
        $getReports = "SELECT
                            complaints.complaints_id, complaints.complaints_details,
                            post_information.post_description, 
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
        echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reported Post</th>
                        <th>Posted By</th>
                        <th>Report Reason</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
        while($populate = mysqli_fetch_assoc($exec))
        {
            echo'<tr>
                        <td>'.$populate["complaints_id"].'</td>
                        <td>'.$populate["post_description"].'</td>
                        <td>'.$populate["account_firstname"].' '.$populate["account_lastname"].'</td>
                        <td>'.$populate["complaints_details"].'</td>
                        <td>
                            
                            <button class="btn btn-primary view-post-btn" 
                            data-toggle="modal" 
                            data-target="#viewPostModal" 
                            data-post-content="'.$populate["post_description"]. '">View Post</button>
          
                            <a href="#" class="btn btn-danger">Take Action</a>
                        </td>
                    </tr>';
        }
        echo'          
                </tbody>
            </table>';
    }

    //search fpr report
    function search()
    {
        include "connection.php";

        if(isset($_POST["btnSearch"]))
        {
            // echo"<center><h1>CLICKED!<h1></center>";
            $search_input = $_POST["searchInput"];

            $searchQuery = "SELECT
                                complaints.complaints_id, complaints.complaints_details,
                                post_information.post_description, 
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
