<?php    
    include "connection.php";
    
    $counter = 0;
    //get plant info
    if(isset($_GET["plant_id"]))
    {    
        $id = $_GET["plant_id"];

        //get plant name and description
        $details = "SELECT 
                        plant_name, plant_details
                    FROM
                        plant
                    WHERE
                    plant.plant_id = ".$id." ";
        
        $get_details = mysqli_query($con, $details);

        if(mysqli_num_rows($get_details) > 0)
        {
            while($plant_details = mysqli_fetch_assoc($get_details))
            {
                $plant_name = $plant_details["plant_name"];
                $plant_description = $plant_details["plant_details"];
            }
        }
        
        //display plant information
        function plantInfo()
        {
            include "connection.php";

            $id = $_GET["plant_id"];

            $table = "SELECT * FROM
                            plant
                        WHERE
                            plant_id = ".$id." 
                        LIMIT 1";
            
            $get_table = mysqli_query($con, $table);

            if(mysqli_num_rows($get_table) > 0)
            {
                while($plant_details = mysqli_fetch_assoc($get_table))
                {
                    $plant_category = explode(",", $plant_details["plant_category"]);

                    $plant_category = array_map('trim', $plant_category);

                    $category = array();

                    if (in_array("flowering", $plant_category)) 
                    {
                        $category[] = "Flowering Plant";
                    } 
                    if (in_array("s&c", $plant_category)) 
                    {
                        $category[] = "Succulents & Cacti";
                    } 
                    if (in_array("fern", $plant_category)) 
                    {
                        $category[] = "Fern";
                    } 
                    if (in_array("climber", $plant_category)) 
                    {
                        $category[] = "Climber";
                    } 
                    if (in_array("fruit", $plant_category)) 
                    {
                        $category[] = "Fruit-bearing Plant";
                    } 
                    if (in_array("vegetable", $plant_category)) 
                    {
                        $category[] = "Vegetable-bearing Plant";
                    } 
                    if (in_array("herbal", $plant_category)) 
                    {
                        $category[] = "Herbal Plant";
                    } 
                    if (in_array("fungi", $plant_category)) 
                    {
                        $category[] = "Fungus";
                    } 
                    if (in_array("carnivorous", $plant_category)) 
                    {
                        $category[] = "Carnivorous Plant";
                    } 
                    if (in_array("toxic", $plant_category)) 
                    {
                        $category[] = "Toxic Plant";
                    } 
                    if (in_array("ornamental", $plant_category)) 
                    {
                        $category[] = "Ornamental Plant";
                    }

                    $category_string = implode(", ", $category);

                    echo"<div class='plant-card'>
                            <h4>Genus</h4>
                            <p>".$plant_details["plant_genus_name"]."</p>
                        </div>
                        <div class='plant-card'>
                            <h4>Category</h4>
                            <p>".$category_string."</p>
                        </div>
                        <div class='plant-card'>
                            <h4>Soil Reccomendation</h4>
                            <p>".$plant_details["plant_soil_recco"]."</p>
                        </div>
                        <div class='plant-card'>
                            <h4>Water Reccomendation</h4>
                            <p>".$plant_details["plant_water_recco"]."</p>
                        </div>
                        <div class='plant-card'>
                            <h4>Sunlight Reccomendation</h4>
                            <p>".$plant_details["plant_sunlight_recco"]."</p>
                        </div>
                        <div class='plant-card'>
                            <h4>Plant Care Tips</h4>
                            <p>".$plant_details["plant_care_tips"]."</p>
                        </div>";   
                }
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
                                plant_images
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
                            <img src='data:image/jpeg;base64,".base64_encode($image["plant_image"])."' alt='Plant image' style='width:70vh; height:50vh; align-item:center;'>
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
            else
            {
                echo"<div class='card-info'>
                        <div class='slideshow-container'>
                            <div class='mySlides fade'>
                                <img src='../assets/logo.png' alt='Plant image'>
                            </div>
                        </div>
                    </div>";
            }
        }

        //add to bookmark
        if(isset($_POST["bookmark"]))
        {
            $plant_id = $_GET["plant_id"];
            
            //get account ID of poster
            $getIDQuery = "SELECT
                                account_id
                            FROM
                                user_account
                            WHERE
                                account_email = '".$_SESSION["username"]."' ";
                
            $id = mysqli_query($con, $getIDQuery);
    
            if(mysqli_num_rows($id) > 0)
            {
                $userID = mysqli_fetch_assoc($id);
                $account_id = $userID["account_id"];
            }

            // check if already added to bookmark
            $check = "SELECT
                            saved.account_id, saved.plant_id,
                            plant.plant_id,
                            user_account.account_id
                        FROM
                            saved
                        INNER JOIN 
                            plant ON plant.plant_id = saved.plant_id
                        INNER JOIN
                            user_account ON user_account.account_id = saved.account_id
                        WHERE
                            plant.plant_id = ".$plant_id."
                        AND
                            user_account.account_id = ".$account_id." ";
            
            $check_bookmark = mysqli_query($con, $check);
            
            if(mysqli_num_rows($check_bookmark) > 0)
            {
                echo"<script> 
                        alert('Already bookmarked.'); 
                        window.location.href = 'user_plant_tips.php?plant_id=".$plant_id."';
                    </script>";   
            }
            else
            {
                $bookmark = "INSERT INTO
                                saved(account_id, plant_id)
                            VALUES
                                ('".$account_id."', '".$plant_id."')";
                
                mysqli_query($con, $bookmark);

                echo"<script> 
                        alert('Added to bookmarks.'); 
                        window.location.href = 'user_plant_tips.php?plant_id=".$plant_id."';
                    </script>";
            }
        }
 
    }
?>