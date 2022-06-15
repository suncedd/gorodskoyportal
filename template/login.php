<?php
include "db.php"; // подключение к бд

    session_start(); // старт сессии
    $stmt = mysqli_query($link,"SELECT * FROM users WHERE login = '".mysqli_real_escape_string($link,$_POST['login'])."'"); // запрос к бд с проверкой введенного логина
    $data = mysqli_fetch_assoc($stmt); 

    if($data['password'] === $_POST['password']) {
        $_SESSION['login'] = $_POST['login'];
        header("Location: index.php"); // успешный вход
        $_SESSION["pass"] = true;
    }
    else {
        header("Location: avtoriz.php"); 
        $_SESSION["pass"] = false; // не успешный вход
    } 
?>