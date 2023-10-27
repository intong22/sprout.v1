<?php

    include "connection.php";

    //display plant info
    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {
                    $description = $plant["plant_description"];
                    $maxLength = 20;

                    echo"<div class='column'>";
                    echo"    <div class='card'>";
                    echo"       <img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='Plant image' class='plant-image'>";
                    echo"       <div class='card-info'>";
                    echo"           <h3>".$plant["plant_name"]."</h3>";
                    // Check if the description has more than two lines
                    if (strlen($description) > $maxLength) 
                    {
                        // If the description is longer than the limit, trim and add an ellipsis
                        $limitedDescription = substr($description, 0, $maxLength) . '...';
                        echo "           <p class='limited-description'>" . $limitedDescription . " <a href='user_plant_info.php?plant_id=" . $plant["plant_id"] . "' class='see-more-link'>See More</a></p>";
                    }
                    else 
                    {
                        echo "           <p>".$description." <a href='user_plant_info.php?plant_id=".$plant["plant_id"]."' class='see-more-link'>See More</a></p></p>";
                    }
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
            $searchInput = $_GET["searchInput"];

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
                                INNER JOIN
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
                                        plant_type
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
                            INNER JOIN
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