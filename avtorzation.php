<?php
session_start();
require_once "./DataBase/link.php";
$link = connect();

if (!empty($_POST["login"]) && !empty($_POST["password"])) {

  $login = $_POST["login"];
  $validate = mysqli_query($link,  "SELECT * FROM auth");
  $password = $_POST["password"];

  $users = mysqli_fetch_all($validate, MYSQLI_ASSOC);
  
  foreach ($users as $value) {
    if ($value["email"] == $login) {
      $user = $login;
      $_SESSION["id"] = $value["id"];
      $_SESSION["login"] = $value["login"];
      $_SESSION["email"] = $user;
      $_SESSION["password"] = $value["password"];
    }
  } 
    if ($user === $login) {
      if ($value["password"] == $password) {
        header("Location: profile.php");
        die();
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