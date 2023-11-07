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

    //populate table
    function displayTable()
    {
        include "connection.php";

        $get_data = "SELECT
                        saved.plant_sale_id,
                        plant_sale.plant_name, plant_sale.plant_price, 
                        plant_sale_images.sale_image,
                        user_account.account_firstname, user_account.account_lastname
                    FROM
                        saved
                    INNER JOIN
                        plant_sale ON saved.plant_sale_id = plant_sale.plant_sale_id 
                    INNER JOIN 
                        user_account ON saved.account_id = user_account.account_id
                    INNER JOIN 
                        plant_sale_images ON plant_sale.plant_sale_id = plant_sale_images.plant_sale_id
                    WHERE
                        saved.plant_sale_id IS NOT NULL
                    AND
                        user_account.account_id =
                        (
                        SELECT 
                             account_id
                        FROM
                            user_account
                        WHERE
                            account_email = '" . $_SESSION["username"] . "'
                        )
                    
                    GROUP BY
                        plant_sale_images.plant_sale_id";
        
        //get plant card data
        $query = "SELECT
                    plant_sale.plant_sale_id, plant_sale.plant_name, plant_sale.plant_type, plant_sale.plant_price, 
                    plant_sale_images.sale_image,
                    user_account.account_firstname, user_account.account_lastname
                FROM
                    plant_sale 
                INNER JOIN 
                    user_account ON plant_sale.account_id = user_account.account_id
                INNER JOIN 
                    plant_sale_images ON plant_sale.plant_sale_id = plant_sale_images.plant_sale_id
                GROUP BY
                    plant_sale_images.plant_sale_id";
        
        $exec = mysqli_query($con, $get_data);

        $counter = 0;

        if(mysqli_num_rows($exec) > 0)
        {
            echo"<table id='plants'>";
            while($sale_details = mysqli_fetch_assoc($exec))
            {
                populateTable($sale_details, $counter);
                $counter++;
            }
            echo"</table>";
        }
    }

    //display table
    function populateTable($populate, $counter)
    {
        echo"<tr style='height: 10%'>
                <td class='shopName'><i class='bx bx-store-alt' ></i>".$populate["account_firstname"]." ".$populate["account_lastname"]."</td>
                <td class='imgtbl'>";
                //display default if no plant image is set
                if($populate["sale_image"])
                {
                    echo"       <img src='data:image/jpeg;base64,".base64_encode($populate["sale_image"])."' class='plantimg' alt='Item image' style='height:100px;width:100px;' />";
                }
                else
                {
                    echo "<img src='../assets/logo.png' class='plantimg' alt='Plant image' />";
                }     
        echo"        </td>
                <td><span style='font-weight:bold;'>".$populate["plant_name"]."</span><br/><span>Order Total: ₱ ".$populate["plant_price"]."</span></td>
                <td class='iconCenter'><button class='button' id='myBtn".$counter."' >Rate</button></td>
            </tr>";
        
        modal($counter, $populate);
    }


    function modal($counter, $populate)
    {
        //modal
        echo"<form method='POST'>
                <div id='myModal".$counter."' class='modal'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <span class='close'>&times;</span>
                            <h2>Marketplace</h2>
                        </div>
                        <div class='modal-body'>
                            <br><br>

                            <input type='text' name='plant_sale_id' hidden value='".$populate["plant_sale_id"]."'>

                            <label for='description'>Comment:</label><br>
                            <textarea name='sale_comment' id='comment".$counter."' name='description' rows='4' cols='50' ></textarea><br><br>

                            <label for='rating'>Rating:</label>

                            <button name='star' value=1 style='border: none; background-color: #ffffff;'><i class='fa fa-star' data-index='0' ></i></button>
    
                            <button name='star' value=2 style='border: none; background-color: #ffffff;' ><i class='fa fa-star' data-index='1'></i></button>
                                
                            <button name='star' value=3 style='border: none; background-color: #ffffff;' ><i class='fa fa-star' data-index='2'></i></button>
                                
                            <button name='star' value=4 style='border: none; background-color: #ffffff;' ><i class='fa fa-star' data-index='3'></i></button>
                                
                            <button name='star' value=5 style='border: none; background-color: #ffffff;' ><i class='fa fa-star' data-index='4'></i></button>
        
                        </div>
                        <div class='modal-footer'>
                            <h3>Rate</h3>
                        </div>
                    </div>
                </div>
            </form>";

        //modal script
        echo"<script>
                var modal".$counter." = document.getElementById('myModal".$counter."');
                var btn".$counter." = document.getElementById('myBtn".$counter."');
                var span = document.getElementsByClassName('close')[".$counter."];

                btn".$counter.".onclick = function() {
                modal".$counter.".style.display = 'block';
                }

                span.onclick = function() {
                modal".$counter.".style.display = 'none';
                }

                window.onclick = function(event) {
                    if (event.target == modal".$counter.") {
                        modal".$counter.".style.display = 'none';
                    }
                }
            </script>";

    //js for star animation and to save to db
    echo "<script>
            $(document).ready(function ()
            {
                resetStarColors();

                $('.fa-star').on('click', function()
                {
                    var currentRow = $(this).closest('.modal-body');
                    var rated = parseInt($(this).data('index'));
                    currentRow.data('rated', rated);
                });

                $('.fa-star').mouseover(function () 
                {
                    var currentRow = $(this).closest('.modal-body');
                    resetStarColors(currentRow);
                    var current = parseInt($(this).data('index'));

                    for (var i = 0; i <= current; i++) {
                        currentRow.find('.fa-star:eq(' + i + ')').css('color', '#FFB000');
                    }
                });

                $('.fa-star').mouseleave(function () 
                {
                    var currentRow = $(this).closest('.modal-body');
                    resetStarColors(currentRow);

                    var rated = currentRow.data('rated');
                    if (rated != -1) {
                        for (var i = 0; i <= rated; i++) {
                            currentRow.find('.fa-star:eq(' + i + ')').css('color', '#FFB000');
                        }
                    }
                });
            });

            function resetStarColors()
            {
                $('.fa-star').css('color', '#D0D4CA');
            }
        </script>
        
        <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'>
        </script>";
    }

    if(isset($_POST["star"]))
    {
        $sale_comment = $_POST["sale_comment"];
        $sale_rating = $_POST["star"];
        $plant_sale_id = $_POST["plant_sale_id"];

        // echo"<center>".$plant_sale_id."</center>";

        // insert query
        $query = "INSERT INTO
                        plant_sale_rating(plant_sale_id, account_id, sale_rating, sale_comment)
                    VALUES
                        (".$plant_sale_id.", ".$account_id["account_id"].", ".$sale_rating.", '".$sale_comment."')";
        mysqli_query($con, $query);

        echo"<script>
                alert('Rating has been recorded.');
                window.location.href = 'user_history.php';
            </sript>";
    }
    
?>
<!-- <i class='fa fa-star' data-index='1'></i>
<i class='fa fa-star' data-index='2'></i>
<i class='fa fa-star' data-index='3'></i>
<i class='fa fa-star' data-index='4'></i>
<br>

 <button name='btnRate' id='rate' class='button'>Submit</button> -->