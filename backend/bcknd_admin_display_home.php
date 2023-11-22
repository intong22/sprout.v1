<?php
    include "connection.php";

    //delete data
    if(isset($_POST["delete"]))
    {
        $id = $_POST["delete"];

        $delete = "DELETE FROM
                        plant
                    WHERE
                        plant_id = ".$id." ";
            
        mysqli_query($con, $delete);
    }

    //display
    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {
                    echo"<div class='plant'>";
                    if(!empty($plant["plant_image"]))
                    {
                        echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='Plant image' class='plant-image'><br>";
                    }
                    else
                    {
                        echo"<img src='../assets/logo.png' alt='Plant image' class='plant-image'><br>";
                    }
                    echo $plant["plant_name"];
                    echo"<form method='POST' action='admin_home.php'>
                                <br>
                                <button style='padding:10px; width: 10vh; !important'>
                                    <a href='admin_edit_homepage.php?plant_id=".$plant["plant_id"]."' style='text-decoration: none; color:white;'>Edit</a>
                                </button>
                                <button type='submit' style='background-color: transparent; border: none; padding:10px; color:black;' name='delete' value='".$plant["plant_id"]."'>
                                    Delete
                                </button>
                        </form>";
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
                            plant.plant_id, plant.plant_name, plant_images.plant_image
                        FROM
                            plant
                        LEFT JOIN
                            plant_images
                        ON
                            plant.plant_id = plant_images.plant_id
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

        if(isset($_GET["btnSearch"]))
        {
            $searchInput = mysqli_real_escape_string($con, $_GET["searchInput"]);

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
                                        plant.plant_id, plant.plant_name, plant_images.plant_image
                                    FROM 
                                        plant 
                                    LEFT JOIN 
                                        plant_images
                                    ON
                                        plant.plant_id = plant_images.plant_id
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