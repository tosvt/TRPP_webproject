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
    <title>Рейтинг участников</title>
    <link rel="stylesheet" href="main.css">
    
</head>
<body>
    <main>
      <?php include "header.php";?>
       <h1>Рейтинг участников:</h1>
        <section class="section">
            <?php 
				        $sql1 = mysqli_query($connect, "SELECT SUM(ozenka_experta) AS `sum`, COUNT(ozenka_experta) AS `count`, id_uchastnika, name_uchastnik, ozenka_experta FROM ozenki GROUP BY name_uchastnik HAVING COUNT(ozenka_experta)>1");
                $sql2 = mysqli_query($connect, "SELECT SUM(ozenka_experta)  AS `sum`, COUNT(ozenka_experta) AS `count`, id_uchastnika, name_uchastnik FROM ozenki GROUP BY id_uchastnika, name_uchastnik ORDER BY sum DESC");  
				        while ($result = mysqli_fetch_array($sql1)) {
					             echo '<div class="reit">
                            <p>'.$result['name_uchastnik'].' — '.round($result['sum']/$result['count'],2).'</p> 
                            </div>';
				}
            ?>
        </section>
       
    </main>
    <footer> &copy; 2021 Открытый конкурс Интернет-проектов <br> Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</footer>
</body>
</html>
