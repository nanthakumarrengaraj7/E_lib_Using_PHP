<?php
session_start();
    include('database.php');
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
            <h3 class="heading">User Login Here!</h3>
            <div class="center">
                <?php
                    if(isset($_POST["submit"]))
                    {
                         $sql="SELECT * FROM student where NAME='{$_POST["name"]}' and 
                         PASS='{$_POST["pass"]}'";
                         $res=$db->query($sql);
                        
                         if($res->num_rows>0){
                            $row=$res->fetch_assoc();
                            $_SESSION["ID"]=$row["ID"];
                            $_SESSION["NAME"]=$row["NAME"]; 
                            header("location:userhome.php");
                         }
                         else{
                            echo"<p class='error'> Invalid user name or pass</p>";
                         }
                    }
                ?>
            <form action="userlog.php" method="post">
                <label for="">Name</label>
                <input type="text" name="name" required>
                <label for="">Password</label>
                <input type="password" name="pass" required>
                <button type="submit" name="submit">Login Now</button>
            </form>
            </div>
            
        </div>
        <div class="navi">
         <?php
         include("homesidebar.php");
         ?>
        </div>
        <div class="footer">
            <p>Copyrights &copy; RigelGaming 2024</p>
        </div>
    </div>
</body>
</html>