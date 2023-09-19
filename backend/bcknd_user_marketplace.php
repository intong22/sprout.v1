<?php

    include "connection.php";

    //display
    function display()
    {
        include "connection.php";

        //get the plant_sale_id
        $query = "select
                    plant_sale_id
                from
                    plant_sale";

        $get_id = mysqli_query($con, $query);

        if(mysqli_num_rows($get_id) > 0)
        {
            while($id = mysqli_fetch_assoc($get_id))
            {
                echo "PLANT SALE ID: ".$id["plant_sale_id"]."   ";

                //check if plant image is added
                //NOT YET FINAL
                $plant_image_isset = "select 
                                            plant_image
                                        from
                                            plant_sale 
                                        where
                                            plant_image is not null
                                        and
                                            plant_sale_id = ".$id["plant_sale_id"]." ";

                $check = mysqli_query($con, $plant_image_isset);

                if(mysqli_num_rows($check) > 0)
                {
                    //image is set
                    $flag = true;
                }
                else
                {
                    //image is not set
                    $flag = false;
                }
                //echo "<p>FLAG RESULT: ".$flag."</p>";
            }
        }

        //get plant card data
        $query = "select
                    plant_sale.plant_name, plant_sale.plant_image, plant_sale.plant_image_default, plant_sale.plant_type, plant_sale.plant_price, user_account.account_firstname, user_account.account_lastname
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
                //dipslay default if no plant image is set
                if($flag == true)
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
                echo"           </div>";
                echo"   </div>";
                echo"</div>";
            }
        }
    }

?>