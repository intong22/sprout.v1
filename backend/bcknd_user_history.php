<?php
    include "connection.php";

    //display row
    function rows()
    {
        echo"<table id='plants'>";

        echo"<tr style='height: 10%'>
                <td class='shopName'><i class='bx bx-store-alt' ></i>Plantita Shop</td>
                <td class='imgtbl'><img src='../assets/sampleplant.jpg' alt='Item image' style='height:100px;width:100px;'></td>
                <td><span style='font-weight:bold;'>Plant Name </span><br/><span># item</span><br/><span>Order Total: ₱#</span></td>
                <td>
                    <i class='fa fa-star'  data-index='0'></i>
                    <i class='fa fa-star' data-index='1'></i>
                    <i class='fa fa-star' data-index='2'></i>
                    <i class='fa fa-star' data-index='3'></i>
                    <i class='fa fa-star' data-index='4'></i>
                </td>
                <td class='iconCenter'><button class='button'>Rate</button></td>
            </tr>";

        echo"</table>";
    }
?>