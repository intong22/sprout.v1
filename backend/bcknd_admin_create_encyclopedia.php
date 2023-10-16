<?php
    include "connection.php";

    if(isset($_POST["btnSubmit"]))
    {
        $genus_name = $_POST["genus_name"];
        $common_name = $_POST["common_name"];
        $plant_type = $_POST["plabt_type"];
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

        if(isset($_FILES["add_image"]) && $_FILES["add_image"]["error"] == 0) 
        {
            $image = addslashes(file_get_contents($_FILES["plant_image"]["tmp_name"]));
        }
        else
        {
            echo"<script>
                    alert('No image added.');
                </script>";
        }
    }
?>