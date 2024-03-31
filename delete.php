<?php
require_once "./DataBase/link.php";

$data = connect();

if (!empty($_POST)) {
  $item = $_POST["date"];
  $query = "DELETE FROM message WHERE id = '$item'";
  mysqli_query($data, $query) or die("Произошла ошибка удаления записи");
  header("Location: profile.php");
}