<?php session_start(); include "functions.php"; include "connect.php";

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
$show = getALlProjects($row, $_GET['id']);

   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оценки пользователя</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>
    <main>
      <?php include "header.php";?>
       <h1>Просмотр оценок:</h1>
        <section class="viewmarks">
            <?php 
       
                $mysqli = new mysqli($host, $user, $password, $db);
             
                for($i = 0; $i<count($show); $i++) {
                    echo '<div class="works"><fieldset>
                           <legend>#'.$show[$i]["id"].'</legend>
                           <p><b>Автор: </b>'.$show[$i]["name"].'</p>
                           <p><b>Название: </b>'.$show[$i]["title"].'</p>
                           <p><b>Описание: </b>'.$show[$i]["decription"].'</p>
                           <p align="right"><a href="/prosmotr_ozenki.php?id='.$show[$i]["id"].'"><i>Смотреть оценку эксперта</i></a></p>
                        </fieldset></div>' ;
                }
                closeDB($mysqli);
            ?>
         
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>