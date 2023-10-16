<?php
    include "connection.php";

    if(isset($_POST["btnSubmit"]))
    {
        $plant_name = $_POST["plant_name"];
        $genus_name = $_POST["genus_name"];
        $common_name = $_POST["common_name"];
        $plant_type = $_POST["plant_type"];
        $light = $_POST["plant_light"];
        $height = $_POST["plant_height"];
        $width = $_POST["plant_width"];
        $flower_color = $_POST["flower_color"];
        $foliage_color = $_POST["foliage_color"];
        $season = $_POST["season_feat"];
        $special_features = $_POST["spec_feat"];
        $zones = $_POST["plant_zone"];
        $propagation = $_POST["propagation"];
        $description = $_POST["description"];

                
        $insert_encyc = "INSERT INTO
                            plant_encyclopedia(plant_name, plant_description, plant_genus_name, common_name, plant_type, light, height, width, flower_color, foliage_color, season_ft, special_ft, zones, propagation)
                        VALUES
                            ('".$plant_name."', '".$description."', '".$genus_name."', '".$common_name."', '".$plant_type."', '".$light."', '".$height."', '".$width."', '".$flower_color."', '".$foliage_color."', '".$season."', '".$special_features."', '".$zones."', '".$propagation."')";

        mysqli_query($con, $insert_encyc);

        if(isset($_FILES["plant_image"]) && count($_FILES["plant_image"]["error"]) > 0) {
            foreach($_FILES["plant_image"]["error"] as $key => $error) {
                if ($error == 0) {
                    $image = addslashes(file_get_contents($_FILES["plant_image"]["tmp_name"][$key]));

                    // echo "Image Size: " . $_FILES["plant_image"]["size"][$key] . "<br>";

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