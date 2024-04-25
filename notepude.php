<?php
header("Content-type:text/html; charset=UTF-8");
require_once "create_and_read_db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>todo-list-notebook</title>
  <link href="css/normalize.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/sb-admin-2.min.css" type="text/css">
</head>

<body id="page-top">
   <!-- Page Wrapper -->
   <div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="profile.php">
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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-weight: 700"><?php echo $_SESSION["login"]?></span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Блокнот</h1>
            </div>

            <textarea style="width: 100%; height: 50%" name="notepud" id="notepud" id="" cols="30" rows="10"></textarea>

            <ul id="listNotepud"></ul>

        </div>
        <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

  <script src="./js/notepud.js"></script>
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