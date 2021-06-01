<?php session_start(); require_once 'connect.php';
$login = $_SESSION['login'];
$grpandname = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
while($user = mysqli_fetch_assoc($grpandname)) {
    $name = $user['name']; 
    $grp = $user['grp']; 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Открытй конкурс Интернет-проектов | Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
        <?php include "header.php";?>
        <h1>Работы участников:</h1>
        <section>
            <?php 
				$works = mysqli_query($connect, "SELECT * FROM `works`");
				while ($result = mysqli_fetch_array($works)) {
					echo '<div class="works"><fieldset>
                           <legend>#'.$result["id"].'</legend>
                           <p><b>Автор: </b>'.$result["name"].'</p>
                           <p><b>Название: </b>'.$result["title"].'</p>
                           <p><b>Описание: </b>'.$result["description"].'</p>
                        </fieldset></div>';
				}
            ?>
         
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
