<?php
include "db.php";

session_start();
$_SESSION["message"] = true;
$_SESSION["sogle"] = true;
    $path = "imgzaiv/".$_FILES['photo']['name'];
    if(move_uploaded_file($_FILES['photo']['tmp_name'],$path)) {
        $f = $_FILES['photo']['name'];
        $today = date("F j, Y, g:i a");  
        $stmt = mysqli_query($link,"insert into zaiv(namezaiv, infozaiv, id_categoria, file, file_ref, datezaiv, status, login) VALUES ('{$_POST['namezaiv']}', '{$_POST['infozaiv']}', '{$_POST['categoria']}', '$f', '','$today', 'Новая','{$_SESSION['login']}')");
        header("Location: myzaiv.php");
    }        
?>