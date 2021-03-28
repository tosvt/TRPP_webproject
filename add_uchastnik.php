<?php session_start(); include "functions.php"; include "connect.php";
/** @var
 * $login
 * Добавление участника
 */
$login = $_SESSION['login'];

$grp = 2;
/** функция для получения id пользователя при авторизации */
function getIDOnLogin($login){
	$mysqli = connectDB();
	$result = $mysqli->query("SELECT id FROM users WHERE login = '$login'");
	$row = $result->fetch_assoc();
	return $row['id'];
	closeDB($mysqli);
	}

	$lo = getIDOnLogin($_SESSION['login']);
/** функция получения фио пользователя при авторизации */
function getFioOnLogin($login){
    $mysqli = connectDB();
	$result = $mysqli->query("SELECT name FROM users WHERE login = '$login'");
	$row = $result->fetch_assoc();
	return $row['name'];
        closeDB($mysqli);
    }
    $name = getFioOnLogin($_SESSION['login']);
   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Добавление новой работы</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	 <main>
        <?php include "header.php";?>
        <section class="sectionaddwork">
        	<?php
            /** Добавление нового проекта участником */
        	if( $_SESSION['USER_LOGIN_IN'] == 1 || $_COOKIE['user']){
        		echo '<h1>Добавление проекта</h1>
				<form action="" method="post" class="addnewwork">
				<h3>Автор: </h3><input name="name" disabled size="60" type="text" value="'.$name.'">
					<h3>Название: </h3><input name="title" required size="60" type="text">
					<h3>Описание: </h3><textarea name="text" id="" class="text_add" cols="80" rows="10" required placeholder="Введите сюда описание вашего проекта..."></textarea>
					<input type="submit" name="btn_send" class="btn">
				</form>';
        		
        		$title = $_POST['title'];
        		$text = $_POST['text'];
        	   $name = getFioOnLogin($_SESSION['login']);
	if(isset($_POST['btn_send'])) {
		 $mysqli = new mysqli("localhost", "root", "", "bd_ib");
    
		$mysqli->query("INSERT INTO `raboti` (`name`, `title`, `decription`, `id_login`) VALUES ('$name','$title', '$text', '$lo')");
    		
   			$mysqli->close();

   			echo "Ваш проект успешно добавлен";
   			
		}
	}else echo "Не удалось добавить проект! Повторите позднее."; 
	
            
			?>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>