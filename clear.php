<?php
unset($_SESSION["id"]);
unset($_SESSION["login"]);
unset($_SESSION["email"]);
unset($_SESSION["password"]);

header("Location: index.php");
?>