<?php
include "db.php"; // подключение к бд

session_start(); // старт сессии

unset($_SESSION['login']);

header("Location: index.php");
