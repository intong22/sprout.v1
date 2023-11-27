<?php
    function sidebar()
    {
?>
       
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">

        <div class="sidebar">
            <div class="logo-details">
                <img src="..\assets\logo.png" alt="Logo" class="logo-details">
                <div class="logo_name">Sprout</div>
                <i class="bx bx-menu" id="btn" ></i>
            </div>
            <ul class="nav-list">
            <li>
                <a href="admin_home.php">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">HOME</span>
                </a>
                <span class="tooltip">HOME</span>
            </li>
            <li>
            <a href="admin_manage_user.php">
                <i class="bx bx-user" ></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
            </li>
            <li>
            <a href="admin_create_encyclopedia.php">
                <i class="bx bx-pie-chart-alt-2" ></i>
                <span class="links_name">Encyclopedia</span>
            </a>
            <span class="tooltip">Encyclopedia</span>
            </li>
            <li>
            <a href="admin_manage_report.php">
                <i class="bx bx-folder" ></i>
                <span class="links_name">Reports</span>
            </a>
            <span class="tooltip">Reports</span>
            </li>
            <li>
            <a href="admin_subscriptions.php">
                <i class="bx bx-line-chart" ></i>
                <span class="links_name">Statistics</span>
            </a>
            <span class="tooltip">Statistics</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name">Admin</div>
                    </div>
                </div>
                <a href="../admin_sessions/session_end.php">
                    <i class="bx bx-log-out" id="log_out"></i>
                </a>
            </li>
            </ul>
        </div>
        
        <script src="../js/homepage.js"></script>	
<?php
    }
?>