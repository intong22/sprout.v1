<?php

    include "connection.php";

    //count number of complaints
    $count = "SELECT
                    complaints_id
                FROM
                    complaints ";
        
    $total = mysqli_num_rows(mysqli_query($con, $count));

?>