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

    //filter topic by first letter
    function firstLetter($letter)
    {
        include "connection.php";

        $filter = "SELECT
                        plant_name, plant_image
                    FROM
                        plant_encyclopedia
                    WHERE
                        plant_name 
                    LIKE 
                        '%$letter%' ";
        
        $exec = mysqli_query($con, $filter);

    }

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