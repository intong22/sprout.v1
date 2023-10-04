<?php

    include "connection.php";

    //search button
    if(isset($_GET["btnSearch"]))
    {
        $searchInput = $_GET["searchInput"];

        $search = "SELECT
                        plant_name, plant_image, plant_description
                    FROM 
                        plant_encyclopedia
                    WHERE
                        plant_name
                    LIKE
                        '%$searchInput%' ";

        $exec = mysqli_query($con, $search);

        if(mysqli_num_rows($exec))
        {
            //populate card

        }
        else
        {
            echo "Plant not found.";
        }

    }

    //display plant info
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

    //plants card
    function plants()
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