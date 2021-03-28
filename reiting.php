<?php session_start(); include "functions.php"; include "connect.php";
// if( $_SESSION['USER_LOGIN_IN'] == 1){
// echo  $_SESSION['login'];
// }elseif ($_SESSION['USER_COOKIE_IN'] == 1) echo $_COOKIE['user'];
// else echo "вы никак не подключены";

function getGrpByLogin($login){
       $mysqli = connectDB();
    $result = $mysqli->query("SELECT grp FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    return $row['grp'];
        closeDB($mysqli);
    }
$grp = getGrpByLogin($_SESSION['login']);

function getFioOnLogin($login){
       $mysqli = connectDB();
    $result = $mysqli->query("SELECT name FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    return $row['name'];
        closeDB($mysqli);
    }
$name = getFioOnLogin($_SESSION['login']);
$show = getALlProjects($row);
   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рейтинг участников</title>
    <link rel="stylesheet" href="main.css">
    
</head>
<body>
    <main>
      <?php include "header.php";?>
       <h1>Рейтинг участников:</h1>
        <section class="section">
            <?php 
                    
                 $link = mysqli_connect($host, $user, $password, $db);
                 $sql = "SELECT SUM(ozenka_experta) AS `sum`, COUNT(ozenka_experta) AS `count`, id_uchastnika, name_uchastnik, ozenka_experta FROM ozenki GROUP BY name_uchastnik HAVING COUNT(ozenka_experta)>1";
                 $sql1 = "SELECT SUM(ozenka_experta)  AS `sum`, COUNT(ozenka_experta) AS `count`, id_uchastnika, name_uchastnik FROM ozenki GROUP BY id_uchastnika, name_uchastnik ORDER BY sum DESC";
                 $result = mysqli_query($link, $sql1);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="reit">
                            <p>'.$row['name_uchastnik'].' — '.round($row['sum']/$row['count'],2).'</p> 
                            </div>' ;
                }
               
            ?>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытй конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>