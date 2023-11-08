<?php
    include "connection.php";

    $plant_sale_id = $_GET["plant_sale_id"];

    //get id of user
    $getID = "SELECT
                    account_id
                FROM
                    user_account
                WHERE
                    account_email = '".$_SESSION["username"]."'";
    
    $id = mysqli_query($con, $getID);

    $account_id = mysqli_fetch_assoc($id);

    //get message_id
    $getID = "SELECT
                    message_id
                FROM
                    messaging
                WHERE
                    account_id = '".$account_id["account_id"]."'
                AND
                    plant_sale_id = ".$plant_sale_id." ";
    
    $mess_id = mysqli_query($con, $getID);

    $message_id = mysqli_fetch_assoc($mess_id);

    if(isset($_GET["plant_sale_id"]))
    {              
        //get sale information
        $query = "SELECT
                        plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_price, 
                        plant_sale_images.sale_image, 
                        user_account.account_firstname, user_account.account_lastname
                    FROM
                        plant_sale
                    INNER JOIN
                        plant_sale_images ON plant_sale_images.plant_sale_id = plant_sale.plant_sale_id
                    INNER JOIN 
                        user_account ON plant_sale.account_id = user_account.account_id
                    WHERE
                        plant_sale.plant_sale_id = ".$plant_sale_id."
                    GROUP BY
                        plant_sale_images.plant_sale_id";

        $exec = mysqli_query($con, $query);  

        //populate saved
        if(mysqli_num_rows($exec) > 0)
        {
            while($data = mysqli_fetch_assoc($exec))
            {
                if(!empty($data["sale_image"]))
                {
                    $sale_image = "<img src='data:image/jpeg;base64,".base64_encode($data["sale_image"])."' alt='Item image' class='product-image'/>";
                }

                $seller_name = $data["account_firstname"]." ".$data["account_lastname"];
                $item_name = $data["plant_name"];
                $item_price = $data["plant_price"];
            }
        }
    }

    //send message
    if(isset($_POST["btnMessage"]))
    {
        $message_details = mysqli_real_escape_string($con, $_POST["message_details"]);
        $message_photo = null;

        //check if image is added
        if(isset($_FILES["message_photo"]) && count($_FILES["message_photo"]["error"]) > 0) {
            foreach($_FILES["message_photo"]["error"] as $key => $error) {
                if ($error == 0) 
                {
                    $message_photo = addslashes(file_get_contents($_FILES["message_photo"]["tmp_name"][$key]));
                }
            }
        }

        //save to db
        $query = "INSERT INTO
                        message_content(message_id ,account_id, message_details, message_photo)
                    VALUES
                        (".$message_id["message_id"].", ".$account_id["account_id"].", '".$message_details."', '".$message_photo."')";
        
        mysqli_query($con, $query);
    }

    //displaying chat bubbles
    function chatBubble()
    {
        include "connection.php";

        global $message_id, $account_id;

        $query = "SELECT
                        account_id, message_details, message_photo
                    FROM
                        message_content
                    WHERE
                        message_id = ".$message_id["message_id"]." ";
        
        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec))
        {
            while($data = mysqli_fetch_assoc($exec))
            {
                if($data["account_id"] == $account_id["account_id"])
                {
                    buyer($data);
                }
                else
                {
                    seller($data);
                }
            }
        }
    }

    //buyer chat bubble
    function buyer($data)
    {
        $image = "<img src='data:image/jpeg;base64,".base64_encode($data["message_photo"])."' alt='User image' class='forum-image' />";

        if(!empty($data["message_photo"]))
        {
            echo"<div class='card'>
                    <p style='align-content:right'>".$image."</p>
                </div>
                <br>";
        }
        
        echo"<div class='card'>
                    <p style='align-content:right'>".$data["message_details"]."</p>
            </div>
            <br>";
    }

    //seller chat bubble
    function seller($data)
    {
         $image = "<img src='data:image/jpeg;base64,".base64_encode($data["message_photo"])."' alt='User image' class='forum-image' />";

        if(!empty($data["message_photo"]))
        {
            echo"<div class='cards'>
                    <p style='align-content:right'>".$image."</p>
                </div>
                <br>";
        }
        
        echo"<div class='cards'>
                    <p style='align-content:right'>".$data["message_details"]."</p>
            </div>
            <br>";
    }

    //list of chats
    function chats()
    {
        echo"<div class='user-card' id='user2'>World</div>";
    }
?>