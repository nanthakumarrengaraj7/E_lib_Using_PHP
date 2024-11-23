<?php
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
            <h3 class="heading">New User Registration</h3>
            <div class="center">
                <?php 
                    if(isset($_POST["submit"])){
                        
                        
                            $sql="insert into student(NAME,PASS,MAIL,DEP) values
                            ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                            $db->query($sql);
                            echo "<p class='success'>User Registration successful..</p>";
                    }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label for="">Name</label>
                    <input type="text" name="name" required>
                    <label for="">Password</label>
                    <input type="password" name="pass" required>
                    <label for="">Email</label>
                    <input type="email" name="mail" required>
                    <select name="dep" >
                        <option value="">Select</option>
                        <option value="CS">CS</option>
                        <option value="BCA">BCA</option>
                        <option value="MCA">MCA</option>
                        <option value="Others">Others</option>
                    </select>
                    <button type="submit" name="submit">Register</button>
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