<?php
session_start();
unset($_SESSION["id"]);
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>todo-list-notebook</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    <section class="container-auth">
        <div class="Login_form">
            <form class="form" method="post" action="./avtorzation.php">
                <h1>Авторизация</h1>
              
                  <?php
                  if(isset($_SESSION["ERROR"])) {
                    echo "<p class='error alert alert-danger'>Вы ввели неправильный пароль или логин!</p>";
                  }
                  unset($_SESSION["ERROR"]);
                  ?>
                
                <p>Введите логин и пароль</p>
                <p>
                    Логин:
                    <input name="login" class="form-control" type="text" placeholder="Элктронная почта" required>
                </p>
                <p>
                    Пароль:
                    <input name="password" class="form-control" type="password" placeholder="Пароль" required>
                </p>
                <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
                <br>
                <a class="btn btn-primary w-100 py-2" href="register.php">Регистрация</a>
            </form>
        </div>
    </section>
  </body>
</html>