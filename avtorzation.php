<?php
session_start();
require_once "./DataBase/link.php";
$link = connect();

if (!empty($_POST["login"] || !empty($_POST["email"]) && !empty($_POST["password"])) {

  if (!empty($_POST["login"]) {
    $login = $_POST["login"];
    $validate = mysqli_query($link,  "SELECT * FROM login");
    $index = 1;
  } else {
    $login = $_POST["email"];
    $validate = mysqli_query($link,  "SELECT * FROM email");
    $index = 2;
  }

  $password = $_POST["password"];
  

  $users = mysqli_fetch_all($validate, MYSQLI_ASSOC);
  
  foreach ($users as $value) {
    if ($index == 1) {
      if ($value["login"] == $login) {
        $user = $login;
      }
    } else {
      if ($value["email"] == $login) {
        $user = $login;
      }
    }
    if ($user === $login) {
      if ($value["password"] == $password) {
        header("Location: profile.php");
        die();
      }
    }
  }
  $_SESSION["ERROR"] = "";
  home();
} else {
  home();
}
home();

function home() {
  header("Location: index.php");
  die();
}
