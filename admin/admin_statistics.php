<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_statistics.php";
    include "admin_sidebar.php";
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="website icon" type="png" href="assets/logo.png">
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <title>Statistics</title>
<style>
table {
width: 100%;
border-collapse: collapse;
margin: 20px;
}

/* Style for table header cells */
th {
background-color: orange;
color: white;
padding: 10px;
}

/* Style for table data cells */
td {
padding: 8px;
border: 1px solid #ccc;
}

        </style>
    </head>
    <body>
        <?php
            sidebar();
        ?>

        <section class="home-section">
            <header style="background: #1E5631; padding:40px; color:white">
                <h1 class="colored-text"><span class="white">Sta</span><span class="orange">tistics</span></h1>
            </header>

            <div style='padding: 20px;'>
                <!-- chart -->
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>

            <br><br>
            <h3>Breakdown</h3>
            <div style="overflow-x:auto;">
                <?php
                    subsTable();
                ?>
            </div>
            <div style='padding: 20px;'>
                <div id='subsChartContainer' style='height: 370px; width: 100%;'></div>
            </div>
            <div style="overflow-x:auto;">
                <?php
                    usersTable();
                ?>
            </div>
            <div style='padding: 20px;'>
                <div id='userChartContainer' style='height: 370px; width: 100%;'></div>
            </div>                    
        </section>
    </body>

    <script>
        //bar chart
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

            //subs pie chart
            var subsChart = new CanvasJS.Chart("subsChartContainer", {
                animationEnabled: true,
                theme: "dark2",
                title: {
                    text: "Subscriptions"
                },
                subtitles: [{
                    text: "<?php echo $month." ".$year; ?>"
                }],
                data: [{
                    type: "pie",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($subs, JSON_NUMERIC_CHECK); ?>
                }]
            });
            subsChart.render();

            //user pie chart
            var userChart = new CanvasJS.Chart("userChartContainer", {
                animationEnabled: true,
                theme: "dark2",
                title: {
                    text: "Users"
                },
                subtitles: [{
                    text: "<?php echo $month." ".$year; ?>"
                }],
                data: [{
                    type: "pie",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($user, JSON_NUMERIC_CHECK); ?>
                }]
            });
            userChart.render();
        }
    </script>
</html>