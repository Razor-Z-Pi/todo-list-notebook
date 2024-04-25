<?php
require_once "./DataBase/link.php";

session_start();

$data = connect();

if (!empty($_POST)) {
  $title = security($data, $_POST["title"]);
  $text = security($data, $_POST["message"]);
  $id = $_SESSION["id"];
  $cout_number_message = $_SESSION["cout"] + 1;

  $query = "INSERT INTO todolist(title, message, id_auth) VALUES('$title', '$text', '$id')";
  mysqli_query($data, $query) or die("Ошибка добавление заметки!!!");

  $queryIdhistory = mysqli_query($data, "SELECT id FROM todolist");
  $list =  mysqli_fetch_all($queryIdhistory);
  foreach ($list as $index => $item) {
    $id_todo = $item[0];
  }
  $queryhistory = "INSERT INTO history(title, message, id_login, id_todo, state) VALUES('$title', '$text', '$id', '$id_todo', 'активно')";
  mysqli_query($data, $queryhistory) or die("Ошибка сохранения истории!!!");

  $queryCoutMessage = "UPDATE auth SET cout_message = '$cout_number_message' WHERE id = '$id'";
  mysqli_query($data, $queryCoutMessage) or die("Ошибка обновления счетчика записей!!!");

  //header("Location: todo.php");
}

function security($db, $item) {
  return mysqli_escape_string($db, htmlentities($item));
}

function read() {
  $data = connect();
  $query = "SELECT * FROM todolist";
  $list = mysqli_query($data, $query);
  return mysqli_fetch_all($list, MYSQLI_NUM);
}

function readhistory() {
  $data = connect();
  $query = "SELECT * FROM history";
  $list = mysqli_query($data, $query);
  return mysqli_fetch_all($list, MYSQLI_NUM);
}