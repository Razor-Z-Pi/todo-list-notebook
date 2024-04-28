<?php
header("Content-type:text/html; charset=UTF-8");
require_once "create_and_read_db.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo-list-notebook</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="./css/normalize.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <h3>TO DO List<span class="danger"> Блокнот</span></h3>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="profile.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Профиль</h3>
                </a>
                <a href="todo.php">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Todo Lis</h3>
                </a>
                <a href="notepude.php">
                    <span class="material-icons-sharp">
                        add_box
                    </span>
                    <h3>Блокнот</h3>
                </a>
                <a href="history.php">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>История</h3>
                </a>
                <a href="index.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Выход</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Профиль</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h2>Количество записей</h2>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>
                                <?php
                                    $index_db = connect();
                                    $id = $_SESSION["id"];
                                    $query = mysqli_query($index_db, "SELECT * FROM auth");
                                    $index = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                    foreach ($index as $item) {
                                        if ($id = $item["id"]) {
                                            print($item["cout_message"]);
                                            $_SESSION["cout"] = $item["cout_message"];
                                        }
                                    }
                                ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h2>Визит сервиса</h2>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>
                                    1
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>Информация</h2>
                <div class="user-list">
                    <div class="user">
                        <label for="">
                            Логин:
                            <input type="text" value="<?=$_SESSION["login"]?>">
                        </label>
                    </div>
                    <div class="user">
                        <label for="">
                            Почта:
                            <input type="text" value="<?=$_SESSION["email"]?>">
                        </label>
                    </div>
                    <div class="user">
                        <label for="">
                            Пароль:
                            <input type="password" value="<?=$_SESSION["password"]?>">
                        </label>
                    </div>
                    <div class="user">
                        <button type="button" class="btn_add_message">Изменить</button>
                    </div>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Записи</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Номер</th>
                            <th>Название</th>
                            <th>Дата создания</th>
                            <th>Содержимое</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $message = read(); arsort($message);?>
                    <?php foreach ($message as $key => $value):?>
                        <div class="message-container">
                            <tr>
                                <td>Номер записи: <?=$key?></td>
                                <td>Тема: <?=$value[1]?></td>
                                <td><?=$value[3]?></td>
                                <td><?=nl2br(htmlspecialchars($value[2]))?></td>
                            </tr>
                        </div>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>
            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <span class="material-icons-sharp">
                        person
                    </span>
                    <h2><?php echo $_SESSION["login"]?>&hearts;</h2>
                    <p>Пользователь</p>
                </div>
            </div>
        </div>


    </div>

    <script src="./js/index.js"></script>
</body>

</html>