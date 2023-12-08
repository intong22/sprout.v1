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

    //display sale images
    function displayImages()
    {
        include "connection.php";
        $counter = 0;

        $plant_sale_id = $_GET["plant_sale_id"];

        $details = "SELECT
                        sale_image
                    FROM
                        plant_sale_images
                    WHERE
                        plant_sale_id = ".$plant_sale_id." 
                    AND
                        sale_image IS NOT NULL";
        
        $exec = mysqli_query($con, $details);

        if(mysqli_num_rows($exec) > 0)
        {
            // saleImages($sale_details);
           
            while($image = mysqli_fetch_assoc($exec))
            {
                $counter++;
                echo"<img src='data:image/jpeg;base64,".base64_encode($image["sale_image"])."' alt='Plant image' style='width:50%; height:10%; align-items:center; padding: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);'>";
            }
        }
        else
        {
            echo"<img src='../assets/logo.png' alt='Plant image' style='width:50%; height:10%; align-items:center; padding: 10px;'>";
        }
    }

    //remove photos
    if(isset($_POST["btnRemovePhoto"]))
    {
        $plant_sale_id = $_GET["plant_sale_id"];

        $remove = "DELETE FROM 
                        plant_sale_images
                    WHERE
                        plant_sale_id = ".$plant_sale_id." ";
        
        mysqli_query($con, $remove);
    }

    //update sale info
    if(isset($_POST["btnUpdate"]))
    {
        $plant_sale_id = $_GET["plant_sale_id"];
        $plant_name = mysqli_real_escape_string($con, $_POST["plant_name"]);
        // $plant_type = $_POST["plant_type"];
        $plant_description = mysqli_real_escape_string($con, $_POST["description"]);
        $plant_price = mysqli_real_escape_string($con, $_POST["price"]);

        $update_plant_sale = "UPDATE
                                    plant_sale
                                SET
                                    plant_name = '".$plant_name."',
                                    plant_description = '".$plant_description."',
                                    plant_price = ".$plant_price." 
                                WHERE
                                    plant_sale_id = ".$plant_sale_id." ";
        
        mysqli_query($con, $update_plant_sale);
        
        //check if image is added
        if(isset($_FILES["add_images"]) && count($_FILES["add_images"]["error"]) > 0) 
        {
            for($i = 0; $i < count($_FILES["add_images"]["name"]); $i++)
            {
                $error = $_FILES["add_images"]["error"][$i];
                if ($error == 0) 
                {
                    $plant_sale_image = addslashes(file_get_contents($_FILES["add_images"]["tmp_name"][$i]));

                    $update_images = "INSERT INTO
                                    plant_sale_images(plant_sale_id, account_id, sale_image) 
                                VALUES
                                    (".$plant_sale_id.", ".$account_id["account_id"].", '".$plant_sale_image."') ";

                    mysqli_query($con, $update_images);
                }
            }
        }

        echo"<script>
                alert('Item updated successfully.');
                window.location.href = 'user_edit_marketplace.php?plant_sale_id=".$plant_sale_id."';
            </script>";
    }

    //get sale info
    if(isset($_GET["plant_sale_id"]))
    {
        $plant_sale_id = $_GET["plant_sale_id"];

        $query = "SELECT
                    plant_name, plant_type, plant_description, plant_price
                FROM
                    plant_sale
                WHERE
                    plant_sale_id = ".$plant_sale_id." ";

        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec) > 0)
        {
            while($data = mysqli_fetch_assoc($exec))
            {
                $plant_name = $data["plant_name"];
                $description = $data["plant_description"];
                $plant_type = $data["plant_type"];
                $price = number_format($data["plant_price"], 2);
            }
        }
    }
?>