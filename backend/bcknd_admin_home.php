<?php
    include "connection.php";

    if(isset($_POST["btnSubmit"]))
    {
        $plant_name = $_POST["plant_name"];
        $plant_category = $_POST["plant_category"];
        $genus_name = $_POST["genus_name"];
        $plant_information = $_POST["plant_information"];
        $plant_soil_recco = $_POST["plant_soil_recco"];
        $plant_water_recco = $_POST["plant_water_recco"];
        $plant_sunlight_recco = $_POST["plant_sunlight_recco"];
        $plant_care_tips = $_POST["plant_care_tips"];
                
        $insert_plant = "INSERT INTO
                            plant(plant_name, plant_category, plant_genus_name, plant_information, plant_information, plant_soil_recco, plant_water_recco, plant_sunlight_recco, plant_care_tips)
                        VALUES
                            ('".$plant_name."', '".$plant_category."', '".$genus_name."', '".$plant_information."', '".$plant_soil_recco."', '".$plant_water_recco."', '".$plant_sunlight_recco."', '".$plant_care_tips."')";

        mysqli_query($con, $insert_plant);

        if(isset($_FILES["plant_image"]) && count($_FILES["plant_image"]["error"]) > 0) {
            foreach($_FILES["plant_image"]["error"] as $key => $error) {
                if ($error == 0) {
                    $image = addslashes(file_get_contents($_FILES["plant_image"]["tmp_name"][$key]));

                    $insert_image = "INSERT INTO
                                        plant_encyc_images(plant_id, plant_image)
                                    VALUES
                                        (LAST_INSERT_ID(), '".$image."')";
                    
                    mysqli_query($con, $insert_image);
                }
            }

            echo"<script>
                    alert('Successfully added to database.');
                </script>";
        }
    }
?>