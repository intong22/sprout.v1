<?php    
    include "connection.php";
    
    $counter = 0;
    //get plant info
    if(isset($_GET["plant_id"]))
    {       
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