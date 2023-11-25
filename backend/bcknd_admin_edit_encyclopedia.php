<?php

    include "connection.php";

    //get data
    if(isset($_GET["plant_id"]))
    {
        $plant_id = $_GET["plant_id"];

        $get_data = "SELECT * FROM
                        plant_encyclopedia
                    WHERE
                        plant_id = ".$plant_id." ";
        
        $exec = mysqli_query($con, $get_data);

        if(mysqli_num_rows($exec) > 0)
        {
            while($data = mysqli_fetch_assoc($exec))
            {
                $plant_name = $data["plant_name"];
                $plant_genus_name = $data["plant_genus_name"];
                $common_name = $data["common_name"];
                $plant_type = $data["plant_type"];
                $light = $data["light"];
                $height = $data["height"];
                $width =  $data["width"];
                $flower_color = $data["flower_color"];
                $foliage_color = $data["foliage_color"];
                $season_ft = $data["season_ft"];
                $special_ft = $data["special_ft"];
                $zones = $data["zones"];
                $propagation = $data["propagation"];
                $plant_description = $data["plant_description"];
            }
        }
    }

    //get images
    function encycImages()
    {
        include "connection.php";

        $plant_id = $_GET["plant_id"];

        $get = "SELECT
                    plant_image
                FROM
                    plant_encyc_images
                WHERE
                    plant_id = ".$plant_id." ";

        $exec = mysqli_query($con, $get);

        if(mysqli_num_rows($exec) > 0)
        {
            while($images = mysqli_fetch_assoc($exec))
            {
                echo"<img src='data:image/jpeg;base64,".base64_encode($images["plant_image"])."' alt='Plant image' class='plant-image'>";
            }
        }
        else
        {
            echo"<img src='../assets/logo.png' alt='Plant image' class='plant-image'><br>";
        }
    }

    //update
    if(isset($_POST["btnUpdate"]))
    {
        $plant_id = $_GET["plant_id"];
        $plant_name = mysqli_real_escape_string($con, $_POST["plant_name"]);
        $plant_description = mysqli_real_escape_string($con, $_POST["description"]);
        $plant_genus_name = mysqli_real_escape_string($con, $_POST["genus_name"]);
        $common_name = mysqli_real_escape_string($con, $_POST["common_name"]);
        $plant_type = mysqli_real_escape_string($con, $_POST["plant_type"]);
        $light = mysqli_real_escape_string($con, $_POST["light"]);
        $height = mysqli_real_escape_string($con, $_POST["height"]);
        $width =  mysqli_real_escape_string($con, $_POST["width"]);
        $flower_color = mysqli_real_escape_string($con, $_POST["flower_color"]);
        $foliage_color = mysqli_real_escape_string($con, $_POST["foliage_color"]);
        $season_ft = mysqli_real_escape_string($con, $_POST["season_ft"]);
        $special_ft = mysqli_real_escape_string($con, $_POST["special_ft"]);
        $zones = mysqli_real_escape_string($con, $_POST["zones"]);
        $propagation = mysqli_real_escape_string($con, $_POST["propagation"]);

        $update = "UPDATE
                        plant_encyclopedia
                    SET
                        plant_name = '".$plant_name."',
                        plant_description = '".$plant_description."',
                        plant_genus_name = '".$plant_genus_name."',
                        common_name = '".$common_name."',
                        plant_type = '".$plant_type."',
                        light = '".$light."',
                        height = '".$height."',
                        width = '".$width."',
                        flower_color = '".$flower_color."',
                        foliage_color = '".$foliage_color."',
                        season_ft = '".$season_ft."',
                        special_ft = '".$special_ft."',
                        zones = '".$zones."',
                        propagation = '".$propagation."' 
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
                                    plant_encyc_images(plant_id, plant_image) 
                                VALUES
                                    (".$plant_id.", '".$plant_image."') ";

                    mysqli_query($con, $update_images);
                }
            }
        }

        echo"<script>
                alert('Item updated successfully.');
                window.location.href = 'admin_edit_encyclopedia.php?plant_id=".$plant_id."';
            </script>";
    }

    //remove photo
    if(isset($_POST["btnRemovePhoto"]))
    {
        $plant_id = $_GET["plant_id"];

        $remove = "DELETE FROM 
                        plant_encyc_images
                    WHERE
                        plant_id = ".$plant_id." ";
        
        mysqli_query($con, $remove);
    }
?>