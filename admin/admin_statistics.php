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
.button-category {
    background-color: #1E5631;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    margin-right: 10px;
    margin-left: 10px; /* Add margin to the left */
    transition: background-color 0.3s;
}

.button-category:hover {
    background-color: orange;
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

            <form method="POST">
                <button type="submit" name="btnMonth" value="1" class="button-category">Jan</button>
                <button type="submit" name="btnMonth" value="2" class="button-category">Feb</button>
                <button type="submit" name="btnMonth" value="3"class="button-category">Mar</button>
                <button type="submit" name="btnMonth" value="4"class="button-category">Apr</button>
                <button type="submit" name="btnMonth" value="5"class="button-category">May</button>
                <button type="submit" name="btnMonth" value="6"class="button-category">Jun</button>
                <button type="submit" name="btnMonth" value="7"class="button-category">Jul</button>
                <button type="submit" name="btnMonth" value="8"class="button-category">Aug</button>
                <button type="submit" name="btnMonth" value="9"class="button-category">Sep</button>
                <button type="submit" name="btnMonth" value="10"class="button-category">Oct</button>
                <button type="submit" name="btnMonth" value="11"class="button-category">Nov</button>
                <button type="submit" name="btnMonth" value="12"class="button-category">Dec</button>
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


                    // Download button
                    echo "<button onclick='downloadTableAsPDF()'class='button-category'>Download Subscriptions Table</button>";


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