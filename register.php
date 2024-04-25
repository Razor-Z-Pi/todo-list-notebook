<?php
session_start();
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
    <section class="container">
        <div class="Login_form">
            <form class="form" method="post" action="./create_auth.php">
                <h1>Регистрация</h1>               
                <p>Заполните соответсвенные поля и данные!!!</p>
                <p>
                    Логин:
                    <input name="login" class="form-control" type="text" required>
                </p>
                <p>
                    Почта:
                    <input name="email" class="form-control" type="email" required>
                </p>
                <p>
                    Пароль:
                    <input name="password" class="form-control" type="password" required>
                </p>

                <button class="btn btn-primary w-100 py-2" type="submit">Регистрация</button>
            </form>
        </div>
    </section>
  </body>
</html>