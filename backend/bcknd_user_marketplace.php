<?php

    include "connection.php";

    //display function
    function display()
    {
        include "connection.php";
        
        //get plant card data
        $query = "SELECT
                    plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_image, plant_sale.plant_image_default, plant_sale.plant_type, plant_sale.plant_price, user_account.account_firstname, user_account.account_lastname
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
        echo"       <img src='images/heart.svg' class='heart-icon'>";
        //display default if no plant image is set
        if($plant_details["plant_image"])
        {
            echo"       <img src='data:image/jpeg;base64,".base64_encode($plant_details["plant_image"])."' alt='Plant image'>";
        }
        else
        {
            echo"       <img src='data:image/jpeg;base64,".base64_encode($plant_details["plant_image_default"])."' alt='Plant image'>";
        }
        echo"           <div class='card-body'>";
        echo"               <h5 class='card-title'>".$plant_details["plant_name"]."</h5>";
        echo"               <p class='card-text'>Item: ".$plant_details["plant_type"]."</p>";
                //Product Price
        echo"                   <div class='card-price'>";
        echo"                       <span class='text-start'>".$plant_details["account_firstname"]." ".$plant_details["account_lastname"]."</span>";
        echo"                       <span class='text-end'>₱".$plant_details["plant_price"]."</span>";                
        echo"                   </div>";
                
                //for debugging purposes
        echo "Plant ID: ".$plant_details["plant_sale_id"];

        echo"           </div>";
        echo"   </div>";
        echo"</div>";
    }
?>