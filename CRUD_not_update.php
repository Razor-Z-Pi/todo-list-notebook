<?php
require_once "./DataBase/link.php";
$data = connect();

if (!empty($_POST)) {
  $title = security($data, $_POST["title"]);
  $text = security($data, $_POST["message"]);
  $query = "INSERT INTO todolist(title, message, id_login) VALUES('$title', '$text', 1)";
  mysqli_query($data, $query) or die("Ошибка добавление заметки");
  header("Location: todo.php");
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