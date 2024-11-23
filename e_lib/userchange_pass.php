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
            <h3 class="heading">UChange Passwords</h3>
            <div class="center">
                <?php 
                    if(isset($_POST["submit"])){
                        $sql="select * from student where PASS='{$_POST["opass"]}'
                         and ID='{$_SESSION["ID"]}'";
                        $res=$db->query($sql);
                        if($res->num_rows>0){
                            $s="update student set PASS='{$_POST["npass"]}' where 
                            ID=".$_SESSION["ID"];
                            $db->query($s);
                            echo "<p class='success'>UPassword Changed Successfully</p>";
                        }   
                        else{
                            echo "<p class='error'>Invalid Password</p>";
                        }
                    }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label for="">UOld Password</label>
                    <input type="text" name="opass" required>
                    <label for="">UNew Password</label>
                    <input type="text" name="npass" required>
                    <button type="submit" name="submit">Update Password</button>
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