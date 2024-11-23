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
            <h3 class="heading">New Book Request</h3>
            <div class="center">
                <?php 
                    if(isset($_POST["submit"])){
                        $sql="insert into request(ID,MES,LOGS) values 
                         ({$_SESSION["ID"]},'{$_POST["msg"]}',now())";
                        $db->query($sql);  
                            echo "<p class='success'>Request Send Successfully to Admin..</p>";
                    }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label for="">Message</label>
                    <textarea name="msg"required ></textarea>
                    <button type="submit" name="submit">Send Request</button>
                </form>
            </div>
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