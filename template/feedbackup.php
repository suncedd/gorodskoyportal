<?php
include "db.php";

session_start();
    if( isset($_POST['id'])){
    $data = $_POST['id'];
    $_SESSION['id'] = $data;
    }
    $categval = $_POST['inv'];
    $stmt = mysqli_query($link,"DELETE FROM `zaiv` WHERE `id_zaiv` ='$data'  AND `status` = 'Новая'");
    header("Location: myzaiv.php");
?>