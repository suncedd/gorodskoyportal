<?php

require_once "db.php";

session_start();

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заявки</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reg.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
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
                <li id="links_def"><a href="reg.php">Зарегистрироваться <style> </style></a></li>
                <li id="links_def1"><a href="avtoriz.php">Войти</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                       <?php
                        session_start();
                        echo $_SESSION['login'];
                    if ($_SESSION["login"] == true){
                        echo "<script>links_def.style.display = 'none';</script>";
                        echo "<script>links_def1.style.display = 'none';</script>";
                        if ($_SESSION["login"] == 'admin'){
                        echo "<script>inp1.style.display = 'none';</script>";
                        echo "<script>pl.style.display = 'none';</script>";
                        echo "<script>del.style.display = 'none';</script>";
                        }
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
<form method="POST" action="feedbackup.php" enctype="multipart/form-data">
    <table class="table">
        <tbody id="data">
        <?php
            if ($_SESSION[login] == "admin"){
                echo "<tr>
                <td>Номер заявки</td>
                <td>Название заявки</td>
                <td>Описание заявки</td>
                <td>Категория</td>
                <td>Фото проблемы</td>
                <td>Фото решения проблемы</td>
                <td>Дата заявки</td>
                <td>Статус</td>
                <td>Логин</td>
                <td>Редактировать</td>
            </tr>";
            }
            else{
                echo "<tr>
                <td>Название заявки</td>
                <td>Описание заявки</td>
                <td>Категория</td>
                <td>Дата заявки</td>
                <td>Статус</td>
                <td>Удалить</td>
            </tr>";
            }
        ?>
            
            <?php
            if ($_SESSION[login] == "admin"){
                $result = mysqli_query($link,"SELECT zaiv.id_zaiv, zaiv.namezaiv, zaiv.infozaiv, zaiv.file, zaiv.file_ref, zaiv.datezaiv, zaiv.status, zaiv.login, categoria.name AS 'categoria' FROM `zaiv`, `categoria` where zaiv.id_categoria = categoria.id_categoria");
                while ($row=mysqli_fetch_array($result))
                { // выводим данные
                    echo "<tr>\n<td>".$row["id_zaiv"]."</td>"."\n"."<td>"."".$row["namezaiv"]."
                    </td>"."\n"."<td>"."".$row["infozaiv"]."</td>"."\n"."<td>".$row["categoria"]."</td>
                    "."\n"."<td><img width='150px' height='100px' src=imgzaiv/" . $row['file'] . "></td>
                    "."\n"."<td><img width='150px' height='100px' src=imgzaiv/" . $row['file_ref'] . "></td>"."\n"."<td>
                    "."".$row["datezaiv"]."</td>"."\n"."<td>".$row["status"]."</td>".
                    "\n"."<td>"."".$row["login"]."</td>"."\n"."
                    <td><button class='red' type='submit' value= '$row[id_zaiv]' name='red'>Изменить</button>
                    <input type='file' name='plusphoto' accept='imagzaiv/*,image/jpeg'>
                    <button class='pluss' type='submit' value= '$row[id_zaiv]' name='submit'>Добавить фото</button></td>"."\n";
                }
            }
            else{
                $result = mysqli_query($link,"SELECT zaiv.id_zaiv, zaiv.namezaiv, zaiv.infozaiv, zaiv.file, zaiv.file_ref, zaiv.datezaiv, zaiv.status, zaiv.login, categoria.name AS 'categoria' 
                FROM `zaiv`, `categoria` where zaiv.id_categoria = categoria.id_categoria AND `login` = '{$_SESSION[login]}'");
                while ($row=mysqli_fetch_array($result))
                { // выводим данные
                    echo "<tr>\n<td>"."".$row["namezaiv"]."</td>
                    "."\n"."<td>"."".$row["infozaiv"]."</td>"."\n"."<td>".$row["categoria"]."</td>
                    "."\n"."<td>"."".$row["datezaiv"]."</td>"."\n"."<td>".$row["status"]."</td>"."\n"."
                    <td><button class='red' type='submit' value= '$row[id_zaiv]' name='red'>Удалить</button></td>"."\n";
                }
            }
        ?>
        <?php
        if(isset($_POST['submit']) and $_FILES){
            if (move_uploaded_file($_FILES['file']['tmp_name'], "imgzaiv/".$_FILES['file']['name']));
            if(move_uploaded_file($_FILES['plusphoto']['tmp_name'],$path)) {
                $f = $_FILES['plusphoto']['name'];
                $stmt = mysqli_query($link,"UPDATE `zaiv` SET `file_ref` = '$f' WHERE `id_zaiv` = '10'");
            }
        } else echo "Error!";
    ?>
        <select name="categoria">
            <?php
                $res = mysqli_query($link,"SELECT * FROM `categoria`");
                while ($row=mysqli_fetch_array($res))
                {
                    echo "<option  value=".$row["id_categoria"].">".$row["name"]."</option>";
                }
            ?>
        </select>
        <script>
            Array.from(document.querySelectorAll('.red'), function(el){
            el.onclick = function(){
            id_v = (this.value);
            $.ajax({
            url: 'feedbackup.php',
            type: "POST",
            data: {id: id_v},
            success: function(data) {
            }
            });
            }
        })
        </script>
        </tbody>
    </table>
</form>

<form method="POST" action="" enctype="multipart/form-data">
    <input id ="inp1" name="categ_plus" type="text" placeholder="Введите категорию" class="hthrth">
    <button id ="pl" name="type[all]" value = "1" type="submit">Добавить</button>
    <button id="del" name="type[specific]" value = "2" type="submit">Удалить</button>
   
</form>
 <?php
    $categ = $_POST[categ_plus];
    if (isset($_POST["type"]["all"])) {
        $stmt = mysqli_query($link,"insert into categoria(name) VALUES ('{$categ}')");
    }
    else if (isset($_POST["type"]["specific"])) {
        $stmt = mysqli_query($link,"DELETE FROM `zaiv` WHERE `categoria` = '$categ'");
        $stmt = mysqli_query($link,"DELETE FROM `categoria` WHERE `name` = '$categ'");
    }
    ?>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>