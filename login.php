<?php session_start(); require_once 'connect.php';
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    if(isset($_POST['button_login'])){
    $psw = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        if(mysqli_num_rows($psw) > 0){
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['USER_LOGIN_IN'] = 1;
            header("Location: index.php");
        } else {
            echo '<div class="caution">Ошибка авторизации! Попробуйте снова.</div>';
        }   
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация на сайте</title>
    <link rel="stylesheet" href="main.css">
 
</head>
<body>
    <main>
   <?php include "header.php";?>
        <section class="section">
        
      <form method="post" action="">
      <h1>Вход на сайт</h1>
		 <input type="text" name="login" placeholder="Логин:"> <br>
		 <input type="password" name="password" placeholder="Пароль:"> <br>
		<input name="button_login" class="btn" type="submit" value="Войти">
      </form>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
