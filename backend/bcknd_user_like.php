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

        $remove_mess = "DELETE FROM
                            messaging
                        WHERE
                            plant_sale_id = '".$plant_sale_id."' ";
        mysqli_query($con, $remove_mess);
    }

    //display saved
    function saved()
    {
        include "connection.php";

        $get_saved = "SELECT
                            saved.account_id, saved.plant_sale_id,
                            plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.category, plant_sale.plant_price, 
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
                        ₱ ".number_format($populate["plant_price"], 2)."

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

        //check if already in chats
        $check = "SELECT
                        plant_sale_id
                    FROM
                        messaging
                    WHERE
                        account_id = ".$account_id["account_id"]." 
                    AND
                        plant_sale_id = ".$plant_sale_id." ";
            
        $res = mysqli_query($con, $check);

        if(mysqli_num_rows($res) <= 0)
        {
            $query = "INSERT INTO
                        messaging(account_id, plant_sale_id, id_to)
                    VALUES
                        (".$account_id["account_id"].", ".$plant_sale_id.", 
                        (SELECT
                            account_id
                        FROM
                            plant_sale
                        WHERE
                            plant_sale_id = ".$plant_sale_id." ))";
            
            mysqli_query($con, $query);
        }

        header("Location: user_messaging.php");
    }
?>