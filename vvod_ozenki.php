<?php session_start(); include "functions.php"; include "connect.php";
// if( $_SESSION['USER_LOGIN_IN'] == 1){
// echo  $_SESSION['login'];
// }elseif ($_SESSION['USER_COOKIE_IN'] == 1) echo $_COOKIE['user'];
// else echo "вы никак не подключены";
$login = $_SESSION['login'];
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


function getIDByLogin($login){
       $mysqli = connectDB();
    $result = $mysqli->query("SELECT id FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    return $row['id'];
        closeDB($mysqli);
    }

    function getNameByIdExpert($login){
       $mysqli = connectDB();
    $result = $mysqli->query("SELECT name FROM users WHERE login = '$login'");
    $row = $result->fetch_assoc();
    return $row['name'];
        closeDB($mysqli);
    }

   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПР ИБ</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>
    <main>
      <?php include "header.php";?>
        <section>
            <h1>Выставление оценок:</h1>
            <?php 
        
                
                    echo '<div class="works"><fieldset>
                           <legend>#'.$show["id"].'</legend>
                           <p><b>Автор: </b>'.$show["name"].'</p>
                           <p><b>Название: </b>'.$show["title"].'</p>
                           <p><b>Описание: </b>'.$show["decription"].'</p>
                          
                        </fieldset></div>' ;
            
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
                    
                    $id_raboti = $show['id'];
                    $id_uchastnika = $show['id_login']; 
                    $id_experta = getIDByLogin($login);
                    $name_expert = getNameByIdExpert($login);
                    $name_uchastnik = $show['name'];
                    $ozenka_experta = $_POST['ozenka'];
                    $otzyv_experta = $_POST['otzyv'];
                    
                if(isset($_POST['send_otzyv'])) {
                     
                           $mysqli = connectDB();
                         $mysqli->query("INSERT INTO `ozenki` (`id_raboti`,`id_uchastnika`, `name_uchastnik`, `id_experta`, `nam_expert`, `otzyv_experta`, `ozenka_experta`) VALUES ('$id_raboti', '$id_uchastnika', '$name_uchastnik', '$id_experta', '$name_expert', '$otzyv_experta', '$ozenka_experta')");
                       if($mysqli) echo "<div style='text-align: center; color:green; '>Ваш отзыв успешно добавлен!</div>";
                       else echo "<div style='text-align: center; color:red; '>К сожалению, Ваш отзыв не был добавлен!</div>";
                            closeDB($mysqli);
               
                }
            
                ?>
            </div>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытй конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>