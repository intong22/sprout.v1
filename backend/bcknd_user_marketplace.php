<?php

    include "connection.php";

    //search
    function searchMarket()
    {
        include "connection.php";

        if(isset($_GET["searchMarket"]))
        {
            $searchInput = $_GET["searchInput"];

            $searchQuery = "SELECT
                                plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_image, plant_sale.plant_type, plant_sale.plant_price, 
                                user_account.account_firstname, user_account.account_lastname
                            FROM
                                plant_sale INNER JOIN user_account 
                            ON
                                plant_sale.account_id = user_account.account_id
                            WHERE
                                account_firstname LIKE '%$searchInput%'
                            OR
                                account_lastname LIKE '%$searchInput%'
                            OR
                                plant_name LIKE '%$searchInput%' 
                            OR
                                plant_type LIKE '%$searchInput%'
                            OR 
                                plant_description LIKE '%$searchInput%' ";
            
            $exec = mysqli_query($con, $searchQuery);
            
            if(mysqli_num_rows($exec) > 0)
            {
                while($plant_details = mysqli_fetch_assoc($exec))
                {
                    populate($plant_details);
                }   
            }
            else
            {
                echo"<h4>No item/s found.</h4>";
            }
        }
    }

    //display function
    function displayDeflt()
    {
        include "connection.php";
        
        //get plant card data
        $query = "SELECT
                    plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_image, plant_sale.plant_type, plant_sale.plant_price, 
                    user_account.account_firstname, user_account.account_lastname
                FROM
                    plant_sale INNER JOIN user_account 
                ON
                    plant_sale.account_id = user_account.account_id";

        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            while($plant_details = mysqli_fetch_assoc($exec))
            {
                populate($plant_details);
            }
        }

    }

    //function to populate the card
    function populate($plant_details)
    {
        echo"<div class='col-sm-3 mt-4'>";
        echo"   <div class='card'>";
        //display default if no plant image is set
        if($plant_details["plant_image"])
        {
            echo"       <img src='data:image/jpeg;base64,".base64_encode($plant_details["plant_image"])."' class='plantimg' alt='Plant image' />";
        }
        else
        {
            echo "<img src='../assets/logo.png' class='plantimg' alt='Plant image'/>";
        }
        echo"           <div class='card-body'>";
        echo"               <h5 class='card-title'>".$plant_details["plant_name"]."</h5>";
                //Product Price
        echo"                   <div class='card-price'>";
        echo"                       <span class='text-start'>".$plant_details["account_firstname"]." ".$plant_details["account_lastname"]."</span>";
        echo"                       <span class='text-end'>₱".$plant_details["plant_price"]."</span>";                
        echo"                   </div>";
                //Add to cart 
        echo"<form method='POST'>";
        echo"                   <button type='submit' name='btnAddCart' class='btn btn-primary' value=" . $plant_details["plant_sale_id"] . " >Add To Cart</button>";
        echo"</form>";

        echo"           </div>";
        echo"   </div>";
        echo"</div>";
    }

    //user adds to cart
    if(isset($_POST["btnAddCart"]))
    {
        $plant_sale_id = $_POST["btnAddCart"];

        //check if already added to cart
        $check = "SELECT
                        plant_sale_id
                    FROM
                        saved
                    WHERE
                        account_id =
                        (SELECT
                            account_id
                        FROM
                            user_account
                        WHERE
                            account_email = '".$_SESSION["username"]."')";
        
        if(mysqli_num_rows(mysqli_query($con, $check)) > 0)
        {
            echo"<script>
                    alert('Already added to cart.');
                    window.location.href = 'user_marketplace.php';
                </script>";
        }
        else
        {
            $query = "INSERT INTO saved (account_id, plant_sale_id)
                        VALUES
                        ((SELECT account_id FROM user_account WHERE account_email = '" . $_SESSION["username"] . "'), " . $plant_sale_id . ")";

            mysqli_query($con, $query);

            // echo"<center>".$plant_sale_id."</center>";
            echo"<script>
                    alert('Added to cart.');
                    window.location.href = 'user_marketplace.php';
                </script>    ";
        }
    }
?>

