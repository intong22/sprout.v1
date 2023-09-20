<?php

    include "connection.php";

    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {
                    echo"<div class='plant-card1'>";
                    echo"    <img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='Plant image' class='plant-image'>";
                    echo"    <h2>".$plant["plant_name"]."</h2>";
                    echo"    <p>".$plant["plant_description"]."</p>";
                    echo"</div>";
                }
                
            }
    }

    function popular()
    {
        include  "connection.php";

        $query = "SELECT 
                        plant_name, plant_image, plant_description
                    FROM 
                        plant_encyclopedia"; 
                    
        $exec = mysqli_query($con, $query);

        display($exec);
    }

    

?>