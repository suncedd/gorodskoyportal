<?php
include "db.php"; // подключение к бд

session_start(); // старт сессии
$_SESSION["message"] = true;
$_SESSION["sogle"] = true; // присвоение переменной в сессии
//if( !empty($_POST['username']) && !empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']))
//{ 
    if ($_POST['password_res'] == $_POST['password'])  {
        if ($_POST['sogl_d'] == true)
        {
            $stmt = mysqli_query($link,"insert into users(username, login, email, password) VALUES ('{$_POST['username']}', '{$_POST['login']}', '{$_POST['email']}', '{$_POST['password']}')"); // запись в таблицу messages
        header("Location: index.php");
        }
        else{
            $_SESSION["sogle"] = false;
            header("Location: reg.php");
        }
    }
    else{
        $_SESSION["message"] = false;
        header("Location: reg.php"); 
    }     
//} 
?>