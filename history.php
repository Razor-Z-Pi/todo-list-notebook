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
            <h1>История</h1>
            <!-- Recent Orders Table -->
            <div class="recent-orders container-history">
                <h2>Записи</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Номер записи</th>
                                <th>Тема</th>
                                <th>Дата создания</th>
                                <th>Содержимое</th>
                                <th>Состояние</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $message = readhistory(); arsort($message);?>
                        <?php foreach ($message as $key => $value):?>
                            <div class="message-container">
                                <tr>
                                    <td><?=$key?></td>
                                    <td><?=$value[1]?></td>
                                    <td><?=$value[3]?></td>
                                    <td><?=nl2br(htmlspecialchars($value[2]))?></td>
                                    <td>
                                        <?php
                                            if ($value[6] == "активно") {
                                                $color = "background-color: #62a79a;";
                                            } else {
                                                $color = "background-color: rgb(175, 60, 60);";
                                            }
                                        ?>
                                        <div style="<?=$color?>"><b style="color: black"><?=$value[6]?></b></div>
                                    </td>
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
        </div>


    </div>
    
    <script src="./js/orders.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>