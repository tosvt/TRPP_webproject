<?php session_start(); require_once 'connect.php'; 
$login = $_SESSION['login'];
$grpandname = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
while($user = mysqli_fetch_assoc($grpandname)) {
    $name = $user['name']; 
    $grp = $user['grp'];
    $id = $user['id']; 
}
   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выставление оценок</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
        <?php include "header.php";?>
        <section>
            <h1>Выставление оценок:</h1>
            <?php 
            $allworksbyid = mysqli_query($connect, "SELECT * FROM `works` WHERE `id` = '$id'");
            $allworks = mysqli_query($connect, "SELECT * FROM `works`");
            while($works = mysqli_fetch_assoc($allworks)) { 
            echo '<div class="works">
                        <fieldset>
                            <legend>#'.$works['id'].'</legend>
                            <p><b>Автор: </b>'.$works["name"].'</p>
                            <p><b>Название: </b>'.$works["title"].'</p>
                            <p><b>Описание: </b>'.$works["description"].'</p>
                            <p align="right"><a href="/vvod_ozenki.php?id='.$works["id"].'"><i>Выставить оценку</i></a></p>
                        </fieldset></div>';
            }
            ?>
         
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
