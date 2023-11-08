<?php
    include "connection.php";

    //get id of user
    $getID = "SELECT
                    account_id
                FROM
                    user_account
                WHERE
                    account_email = '".$_SESSION["username"]."'";
    
    $id = mysqli_query($con, $getID);

    $account_id = mysqli_fetch_assoc($id);

    //remove saved
    if(isset($_POST["btnRemove"]))
    {    
        $plant_sale_id = $_POST["btnRemove"];

        $remove_query = "DELETE FROM
                            saved
                        WHERE
                            plant_sale_id = '".$plant_sale_id."' ";
        mysqli_query($con, $remove_query);
    }

    //display saved
    function saved()
    {
        include "connection.php";

        $get_saved = "SELECT
                            saved.account_id, saved.plant_sale_id,
                            plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_type, plant_sale.plant_price, 
                            plant_sale_images.sale_image, 
                            user_account.account_firstname, user_account.account_lastname
                        FROM
                            saved
                        INNER JOIN
                            plant_sale ON plant_sale.plant_sale_id = saved.plant_sale_id
                        INNER JOIN
                            plant_sale_images ON plant_sale_images.plant_sale_id = plant_sale.plant_sale_id
                        INNER JOIN 
                            user_account ON plant_sale.account_id = user_account.account_id
                        WHERE
                            saved.account_id = 
                            (SELECT
                                account_id
                            FROM
                                user_account
                            WHERE
                                account_email = '".$_SESSION["username"]."')
                        AND
                            purchased = 0
                        GROUP BY
                            plant_sale_images.plant_sale_id";
                
        $exec = mysqli_query($con, $get_saved);  

        //populate saved
        if(mysqli_num_rows($exec) > 0)
        {
            while($populate = mysqli_fetch_assoc($exec))
            {
                echo"<div class='card'>
                    <span>";
                    //display default if no plant image is set
                    if ($populate["sale_image"]) 
                    {
                        echo "       <img src='data:image/jpeg;base64," . base64_encode($populate["sale_image"]) . "' class='plantimg' alt='Plant image' style='width:100%' />";
                    } 
                    else 
                    {
                        echo "<img src='../assets/logo.png' class='plantimg' alt='Plant image' style='width:100%'/>";
                    }
                echo "
                    </span>
                        <a href='user_see_plant.php?plant_sale_id=".$populate["plant_sale_id"]."' style='text-decoration: none; color: #45474B'>

                        <h1 class='plantName'>".$populate["plant_name"]."</h1>
                        <p class='plantDef'>".$populate["account_firstname"]." ".$populate["account_lastname"]."</p>
                        ₱ ".$populate["plant_price"]."

                        </a>

                        <form method='POST'>
                        <div style='padding: 5%;'>
                            <button type='submit' name='btnCheckout' value=".$populate["plant_sale_id"].">Check out</button>

                            <button type='submit' name='btnRemove' value='".$populate["plant_sale_id"]."' style='border: none; background-color: transparent; float: right;'>Remove</button>
                        </div>
                        </form>

                    </div>";
            }
        } 
    }

    //user presses check out
    if(isset($_POST["btnCheckout"]))
    {
        $plant_sale_id = $_POST["btnCheckout"];
        $query = "INSERT INTO
                        messaging(account_id, plant_sale_id)
                    VALUES
                        (".$account_id["account_id"].", ".$plant_sale_id.")";
            
        mysqli_query($con, $query);

        header("Location: user_messaging.php?plant_sale_id=".$plant_sale_id);
    }
?>