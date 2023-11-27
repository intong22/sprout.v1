<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_subscriptions.php";
    include "../backend/bcknd_admin_statistics.php";
    include "admin_sidebar.php";
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="website icon" type="png" href="assets\logo.png">
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <title>Statistics</title>
    </head>
    <body>
        <?php
            sidebar();
        ?>

        <section class="home-section">
            <header style="background: #1E5631; padding:40px; color:white">
                <h1 class="colored-text"><span class="white">Sta</span><span class="orange">tistics</span></h1>
                <form method="GET" action="admin_create_encyclopedia.php">
                    <input name="searchInput" class="search-input" type="text" placeholder="Search...">
                    <button name="btnSearch" class="search-button" type="submit">Search</button>
                </form>
            </header>

            <!-- chart -->
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>

            <br><br>
            <h3>Subscriptions</h3>
            <?php
                subscriptions();
            ?>
        </section>
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