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
            <h3 class="heading">View Students Details</h3>
            <?php
                $sql="SELECT * FROM student";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    echo "<table>
                    <tr>
                    <th>SNO</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>DEPARTMENT</th>
                    </tr>";
                    echo"</table>";
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>{$row["NAME"]}</td>";
                        echo "<td>{$row["PASS"]}</td>";
                        echo "<td>{$row["DEP"]}</td>";
                        echo "</tr>";
                        echo"</br>";
                    }
                }
                else{
                    echo "<p class='error'>No Student record found!</p>";
                }
            ?>
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