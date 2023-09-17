<?php

    $con = mysqli_connect("localhost", "root", "", "sprout");

    if(!$con)
    {
        echo"Database connection failed.";
    }

?>