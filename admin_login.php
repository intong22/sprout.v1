<?php
    include "backend/bcknd_login.php";
?>
<!DOCTYPE html>
<head>
<style>
  
            body{
                /* background: linear-gradient(45deg,rgb(104, 159, 214) ,pink, purple );   */
                font-family:  "Plus Jakarta Sans",Trebuchet MS,sans-serif;
                background-image: url(f.jpg);
                border-radius: 10px;
                background-size: 100%;
                background-attachment: cover;
                background-position: center;
    
            }

.container {
	
    padding: 10px;
    color: #452929;
    width: 50%;
    margin-top: 20vh;
    margin-left: 60%; /* This will push it to the right */
    margin-right: 0;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.2);
}

h1 {
	color: #060101;
	text-align: center;
}

/* form {
	 display: flex;
	flex-direction: column; 
	width:350px;
    margin-top: 15vh;
    margin-left: 200px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2), 0 6px 20px rgba(0,0,0,0.2);

}  */

label {
	color: #060101;
	font-weight: bold;
	margin-bottom: 10px;
}

input[type="text"], input[type="password"] {
	width:100%;
    padding:12px 20px;
	margin:8px 0;
    box-sizing: border-box;
    font-size: 15px;
    border: none;
    outline: none;
    background: rgba(110, 86, 86, 0.2);
    color:#060101;
	border-radius: 5px;
}

input[type="submit"] {
	background: linear-gradient(45deg,green, white );  
                color:#fff;
                padding: 15px 20px;
                width: 100%;
                border: none;
                margin: 8px 0;
                text-transform: uppercase;
                font-size: 15px;
                font-weight: bold;
                border-radius: 5px;
                letter-spacing: 1px;
                cursor: pointer;
}

input[type="submit"]:hover {
	background-color: #8B0000;
}

a {
	color: #060101;
	font-weight: bold;
	text-decoration: none;
	letter-spacing: 1px;
    cursor: pointer;
	
}

a:hover {
	text-decoration: underline;
}
</style>

<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
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