<?php session_start(); require_once 'connect.php'; 
$login = $_SESSION['login'];
$grpandname = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
while($user = mysqli_fetch_assoc($grpandname)) {
    $name = $user['name']; 
    $grp = $user['grp'];
    $id = $user['id']; 
}
 $id_work = $_GET['id'];
   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр оценки за проект</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
      <?php include "header.php";?>
        <section>
            <h1>Проект #<?php echo $id_work;?></h1>
            <?php 
       
              $work = mysqli_query($connect, "SELECT * FROM `works` WHERE `id` = '$id_work'");
              while($res = mysqli_fetch_assoc($work)) {
                echo '<div class="works">
                        <fieldset>
                            <legend>#'.$res["id"].'</legend>
                            <p><b>Автор: </b>'.$res["name"].'</p>
                            <p><b>Название: </b>'.$res["title"].'</p>
                            <p><b>Описание: </b>'.$res["description"].'</p>
                        </fieldset></div>';
            }
            ?>
            <div class="container">
                <h3>Отзывы: </h3><br>
                
                <?php 
                $work = mysqli_query($connect, "SELECT * FROM ozenki WHERE id_raboti = '$id_work'");
                $allworkcomments = mysqli_fetch_all($work);
                if(mysqli_num_rows($work) > 0){
                    foreach($allworkcomments as $comment) {
                        echo '<div class="reviews">
                           <p><b>Написал: </b>'.$comment[5].'</p>
                           <p><b>Оценка: </b>'.$comment[7].'</p>
                           <p><b>Комментарий: </b>'.$comment[6].'</p>
                       </div> ';        
                    }
                } else {
                    echo "<h3>Еще нет комментариев для этого проекта.</h3>";
                }
                ?>
            </div>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
