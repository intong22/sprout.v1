<?php
    include "connection.php";

    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {
                    echo"<div class='plant'>".$plant["plant_name"];
                    echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='plant image' class='plant-image'>";
                    echo"   <div class='plant-details'>";
                    echo"       <h3>".$plant["plant_genus_name"]."</h3>";
                    echo"       <p>".$plant["plant_type_details"]."</p>";
                    echo"   </div>";
                    echo"</div>";
                }
                
            }
    }

    function deflt()
    {
        include  "connection.php";
        
        $plant_name = "";
        $plant_image = "";
        $plant_genus_name = "";
        $plant_type_details = "";

        $query = "select 
                    plant.plant_name, plant_image, plant.plant_genus_name, plant_type.plant_type_details 
                from 
                    plant inner join plant_type
                on 
                    plant.plant_type_id = plant_type.plant_type_id"; 
                    
        $exec = mysqli_query($con, $query);

        display($exec);
    }

    if(isset($_GET["btnSearch"]))
    {
        $searchInput = $_GET["searchInput"];

        $search_query = "select plant_name from plant
                        where
                            plant_name = '%".$searchInput."%' ";

        $exec = mysqli_query($con, $search_query);

        if(mysqli_fetch_assoc($exec) > 0)
        {

        }

    }

    function categories()
    {
        if(isset($_GET["floweringPlants"]))
        {
            echo"Flowering Plants";
            deflt();
        }
        else if(isset($_GET["succulents&cacti"]))
        {
            echo"Succulents & Cacti";
            deflt();
        }
        else if(isset($_GET["ferns"]))
        {
            echo"Ferns";
            deflt();
        }
        else if(isset($_GET["climbers"]))
        {
            echo"Climbers";
            deflt();
        }
        else if(isset($_GET["fruitBearing"]))
        {
            echo"Fruit-bearing Plants";
            deflt();
        }
        else if(isset($_GET["vegetableBearing"]))
        {
            echo"Vegetable-bearing Plants";
            deflt();
        }
        else if(isset($_GET["herbal"]))
        {
            echo"Herbal Plants";
            deflt();
        }
        else if(isset($_GET["fungi"]))
        {
            echo"Fungi";
            deflt();
        }
        else if(isset($_GET["carnivorous"]))
        {
            echo"Carnivorous Plants";
            deflt();
        }
        else if(isset($_GET["toxic"]))
        {
            echo"Toxic Plants";
            deflt();
        }
        else if(isset($_GET["ornamental"]))
        {
            echo"Ornamental Plants";
            deflt();
        }
        else
        {
            deflt();
        }
    }

?>