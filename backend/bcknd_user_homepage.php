<?php
    include "connection.php";

    //display
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

    //default data
    function deflt()
    {
        include  "connection.php";

        $query = "SELECT 
                    plant.plant_name, plant.plant_image, plant.plant_genus_name, plant_type.plant_type_details 
                FROM 
                    plant INNER JOIN plant_type
                ON 
                    plant.plant_type_id = plant_type.plant_type_id"; 
                    
        $exec = mysqli_query($con, $query);

        display($exec);
    }

    //data by category
    function filterCategory($category)
    {
        include  "connection.php";

        $getCategory = "SELECT 
                            plant.plant_name, plant_image, plant.plant_genus_name, plant_type.plant_type_details 
                        FROM 
                            plant INNER JOIN plant_type
                        ON 
                            plant.plant_type_id = plant_type.plant_type_id
                        WHERE
                            plant_category = '$category' "; 
                    
        $exec = mysqli_query($con, $getCategory);

        display($exec);
    }

    //plant categories
    function categories()
    {
        if(isset($_GET["floweringPlants"]))
        {
            echo"Flowering Plants";
            $category = "floweringPlants";
            filterCategory($category);
        }
        else if(isset($_GET["succulents&cacti"]))
        {
            echo"Succulents & Cacti";
            $category = "succulents&cacti";
            filterCategory($category);
        }
        else if(isset($_GET["ferns"]))
        {
            echo"Ferns";
            $category = "ferns";
            filterCategory($category);
        }
        else if(isset($_GET["climbers"]))
        {
            echo"Climbers";
            $category = "climbers";
            filterCategory($category);
        }
        else if(isset($_GET["fruitBearing"]))
        {
            echo"Fruit-bearing Plants";
            $category = "fruitBearing";
            filterCategory($category);
        }
        else if(isset($_GET["vegetableBearing"]))
        {
            echo"Vegetable-bearing Plants";
            $category = "vegetableBearing";
            filterCategory($category);
        }
        else if(isset($_GET["herbal"]))
        {
            echo"Herbal Plants";
            $category = "herbal";
            filterCategory($category);
        }
        else if(isset($_GET["fungi"]))
        {
            echo"Fungi";
            $category = "fungi";
            filterCategory($category);
        }
        else if(isset($_GET["carnivorous"]))
        {
            echo"Carnivorous Plants";
            $category = "carnivorous";
            filterCategory($category);
        }
        else if(isset($_GET["toxic"]))
        {
            echo"Toxic Plants";
            $category = "toxic";
            filterCategory($category);
        }
        else if(isset($_GET["ornamental"]))
        {
            echo"Ornamental Plants";
            $category = "onramental";
            filterCategory($category);
        }
        else
        {
            deflt();
        }
    }

    //search filter
    function search()
    {
        include "connection.php";

        if(isset($_GET["btnSearch"]))
        {
            $searchInput = $_GET["searchInput"];

            $search_query = "SELECT 
                                plant.plant_name, plant.plant_image, plant.plant_genus_name, plant_type.plant_type_details
                            FROM 
                                plant INNER JOIN plant_type
                            ON
                                plant.plant_id = plant_type.plant_type_id
                            WHERE
                                plant_name
                            LIKE '%$searchInput%' ";

            $exec = mysqli_query($con, $search_query);

            display($exec);
        }
    }    

?>