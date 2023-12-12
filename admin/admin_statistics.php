<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_statistics.php";
    include "admin_sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="stylesheet" href="../css/stat.css">
    <link rel="website icon" type="png" href="assets/logo.png">
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src='https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js'></script>
    <script src='https://unpkg.com/html2pdf.js@latest/dist/html2pdf.bundle.js'></script>
    

        <title>Statistics</title>
<style>


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

            <form method="POST">
                <button type="submit" name="btnMonth" value="1">Jan</button>
                <button type="submit" name="btnMonth" value="2">Feb</button>
                <button type="submit" name="btnMonth" value="3">Mar</button>
                <button type="submit" name="btnMonth" value="4">Apr</button>
                <button type="submit" name="btnMonth" value="5">May</button>
                <button type="submit" name="btnMonth" value="6">Jun</button>
                <button type="submit" name="btnMonth" value="7">Jul</button>
                <button type="submit" name="btnMonth" value="8">Aug</button>
                <button type="submit" name="btnMonth" value="9">Sep</button>
                <button type="submit" name="btnMonth" value="10">Oct</button>
                <button type="submit" name="btnMonth" value="11">Nov</button>
                <button type="submit" name="btnMonth" value="12">Dec</button>
            </form>

            <?php 
                // Download button
                echo "<button onclick='downloadTableAsPDF()'>Download Subscriptions Table</button>";
            ?>

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
            </div><br><br>
            <div style='padding: 20px;'>
                <div id='subsChartContainer' style='height: 370px; width: 100%;'></div>
            </div><br><br>
            <div style="overflow-x:auto;">
                <?php
                    usersTable();
                ?>
            </div><br><br>
            <div style='padding: 20px;'>
                <div id='userChartContainer' style='height: 370px; width: 100%;'></div>
            </div><br><br>                  
        </section>
    </body>

    <script>
        //bar chart
        window.onload = function () {
 
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Statistics for <?php if(isset($_POST["btnMonth"])){ echo $month_selected;}else{echo $month;}" ".$year; ?>"
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
                theme: "light",
                title: {
                    text: "Subscriptions"
                },
                subtitles: [{
                    text: "<?php if(isset($_POST["btnMonth"])){ echo $month_selected;}else{echo $month;}" ".$year; ?>"
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
                theme: "light",
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

        function downloadTableAsPDF() {
            var element = document.getElementById('subsTable');

            if (typeof html2pdf !== 'undefined') {
                var opt = {
                    margin: 5,
                    filename: 'subscriptions_table.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 3 }, // Increase scale for better quality
                    jsPDF: { unit: 'mm', format: [216, 500], orientation: 'landscape' }
                };

                var totalPagesExp = "{total_pages}";

                if (!element.querySelector('tbody tr')) {
                    // Add a placeholder row if the table is empty
                    var tbody = element.querySelector('tbody');
                    var tr = document.createElement('tr');
                    var td = document.createElement('td');
                    td.textContent = 'No data available';
                    td.colSpan = 7; // Adjust the colspan based on the number of columns in your table
                    tr.appendChild(td);
                    tbody.appendChild(tr);
                }

                function generatePDF() {
                    html2pdf(element, opt).then(function (pdf) {
                        var totalPages = pdf.internal.pages.length;

                        opt.jsPDF.jsPDF.totalPagesExp = totalPages;

                        for (var i = 1; i <= totalPages; i++) {
                            pdf.setPage(i);
                            pdf.addPage();
                        }
                        pdf.save('subscriptions_table.pdf');
                    });
                }

                generatePDF();
            } else {
                console.error('html2pdf is not defined. Make sure the library is loaded.');
            }
        }
    </script>
</html>