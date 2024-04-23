<?php
header("Content-type:text/html; charset=UTF-8");
require_once "CRUD_not_update.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>todo-list-notebook</title>
  <link href="css/normalize.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/sb-admin-2.min.css" type="text/css">
  <link href="./css/style.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
   <!-- Page Wrapper -->
   <div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TO DO List <sup>Блокнот</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Инструменты
    </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a href="todo.php" class="point_navigate_dashboard">Todo List</a>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
            <a href="notepude.php" class="point_navigate_dashboard">Блокнот</a>
        </a>
    </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a href="history.php" class="point_navigate_dashboard"><span>История</span></a>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-weight: 700"><?php echo "admin"?></span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Записи!!!</h1>
            </div>

            <button type="button" id="modalBtn" class="btn_add_message">Создать + </button>
            <button type="button" id="modalBtnUpdate" class="btn_add_message">Редактировать</button>

            <!-- Модальный -->
		<div id="myModal" class="modal">

            <!-- Модальное содержание -->
            <div class="modal-content">
                <div class="modal-header">
                <h2 style="text-align: center;">Заполни поля!!!</h2>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body" style="text-align: center; font-weight: 700; font-size: 20px;">
                    <form class="form_add_message" action="CRUD_not_update.php" method="post">
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

        <form method="post" action="delete.php">
            <label for="data">Номер записи</label>
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
            <?php $message = read(); arsort($message);?>
            <?php foreach ($message as $key => $value):?>
                <div class="message-container">
                    <h2>Номер записи: <?=$key?></h2>
                    <p class="Title-container">Тема: <?=$value[1]?>;<br> <?='Дата создания: ' . $value[3]?></p>
                    <p><?=nl2br(htmlspecialchars($value[2]))?></p>
                </div>
            <?php endforeach;?>
        </form>

    </div>


        <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



    <script src="./js/modal.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="./vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./js/demo/chart-area-demo.js"></script>
    <script src="./js/demo/chart-pie-demo.js"></script>
    </body>
</html>