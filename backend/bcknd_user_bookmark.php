<?php
    include "connection.php";

    //delete bookmark
    if(isset($_POST["removeBookmark"]))
    {
        $remove = $_POST["removeBookmark"];

        for($i = 0; $i < count($remove); $i++)
        {
            $remove_query = "UPDATE
                            plant
                        SET
                            bookmark = false
                        WHERE
                            plant_id = '".$remove[$i]."' ";
            mysqli_query($con, $remove_query);
        }
    }

    //display bookmarked
    function bookmarked()
    {
        include "connection.php";

        //get account ID of poster
        $getIDQuery = "SELECT
                            account_id
                        FROM
                            user_account
                        WHERE
                            account_email = '".$_SESSION["username"]."' ";
             
        $id = mysqli_query($con, $getIDQuery);
 
        if(mysqli_num_rows($id) > 0)
        {
            $userID = mysqli_fetch_assoc($id);
            $account_id = $userID["account_id"];
        }

        $get = "SELECT
                    plant_id
                FROM
                    plant";
        
        $get_id = mysqli_query($con, $get);

        if(mysqli_num_rows($get_id) > 0)
        {
            echo"<form method='POST' action='user_bookmark.php'>
                <table id='plants'>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><button type='submit' name='btnRemoveBookmark'>REMOVE BOOKMARK</button></th>
                    </tr>";
            while($plants = mysqli_fetch_assoc($get_id))
            {
                $get_bookmarked = "SELECT
                                        plant.plant_id, plant.plant_name, 
                                        plant_type.plant_type_details, plant_type.plant_image,
                                        saved.account_id, saved.plant_id,
                                        user_account.account_id
                                    FROM
                                        plant
                                    INNER JOIN
                                        plant_type ON plant.plant_id = plant_type.plant_id
                                    INNER JOIN
                                        saved ON plant.plant_id = saved.plant_id
                                    INNER JOIN
                                        user_account ON saved.account_id = user_account.account_id
                                    WHERE
                                        user_account.account_id = '".$account_id."'
                                    AND
                                        plant.plant_id = '".$plants["plant_id"]."'
                                    LIMIT 1";
                
                $exec = mysqli_query($con, $get_bookmarked);  

                //populate bookmark
                if(mysqli_num_rows($exec) > 0)
                {
                    while($populate = mysqli_fetch_assoc($exec))
                    {
                        echo"
                            <tr style='height: 10%'>
                                <td style='width:30%; text-align: right;'>
                                    <a href='user_plant_tips.php?plant_id=".$populate["plant_id"]." '><img src='data:image/jpeg;base64,".base64_encode($populate["plant_image"])."' alt='Plant image' style='height:100px;width:100px;'></a>
                                </td>
                                <td style='vertical-align: top; width:40%;'><span style='font-weight:bold;vertical-align: text-top;'>
                                    <a href='user_plant_tips.php?plant_id=".$populate["plant_id"]." '>".$populate["plant_name"]."</span><br/>
                                    <span style='max-width: 150px;'>".$populate["plant_type_details"]."</a></span>
                                </td>
                                <td><input type='checkbox' name='removeBookmark[]' value='".$populate["plant_id"]."' class='removebookmark'></td> 
                            </tr>
                            ";
                    }
                } 
            }
            echo"</table>
            <form>";
        }
    }
?>