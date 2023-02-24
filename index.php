<?php 

session_start();
$username = $_SESSION['username'] ?? null;


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css" >
        .brand-text{
            color: #cbb09c !important;
        }

        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body class="grey lighten-2">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Pharmacy Dashboard</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Hello <?php echo "$username" ?> </li> 
                <li><a href="invent.php" class="btn brand z-depth-0">Drug Inventory</a></li>
                
            </ul>
        </div>
    </nav>


    <div class="center">
        <h1 class="grey-text">Hello <?php echo "$username" ?></h1>
    </div>
</body>
</html>