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
                    if(!empty($plant["plant_image"]))
                    {
                        echo"<img src='data:image/jpeg;base64,".base64_encode($plant["plant_image"])."' alt='Plant image' class='plant-image'><br>";
                    }
                    else
                    {
                        echo"<img src='../assets/logo.png' alt='Plant image' class='plant-image'><br>";
                    }
                    echo"<a href='user_plant_tips.php?plant_id=".$plant["plant_id"]."' style='text-decoration: none;'>".$plant["plant_name"]."</a>";
                    echo"</div>";
                }
                
            }
    }

    //default data
    function deflt()
    {
        include  "connection.php";

        //get ID
        $get = "SELECT
                    plant_id
                FROM
                    plant";
        
        $get_id = mysqli_query($con, $get);

        if(mysqli_num_rows($get_id) > 0)
        {
            while($plant = mysqli_fetch_assoc($get_id))
            {
                //get plants
                $query = "SELECT 
                        plant.plant_id, plant.plant_name, plant_images.plant_image
                    FROM
                        plant
                    LEFT JOIN
                        plant_images
                    ON
                        plant.plant_id = plant_images.plant_id
                    WHERE
                        plant.plant_id = '".$plant["plant_id"]."'
                    LIMIT 1"; 
                    
                $exec = mysqli_query($con, $query);

                display($exec);
            }
        }
    }

    //data by category
    // function filterCategory($category)
    // {
    //     include  "connection.php";

    //     //get ID
    //     $get = "SELECT
    //                 plant_id
    //             FROM
    //                 plant";
        
    //     $get_id = mysqli_query($con, $get);

    //     if(mysqli_num_rows($get_id) > 0)
    //     {
    //         while($plant = mysqli_fetch_assoc($get_id))
    //         {
    //             //get plants
    //             $getCategory = "SELECT 
    //                         plant.plant_id, plant.plant_name, plant_images.plant_image
    //                     FROM 
    //                         plant 
    //                     LEFT JOIN 
    //                         plant_images
    //                     ON
    //                         plant.plant_id = plant_images.plant_id
    //                     WHERE
    //                         plant_category IN ($category) 
    //                     AND
    //                         plant.plant_id = '".$plant["plant_id"]."'
    //                     LIMIT 1"; 
                    
    //             $exec = mysqli_query($con, $getCategory);


    //             if(mysqli_num_rows($exec) > 0)
    //             {
    //                 display($exec);
    //             } 
    //         }
    //     }
    // }   

    // //plant categories
    // function categories()
    // {
    //     if(isset($_GET["floweringPlants"]))
    //     {
    //         $category = "flowering";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["succulents&cacti"]))
    //     {
    //         $category = "s&c";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["ferns"]))
    //     {
    //         $category = "fern";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["climbers"]))
    //     {
    //         $category = "climber";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["fruitBearing"]))
    //     {
    //         $category = "fruit";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["vegetableBearing"]))
    //     {
    //         $category = "vegetable";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["herbal"]))
    //     {
    //         $category = "herbal";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["fungi"]))
    //     {
    //         $category = "fungi";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["carnivorous"]))
    //     {
    //         $category = "carnivorous";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["toxic"]))
    //     {
    //         $category = "toxic";
    //         filterCategory($category);
    //     }
    //     else if(isset($_GET["ornamental"]))
    //     {
    //         $category = "onramental";
    //         filterCategory($category);
    //     }
    //     else
    //     {
    //         deflt();
    //     }
    // }

    // data by category
    function filterCategory($category)
    {
        include "connection.php";

        // get ID
        $get = "SELECT
                    plant_id
                FROM
                    plant";

        $get_id = mysqli_query($con, $get);

        if (mysqli_num_rows($get_id) > 0) {
            while ($plant = mysqli_fetch_assoc($get_id)) {
                // get plants
                $getCategory = "SELECT 
                            plant.plant_id, plant.plant_name, plant_images.plant_image
                        FROM 
                            plant 
                        LEFT JOIN 
                            plant_images
                        ON
                            plant.plant_id = plant_images.plant_id
                        WHERE
                            FIND_IN_SET('$category', plant_category) > 0
                            AND
                            plant.plant_id = '" . $plant["plant_id"] . "'
                        LIMIT 1";

                $exec = mysqli_query($con, $getCategory);

                if (mysqli_num_rows($exec) > 0) {
                    display($exec);
                }
            }
        }
    }

    // plant categories
    function categories()
    {
        $category = ""; // default empty category

        // Check category
        if (isset($_GET["floweringPlants"])) {
            $category = "flowering";
        } else if (isset($_GET["succulents&cacti"])) {
            $category = "s&c";
        } else if (isset($_GET["ferns"])) {
            $category = "fern";
        } else if (isset($_GET["climbers"])) {
            $category = "climber";
        } else if (isset($_GET["fruitBearing"])) {
            $category = "fruit";
        } else if (isset($_GET["vegetableBearing"])) {
            $category = "vegetable";
        } else if (isset($_GET["herbal"])) {
            $category = "herbal";
        } else if (isset($_GET["fungi"])) {
            $category = "fungi";
        } else if (isset($_GET["carnivorous"])) {
            $category = "carnivorous";
        } else if (isset($_GET["toxic"])) {
            $category = "toxic";
        } else if (isset($_GET["ornamental"])) {
            $category = "onramental";
        }
        else
        {
            deflt();
        }

        filterCategory($category);
    }


    //search filter
    function search()
    {
        include "connection.php";

        if(isset($_GET["btnSearch"]))
        {
            $searchInput = mysqli_real_escape_string($con, $_GET["searchInput"]);

            //get ID
            $get = "SELECT
                        plant_id
                    FROM
                        plant";

            $get_id = mysqli_query($con, $get);

            if(mysqli_num_rows($get_id) > 0)
            {
                while($plant = mysqli_fetch_assoc($get_id))
                {
                    //get plants
                    $search_query = "SELECT 
                                        plant.plant_id, plant.plant_name, plant_images.plant_image
                                    FROM 
                                        plant 
                                    LEFT JOIN 
                                        plant_images
                                    ON
                                        plant.plant_id = plant_images.plant_id
                                    WHERE
                                        plant_name
                                    LIKE 
                                        '%$searchInput%' 
                                    OR
                                        plant_genus_name
                                    LIKE 
                                        '%$searchInput%'
                                    OR
                                        plant_category
                                    LIKE 
                                        '%$searchInput%' 
                                    GROUP BY
                                        plant_id";

                    $exec = mysqli_query($con, $search_query);

                    if(mysqli_num_rows($exec) > 0)
                    {
                        display($exec);
                        break;
                    } 
                    else
                    {
                        echo"<br><br>
                        <center><h4>".$searchInput." not found.</h4></center>";
                        break;
                    }    
                }
            }
        }
    }    

?>