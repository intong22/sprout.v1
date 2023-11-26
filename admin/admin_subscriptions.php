<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_subscriptions.php";
    include "admin_sidebar.php";
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="../css/user_sidebar.css">
    <link rel="stylesheet" href="../css/user_homepage.css">
    <link rel="website icon" type="png" href="assets\logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <title>Manage subscriptions</title>
    </head>
    <body>
        <?php
            sidebar();
        ?>

        <section class="home-section">
            <header style="background: #1E5631; padding:40px; color:white">
                <h1 class="colored-text"><span class="white">Manage</span> <span class="orange">Subscription</span></h1>
                <form method="GET" action="admin_create_encyclopedia.php">
                    <input name="searchInput" class="search-input" type="text" placeholder="Search...">
                    <button name="btnSearch" class="search-button" type="submit">Search</button>
                </form>
            </header>
            <?php
                subscriptions();
            ?>
        </section>
    </body>
</html>