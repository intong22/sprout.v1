<?php

    include "connection.php";

    //get id of user
    $getID = "SELECT
                    account_id
                FROM
                    user_account
                WHERE
                    account_email = '".$_SESSION["username"]."'";
    
    $id = mysqli_query($con, $getID);

    $account_id = mysqli_fetch_assoc($id);

    //get id_to
    $get_idto = "SELECT
                        id_to
                    FROM
                        messaging
                    WHERE
                        account_id = ".$account_id["account_id"]." ";

    $idto = mysqli_query($con, $get_idto);

    $total = 0;
    if(mysqli_num_rows($idto) > 0 || mysqli_num_rows($id) > 0)
    {
        $id_to = mysqli_fetch_assoc($idto);

        //count number of messages
        $count = "SELECT
                        message_read
                    FROM
                        messaging
                    WHERE
                        message_read = 0
                    AND
                        (account_id = ".$account_id["account_id"]."
                            OR
                        id_to = ".$account_id["account_id"].") ";
        
        $total = mysqli_num_rows(mysqli_query($con, $count));
    }

    //count number of added to cart
    $count_cart = "SELECT
                    plant_sale_id
                FROM
                    saved
                WHERE
                    account_id = ".$account_id["account_id"]." 
                AND
                    plant_sale_id IS NOT NULL";
    
    $total_cart = mysqli_num_rows(mysqli_query($con, $count_cart));

    //add item
    if(isset($_POST["btnAddItem"]))
    {
        $plant_name = mysqli_real_escape_string($con, $_POST["plant_name"]);
        // $plant_type = $_POST["plant_type"];
        $description = mysqli_real_escape_string($con, $_POST["description"]);
        $price = mysqli_real_escape_string($con, $_POST["price"]);

        $cat = $_POST["category"];
        $category = implode(",", $cat);


        $query = "INSERT INTO 
                        plant_sale(account_id, plant_name, category, plant_description, plant_price)
                    VALUES
                        (".$account_id["account_id"].", '".$plant_name."', '".$category."', '".$description."', '".$price."')";
        
        mysqli_query($con, $query);

        //check if post image is added
        if(isset($_FILES["plant_sale_image"]) && count($_FILES["plant_sale_image"]["error"]) > 0) 
        {
            foreach($_FILES["plant_sale_image"]["error"] as $key => $error) 
            {
                if ($error == 0) 
                {
                    $plant_sale_image = addslashes(file_get_contents($_FILES["plant_sale_image"]["tmp_name"][$key]));

                    $insert_images = "INSERT INTO
                                            plant_sale_images(plant_sale_id, account_id, sale_image)
                                        VALUES
                                            (LAST_INSERT_ID(), ".$account_id["account_id"].", '".$plant_sale_image."')";

                    mysqli_query($con, $insert_images);
                }
            }
        }

    }

    //search
    function searchMarket()
    {
        include "connection.php";

        if(isset($_GET["searchInput"]))
        {
            $searchInput = mysqli_real_escape_string($con, $_GET["searchInput"]);

            $searchQuery = "SELECT
                                plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.category, plant_sale.plant_price, 
                                plant_sale_images.sale_image,
                                user_account.account_firstname, user_account.account_lastname
                            FROM
                                plant_sale 
                            INNER JOIN
                                user_account ON plant_sale.account_id = user_account.account_id
                            INNER JOIN
                                plant_sale_images ON plant_sale.plant_sale_id = plant_sale_images.plant_sale_id
                            WHERE
                                account_firstname LIKE '%$searchInput%'
                            OR
                                account_lastname LIKE '%$searchInput%'
                            OR
                                plant_name LIKE '%$searchInput%' 
                            OR
                                category LIKE '%$searchInput%'
                            OR 
                                plant_description LIKE '%$searchInput%'
                            GROUP BY
                                plant_sale_images.plant_sale_id";
            
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

    //filter categories
    function categories()
    {
        $category = ""; // default empty category

        // Check category
        if (isset($_POST["btnPlants"])) {
            $category = "plant";
        } else if (isset($_POST["btnSoil"])) {
            $category = "soil";
        } else if (isset($_POST["btnSeeds"])) {
            $category = "seed";
        } else if (isset($_POST["btnPots"])) {
            $category = "pot";
        } else if (isset($_POST["btnTools"])) {
            $category = "tool";
        } else if (isset($_POST["btnDecor"])) {
            $category = "decor";
        } else if (isset($_POST["btnFood"])) {
            $category = "food";
        }
        else
        {
            displayDeflt();
        }

        filterCategory($category);
    }

    //data by category
    function filterCategory($category)
    {
        include "connection.php";

        $getCategory = "SELECT
                    plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.category, plant_sale.plant_price, 
                    plant_sale_images.sale_image,
                    user_account.account_id, user_account.account_firstname, user_account.account_lastname
                FROM
                    plant_sale 
                INNER JOIN 
                    user_account ON plant_sale.account_id = user_account.account_id
                INNER JOIN 
                    plant_sale_images ON plant_sale.plant_sale_id = plant_sale_images.plant_sale_id
                WHERE
                    FIND_IN_SET('".$category."', category) > 0
                GROUP BY
                    plant_sale_images.plant_sale_id";

        $exec = mysqli_query($con, $getCategory);

        if (mysqli_num_rows($exec) > 0) {
            while($plant_details = mysqli_fetch_assoc($exec))
            {
                populate($plant_details);
            }
        }
    }

    //display function
    function displayDeflt()
    {
        include "connection.php";
        
        //get plant card data
        $query = "SELECT
                    plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.category, plant_sale.plant_price, 
                    plant_sale_images.sale_image,
                    user_account.account_id, user_account.account_firstname, user_account.account_lastname
                FROM
                    plant_sale 
                INNER JOIN 
                    user_account ON plant_sale.account_id = user_account.account_id
                INNER JOIN 
                    plant_sale_images ON plant_sale.plant_sale_id = plant_sale_images.plant_sale_id
                GROUP BY
                    plant_sale_images.plant_sale_id";

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
        include "connection.php";

        global $account_id;

        //get rating
        $get_rating = "SELECT
                            ROUND(AVG(sale_rating), 1) AS sale_rating
                        FROM
                            plant_sale_rating
                        WHERE
                            plant_sale_id = ".$plant_details["plant_sale_id"]." ";

        $rate = mysqli_query($con, $get_rating);

        if(mysqli_num_rows($rate) > 0)
        {
            while($rating = mysqli_fetch_assoc($rate))
            {
                $sale_rating = $rating["sale_rating"];
            }
        }

        echo"<div class='col-sm-3 mt-4'>";
        echo"   <div class='card' style='border-radius: 3%; width:100%'>";
        //display default if no plant image is set
        if($plant_details["sale_image"])
        {
            echo"<img src='data:image/jpeg;base64,".base64_encode($plant_details["sale_image"])."' class='plantimg' alt='Plant image' style='height: 30vh;' />";
        }
        else
        {
            echo"<img src='../assets/logo.png' class='plantimg' alt='Plant image' style='height: 30vh;'/>";
        }
        echo"<a href='user_see_plant.php?plant_sale_id=".$plant_details["plant_sale_id"]."&account_id=".$plant_details["account_id"]."' style='text-decoration: none; color: #45474B'>";
        echo"           <div class='card-body'>";
        echo"               <h5 class='card-title'>".$plant_details["plant_name"]."</h5>";
                //Product Price
        echo"                   <div class='card-price'>";
        echo"                       <span class='text-start'>".$plant_details["account_firstname"]." ".$plant_details["account_lastname"]."</span>";
        echo"<br>";
        echo"                       <span class='text-end'>₱ ".number_format($plant_details["plant_price"], 2)."</span><br>";  
        
        //rating
        if(empty($sale_rating))
        {
            echo"<i class='fa fa-star' style='color: #FFB000'></i> &nbspNo rating yet.";
        }
        else
        {
            echo"<i class='fa fa-star' style='color: #FFB000'></i> &nbsp".$sale_rating."/5.0";
        }
        
        echo"</a>";          
        echo"                   </div>";
                //Add to cart 
        echo"<br>";
        if($account_id["account_id"] == $plant_details["account_id"])
        {
            echo"<form method='POST'>";
            echo"         <a href='user_edit_marketplace.php?plant_sale_id=".$plant_details["plant_sale_id"]."' name='btnEditItem' class='button'
            style='background-color:#1E5631; color:white; padding:10px;'> Edit</a>
            <button type='submit' style='background-color: transparent; border: none; padding:10px;' name='btnDelete' value=".$plant_details["plant_sale_id"].">Delete</button>";
            echo"</form>";
        }
        else
        {
            echo"<form method='POST'>";
            echo"<button type='submit' name='btnAddCart' class='btn btn-primary' style='background-color:#1E5631; color:white; padding:10px' value=".$plant_details["plant_sale_id"]." >Add To Cart</button>";
            echo"</form>";
        }

        echo"           </div>";
        echo"   </div>";
        echo"</div>";
    }

    //delete item
    if(isset($_POST["btnDelete"]))
    {
        $plant_sale_id = $_POST["btnDelete"];

        $del = "DELETE FROM
                    plant_sale
                WHERE
                    plant_sale_id = ".$plant_sale_id." ";
        
        mysqli_query($con, $del);
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
                            account_email = '".$_SESSION["username"]."')
                    AND
                        plant_sale_id = ".$plant_sale_id." ";

        $exec = mysqli_query($con, $check);

        if(mysqli_num_rows($exec) > 0)
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
                        ((SELECT account_id FROM user_account WHERE account_email = '" . $_SESSION["username"] . "'), ".$plant_sale_id.") ";

            mysqli_query($con, $query);

            // echo"<center>".$plant_sale_id."</center>";
            echo"<script>
                    alert('Added to cart.');
                    window.location.href = 'user_marketplace.php';
                </script>    ";
        }
    }
?>

