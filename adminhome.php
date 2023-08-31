<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
       
        .main-container {
            display: grid;
            height: 100vh;
            grid-template-columns: auto 1fr;
            grid-template-rows: auto 1fr auto;
            grid-template-areas: 
                "nav main"
                "sidebar main";
            grid-gap: 0.2rem;
        }

        nav {
            
            grid-area: nav;
            display: flex;
            align-items: center;
            padding: 0.5rem;
        }
        nav img {
            max-height: 300px;
        }
        #sidebar {
            background: #fff;
            grid-area: sidebar;
            display: flex;
            flex-direction: column;
            padding: 2rem;
        }
        #sidebar a {
            margin-bottom: 0.5rem;
            color: black;
            font-size:30px;
            font-weight: 500;
            text-decoration: none;
        }
        #sidebar a:hover {
            text-decoration: underline;
        }
        main {
            background-image: url(bggg.jpg);
            grid-area: main;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            padding: 1rem;
            background-size: cover;
            background-repeat: no-repeat;
        }
        #dashboard {
            background: darkgreen;
            padding: 2.5rem 1rem;
            width: 300%;
            border-radius: 5px;
            color: white;
            justify-content: space-between;
        }
        /* footer {
            background: hotpink;
            grid-area: footer;
            display: flex;
            align-items: center;
            justify-content: center;
        } */

        @media only screen and (max-width: 550px) {
            .container {
                grid-template-columns: 1fr;
                grid-template-rows: auto 1fr auto auto;
                grid-template-areas: 
                    "nav"
                    "main"
                    "sidebar"
                    "footer";
            }
        }
    </style>
</head>
<body>
<body>
<div class="container-fluid">
        <div class="main-container">
            <nav>
                <img src="logo.png" alt="Logo">
            </nav>
            <div id="sidebar" class="bg-light">
                <a class="nav-link" href="#">Manage</a>
                <a class="nav-link" href="#">Reports</a>
                <a class="nav-link" href="#">Inactive Users</a>
            </div>
            <main>
                <div class="d-flex justify-content-between align-items-center bg-success p-3">
                    <div id="dashboard">DASHBOARD</div>
                    <a href="#" class="text-white">Logout</a>
                </div>
                <div id="cont1" class="bg-light p-3">Users</div>
                <div id="cont2" class="bg-light p-3">Posts</div>
                <div id="cont3" class="bg-light p-3">Tech Support</div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>
</html>
