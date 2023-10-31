<?php
    include "connection.php";

    if(isset($_POST["btnSubmit"]))
    {
        $plant_name = mysqli_real_escape_string($con, $_POST["plant_name"]);
        $genus_name = mysqli_real_escape_string($con, $_POST["genus_name"]);
        $common_name = mysqli_real_escape_string($con, $_POST["common_name"]);
        $plant_type = mysqli_real_escape_string($con, $_POST["plant_type"]);
        $light = mysqli_real_escape_string($con, $_POST["plant_light"]);
        $height = mysqli_real_escape_string($con, $_POST["plant_height"]);
        $width = mysqli_real_escape_string($con, $_POST["plant_width"]);
        $flower_color = mysqli_real_escape_string($con, $_POST["flower_color"]);
        $foliage_color = mysqli_real_escape_string($con, $_POST["foliage_color"]);
        $season = mysqli_real_escape_string($con, $_POST["season_feat"]);
        $special_features = mysqli_real_escape_string($con, $_POST["spec_feat"]);
        $zones = mysqli_real_escape_string($con, $_POST["plant_zone"]);
        $propagation = mysqli_real_escape_string($con, $_POST["propagation"]);
        $description = mysqli_real_escape_string($con,$_POST["description"]);

                
        $insert_encyc = "INSERT INTO
                            plant_encyclopedia(plant_name, plant_description, plant_genus_name, common_name, plant_type, light, height, width, flower_color, foliage_color, season_ft, special_ft, zones, propagation)
                        VALUES
                            ('".$plant_name."', '".$description."', '".$genus_name."', '".$common_name."', '".$plant_type."', '".$light."', '".$height."', '".$width."', '".$flower_color."', '".$foliage_color."', '".$season."', '".$special_features."', '".$zones."', '".$propagation."')";

        mysqli_query($con, $insert_encyc);

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
                    window.location.href = 'admin_create_encyclopedia.php';
                </script>";
        }
    }
?>