<?php
    include "connection.php";

    if($con)
    {
        $plant_name = "";
        $plant_image = "";
        $plant_genus_name = "";
        $plant_type_details = "";

        $query = "select 
                    plant.plant_name, plant_image, plant.plant_genus_name, plant_type.plant_type_details 
                from 
                    plant inner join plant_type
                on 
                    plant.plant_type_id = plant_type.plant_type_id"; 
                    
        $exec = mysqli_query($con, $query);

    }
?>