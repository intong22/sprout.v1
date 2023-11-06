<?php
    include "connection.php";

    //populate table
    function displayTable()
    {
        include "connection.php";

        $get_data = "SELECT
                        saved.account_id, saved.plant_sale_id,
                        plant_sale.plant_name, plant_sale.plant_price, 
                        plant_sale_img_rate.sale_image,
                        user_account.account_firstname, user_account.account_lastname
                    FROM
                        saved
                    INNER JOIN
                        plant_sale ON saved.plant_sale_id = plant_sale.plant_sale_id 
                    INNER JOIN 
                        user_account ON saved.account_id = user_account.account_id
                    INNER JOIN 
                        plant_sale_img_rate ON plant_sale.plant_sale_id = plant_sale_img_rate.plant_sale_id
                    WHERE
                        saved.plant_sale_id IS NOT NULL
                    AND
                        user_account.account_id =
                        (
                        SELECT 
                             account_id
                        FROM
                            user_account
                        WHERE
                            account_email = '" . $_SESSION["username"] . "'
                        )
                    
                    GROUP BY
                        plant_sale_img_rate.plant_sale_id";
        
        $exec = mysqli_query($con, $get_data);

        if(mysqli_num_rows($exec) > 0)
        {
            echo"<table id='plants'>";
            while($sale_details = mysqli_fetch_assoc($exec))
            {
                populateTable($sale_details);
            }
            echo"</table>";
        }
    }

    //display table
    function populateTable($populate)
    {
        echo"<tr style='height: 10%'>
                <td class='shopName'><i class='bx bx-store-alt' ></i>".$populate["account_firstname"]." ".$populate["account_lastname"]."</td>
                <td class='imgtbl'>";
                //display default if no plant image is set
                if($populate["sale_image"])
                {
                    echo"       <img src='data:image/jpeg;base64,".base64_encode($populate["sale_image"])."' class='plantimg' alt='Item image' style='height:100px;width:100px;' />";
                }
                else
                {
                    echo "<img src='../assets/logo.png' class='plantimg' alt='Plant image' />";
                }     
        echo"        </td>
                <td><span style='font-weight:bold;'>".$populate["plant_name"]."</span><br/><span>Order Total: ₱ ".$populate["plant_price"]."</span></td>
                <td>
                    <i class='fa fa-star'  data-index='0'></i>
                    <i class='fa fa-star' data-index='1'></i>
                    <i class='fa fa-star' data-index='2'></i>
                    <i class='fa fa-star' data-index='3'></i>
                    <i class='fa fa-star' data-index='4'></i>
                </td>
                <td class='iconCenter'><button class='button'>Rate</button></td>
            </tr>";
    }


?>