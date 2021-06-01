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
	<title>Добавление новой работы</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	 <main>
        <?php include "header.php";?>
        <section class="sectionaddwork">
        	<?php 
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
				if(isset($_POST['btn_send'])) {
					$addwork = mysqli_query($connect, "INSERT INTO `works` (`name`, `title`, `description`, `id_login`) VALUES ('$name','$title', '$text', '$id')");
              
					echo "Ваш проект успешно добавлен";	
				}
			} else echo "Не удалось добавить проект! Повторите позднее.";   
			?>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
