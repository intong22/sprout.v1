<?php    
    include "connection.php";
    
    $counter = 0;
    //get plant info
    if(isset($_GET["plant_id"]))
    {    
        $id = $_GET["plant_id"];

        //get plant name and description
        $details = "SELECT 
                    plant.plant_name, plant_type.plant_type_details
                FROM
                    plant
                INNER JOIN
                    plant_type
                ON
                    plant.plant_id = plant_type.plant_id
                WHERE
                    plant.plant_id = ".$id." ";
        
        $get_details = mysqli_query($con, $details);

        if(mysqli_num_rows($get_details) > 0)
        {
            while($plant_details = mysqli_fetch_assoc($get_details))
            {
                $plant_name = $plant_details["plant_name"];
                $plant_description = $plant_details["plant_type_details"];
            }
        }
        
        //display plant info table
        function plantInfo()
        {
            include "connection.php";

            $id = $_GET["plant_id"];

            $table = "SELECT
                            plant.plant_genus_name, plant.plant_soil_recco, plant.plant_water_recco, plant.plant_sunlight_recco, plant.plant_care_tips,
                            plant_type.plant_category
                        FROM
                            plant
                        INNER JOIN
                            plant_type
                        ON
                            plant.plant_id = plant_type.plant_id
                        WHERE
                            plant.plant_id = ".$id." ";
            
            $get_table = mysqli_query($con, $table);

            if(mysqli_num_rows($get_table) > 0)
            {
                //NOT YET DONE
            }
        }

        //display plant image
        function plantImage()
        {
            global $counter;

            include "connection.php";

            $plant_id = $_GET["plant_id"];

            $plant_image = "SELECT
                            plant_image
                        FROM
                            plant_type
                        WHERE
                            plant_id = ".$plant_id." ";

            $img = mysqli_query($con, $plant_image);

            if(mysqli_num_rows($img) > 0)
            {
                echo"<div class='card-info'>
                        <div class='slideshow-container'>";
                while($image = mysqli_fetch_assoc($img))
                {
                    $counter++;
                    echo"<div class='mySlides fade'>
                            <img src='data:image/jpeg;base64,".base64_encode($image["plant_image"])."' alt='Plant image' style='width:50%'>
                        </div>";
                }
                echo"
                    <div>
                        <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
                        <a class='next' onclick='plusSlides(1)'>&#10095;</a>
                    </div><br>

                    <div style='text-align:center'>";
                for($i = 0; $i < $counter; $i++)
                {
                    echo"<span class='dot' onclick='currentSlide(".$i.")'></span>";
                }
                echo"</div>
                    </div>";
            }
        }

        //add to bookmark
        if(isset($_POST["bookmark"]))
        {
            $plant_id = $_GET["plant_id"];
            
            // check if already added to bookmark
            $check = "SELECT
                            bookmark
                        FROM
                            plant
                        WHERE
                            plant_id = ".$plant_id."";
            
            $check_bookmark = mysqli_query($con, $check);
            
            $bookmarked = mysqli_fetch_assoc($check_bookmark);
            
            if($bookmarked["bookmark"] == true)
            {
                echo"<script> 
                        alert('Already bookmarked.'); 
                        window.location.href = 'user_plant_tips.php?plant_id=".$plant_id."';
                    </script>";   
            }
            else
            {
                $bookmark = "UPDATE
                                plant
                            SET
                                bookmark = true
                            WHERE
                                plant_id = ".$plant_id." ";
                
                mysqli_query($con, $bookmark);

                echo"<script> 
                        alert('Added to bookmarks.'); 
                        window.location.href = 'user_plant_tips.php?plant_id=".$plant_id."';
                    </script>";
            }
        }
        
    }
?>