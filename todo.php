<?php
header("Content-type:text/html; charset=UTF-8");
require_once "create_and_read_db.php";
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}
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
        <!-- Секция Sidebar -->
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
                <a href="clear.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Выход</h3>
                </a>
            </div>
        </aside>

        <!-- Главный контент -->
        <main>
            <h1>Списки</h1>
            <div class="new-users">
                <div class="user-list">
                    <button type="button" id="modalBtn" class="btn_add_message">Создать + </button>
                    <button type="button" id="modalBtnUpdate" class="btn_add_message container-width">Редактировать</button>
                </div>
            </div>

            <!-- Модальное окно для создания -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 style="text-align: center;">Заполни поля!!!</h2>
                    </div>
                    <div class="modal-body" style="text-align: center; font-weight: 700; font-size: 20px;">
                        <form class="form_add_message" action="create_and_read_db.php" method="post">
                            <input class="text-field__input text-field__input_modal" name="title" class="inp_item" type="text" placeholder="Заголовок" required>
                            <textarea class="text-field__input text-field__input_textarea" name="message" class="inp_item" cols="30" rows="10" placeholder="Основная задача" required></textarea>
                            <button class="btn_add_message btm_modal_push" type="submit">Записать</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Редактирования записи-->
            <div id="myModalUpdate" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 style="text-align: center;">Заполни поля!!!</h2>
                    </div>
                    <div class="modal-body" style="text-align: center; font-weight: 700; font-size: 20px;">
                        <form class="form_add_message" action="update.php" method="post">
                            <label for="data">Номер записи</label>
                            <select id="data" name="dataUpdate">
                                <?php
                                $index_db = connect();
                                $query = mysqli_query($index_db, "SELECT id, id_auth FROM todolist");
                                $index = mysqli_fetch_all($query);
                                foreach ($index as $i => $key):?>
                                    <?php if ($key[1] == $_SESSION["id"]) :?>
                                        <?php $cout_index =+ 1?>
                                        <option selected value="<?=$key[0]?>"><?=$cout_index?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                            <br>
                            <input class="text-field__input text-field__input_modal" name="titleUpd" class="inp_item" type="text" placeholder="Заголовок" required>
                            <textarea class="text-field__input text-field__input_textarea" name="messageUpd" class="inp_item" cols="30" rows="10" placeholder="Основная задача" required></textarea>
                            <button class="btn_add_message btm_modal_push" type="submit">Обновить</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Таблица -->
            <div class="recent-orders">
                <h2>Записи</h2>
                <form method="post" action="delete.php">
                <label for="data"><b>Номер записи</b></label>
                <select id="data" name="dataS">
                    <?php
                    $index_db = connect();

                    $query = mysqli_query($index_db, "SELECT id, id_auth FROM todolist");
                    $index = mysqli_fetch_all($query);

                    foreach ($index as $i => $key):?>
                        <?php if ($key[1] == $_SESSION["id"]) :?>
                            <?php $cout_index =+ 1?>
                            <option selected value="<?=$key[0]?>"><?=$cout_index?></option>
                        <?php endif?>
                    <?php endforeach;?>
                </select>
                <button class="btn_add_message" type="submit">Удалить</button>

                <form method="post" action="delete.php">
                <label for="data"><b>Номер записи</b></label>
                <select id="data" name="dataFinall">
                    <?php
                    $index_db = connect();

                    $query = mysqli_query($index_db, "SELECT id, id_auth FROM todolist");
                    $index = mysqli_fetch_all($query);
            
                    foreach ($index as $i => $key):?>
                        <?php if ($key[1] == $_SESSION["id"]) :?>
                            <?php $cout_index =+ 1?>
                            <option selected value="<?=$key[0]?>"><?=$cout_index?></option>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
                <button class="btn_add_message" type="submit">Завершить</button>
                </form>
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
                            <form action="delete.php" method="post">
                            <div class="message-container">
                            <?php if ($value[4] == $_SESSION["id"]) :?>
                                <?php $cout_index =+ 1?>
                                <tr>
                                    <td><?=$cout_index?></td>
                                    <td><?=$value[1]?></td>
                                    <td><?=$value[3]?></td>
                                    <td><?=nl2br(htmlspecialchars($value[2]))?></td>
                                </tr>
                            <?php endif;?>
                            </div>
                        <?php endforeach;?>
                        </tbody>
                    </table>
            </div>
        </main>

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
        </div>


    </div>
    
    <script src="./js/modal.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>