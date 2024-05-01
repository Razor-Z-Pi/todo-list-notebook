<?php
require_once "./DataBase/link.php";

$data = connect();

if (!empty($_POST)) {
    $item = $_POST["dataUpdate"];
    $title = $_POST["titleUpd"];
    $message = $_POST["messageUpd"];
    $query = "UPDATE todolist  SET title = '$title', message = '$message' WHERE id = '$item'";
    $queryhistory = "UPDATE history SET title = '$title', message = '$message' WHERE id = '$item'";
    mysqli_query($data, $query) or die("Произошла ошибка раедактирования записи");
    mysqli_query($data, $query) or die("Произошла ошибка раедактирования записи истории!!!");
    header("Location: todo.php");
}