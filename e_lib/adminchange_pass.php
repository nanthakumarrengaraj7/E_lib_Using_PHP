<?php
session_start();
include('database.php');

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
            <h3 class="heading">Change Passwords</h3>
            <div class="center">
                <?php 
                    if(isset($_POST["submit"])){
                        $sql="select * from admin where APASS='{$_POST["opass"]}' and AID='{$_SESSION['AID']}'";
                        $res=$db->query($sql);
                        if($res->num_rows>0){
                            $s="update admin set APASS='{$_POST["npass"]}' where AID=".$_SESSION["AID"];
                            $db->query($s);
                            echo "<p class='success'>Password Changed Successfully</p>";
                        }   
                        else{
                            echo "<p class='error'>Invalid Password</p>";
                        }
                    }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label for="">Old Password</label>
                    <input type="password" name="opass" required>
                    <label for="">New Password</label>
                    <input type="password" name="npass" required>
                    <button type="submit" name="submit">Update Password</button>
                </form>
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