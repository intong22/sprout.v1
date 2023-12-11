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
                        (".$account_id["account_id"].", '".$plant_name."', '".$category."' '".$description."', '".$price."')";
        
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

    //search
    function searchMarket()
    {
        include "connection.php";

        if(isset($_GET["searchInput"]))
        {
            $searchInput = $_GET["searchInput"];

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

    //display function
    function displayDeflt()
    {
        include "connection.php";

        global $account_id;
        
        //get plant card data
        $query = "SELECT
                    plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.category, plant_sale.plant_price, 
                    plant_sale_images.sale_image,
                    user_account.account_id, user_account.account_firstname, user_account.account_lastname
                FROM
                    plant_sale 
                INNER JOIN 
                    user_account ON plant_sale.account_id = user_account.account_id
                LEFT JOIN 
                    plant_sale_images ON plant_sale.plant_sale_id = plant_sale_images.plant_sale_id
                WHERE
                    user_account.account_id = ".$account_id["account_id"]."
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
            echo"       <img src='data:image/jpeg;base64,".base64_encode($plant_details["sale_image"])."' class='plantimg' alt='Plant image' style='height: 30vh;' />";
        }
        else
        {
            echo "<img src='../assets/logo.png' class='plantimg' alt='Plant image' />";
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

        echo"<form method='POST'>";
        echo"         <a href='user_edit_marketplace.php?plant_sale_id=".$plant_details["plant_sale_id"]."' name='btnEditItem' class='button'
        style='background-color:#1E5631; color:white; padding:10px;'> Edit</a>
        <button type='submit' style='background-color: transparent; border: none; padding:10px;' name='btnDelete' value=".$plant_details["plant_sale_id"].">Delete</button>";
        echo"</form>";

        echo"           </div>";
        echo"   </div>";
        echo"</div>";
    }

 
    //chart data
    $data = array();
    $count = 0;

    $chart_query = "SELECT 
                        SUM(plant_price) AS plant_price, 
                        MONTH(sold.date_sold) AS date_sold, YEAR(sold.date_sold) AS year_sold
                    FROM
                        plant_sale
                    INNER JOIN
                        sold ON plant_sale.plant_sale_id = sold.plant_sale_id
                    WHERE
                        sold.sold_by = ".$account_id["account_id"]."
                    AND
                        YEAR(sold.date_sold) = YEAR(NOW())
                    GROUP BY
                        MONTH(date_sold)";

    $result = mysqli_query($con, $chart_query);    
    
    if(mysqli_num_rows($result) > 0)
    {
        while($res = mysqli_fetch_array($result))
        {
            switch($res["date_sold"])
            {
                case 1: $month = "Jan"; break;
                case 2: $month = "Feb"; break; 
                case 3: $month = "Mar"; break;
                case 4: $month = "Apr"; break;
                case 5: $month = "May"; break;
                case 6: $month = "Jun"; break;
                case 7: $month = "Jul"; break;
                case 8: $month = "Aug"; break;
                case 9: $month = "Sep"; break;
                case 10: $month = "Oct"; break;
                case 11: $month = "Nov"; break;
                case 12: $month = "Dec"; break;
            }
            $data[$count]["label"] = $month;
            $data[$count]["y"] = $res["plant_price"];
            $count++;
            $year = $res["year_sold"];
        }
    }
    else
    {
        $data = array( array("label" => "Your sales will display once an item has been sold.", "y" => 0) );
    }

    //table for sale summary
    function salesSummary()
    {
        include "connection.php";

        global $account_id;
        // global $month;

        if(isset($_POST["btnMonth"])) 
        {
            $btnMonth = $_POST["btnMonth"];
            
            switch($btnMonth) 
            {
                case 1: $month_sold = "January"; break;
                case 2: $month_sold = "February"; break;
                case 3: $month_sold = "March"; break;
                case 4: $month_sold = "April"; break;
                case 5: $month_sold = "May"; break;
                case 6: $month_sold = "June"; break;
                case 7: $month_sold = "July"; break;
                case 8: $month_sold = "August"; break;
                case 9: $month_sold = "September"; break;
                case 10: $month_sold = "October"; break;
                case 11: $month_sold = "November"; break;
                case 12: $month_sold = "December"; break;
                default: $month_sold = "Invalid Month"; break; // Optional: Handle invalid month
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
                default: $month = "Invalid Month"; break; // Optional: Handle invalid month
            }

            //get item info
            $query = "SELECT 
                            plant_sale.plant_name, plant_sale.plant_price,
                            COUNT(sold.plant_sale_id) AS total, 
                            sold.date_sold
                        FROM
                            plant_sale
                        LEFT JOIN
                            sold ON sold.plant_sale_id = plant_sale.plant_sale_id
                        WHERE
                            sold.plant_sale_id = plant_sale.plant_sale_id
                        AND
                            sold.sold_by = ".$account_id["account_id"]." 
                        AND
                            MONTH(date_sold) = '".$month."'
                        GROUP BY
                            sold.date_sold";
        }
        else
        {
            $month_sold="Whole year";

            //get item info
            $query = "SELECT 
                            plant_sale.plant_name, plant_sale.plant_price,
                            COUNT(sold.plant_sale_id) AS total, 
                            sold.date_sold
                        FROM
                            plant_sale
                        LEFT JOIN
                            sold ON sold.plant_sale_id = plant_sale.plant_sale_id
                        WHERE
                            sold.plant_sale_id = plant_sale.plant_sale_id
                        AND
                            sold.sold_by = ".$account_id["account_id"]." 
                        AND
                            YEAR(date_sold) = YEAR(NOW())
                        GROUP BY
                            sold.date_sold";
        }
        
        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            $total_sales = 0;
            echo"<table border= 1>
                <tr>
                    <th colspan='5' center>Sales Summary: ".$month_sold."</th>
                </tr>
                <tr>
                    <th>Item</th>
                    <th>Date sold</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>";
            while($data = mysqli_fetch_assoc($exec))
            {
                $item_total = $data["plant_price"] * $data["total"]; 
                $total_sales += $item_total; 

                echo"<tr>
                        <td>".$data["plant_name"]."</td>
                        <td>".$data["date_sold"]."</td>
                        <td>₱ ".number_format($data["plant_price"], 2)."</td>
                        <td>".$data["total"]."</td>
                        <td>₱ ".number_format($item_total, 2)."</td>
                    </tr>";
            }
            echo"<tr>
                    <td colspan='4'><b>Total Sales:</b></td>
                    <td><b>₱ ".number_format($total_sales, 2)."</b></td>
                </tr>
            </table>";
        }
        else
        {
            echo"<br><br><center><h3>No items sold for ".$month_sold."</h3></center><br><br>";
        }
    }
?>