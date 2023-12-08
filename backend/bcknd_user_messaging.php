<?php
    include "../backend/session_logged_in.php";
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
    $get_idto = "SELECT
                        id_to
                    FROM
                        messaging
                    WHERE
                        account_id = ".$account_id["account_id"]." ";

    $idto = mysqli_query($con, $get_idto);

    $id_to = mysqli_fetch_assoc($idto);

    //get message_id
    $getID = "SELECT
                    message_id
                FROM
                    messaging
                WHERE
                    account_id = ".$account_id["account_id"]." 
                OR
                    id_to = ".$account_id["account_id"]." ";
    
    $mess_id = mysqli_query($con, $getID);

    //get plant_sale_id
    $getID = "SELECT
                    plant_sale_id
                FROM
                    messaging
                WHERE
                    account_id = ".$account_id["account_id"]." 
                OR
                    id_to = ".$account_id["account_id"]."";
            
    $plant_id = mysqli_query($con, $getID);

    $plant_sale_id = mysqli_fetch_assoc($plant_id);

    //list of chats
    function chats() 
    {
        include "connection.php";

        global $account_id, $plant_sale_id, $id_to, $mess_id;

        if(empty($plant_sale_id["plant_sale_id"]))
        {
           //get plant_sale_id with account_id
            $getID = "SELECT
                            plant_sale_id
                        FROM
                            messaging
                        WHERE
                            account_id = ".$account_id["account_id"]." ";
                    
            $plant_id = mysqli_query($con, $getID);

            $plant_sale_id = mysqli_fetch_assoc($plant_id);
        }

        echo"<form method='POST'>";
        while($msg_id = mysqli_fetch_assoc($mess_id))
        {        
            chatNames($msg_id, $account_id, $con);
        }
        echo"</form>";
    }

    //list of chat names
    function chatNames($msg_id, $account_id, $con)
    {
        $query = "SELECT
                        user_account.account_firstname, user_account.account_lastname, 
                        plant_sale.plant_sale_id, 
                        messaging.message_id, messaging.account_id, messaging.id_to, messaging.message_read
                    FROM 
                        user_account
                    INNER JOIN 
                        plant_sale ON plant_sale.account_id = user_account.account_id
                    INNER JOIN 
                        messaging ON messaging.plant_sale_id = plant_sale.plant_sale_id
                    WHERE 
                       
                        message_id = ".$msg_id["message_id"]."
                    AND
                        (messaging.account_id = ".$account_id["account_id"]." 
                            OR
                        id_to = ".$account_id["account_id"]." )";

            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) 
            {
                while ($res = mysqli_fetch_assoc($result)) 
                {
                    echo"<div class='user-card'>
                            <button type='submit' style='border: none;' name='btnSellerChat' class='user-card' value=".$res["plant_sale_id"].">
                            <input type='hidden' name='message_id' value=".$res["message_id"].">";

                    if($account_id["account_id"] == $res["account_id"]) 
                    {
                        //message from
                        if($res["message_read"] == 0)
                        {
                            echo"<p style='font-weight: bold;'>".$res["account_firstname"]." ".$res["account_lastname"]."&nbsp;&nbsp;
                            </p>";
                        }
                        else
                        {
                            echo"<p>".$res["account_firstname"]." ".$res["account_lastname"]."</p>";
                        }
                    } 
                    else 
                    {
                        //message to
                        $to = "SELECT
                                    user_account.account_firstname, user_account.account_lastname
                                FROM
                                    user_account
                                INNER JOIN
                                    messaging ON messaging.account_id = user_account.account_id
                                WHERE
                                    messaging.id_to = ".$account_id["account_id"]." 
                                AND
                                    message_id = ".$msg_id["message_id"]." ";
                        
                        $row = mysqli_query($con, $to);

                        while($name = mysqli_fetch_assoc($row))
                        {                            
                            if($res["message_read"] == 0)
                            {
                                echo"<p style='font-weight: bold;'>".$name["account_firstname"]." ".$name["account_lastname"]."&nbsp;&nbsp;
                                </p>";
                            }
                            else
                            {
                                echo"<p>".$res["account_firstname"]." ".$res["account_lastname"]."</p>";
                            }
                        }
                    }

                    echo"</button>
                        <button type='submit' name='del_msg' style='border: none;' value=".$res["message_id"].">Delete</button>
                        </div>";
                }
            }
    }

    //user deletes message
    if(isset($_POST["del_msg"]))
    {
        $message_id = $_POST["del_msg"];

        $delete = "DELETE FROM
                        messaging
                    WHERE
                        message_id = ".$message_id." ";

        mysqli_query($con, $delete);
    }

    //user clicks on chat list
    if(isset($_POST["btnSellerChat"]))
    {
        //get sale information
        $sale_id = $_POST["btnSellerChat"];
        $message_id = $_POST["message_id"];

        $query = "SELECT
                        plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_price, 
                        plant_sale_images.sale_image, 
                        user_account.account_id, user_account.account_firstname, user_account.account_lastname
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

                //if seller is account owner
                if($account_id["account_id"] == $data["account_id"])
                {
                    $seller_name = "You";
                }
                else
                {
                    $seller_name = $data["account_firstname"]." ".$data["account_lastname"];
                }
                $item_name = $data["plant_name"];
                $item_price = "₱ ".number_format($data["plant_price"]);
            }
        } 
        
        //update messaging table
        $update = "UPDATE
                        messaging
                    SET
                        message_read = 1
                    WHERE
                        message_id = ".$message_id." 
                    AND
                        account_id = ".$account_id["account_id"]."
                    OR
                        id_to = ".$account_id["account_id"]." ";
        mysqli_query($con, $update);
    }

    //send message
    if(isset($_POST["btnMessage"]))
    {
        global $account_id;

        $message_id = $_POST["btnMessage"];
        $plant_sale_id = $_POST["plant_sale_id"];
        $message_details = mysqli_real_escape_string($con, $_POST["message_details"]);
        $message_photo = "";

        //get messaging data
        $getID = "SELECT
                        account_id, id_to
                    FROM
                        messaging
                    WHERE
                        plant_sale_id = ".$plant_sale_id."
                    AND
                        message_id = ".$message_id."
                    AND
                        (account_id = ".$account_id["account_id"]."
                        OR
                        id_to = ".$account_id["account_id"].")";
            
        $data = mysqli_query($con, $getID);

        //check if image is added
        if(isset($_FILES["message_photo"]) && $_FILES["message_photo"]["error"] == 0)
        {
                $message_photo = addslashes(file_get_contents($_FILES["message_photo"]["tmp_name"]));
        }
        else
        {
            $message_photo = null;
        }

        if(!empty($message_details))
        {
            while($msg_data = mysqli_fetch_assoc($data))
            {
                //if user is sender
                if($account_id["account_id"] == $msg_data["id_to"])
                {
                    $query = "INSERT INTO
                            message_content(message_id ,account_id, plant_sale_id, id_to, message_details, message_photo, message_time)
                        VALUES
                            (".$message_id.", ".$account_id["account_id"].", ".$plant_sale_id.", ".$msg_data["account_id"].", '".$message_details."', '".$message_photo."', NOW()) ";
            
                    mysqli_query($con, $query);
                    break;
                }
                else
                {
                    $query = "INSERT INTO
                            message_content(message_id ,account_id, plant_sale_id, id_to, message_details, message_photo, message_time)
                        VALUES
                            (".$message_id.", ".$account_id["account_id"].", ".$plant_sale_id.", ".$msg_data["id_to"].", '".$message_details."', '".$message_photo."', NOW()) ";
            
                    mysqli_query($con, $query);
                    break;
                }
            }
        }
        else
        {
            while($msg_data = mysqli_fetch_assoc($data))
            {
                //if user is sender
                if($account_id["account_id"] == $msg_data["id_to"])
                {
                    $query = "INSERT INTO
                            message_content(message_id ,account_id, plant_sale_id, id_to, message_photo, message_time)
                        VALUES
                            (".$message_id.", ".$account_id["account_id"].", ".$plant_sale_id.", ".$msg_data["account_id"].", '".$message_photo."', NOW()) ";
            
                    mysqli_query($con, $query);
                    break;
                }
                else
                {
                    $query = "INSERT INTO
                            message_content(message_id ,account_id, plant_sale_id, id_to, message_photo, message_time)
                        VALUES
                            (".$message_id.", ".$account_id["account_id"].", ".$plant_sale_id.", ".$msg_data["id_to"].", '".$message_photo."', NOW()) ";
            
                    mysqli_query($con, $query);
                    break;
                }  
            }
        }

        //update messaging table
        $update = "UPDATE
                        messaging
                    SET
                        message_read = 0
                    WHERE
                        message_id = ".$message_id." 
                    AND
                        account_id = ".$account_id["account_id"]."
                    OR
                        id_to = ".$account_id["account_id"]." ";
        mysqli_query($con, $update);
    }

    //displaying chat bubbles
    function chatBubble($plant_sale_id, $message_id)
    {
        include "connection.php";

        global $account_id;

        $html = ''; // Initialize an empty string to store HTML

        $query = "SELECT
                        account_id, message_details, message_photo, message_time
                    FROM
                        message_content
                    WHERE
                        message_id = ".$message_id."
                    AND
                        plant_sale_id = ".$plant_sale_id."
                    AND
                        (account_id = ".$account_id["account_id"]." 
                    OR
                        id_to = ".$account_id["account_id"].") ";

        // echo "account_id: ".$account_id["account_id"]."<br><br>";
            
        $exec = mysqli_query($con, $query);

        if(mysqli_num_rows($exec))
        {
            while($data = mysqli_fetch_assoc($exec))
            {
                // echo "data account_id: ".$data["account_id"]."<br>";
                if($data["account_id"] == $account_id["account_id"])
                {
                    $html .= buyer($data);
                }
                else
                {
                    $html .= seller($data);
                }
            }
        }
        return $html; // Return the concatenated HTML
    }

    //buyer chat bubble
    function buyer($data)
    {
        $image = "<img src='data:image/jpeg;base64,".base64_encode($data["message_photo"])."' alt='Image' />";

        $html = ''; 

        $timestamp = strtotime($data["message_time"]);
        $formattedTime = date('F j, Y, g:i a', $timestamp);

        if(!empty($data["message_photo"]))
        {
            $html .= "<div class='card'>
                    <p style='align-content:right'>".$image."</p>
                    <sub style='align-content:right'>".$formattedTime."</sub>
                </div>
                <br>";
        }
        
        if(!empty($data["message_details"]))
        {
            $html .= "<div class='card'>
                    <p style='align-content:right'>".$data["message_details"]."</p>
                    <sub style='align-content:right'>".$formattedTime."</sub>
                </div>
                <br>";
        }
        return $html;
    }

    //seller chat bubble
    function seller($data)
    {
        $image = "<img src='data:image/jpeg;base64,".base64_encode($data["message_photo"])."' alt='Image' />";

        $html = '';

        $timestamp = strtotime($data["message_time"]);
        $formattedTime = date('F j, Y, g:i a', $timestamp);

        if(!empty($data["message_photo"]))
        {
            $html .= "<div class='cards'>
                    <p style='align-content:right'>".$image."</p>
                    <sub style='align-content:right'>".$formattedTime."</sub>
                </div>
                <br>";
        }

        if(!empty($data["message_details"]))
        {
            $html .= "<div class='cards'>
                    <p style='align-content:right'>".$data["message_details"]."</p>
                    <sub style='align-content:right'>".$formattedTime."</sub>
                </div>
                <br>";
        }
        return $html;
    }

    // Handle the AJAX request to update the chat
    if (isset($_POST['action']) && $_POST['action'] == 'updateChat') 
    {
        $updatedChatHtml = chatBubble($_POST['plant_sale_id'], $_POST['message_id']);
        echo $updatedChatHtml;
        exit;
    }

    //transaction is complete
    if(isset($_POST["sold"]))
    {
        $plant_sale_id = $_POST["sold"];
        $message_id = $_POST["message_id"];
        $seller_name = $_POST["seller_name"];
        global $id_to, $account_id;

        // echo"<center>".$plant_sale_id."</center>";
        // echo"<center>".$message_id."</center>";

        // if($seller_name != "You")
        // {
        //     //insert into saved table
        //     $complete = "INSERT INTO
        //                     saved(account_id, plant_sale_id)
        //                 VALUES
        //                     (".$account_id["account_id"].", ".$plant_sale_id.")";
            
        //     mysqli_query($con, $complete);
        // }

        //get messaging data
        $getID = "SELECT
                        account_id, id_to
                    FROM
                        messaging
                    WHERE
                        plant_sale_id = ".$plant_sale_id."
                    AND
                        message_id = ".$message_id."
                    AND
                        (account_id = ".$account_id["account_id"]."
                        OR
                        id_to = ".$account_id["account_id"].")";
            
        $data = mysqli_query($con, $getID);

        if(mysqli_num_rows($data) > 0)
        {
            //insert into sold table
            while($row = mysqli_fetch_assoc($data))
            {
                if($row["account_id"] == $account_id["account_id"] && $sellet_name == "You")
                {
                    $sold = "INSERT INTO
                                sold(plant_sale_id, account_id, sold_by, date_sold)
                            VALUES
                                (".$plant_sale_id.", ".$account_id["account_id"].", ".$row["account_id"]." NOW())";

                    mysqli_query($con, $sold);
                    break;
                }
                else
                {
                    $sold = "INSERT INTO
                                sold(plant_sale_id, account_id, sold_by, date_sold)
                            VALUES
                                (".$plant_sale_id.", ".$row["account_id"].", ".$account_id["account_id"].", NOW())";

                    mysqli_query($con, $sold);
                    break;
                }
            }
        }

        
    }
?>