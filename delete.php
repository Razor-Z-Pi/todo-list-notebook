<?php
require_once "./DataBase/link.php";

session_start();

$data = connect();

if (!empty($_POST)) {
  $item = $_POST["dataS"];
  $index = $_POST["dataFinall"];
  $id = $_SESSION["id"];
  $cout = $_SESSION["cout"] - 1;

  print(var_dump($index));
  if (isset($index)) {
    delete($data, $index, $id, $cout, true);
  }
  delete($data, $item, $id, $cout, false);
}

function delete($data, $index, $id, $cout, $state) {
  $query = "DELETE FROM todolist WHERE id = '$index'";
  if ($state != true) {
    $queryhistory = "UPDATE history SET state = 'удалено' WHERE id_todo = '$index'";
  } else {
    $queryhistory = "UPDATE history SET state = 'выполнено' WHERE id_todo = '$index'";
  }
  
  $queryCoutMessage = "UPDATE auth SET cout_message = '$cout' WHERE id = '$id'";
  mysqli_query($data, $query) or die("Произошла ошибка удаления записи");
  mysqli_query($data, $queryhistory) or die("Произошла обновление истории!!!");
  mysqli_query($data, $queryCoutMessage) or die("Произошла ошибка обновление счетчика списка!!!");
  header("Location: todo.php");
  die();
}