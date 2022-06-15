<?php

require_once "db.php"; // подключение к бд

session_start(); // старт сессии

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="twentytwenty-master/css/twentytwenty.css">
</head>
<body>
    <!--<script>
        const exit = document.getElementById('exit');
        exit.addEventListener('click', () => {    
            php
            echo $_SESSION['login'] = false;
            ?>
        });    
    </script>--> 
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
                <li class="active"><a href="index.php">Главная</a></li>
                <li id="links_def"><a href="reg.php">Зарегистрироваться <style> </style></a></li>
                <li id="links_def1"><a href="avtoriz.php">Войти</a></li>
                <li id="links_def3" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
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
                        <li><a href="myzaiv.php">Заявки</a></li>
                        <li><a href="newzaiv.php">Новая заявка</a></li>
                        <li role="separator" class="divider"></li>
                        <li id="exit"><a href="session.php">Выход</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>Привет, дорогой друг!</h1>
        <p>
            Вместе мы сможем улучшить наш любимый город. Нам очень сложно узнать обо всех проблемах города, поэтому мы
            предлагаем тебе помочь своему городу!
        </p>
        <p>
            Увидел проблему? Дай нам знать о ней и мы ее решим!
        </p>
        <p> 
            <a class="btn btn-success btn-lg" href="newzaiv.php" role="button">Сообщить о проблеме</a>
            <a class="btn btn-primary btn-lg" href="newzaiv.php" role="button">Присоедениться к проекту</a>
        </p>
    </div>
</div>

<div class="container">
    <h2>Последние решенные проблемы</h2>
    <br>
    <div class="row">
        <?php
            $res = mysqli_query($link,"SELECT zaiv.file, zaiv.file_ref FROM `zaiv` WHERE `file_ref` != ''");
            while ($row=mysqli_fetch_array($res))
            {
            echo "
                <div class='col-sm-6 col-md-3'>
                    <div class='thumbnail'>
                        <div class='before-after'>
                            <img src='imgzaiv/".$row["file"]."' height='446px' alt='Яма на дороге'>
                            <img src='imgzaiv/".$row["file_ref"]."' width='100%' height='100%' alt='Яма на дороге'>
                        </div>
                    </div>
                </div>
            ";
            }
        ?>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="twentytwenty-master/js/jquery.twentytwenty.js"></script>
<script src="twentytwenty-master/js/jquery.event.move.js"></script>
<script>
  $(function () {
    $(".before-after").twentytwenty();
  });
</script>
<script src="js/main.js"></script>
<link rel="stylesheet" href="css/main.css">
</body>
</html>