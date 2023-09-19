<?php

    include "connection.php";

    //display
    function display($string)
    {
        include "connection.php";

        //get plant data
        $query = "select
                    plant_sale.plant_name, plant_sale.$string, plant_sale.plant_type, plant_sale.plant_price, user_account.account_firstname, user_account.account_lastname
                from
                    plant_sale inner join user_account 
                on
                    plant_sale.account_id = user_account.account_id";

        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            while($plant_details = mysqli_fetch_assoc($exec))
            {
                echo"<div class='col-sm-3 mt-4'>";
                echo"   <div class='card'>";
                echo"       <img src='images/heart.svg' class='heart-icon'>";
                echo"       <img src='data:image/jpeg;base64,".base64_encode($plant_details[$string])."' alt='Plant image'>";
                echo"           <div class='card-body'>";
                echo"               <h5 class='card-title'>".$plant_details["plant_name"]."</h5>";
                echo"               <p class='card-text'>Item: ".$plant_details["plant_type"]."</p>";
                            //Product Price
                echo"                   <div class='card-price'>";
                echo"                       <span class='text-start'>".$plant_details["account_firstname"]." ".$plant_details["account_lastname"]."</span>";
                echo"                       <span class='text-end'>₱ ".$plant_details["plant_price"]."</span>";
                echo"                   </div>";
                echo"           </div>";
                echo"   </div>";
                echo"</div>";
            }
        }
    }
    
    //check if plant image is added
    //NOT YET FINAL
    $deflt_plant_image = "select 
                            plant_image is not null
                        from
                            plant_sale
                        where
                            account_id = '".$_SESSION["account_id"]."' ";

    $check = mysqli_query($con, $deflt_plant_image);

    if(mysqli_num_rows($check) > 0)
    {
        $flag = true;
    }
    else
    {
        $flag = false;
    }

?>