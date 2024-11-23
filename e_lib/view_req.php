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
            <h3 class="heading">View Request Details</h3>
            <?php
                $sql="SELECT student.NAME,request.MES,request.LOGS FROM 
                student INNER JOIN request ON student.ID=request.ID";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    echo "<table>
                    <tr>
                    <th>SNO</th>
                    <th>STD NAME</th>
                    <th>MESSAGE</th>
                    <th>LOGS</th>
                    </tr>";
                    echo"</table>";
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i} </td>";
                        echo "<td>{$row["NAME"]} </td>";
                        echo "<td>{$row["MES"]} </td>";
                        echo "<td>{$row["LOGS"]} </td>";
                        echo "</tr>";
                        echo"</br>";
                    }
                }
                else{
                    echo "<p class='error'>No Request record found!</p>";
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