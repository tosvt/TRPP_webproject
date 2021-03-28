<?php session_start();
 include "functions.php"; include "connect.php";

if(isset($_POST['button_reg'])) {
  $login = htmlspecialchars($_POST['login']);
  $password = htmlspecialchars($_POST['password']);
  $bad = false;
  session_start();
  unset($_SESSION['error_login']);
  unset($_SESSION['error_password']);
  unset($_SESSION['success_reg']);
  if((strlen($login)<3) || (strlen($login)>32)){
    $_SESSION['error_login'] = 1;
    $bad = true;
  }
  if((strlen($password)<3) || (strlen($password)>32)){
    $_SESSION['error_password'] = 1;
    $bad = true;
  }
  if(!$bad) {
    $mysqli = new mysqli("localhost", "root", "", "bd_ib");
    $password = md5($password);
   
    $mysqli->query("INSERT INTO experts (`login`, `password`) VALUES ('$login', '$password')");

    $mysqli->close();
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация на сайте</title>
    <link rel="stylesheet" href="main.css">
    
</head>
<body>
    <main>
   <?php include "header.php";?>
        
            <h1>Регистрация на сайте:</h1>
	
    <!-- <input type="radio" value="experts" name="experts"> Эксперт<br>
    <input type="radio" value="uchastniki" name="uchastniki"> Участник<br>
    <input type="submit" value="btn" name="btn">
	<select name="selected">
      <option value="f"> Эксперт</option>
      <option value="f"> Участник</option>
  </select> -->
   <section>
    <div class="block">
    <span>Новый эксперт</span>
        <a href="reg_expert.php"><img src="img/expert.png" class="img_expert" alt=""></a>
    </div>
<div class="block2">
  <span>Новый участник</span>
  <a  href="reg_partner.php"><img src="img/partner.png" class="img_expert" alt=""></a>
</div>
 </section>      
    </main>
    <footer> &copy; 2021 Открытй конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>