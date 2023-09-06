<?php
    include "connection.php";

    if(isset($_POST["btnSignup"]))
    {

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpass = $_POST["confirmpass"];

        $insertQuery = "insert into 
                            user_account()";

    }

?>