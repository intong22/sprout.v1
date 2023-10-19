<?php
    include "connection.php";

    //display
    function display($exec)
    {
        if(mysqli_num_rows($exec) > 0)
            {
                while($plant = mysqli_fetch_assoc($exec))
                {
                    echo"<div class='plant'>";
                    // echo"<i class='bx bx-bookmark bookmark-icon'></i>";
                    echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='plant image' class='plant-image'>";
                    echo"<a href='user_plant_tips.php'>".$plant["plant_name"]."</a>";
                    echo"</div>";
                }
                
            }
    }

    //default data
    function deflt()
    {
        include  "connection.php";

        $query = "SELECT 
                        plant.plant_name, plant_type.plant_image
                    FROM
                        plant
                    INNER JOIN
                        plant_type
                    ON
                        plant.plant_id = plant_type.plant_id"; 
                    
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


        if(mysqli_num_rows($exec))
        {
            display($exec);
        }
        else
        {
            echo "<h4>No plants found.</h4>";
        }
    }   

    //plant categories
    function categories()
    {
        if(isset($_GET["floweringPlants"]))
        {
            $category = "flowering";
            filterCategory($category);
        }
        else if(isset($_GET["succulents&cacti"]))
        {
            $category = "s&c";
            filterCategory($category);
        }
        else if(isset($_GET["ferns"]))
        {
            $category = "fern";
            filterCategory($category);
        }
        else if(isset($_GET["climbers"]))
        {
            $category = "climber";
            filterCategory($category);
        }
        else if(isset($_GET["fruitBearing"]))
        {
            $category = "fruit";
            filterCategory($category);
        }
        else if(isset($_GET["vegetableBearing"]))
        {
            $category = "vegetable";
            filterCategory($category);
        }
        else if(isset($_GET["herbal"]))
        {
            $category = "herbal";
            filterCategory($category);
        }
        else if(isset($_GET["fungi"]))
        {
            $category = "fungi";
            filterCategory($category);
        }
        else if(isset($_GET["carnivorous"]))
        {
            $category = "carnivorous";
            filterCategory($category);
        }
        else if(isset($_GET["toxic"]))
        {
            $category = "toxic";
            filterCategory($category);
        }
        else if(isset($_GET["ornamental"]))
        {
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
                            LIKE 
                                '%$searchInput%' ";

            $exec = mysqli_query($con, $search_query);

            if(mysqli_num_rows($exec))
            {
                display($exec);
            }
            else
            {
                echo"<script>
                        alert('No plant/s found.');
                    </script>";
            }
        }
    }    

?>