 <header>
       <div class="logo">
           <img src="img/logo_burned.png" alt="">
       </div>
       <div class="headertext">
       <p>Открытый конкурс <br>Интернет-проектов</p>
       <span class="headerinfo">Разработка сайта: Золотухин С.А., Коротыч Г.Д., Шелюхин В.П.</span>
       </div>
</header>
        <nav>
            <ul>
                <?php if($grp == 2) echo '
                <li class="welcome">Привет, '.$name.'</li>
                <li><a href="index.php">На главную</a></li>
                <li><a href="ozenki.php">Просмотр оценок</a></li>
                <li><a href="reiting.php">Рейтинг</a></li>
                <li><a href="add_uchastnik.php">Добавить проект</a></li>
                <li><a href="logout.php">Выйти</a></li>
                ';
                elseif($grp == 1) echo '
                <li class="welcome">Привет, '.$name.'</li>
                <li><a href="index.php">На главную</a></li>
                <li><a href="vvod_ozenok.php">Ввод оценок</a></li>
                <li><a href="reiting.php">Рейтинг</a></li>
                <li><a href="logout.php">Выйти</a></li>';
                else echo '
               
                <li><a href="index.php">На главную</a></li>
                <li><a href="reiting.php">Рейтинг</a></li>
                <li><a href="reg.php">Регистрация</a></li>
                <li><a href="login.php">Войти</a></li>';?>
            </ul>
        </nav>