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
    <title>Новая заявка</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reg.css">

</head>

<body>
    <?php
        session_start(); // проверка на авторизацию
        if ($_SESSION["login"] == false){
            echo "<script>alert(\"Лавочка закрыта\");</script>";
            header("Location: avtoriz.php"); 
        }              
    ?>
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
                        <li id="links_def"><a href="reg.php">Зарегистрироваться</a></li>
                        <li id="links_def1"><a href="avtoriz.php">Войти</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <?php
                        session_start();
                        echo $_SESSION['login'];
                    if ($_SESSION["login"] == true){
                        echo "<script>links_def.style.display = 'none';</script>";
                        echo "<script>links_def1.style.display = 'none';</script>";
                    } 
                    ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="myzaiv.php">Заявки</a></li>
                                <li><a href="newzaiv.php">Новая заявка</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Выход</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <form method="POST" action="feedbackzaiv.php" enctype="multipart/form-data">
            <div class="window_reg">
                <div class="info_reg">
                    <title class="title_zaiv">Новая заявка</title>
                    <input name="namezaiv" type="text" placeholder="Название" class="vvod vvod_first">
                    <textarea name="infozaiv" class="text_op" cols="60" rows="10" placeholder="Описание заявки"></textarea>
                    <div class="categoria">
                         <p class="text-categ">Категория заявки</p>
                    <select name="categoria">
                    <?php
                        $res = mysqli_query($link,"SELECT * FROM `categoria`");
                        while ($row=mysqli_fetch_array($res))
                        {
                            echo "<option  value=".$row["id_categoria"].">".$row["name"]."</option>";
                        }
                    ?>
                    </select>
                    </div>
                    <?php
                        if(isset($_POST['submit']) and $_FILES){
                            move_uploaded_file($_FILES['file']['tmp_name'], "imgzaiv/".$_FILES['file']['name']);
                            echo "The file has just uploaded successfully";
                        } else echo "Error!";
                    ?>             
                    <input type="file" name="photo" accept="imagzaiv/*,image/jpeg">
                    <button type="submit" value="Upload" name="submit">Отправить</button>     
                </div>
            </div>
        </form>

    </main>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>


    <!-- Скрипты -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>