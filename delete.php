<?php
require_once "./DataBase/link.php";

session_start();

$data = connect();

if (!empty($_POST)) {
  $item = $_POST["dataS"];
  $id = $_SESSION["id"];
  $cout = $_SESSION["cout"] - 1;
  $query = "DELETE FROM todolist WHERE id = '$item'";
  $queryhistory = "UPDATE history SET state = 'удалено' WHERE id_todo = '$item'";
  $queryCoutMessage = "UPDATE auth SET cout_message = '$cout' WHERE id = '$id'";
  mysqli_query($data, $query) or die("Произошла ошибка удаления записи");
  mysqli_query($data, $queryhistory) or die("Произошла обновление истории!!!");
  mysqli_query($data, $queryCoutMessage) or die("Произошла ошибка обновление счетчика списка!!!");
  header("Location: todo.php");
}