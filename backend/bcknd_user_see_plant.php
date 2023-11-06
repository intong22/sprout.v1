<?php
    include "connection.php";

    //get details
    if(isset($_GET["plant_sale_id"]))
    {
        $plant_sale_id = $_GET["plant_sale_id"];

        $details = "SELECT
                    plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_type, plant_sale.plant_price, plant_sale.plant_description, 
                    plant_sale_img_rate.sale_image,
                    user_account.account_firstname, user_account.account_lastname
                FROM
                    plant_sale 
                INNER JOIN 
                    user_account ON plant_sale.account_id = user_account.account_id
                INNER JOIN 
                    plant_sale_img_rate ON plant_sale.plant_sale_id = plant_sale_img_rate.plant_sale_id
                WHERE
                    plant_sale.plant_sale_id = ".$plant_sale_id." ";
        
        $exec = mysqli_query($con, $details);

        if(mysqli_num_rows($exec) > 0)
        {
            while($sale_details = mysqli_fetch_assoc($exec))
            {
                $plant_name = $sale_details["plant_name"];
                $description = $sale_details["plant_description"];
                $price = $sale_details["plant_price"];
                $name = $sale_details["account_firstname"]." ".$sale_details["account_lastname"];
            }
        }
    }

    //get rating
        $get_rating = "SELECT
                            ROUND(AVG(sale_rating), 1) AS sale_rating
                        FROM
                            plant_sale_img_rate
                        WHERE
                            plant_sale_id = ".$plant_sale_id." ";

        $rate = mysqli_query($con, $get_rating);

        if(mysqli_num_rows($rate) > 0)
        {
            while($rating = mysqli_fetch_assoc($rate))
            {
                $sale_rating = $rating["sale_rating"];
            }
        }
    
    //get total number of those who rated
    $total = "SELECT
                    COUNT(*) AS sale_rating
                FROM
                    plant_sale_img_rate
                WHERE
                    plant_sale_id = ".$plant_sale_id." 
                AND
                 sale_rating != 0";

    $result = mysqli_query($con, $total);

    if($result && mysqli_num_rows($result) > 0)
    {
        $reviews = mysqli_fetch_assoc($result);
        $total_reviews = $reviews["sale_rating"];
    }

    //display sale images
    function displayImages()
    {
        include "connection.php";
        $counter = 0;

        $plant_sale_id = $_GET["plant_sale_id"];

        $details = "SELECT
                        sale_image
                    FROM
                        plant_sale_img_rate
                    WHERE
                        plant_sale_id = ".$plant_sale_id." 
                    AND
                        sale_image IS NOT NULL";
        
        $exec = mysqli_query($con, $details);

        if(mysqli_num_rows($exec) > 0)
        {
            // saleImages($sale_details);
            echo"<div class='slideshow-container'>";
            while($image = mysqli_fetch_assoc($exec))
            {
                $counter++;
                echo"<div class='mySlides fade'>
                        <img src='data:image/jpeg;base64,".base64_encode($image["sale_image"])."' alt='Plant image' style='width:100%; height:100%; align-items:center; border-radius:0;'>
                    </div>";
            }
            echo"
                <div>
                    <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
                    <a class='next' onclick='plusSlides(1)'>&#10095;</a>
                    <br>
                </div>
                <div style='text-align:center'>";
            for($i = 0; $i < $counter; $i++)
            {
                echo"<span class='dot' onclick='currentSlide(".$i.")'></span>";
            }
            echo"</div>
            </div>";
        }
    }

    //user adds to cart
    if(isset($_POST["btnCart"]))
    {
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
                </script>    ";
        }
    }
?>