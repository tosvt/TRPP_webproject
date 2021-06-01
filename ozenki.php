<?php session_start(); require_once 'connect.php';
$login = $_SESSION['login'];
$grpandname = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
while($user = mysqli_fetch_assoc($grpandname)) {
    $name = $user['name']; 
    $grp = $user['grp']; 
    $id = $user['id'];
}
echo "$id";
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
            $worksbyid = mysqli_query($connect, "SELECT * FROM `works` WHERE `id_login` = '$id'");
            $allworksbyid = mysqli_fetch_all($worksbyid);
            foreach($allworksbyid as $allworks) {
                echo '<div class="works">
                        <fieldset>
                            <legend>#'.$allworks[0].'</legend>
                            <p><b>Автор: </b>'.$allworks[1].'</p>
                            <p><b>Название: </b>'.$allworks[2].'</p>
                            <p><b>Описание: </b>'.$allworks[3].'</p>
                            <p align="right"><a href="/prosmotr_ozenki.php?id='.$allworks[0].'"><i>Смотреть оценку эксперта</i></a></p>
                        </fieldset></div>';        
            }
            ?>
         
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
