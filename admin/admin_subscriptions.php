<?php
    include "../admin_sessions/session_logged_in.php";
    include "../backend/bcknd_admin_subscriptions.php";
?>
<!DOCTYPE html>
    <head>
        <title>Manage subscriptions</title>
    </head>
    <body>
        <h3>Manage subscriptions</h3>

        <form method='POST'>
            <input type='search' name='searchInput' placeholder='Search user'>
        </form>

        <?php
            subscriptions();
        ?>
    </body>
</html>