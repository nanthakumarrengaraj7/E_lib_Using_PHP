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
            <h3 class="heading">Search Books</h3>
            <div class="center">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <label for="">Enter Book Name Or KeyWords</label>
                    <input type="text" name="name" required>
                    <button type="submit" name="submit">Search Books</button>
                </form>
            </div>
            <?php
             if(isset($_POST["submit"])){
                $sql="SELECT * FROM book where BTITLE like '%{$_POST["name"]}%' or KEYWORDS like '%{$_POST["name"]}%'";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    echo "<table>
                    <tr>
                    <th>SNO</th>
                    <th>BOOK NAME</th>
                    <th>KEYWORDS</th>
                    <th>VIEW</th>
                    <th>COMMENTS</th>
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
                        echo "<td><a href='comment.php?id={$row["BID"]}'>Go</a> </td>";
                        echo "</tr>";
                        echo"</br>";
                    }
                }
                else{
                    echo "<p class='error'>No Books found!</p>";
                }
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