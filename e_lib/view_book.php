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
            <h3 class="heading">View Book Details</h3>
            <?php
                $sql="SELECT * FROM book";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    echo "<table>
                    <tr>
                    <th>SNO</th>
                    <th>BOOK NAME</th>
                    <th>KEYWORDS</th>
                    <th>VIEW</th>
                    </tr>";
                    echo"</table>";
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                        echo "<tr>";
                        echo "<td>{$i} </td>";
                        echo "<td>{$row["BTITLE"]} </td>";
                        echo "<td>{$row["KEYWORDS"]} </td>";
                        echo "<td><a href='{$row["FILE"]}' target='_blank'>View</a> </td>";
                        echo "</tr>";
                        echo"</br>";
                    }
                }
                else{
                    echo "<p class='error'>No Books found!</p>";
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