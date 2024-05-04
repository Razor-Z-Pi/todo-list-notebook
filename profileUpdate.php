<?php
require_once "./DataBase/link.php";
session_start();

$data = connect();

if (!empty($_POST)) {
    $Oldpassword = $_POST["password"];
    if ($Oldpassword != $_SESSION["password"]) {
        $_SESSION["ERROR_PROFILE"] = "";
        header("Location: profile.php") or die();
    }

    $id = $_SESSION["id"];
    $login = $_POST["login"];
    $email = $_POST["email"];

    $Newpassword = $_POST["passwordUpdate"];


    $query = "UPDATE auth SET login = '$login', email = '$email', password = '$Newpassword' WHERE id = '$id'";
    mysqli_query($data, $query) or die("Произошла ошибка раедактирования записи");

    $_SESSION["login"] = $login;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $Newpassword;    

    header("Location: profile.php");
}