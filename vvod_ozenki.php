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
    <title>Выставление оценки</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>
    <main>
      <?php include "header.php";?>
        <section>
            <h1>Выставление оценки:</h1>
            <?php 
            $id_work = $_GET['id'];
            $work = mysqli_query($connect, "SELECT * FROM `works` WHERE `id` = '$id_work'");
            while($res = mysqli_fetch_assoc($work)) {
              $id_uchastnika = $res['id'];
              $name_uchastnik = $res['name'];
                echo '<div class="works">
                        <fieldset>
                            <legend>#'.$id_uchastnika.'</legend>
                            <p><b>Автор: </b>'.$name_uchastnik.'</p>
                            <p><b>Название: </b>'.$res["title"].'</p>
                            <p><b>Описание: </b>'.$res["description"].'</p>
                        </fieldset></div>';
            }
            ?>
            <div class="container">
                <h3>Отзыв о работе: </h3><br>
                <form action="" method="post">
                    <span>Оценка: </span>
                   <select name="ozenka" id="">
                       <option value="5">5</option>
                       <option value="4">4</option>
                       <option value="3">3</option>
                       <option value="2">2</option>
                       <option value="1">1</option>
                   </select>
                    <div class="clear"></div><br>
                    <textarea name="otzyv" id="" cols="50" rows="10" placeholder="Введите свой отзыв о проекте..."></textarea>
                    <div class="clear"></div>
                    <br>
                    <input type="submit" name="send_otzyv"  class="btn" value="Оценить проект">
                </form>
                <?php 
                    $ozenka_experta = $_POST['ozenka'];
                    $otzyv_experta = $_POST['otzyv'];
                    
                    if(isset($_POST['send_otzyv'])) {
                     
                        $sendreview = mysqli_query($connect, "INSERT INTO `ozenki` (`id_raboti`,`id_uchastnika`, `name_uchastnik`, `id_experta`, `nam_expert`, `otzyv_experta`, `ozenka_experta`) VALUES ('$id_work', '$id_uchastnika', '$name_uchastnik', '$id', '$name', '$otzyv_experta', '$ozenka_experta')");
                       if($sendreview) echo "<div style='text-align: center; color:green; '>Ваш отзыв успешно добавлен!</div>";
                       else echo "<div style='text-align: center; color:red; '>К сожалению, Ваш отзыв не был добавлен!</div>";
                   }
            
                ?>
            </div>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
