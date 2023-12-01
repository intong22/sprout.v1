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
                if(!empty($plant["plant_image"]))
                {
                    echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='Plant image' class='plant-image'>";
                }
                else
                {
                    echo"<img src='../assets/logo.png' alt='Plant image' class='plant-image'><br>";
                }
                echo"       <div class='card-info'>";
                echo"           <h3>".$plant["plant_name"]."</h3>";
                // Check if the description has more than two lines
                if (strlen($description) > $maxLength) 
                {
                    // If the description is longer than the limit, trim and add an ellipsis
                    $limitedDescription = substr($description, 0, $maxLength) . '...';
                    echo "<p class='limited-description'>" . $limitedDescription . " <a href='user_plant_info.php?plant_id=" . $plant["plant_id"] . "' class='see-more-link'>See More</a></p>";
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
                                LEFT JOIN
                                    plant_encyc_images
                                ON
                                    plant_encyclopedia.plant_id = plant_encyc_images.plant_id 
                                WHERE
                                    plant_name
                                LIKE
                                    '%$searchInput%' 
                                AND
                                    plant_encyclopedia.plant_id = ".$plantID["plant_id"]."
                                LIMIT  1";

                    $exec = mysqli_query($con, $search);

                    display($exec);
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

    //filter topic by first letter
    function firstLetter($letter)
    {
        include "connection.php";

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
                $filter = "SELECT
                                plant_encyclopedia.plant_id, plant_encyclopedia.plant_name, plant_encyc_images.plant_image, plant_encyclopedia.plant_description
                            FROM
                                plant_encyclopedia
                            INNER JOIN
                                plant_encyc_images
                            ON
                                plant_encyclopedia.plant_id = plant_encyc_images.plant_id 
                            WHERE
                                plant_name 
                            LIKE 
                                '$letter%' 
                            AND
                                plant_encyclopedia.plant_id = ".$plantID["plant_id"]."
                            LIMIT  1";
            
                if($exec = mysqli_query($con, $filter))
                {
                    display($exec);
                }
                else
                {
                    echo"<script>
                            alert('No plant/s found');
                        </script>";
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

    function filterByFirstLetter()
    {
        if(isset($_GET["A"]))
        {
            $letter = $_GET["A"];
            firstLetter($letter);     
        }
        else if(isset($_GET["B"]))
        {
            $letter = $_GET["B"];
            firstLetter($letter); 
        }
        else if(isset($_GET["C"]))
        {
            $letter = $_GET["C"];
            firstLetter($letter);        
        }
        else if(isset($_GET["D"]))
        {
            $letter = $_GET["D"];
            firstLetter($letter); 
        }
        else if(isset($_GET["E"]))
        {
            $letter = $_GET["E"];
            firstLetter($letter);           
        }
        else if(isset($_GET["F"]))
        {
            $letter = $_GET["F"];
            firstLetter($letter);         
        }
        else if(isset($_GET["G"]))
        {
            $letter = $_GET["G"];
            firstLetter($letter);       
        }
        else if(isset($_GET["H"]))
        {
            $letter = $_GET["H"];
            firstLetter($letter);     
        }
        else if(isset($_GET["I"]))
        {
            $letter = $_GET["I"];
            firstLetter($letter);
        }
        else if(isset($_GET["J"]))
        {
            $letter = $_GET["J"];
            firstLetter($letter);        
        }
        else if(isset($_GET["K"]))
        {
            $letter = $_GET["K"];
            firstLetter($letter);  
        }
        else if(isset($_GET["L"]))
        {
            $letter = $_GET["L"];
            firstLetter($letter);
        }
        else if(isset($_GET["M"]))
        {
            $letter = $_GET["M"];
            firstLetter($letter);
        }
        else if(isset($_GET["N"]))
        {
            $letter = $_GET["N"];
            firstLetter($letter);       
        }
        else if(isset($_GET["O"]))
        {
            $letter = $_GET["O"];
            firstLetter($letter); 
        }
        else if(isset($_GET["P"]))
        {
            $letter = $_GET["P"];
            firstLetter($letter);  
        }
        else if(isset($_GET["Q"]))
        {
            $letter = $_GET["Q"];
            firstLetter($letter);      
        }
        else if(isset($_GET["R"]))
        {
            $letter = $_GET["R"];
            firstLetter($letter);   
        }
        else if(isset($_GET["S"]))
        {
            $letter = $_GET["S"];
            firstLetter($letter);    
        }
        else if(isset($_GET["T"]))
        {
            $letter = $_GET["T"];
            firstLetter($letter);     
        }
        else if(isset($_GET["U"]))
        {
            $letter = $_GET["U"];
            firstLetter($letter);
        }
        else if(isset($_GET["V"]))
        {
            $letter = $_GET["V"];
            firstLetter($letter); 
        }
        else if(isset($_GET["W"]))
        {
            $letter = $_GET["W"];
            firstLetter($letter);
        }
        else if(isset($_GET["X"]))
        {
            $letter = $_GET["X"];
            firstLetter($letter);       
        }
        else if(isset($_GET["Y"]))
        {
            $letter = $_GET["Y"];
            firstLetter($letter);    
        }
        else if(isset($_GET["Z"]))
        {
            $letter = $_GET["Z"];
            firstLetter($letter);       
        }
        else
        {
            plants();
        }
    }

    //display first letter
    function plantLetterStart()
    {
        if(isset($_GET["A"]))
        {
            echo" starting with letter A";          
        }
        if(isset($_GET["B"]))
        {
            echo" starting with letter B";          
        }
        if(isset($_GET["C"]))
        {
            echo" starting with letter C";           
        }
        if(isset($_GET["D"]))
        {
            echo" starting with letter D";           
        }
        if(isset($_GET["E"]))
        {
            echo" starting with letter E";          
        }
        if(isset($_GET["F"]))
        {
            echo" starting with letter F";        
        }
        if(isset($_GET["G"]))
        {
            echo" starting with letter G";      
        }
        if(isset($_GET["H"]))
        {
            echo" starting with letter H";       
        }
        if(isset($_GET["I"]))
        {
            echo" starting with letter I";
        }
        if(isset($_GET["J"]))
        {
            echo" starting with letter J";        
        }
        if(isset($_GET["K"]))
        {
            echo" starting with letter K";  
        }
        if(isset($_GET["L"]))
        {
            echo" starting with letter L";
        }
        if(isset($_GET["M"]))
        {
            echo" starting with letter M";
        }
        if(isset($_GET["N"]))
        {
            echo" starting with letter N";       
        }
        if(isset($_GET["O"]))
        {
            echo" starting with letter O"; 
        }
        if(isset($_GET["P"]))
        {
            echo" starting with letter P";  
        }
        if(isset($_GET["Q"]))
        {
            echo" starting with letter Q";      
        }
        if(isset($_GET["R"]))
        {
            echo" starting with letter R";   
        }
        if(isset($_GET["S"]))
        {
            echo" starting with letter S";    
        }
        if(isset($_GET["T"]))
        {
            echo" starting with letter T";     
        }
        if(isset($_GET["U"]))
        {
            echo" starting with letter U";
        }
        if(isset($_GET["V"]))
        {
            echo" starting with letter V";    
        }
        if(isset($_GET["W"]))
        {
            echo" starting with letter W";
        }
        if(isset($_GET["X"]))
        {
            echo" starting with letter X";       
        }
        if(isset($_GET["Y"]))
        {
            echo" starting with letter y";    
        }
        if(isset($_GET["Z"]))
        {
            echo" starting with letter Z";       
        }
    }

?>