<?php

require_once "db.php"; // подключение к бд

session_start(); // старт сессии

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reg.css">

</head>

<body>
    <main>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Городской портал</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="reg.php">Зарегистрироваться</a></li>
                        <li class="active"><a href="avtoriz.php">Войти</a></li>
                        <li id="links_def3" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <?php
                        session_start();
                        echo $_SESSION['login'];
                    if ($_SESSION["login"] == true){
                        echo "<script>links_def.style.display = 'none';</script>";
                        echo "<script>links_def1.style.display = 'none';</script>";
                    }
                    else{
                        echo "<script>links_def3.style.display = 'none';</script>";
                    }
                    ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="list.php">Мои заявки</a></li>
                                <li><a href="newzaiv.php">Новая заявка</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Выход</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <form method="POST" action="login.php">
            <div class="window_reg">
                <div class="info_reg">
                    <title>Негр</title>
                    <input name="login" type="text" placeholder="Логин" class="vvod vvod_first">
                    <input name="password" type="text" placeholder="Пароль" class="vvod">
                    <button type="submit">Войти</button>
                    <a href="reg.php">Нет аккаунта?</a>
                </div>
            </div>
        </form>

    </main>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>


    <!-- Скрипты -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
<link rel="stylesheet" href="css/main.css">
</body>

</html>