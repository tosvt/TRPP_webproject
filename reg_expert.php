<?php include "functions.php"; include "connect.php";
if(isset($_POST['button_reg'])) {
  $login = htmlspecialchars($_POST['login']);
  $password = htmlspecialchars($_POST['password']);
  $repassword = htmlspecialchars($_POST['repassword']);
  $name = htmlspecialchars($_POST['name']);
  $grp = 1;
  $bad = false;
  session_start();
  unset($_SESSION['error_login']);
  unset($_SESSION['error_password']);
  unset($_SESSION['success_reg']);
  if(empty($name)) echo "Поле Имя обязательно для заполнения!";
  if((strlen($login)<3) || (strlen($login)>32) || empty($login)){
    $_SESSION['error_login'] = 1;
    $bad = true;
   
    $error_login = "<div class='error'>Некорректный логин! Повторите попытку!</div>";
 
  }
  if((strlen($password)<3) || (strlen($password)>32) || empty($password)){
    $_SESSION['error_password'] = 1;
    $bad = true;
    
     $error_password = "<div class='error'>Некорректный пароль! Повторите попытку!</div>";
 
  }
  if($password != $repassword) {
    $_SESSION['error_repeat_password'] = 1;
    $bad = true;
   $error_repeat_password = "<div class='error'>Пароли не совпадают! Повторите попытку!</div>";
 
  }
  if(!$bad) {
  regExpertUser($name, $login, $password, $repassword, $grp);
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация нового эксперта</title>
    <link rel="stylesheet" href="main.css">
   
</head>
<body>
    <main>
        <?php include "header.php";?>
<section class="section">
<h1>Регистрация нового эксперта:</h1>
  <div class="block_ex">
  <form method="post" action="">
        <input type="text" name="name" required placeholder="Имя Иванов Иван:"> <br>
        <input type="text" name="login" required placeholder="Логин:"> <br>
        <input type="password" name="password" required placeholder="Пароль:"> <br>
        <input type="password" name="repassword" required placeholder="Повторите пароль:"> <br>
        <input name="button_reg" class="btn" type="submit" value="Регистрация">
  </form>
</div>
<?php
        if($_SESSION['error_login'] == 1) echo $error_login;
  if($_SESSION['error_password'] == 1) echo $error_password;
  if($_SESSION['error_repeat_password'] == 1) echo $error_repeat_password;
  if($_SESSION['name_repeat'] == 1) echo $error_name;
  ?>
        </section>
    </main>
    <footer> &copy; 2021 Открытй конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>