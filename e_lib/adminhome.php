<?php
session_start();
include('database.php');

function countRecord($sql,$db){
    $res=$db->query($sql);
    return $res->num_rows;
}

if(!isset($_SESSION["AID"])){
    header("location:adminlog.php");
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
            <h3 class="heading">Welcome Admin!</h3>
            <div class="center">
                <ul class="record">
                    <li>Total Students :<?php echo countRecord("select * from student",$db);?></li>
                    <li>Total Books :<?php echo countRecord("select * from book",$db);?></li>
                    <li>Total Request :<?php echo countRecord("select * from request",$db);?></li>
                    <li>Total Comments :<?php echo countRecord("select * from comment",$db);?></li>
                </ul>
            </div>
            
        </div>
        <div class="navi">
         <?php
         include("adminsidebar.php");
         ?>
        </div>
        <div class="footer">
            <p>Copyrights &copy; RigelGaming 2024</p>
        </div>
    </div>
</body>
</html>