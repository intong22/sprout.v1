<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_statistics.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <link rel="stylesheet" href="../css/user_sidebar.css">
        <title>STATISTICS</title>
    </head>
    <body>

        <!-- chart -->
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </body>

    <script>
        window.onload = function () {
 
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "dark2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Statistics for <?php echo $month." ".$year; ?>"
                },
                axisY: {
                    title: "Number of Users"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</html>