<?php
require_once "./DataBase/link.php";

$data = connect();

if (!empty($_POST)) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "INSERT INTO auth(login, email, password, flag_role) VALUES('$login','$email','$password', 1)";
    mysqli_query($data, $query) or die("Ошибка добавления пользователя!!!");
    header("Location: index.php");
}