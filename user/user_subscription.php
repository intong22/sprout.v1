<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Subscription</title>

        <link rel="stylesheet" href="../css/user_subscription.css">
    </head>
    <body>
        <div class="card">
            <form method="POST" action="user_subscription.php" enctype="multipart/form-data">
                <div class="form">
                    <h2>Subscribe to Our Service</h2>
                    <input type="email" name="email" placeholder="Email"><br>
                    <label for="payment">Please provide a screenshot as proof of payment:</label>
                    <input type="file" name="payment[]" accept=".jpg, .jpeg, .png" multiple required><br>
                    <button type="submit" name="btnSubmit">Subscribe</button>
                </div>
            </form>
        </div>
    </body>
</html>