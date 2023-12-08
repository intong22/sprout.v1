<?php

    include "connection.php";

    //delete
    if(isset($_POST["delete"]))
    {
        $plant_id = $_POST["delete"];

        $delete = "DELETE FROM
                        plant_encyclopedia
                    WHERE
                        plant_id = ".$plant_id." ";
        
        mysqli_query($con, $delete);
    }

    //display plant info
    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {

                    echo"<div class='column'>";
                    echo"    <div class='card'>";
                    if(!empty($plant["plant_image"]))
                    {
                        echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='Plant image' class='plant-image' style='height: 30vh;'/>";
                    }
                    else
                    {
                        echo"<img src='../assets/logo.png' alt='Plant image' class='plant-image' style='height: 40vh;'><br>";
                    }
                    echo"       <div class='card-info'>";
                    echo"           <h3>".$plant["plant_name"]."</h3>";
                    echo"<form method='POST' action='admin_create_encyclopedia.php'>
                        <button style='padding:10px; width: 10vh; !important'>
                            <a href='admin_edit_encyclopedia.php?plant_id=".$plant["plant_id"]."' style='text-decoration: none; color:white;'>Edit</a>
                        </button>
                        <button type='submit' name='delete' style='background-color: transparent; border: none; padding:10px; color:black;' value='".$plant["plant_id"]."'>Delete</button>
                        </form>";
                    echo"       </div>";
                    echo"   </div>";
                    echo"</div>";
                }
                
            }
    }

    function search()
    {
        include  "connection.php";

        //search button
        if(isset($_GET["btnSearch"]))
        {            
            $searchInput = mysqli_real_escape_string($con, $_GET["searchInput"]);

            //get plant id
            $get_id = "SELECT
                            plant_id
                        FROM
                            plant_encyclopedia";

            $id = mysqli_query($con, $get_id);

            if(mysqli_num_rows($id) > 0)
            {
                while($plantID = mysqli_fetch_assoc($id))
                {
                    $search = "SELECT 
                                    plant_encyclopedia.plant_id, plant_encyclopedia.plant_name, plant_encyc_images.plant_image, plant_encyclopedia.plant_description
                                FROM 
                                    plant_encyclopedia
                                LEFT JOIN
                                    plant_encyc_images
                                ON
                                    plant_encyclopedia.plant_id = plant_encyc_images.plant_id 
                                WHERE
                                    (plant_name
                                    LIKE
                                        '%$searchInput%'
                                    OR
                                        plant_genus_name
                                    LIKE
                                        '%$searchInput%'
                                    OR
                                        common_name
                                    LIKE
                                        '%$searchInput%'
                                    OR
                                        plant_category
                                    LIKE
                                        '%$searchInput%') 
                                AND
                                    plant_encyclopedia.plant_id = ".$plantID["plant_id"]."
                                LIMIT  1";

                    $exec = mysqli_query($con, $search);

                    if(mysqli_num_rows($exec) > 0)
                    {
                        display($exec);
                    }
                }
            }
            else
            {
                echo"<script>
                        alert('No plant/s found');
                    </script>";
            }
        }
    }
    //plants card
    function plants()
    {
        include  "connection.php";
            //get plant id
            $get_id = "SELECT
                            plant_id
                        FROM
                            plant_encyclopedia";

            $id = mysqli_query($con, $get_id);

            if(mysqli_num_rows($id) > 0)
            {
                while($plantID = mysqli_fetch_assoc($id))
                {
                    $query = "SELECT 
                                plant_encyclopedia.plant_id, plant_encyclopedia.plant_name, plant_encyc_images.plant_image, plant_encyclopedia.plant_description
                            FROM 
                                plant_encyclopedia
                            LEFT JOIN
                                plant_encyc_images
                            ON
                                plant_encyclopedia.plant_id = plant_encyc_images.plant_id 
                            WHERE
                                plant_encyclopedia.plant_id = ".$plantID["plant_id"]."
                            LIMIT  1"; 
                            
                    $exec = mysqli_query($con, $query);

                    display($exec);
                }
            } 
    }
?>