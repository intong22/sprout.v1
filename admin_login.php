<?php
    include "backend/bcknd_login.php";
?>
<!DOCTYPE html>
<head>

<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/admin_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<form method="POST" action="adminhome.php">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required><br>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required><br>
			<input type="checkbox"> Remember me &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	Forgot <a href="#"> password? </a> 
			<input type="submit" value="Login">
		</form>

		<!-- <p>Not a member?<a href="register.php">Create an account.</a></p> -->
		
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>