<?php
    include "connection.php";

    //display
    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {
                    echo"<div class='plant'>";
                    echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='plant image' class='plant-image'>";
                    echo"<a href='user_plant_tips.php'>".$plant["plant_name"]."</a>";
                    echo"</div>";
                }
                
            }
    }

    //default data
    function deflt()
    {
        include  "connection.php";

        //get ID
        $get = "SELECT
                    plant_id
                FROM
                    plant";
        
        $get_id = mysqli_query($con, $get);

        if(mysqli_num_rows($get_id) > 0)
        {
            while($plant = mysqli_fetch_assoc($get_id))
            {
                //get plants
                $query = "SELECT 
                        plant.plant_name, plant_type.plant_image
                    FROM
                        plant
                    INNER JOIN
                        plant_type
                    ON
                        plant.plant_id = plant_type.plant_id
                    WHERE
                        plant.plant_id = '".$plant["plant_id"]."'
                    LIMIT 1"; 
                    
                $exec = mysqli_query($con, $query);

                display($exec);
            }
        }
    }

    //search filter
    function search()
    {
        include "connection.php";

        if(isset($_GET["search"]))
        {
            $searchInput = $_GET["searchInput"];

            //get ID
            $get = "SELECT
                        plant_id
                    FROM
                        plant";

            $get_id = mysqli_query($con, $get);

            if(mysqli_num_rows($get_id) > 0)
            {
                while($plant = mysqli_fetch_assoc($get_id))
                {
                    //get plants
                    $search_query = "SELECT 
                                        plant.plant_name, plant_type.plant_image
                                    FROM 
                                        plant 
                                    INNER JOIN 
                                        plant_type
                                    ON
                                        plant.plant_id = plant_type.plant_id
                                    WHERE
                                        (plant_name
                                        LIKE 
                                            '%$searchInput%' 
                                        OR
                                            plant_category
                                        LIKE 
                                            '%$searchInput%'
                                        OR
                                            plant_genus_name
                                        LIKE 
                                        '%$searchInput%')
                                    AND
                                        plant.plant_id = '".$plant["plant_id"]."'
                                    LIMIT 1";

                    $exec = mysqli_query($con, $search_query);

                    if(mysqli_num_rows($exec))
                    {
                        display($exec);
                    }     
                }
            }
        }
    }    

?>