<?php
    include "connection.php";

    //get id of user
    $getID = "SELECT
                    account_id
                FROM
                    user_account
                WHERE
                    account_email = '".$_SESSION["username"]."' ";
    
    $id = mysqli_query($con, $getID);

    $account_id = mysqli_fetch_assoc($id);

    //get id_to
    $idTo = "SELECT
                    id_to
                FROM
                    messaging
                WHERE
                    message_to = 
                        (SELECT
                            CONCAT(account_firstname, ' ' ,account_lastname) 
                        AS name
                        FROM
                            user_account
                        WHERE
                            account_email = '".$_SESSION["username"]."')";
    
    $retrieveId = mysqli_query($con, $idTo);

    $id_to = mysqli_fetch_assoc($retrieveId);

    //get message_id
    $getID = "SELECT
                    message_id
                FROM
                    messaging
                WHERE
                    account_id = ".$account_id["account_id"]." ";
    
    $mess_id = mysqli_query($con, $getID);

    $message_id = mysqli_fetch_assoc($mess_id);

    //get plant_sale_id
    $getID = "SELECT
                    plant_sale_id
                FROM
                    messaging
                WHERE
                    account_id = ".$account_id["account_id"]." ";
            
    $plant_id = mysqli_query($con, $getID);

    $plant_sale_id = mysqli_fetch_assoc($plant_id);

    //list of chats
    function chats() 
    {
        include "connection.php";

        global $account_id, $plant_sale_id, $id_to;

        if(empty($plant_sale_id["plant_sale_id"]))
        {
           //get plant_sale_id with id_to
            $getID = "SELECT
                            plant_sale_id
                        FROM
                            messaging
                        WHERE
                            id_to = ".$id_to["id_to"]." ";
                    
            $plant_id = mysqli_query($con, $getID);

            $plant_sale_id = mysqli_fetch_assoc($plant_id);
        }

        $query = "SELECT
                    u.account_id, 
                    ps.plant_sale_id, 
                    m.message_id, m.message_from, m.message_to
                FROM 
                    user_account u
                INNER JOIN 
                    plant_sale ps ON ps.account_id = u.account_id
                INNER JOIN 
                    messaging m ON m.plant_sale_id = ps.plant_sale_id
                WHERE 
                    m.plant_sale_id = ".$plant_sale_id["plant_sale_id"]." ";

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) 
        {
            while ($res = mysqli_fetch_assoc($result)) 
            {
                echo "<form method='POST'>
                    <div class='user-card' id='user1'>
                        <button type='submit' style='border: none;' name='btnSellerChat' class='user-card' value='".$res["plant_sale_id"]."'>";
                
                if ($account_id["account_id"] == $res["account_id"]) 
                {
                    echo $res["message_from"];
                } else 
                {
                    echo $res["message_to"];
                }

                echo "</button>
                    </div>
                    </form>";
            }
        }
    }

        //user clicks on chat list
    if (isset($_POST["btnSellerChat"]))
    {
        //get sale information
        $sale_id = $_POST["btnSellerChat"];

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
                        plant_sale.plant_sale_id = ".$sale_id."
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
                $item_price = "₱ ".$data["plant_price"];
            }
        }  
    }

    //send message
    if(isset($_POST["btnMessage"]))
    {
        global $account_id, $message_id;

        //get plant_sale_id
        $getID = "SELECT
                        plant_sale_id
                    FROM
                        messaging
                    WHERE
                        account_id = '".$account_id["account_id"]."' ";
            
        $plant_id = mysqli_query($con, $getID);

        $plant_sale_id = mysqli_fetch_assoc($plant_id);

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

        if(!empty($message_details))
        {
            //save to db
            $query = "INSERT INTO
                        message_content(message_id ,account_id, plant_sale_id, message_details, message_photo)
                    VALUES
                        (".$message_id["message_id"].", ".$account_id["account_id"].", ".$plant_sale_id["plant_sale_id"].", '".$message_details."', '".$message_photo."')";
        
            mysqli_query($con, $query);
        }
    }
?>