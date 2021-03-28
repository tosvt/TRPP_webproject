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

$login = $_SESSION['login'];

function getIDByLogin($login){
    $mysqli = connectDB();
    $result = $mysqli->query("SELECT id FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    return $row['id'];
        closeDB($mysqli);
    }
 
    $showc = getComments($row, $_GET['id']);
 
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
            <h1>Проект #<?php echo $show['id'];?></h1>
            <?php 
       
                
                    echo '<div class="works"><fieldset>
                           <legend>#'.$show["id"].'</legend>
                           <p><b>Автор: </b>'.$show["name"].'</p>
                           <p><b>Название: </b>'.$show["title"].'</p>
                           <p><b>Описание: </b>'.$show["decription"].'</p>
                        </fieldset></div>' ;
            ?>
            <div class="container">
                <h3>Отзывы: </h3><br>
                
                <?php 
                    
            
                $id = $_GET['id'];
                $link = mysqli_connect($host, $user,$password, $db);
             
                $sql = "SELECT * FROM ozenki WHERE id_raboti = '$id'";
                $result = mysqli_query($link, $sql);
                $row_cnt = $result->num_rows;
                if($row_cnt == 0) echo "<h3>Еще нет комментариев для этого проекта.</h3>";
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="reviews">
                           
                           <p><b>Написал: </b>'.$row['nam_expert'].'</p>
                           <p><b>Оценка: </b>'.$row["ozenka_experta"].'</p>
                           <p><b>Комментарий: </b>'.$row["otzyv_experta"].'</p>
                     </div> ' ;
                }
               

                ?>
            </div>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытй конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>