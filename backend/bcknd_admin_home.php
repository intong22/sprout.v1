<?php
    include "connection.php";

    if(isset($_POST["btnSubmit"]))
    {
        $plant_name = mysqli_real_escape_string($con, $_POST["plant_name"]);
        $genus_name = mysqli_real_escape_string($con, $_POST["genus_name"]);
        $plant_soil_recco = mysqli_real_escape_string($con, $_POST["plant_soil_recco"]);
        $plant_water_recco = mysqli_real_escape_string($con, $_POST["plant_water_recco"]);
        $plant_sunlight_recco = mysqli_real_escape_string($con, $_POST["plant_sunlight_recco"]);
        $plant_care_tips = mysqli_real_escape_string($con, $_POST["plant_care_tips"]);

        $plant_category = mysqli_real_escape_string($con, $_POST["plant_category"]);
        $plant_details = mysqli_real_escape_string($con, $_POST["plant_details"]); 
                
        $insert_plant = "INSERT INTO
                            plant(plant_name, plant_genus_name, plant_category, plant_soil_recco, plant_water_recco, plant_sunlight_recco, plant_care_tips, plant_details)
                        VALUES
                            ('".$plant_name."', '".$genus_name."', 
                            '".$plant_category."', '".$plant_soil_recco."', '".$plant_water_recco."', '".$plant_sunlight_recco."', '".$plant_care_tips."', '".$plant_details."')";

        mysqli_query($con, $insert_plant);

        if(isset($_FILES["plant_image"]) && count($_FILES["plant_image"]["error"]) > 0) {
            foreach($_FILES["plant_image"]["error"] as $key => $error) {
                if ($error == 0) 
                {
                    $image = addslashes(file_get_contents(mysqli_real_escape_string($con,$_FILES["plant_image"]["tmp_name"][$key])));

                    $insert_image = "INSERT INTO
                                        plant_images(plant_id, plant_image)
                                    VALUES
                                        (LAST_INSERT_ID(), '".$image."')";
                    
                    mysqli_query($con, $insert_image);
                }
            }

            // echo"<script>
            //         alert('Successfully added to database.');
            //         window.location.href = 'admin_home.php';
            //     </script>"; 
        }
    }
?>