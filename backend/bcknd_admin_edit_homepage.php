<?php

    include "connection.php";

    //get data
    if(isset($_GET["plant_id"]))
    {
        $plant_id = $_GET["plant_id"];

        $get_info = "SELECT * FROM
                        plant
                    WHERE
                        plant_id = ".$plant_id." ";
        
        $exec = mysqli_query($con, $get_info);

        if(mysqli_num_rows($exec) > 0)
        {
            while($data = mysqli_fetch_assoc($exec))
            {
                $plant_name = $data["plant_name"];
                $genus_name = $data["plant_genus_name"];
                $category = $data["plant_category"];
                $soil_recco = $data["plant_soil_recco"];
                $water_recco = $data["plant_water_recco"];
                $sunlight_recco = $data["plant_sunlight_recco"];
                $tips = $data["plant_care_tips"];
                $details = $data["plant_details"];
            }
        }
    }

    //display
    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
        {
            while($plant = mysqli_fetch_assoc($exec))
            {
                echo"<div class='plant'>";
                echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='plant image' class='plant-image'>";
                echo"</div>";
            }        
        }
        else
        {
            echo"<img src='../assets/logo.png' alt='Plant image' style='width:50%; height:10%; align-items:center; padding: 10px;'>";
        }
    }

    //images
    function displayImages()
    {
        include "connection.php";

        $plant_id = $_GET["plant_id"];

        //get plants
        $query = "SELECT 
                       plant_image
                    FROM
                        plant_images
                    WHERE
                        plant_id = ".$plant_id." "; 
                    
        $exec = mysqli_query($con, $query);
        
        display($exec);
    }

    //remove photo
    if(isset($_POST["btnRemovePhoto"]))
    { 
        $plant_id = $_GET["plant_id"];

        $remove = "DELETE FROM 
                        plant_images
                    WHERE
                        plant_id = ".$plant_id." ";
        
        mysqli_query($con, $remove);
    }

    //update
    if(isset($_POST["btnUpdate"]))
    {
        $plant_id = $_GET["plant_id"];
        $plant_name = mysqli_real_escape_string($con, $_POST["plant_name"]);
        $genus_name = mysqli_real_escape_string($con, $_POST["genus_name"]);
        $category = mysqli_real_escape_string($con, $_POST["plant_type"]);
        $soil_recco = mysqli_real_escape_string($con, $_POST["soil_recco"]);
        $water_recco = mysqli_real_escape_string($con, $_POST["water_recco"]);
        $sunlight_recco = mysqli_real_escape_string($con, $_POST["sunlight_recco"]);
        $tips = mysqli_real_escape_string($con, $_POST["tips"]);
        $details = mysqli_real_escape_string($con, $_POST["details"]);

        $update = "UPDATE
                        plant
                    SET
                        plant_name = '".$plant_name."',
                        plant_genus_name = '".$genus_name."',
                        plant_category = '".$category."',
                        plant_soil_recco = '".$soil_recco."',
                        plant_water_recco = '".$water_recco."',
                        plant_sunlight_recco = '".$sunlight_recco."',
                        plant_care_tips = '".$tips."',
                        plant_details = '".$details."' 
                    WHERE
                        plant_id = ".$plant_id." ";

        mysqli_query($con, $update);

        //check if image is added
        if(isset($_FILES["add_images"]) && count($_FILES["add_images"]["error"]) > 0) 
        {
            for($i = 0; $i < count($_FILES["add_images"]["name"]); $i++)
            {
                $error = $_FILES["add_images"]["error"][$i];
                if ($error == 0) 
                {
                    $plant_image = addslashes(file_get_contents($_FILES["add_images"]["tmp_name"][$i]));

                    $update_images = "INSERT INTO
                                    plant_images(plant_id, plant_image) 
                                VALUES
                                    (".$plant_id.", '".$plant_image."') ";

                    mysqli_query($con, $update_images);
                }
            }
        }

        echo"<script>
                alert('Item updated successfully.');
                window.location.href = 'admin_edit_homepage.php?plant_id=".$plant_id."';
            </script>";
    }

?>