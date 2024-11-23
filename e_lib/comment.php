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
            <h3 class="heading">Send Your Comment</h3>
            <?php 

                if(isset($_POST["submit"])){
                    $sql="INSERT INTO comment (BID, SID, COMM, LOGS) VALUES 
                    ({$_GET["id"]},{$_SESSION["ID"]},'{$_POST["mes"]}',now()) ";
                    $db->query($sql);
                }
                $sql="SELECT * from book where BID=".$_GET["id"];
                $res=$db->query($sql);
                if($res->num_rows>0){
                    echo "<table>";
                    $row=$res->fetch_assoc();
                        echo "
                        <tr>
                        <th>Book Name</th>
                        <td>{$row["BTITLE"]}</td>
                        </tr>
                        <tr>
                        <th>Keywords</th>
                        <td>{$row["KEYWORDS"]}</td>
                        </tr>
                        ";
                        echo"</table>";
                }else{
                    echo "<p class='error'>No books found</p>";
                }
            ?>
            <div class="center">
                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
                    <label for="">Your Comments</label>
                    <textarea name="mes" ></textarea>
                    <button type="submit" name="submit">Post Now</button>
                </form>
            </div>
            <?php 
            $sql="SELECT student.NAME,comment.COMM,comment.LOGS FROM comment inner join student on 
            comment.SID=student.ID WHERE comment.BID={$_GET["id"]} ORDER BY comment.CID DESC;";
            $res=$db->query($sql);
            if($res->num_rows>0){
                while($row=$res->fetch_assoc()){
                    echo "<p><strong>{$row["NAME"]} :</strong>
                        {$row["COMM"]}
                        <i>{$row["LOGS"]}</i>
                        </p>";
                }
            }
            else{
                echo "<p class='error'>No yet Comment</p>";
            }
            ?>
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