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
            <h3 class="heading">Book Upload</h3>
            <div class="center">
                <?php 
                    if(isset($_POST["submit"])){
                        $tar_dir="upload/";
                        $tar_file=$tar_dir.basename($_FILES["efile"]["name"]);
                        if(move_uploaded_file($_FILES["efile"]["tmp_name"],$tar_file)){
                            $sql="insert into book(BTITLE,KEYWORDS,FILE) values
                            ('{$_POST["bname"]}','{$_POST["keys"]}','{$tar_file}')";
                            $db->query($sql);
                            echo "<p class='success'>file uploded successfully..</p>";
                        }
                        else{
                            echo "<p class='error'>Upload in Error!</p>";
                        }
                    }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                    <label for="">Book Title</label>
                    <input type="text" name="bname" required>
                    <label for="">Keyword</label>
                    <textarea name="keys" required></textarea>
                    <label for="">Upload File</label>
                    <input type="file" name="efile">
                    <button type="submit" name="submit">Upload Book</button>
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