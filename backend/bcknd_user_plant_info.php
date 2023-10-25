<?php    
    include "connection.php";
    
    $counter = 0;
    //get plant info
    if(isset($_GET["plant_id"]))
    {    
        $id = $_GET["plant_id"];

        //get plant name and description
        $details = "SELECT 
                    plant_name, plant_description
                FROM
                    plant_encyclopedia
                WHERE
                    plant_id = ".$id." ";
        
        $get_details = mysqli_query($con, $details);

        if(mysqli_num_rows($get_details) > 0)
        {
            while($plant_details = mysqli_fetch_assoc($get_details))
            {
                $plant_name = $plant_details["plant_name"];
                $plant_description = $plant_details["plant_description"];
            }
        }
        
        //display plant info table
        function plantInfoTable()
        {
            include "connection.php";

            $id = $_GET["plant_id"];

            $table = "SELECT
                            plant_genus_name, common_name, plant_type, light, height, width, flower_color, foliage_color, season_ft, special_ft, zones, propagation
                        FROM
                            plant_encyclopedia
                        WHERE
                            plant_id = ".$id." ";
            
            $get_table = mysqli_query($con, $table);

            if(mysqli_num_rows($get_table) > 0)
            {
                echo"<table class='table table-striped'>";
                while($populate_table = mysqli_fetch_assoc($get_table))
                {
                    echo"
                        <tr>
                            <td><h5>Genus Name</h5></td>
                            <td>".$populate_table["plant_genus_name"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Common Name</h5></td>
                            <td>".$populate_table["common_name"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Plant Category</h5></td>
                            <td>".$populate_table["plant_type"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Light Requirements</h5></td>
                            <td>".$populate_table["light"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Height</h5></td>
                            <td>".$populate_table["height"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Width</h5></td>
                            <td>".$populate_table["width"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Flower Color</h5></td>
                            <td>".$populate_table["flower_color"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Foliage Color</h5></td>
                            <td>".$populate_table["foliage_color"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Season</h5></td>
                            <td>".$populate_table["season_ft"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Special Features</h5></td>
                            <td>".$populate_table["special_ft"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Zone</h5></td>
                            <td>".$populate_table["zones"]."</td>
                        </tr>
                        <tr>
                            <td><h5>Propagation</h5></td>
                            <td>".$populate_table["propagation"]."</td>
                        </tr>";
                }
                echo"</table>";
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
                            plant_encyc_images
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
                            <img src='data:image/jpeg;base64,".base64_encode($image["plant_image"])."' alt='Plant image' style='width:50%'
                        </div> 
                            <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
                            <a class='next' onclick='plusSlides(1)'>&#10095;</a>
                        </div>
                        <br>";
                }
                echo"<div style='text-align:center'>";
                for($i = 0; $i < $counter; $i++)
                {
                    echo"<span class='dot' onclick='currentSlide(".$i.")'></span>";
                }
                echo"</div>
                    </div>";
            }
        }

        
    }
?>