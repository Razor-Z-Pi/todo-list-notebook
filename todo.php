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
            <h1>Списки</h1>
            <div class="new-users">
                <div class="user-list">
                    <button type="button" id="modalBtn" class="btn_add_message">Создать + </button>
                    <button type="button" id="modalBtnUpdate" class="btn_add_message container-width">Редактировать</button>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Модальный -->
            <div id="myModal" class="modal">

                <!-- Модальное содержание -->
                <div class="modal-content">
                    <div class="modal-header">
                    <h2 style="text-align: center;">Заполни поля!!!</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body" style="text-align: center; font-weight: 700; font-size: 20px;">
                        <form class="form_add_message" action="create_and_read_db.php" method="post">
                            <input name="title" class="inp_item" type="text" placeholder="Заголовок" required>
                            <textarea name="message" class="inp_item" name="" id="" cols="30" rows="10" placeholder="Основная задача" required></textarea>
                            <button class="btn_add_message" type="submit">Записать</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Модальный Редактирования-->
            <div id="myModalUpdate" class="modal">

                <!-- Модальное содержание -->
                <div class="modal-content">
                    <div class="modal-header">
                    <h2 style="text-align: center;">Заполни поля!!!</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body" style="text-align: center; font-weight: 700; font-size: 20px;">
                        <form class="form_add_message" action="update.php" method="post">
                            <label for="data">Номер записи</label>
                            <select id="data" name="dataUpdate">
                                <?php
                                $index_db = connect();
                                $query = mysqli_query($index_db, "SELECT id FROM todolist");
                                $index = mysqli_fetch_all($query);
                                foreach ($index as $i => $key):?>
                                    <option selected value="<?=$key[0]?>"><?=$i?></option>
                                <?php endforeach;?>
                            </select>
                            <br>
                            <input name="titleUpd" class="inp_item" type="text" placeholder="Заголовок" required>
                            <textarea name="messageUpd" class="inp_item" name="" id="" cols="30" rows="10" placeholder="Основная задача" required></textarea>
                            <button class="btn_add_message" type="submit">Обновить</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Записи</h2>
                <form method="post" action="delete.php">
                <label for="data"><b>Номер записи</b></label>
                <select id="data" name="dataS">
                <?php
                $index_db = connect();
                $query = mysqli_query($index_db, "SELECT id FROM todolist");
                $index = mysqli_fetch_all($query);
                foreach ($index as $i => $key):?>
                    <option selected value="<?=$key[0]?>"><?=$i?></option>
                <?php endforeach;?>
                </select>
                <button class="btn_add_message" type="submit">Удалить</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Номер</th>
                                <th>Тема</th>
                                <th>Дата создания</th>
                                <th>Содержимое</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $message = read(); arsort($message);?>
                        <?php foreach ($message as $key => $value):?>
                            <div class="message-container">
                                <tr>
                                    <td><?=$key?></td>
                                    <td><?=$value[1]?></td>
                                    <td><?=$value[3]?></td>
                                    <td><?=nl2br(htmlspecialchars($value[2]))?></td>
                                </tr>
                            </div>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </form>
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
    
    <script src="./js/modal.js"></script>
    <script src="./js/orders.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>