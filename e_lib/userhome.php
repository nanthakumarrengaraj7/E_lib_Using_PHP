<?php
session_start();
include('database.php');

if(!isset($_SESSION["ID"])){
    header("location:userlog.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e_Lib</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>E_Library Management</h1>
        </div>
        <div class="wrapper">
            <h3 class="heading">Welcome <?php echo $_SESSION["NAME"]; ?></h3>
            
        </div>
        <div class="navi">
         <?php
         include("usersidebar.php");
         ?>
        </div>
        <div class="footer">
            <p>Copyrights &copy; RigelGaming 2024</p>
        </div>
    </div>
</body>
</html>