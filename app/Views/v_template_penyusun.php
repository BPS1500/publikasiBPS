<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AAJUSI | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminLTE') ?>/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="<?= base_url('adminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Beranda</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Login/LogoutPenyusun') ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-light text-white elevation-4" style="background: rgb(39,0,93);
                    background: linear-gradient(180deg, rgba(39,0,93,1) 25%, rgba(112,0,201,1) 80%, rgba(148,0,255,1) 97%);">
            <!-- Brand Logo -->
            <br>
            <a href="<?= base_url() ?>" class="navbar-brand ">
                <img src="<?= base_url('adminLTE') ?>/dist/img/LogoBPS.png" alt="Logo BPS" class="brand-image" width="70px" height="auto">
                <span class="brand-text text-light font-weight-bold">AAJUSI BPS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('adminLTE') ?>/dist/img/User160.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?php $nama = "Penyusun";
                        $namalengkap = session()->get('nama_penyusun');
                        ?>
                        <a href="#" class="d-block"><?php echo $namalengkap ?> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('Penyusun') ?>" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>
                                    Dasbor
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-database"></i>
                                <p>
                                    Publikasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Publikasi') ?>" class="nav-link">
                                        <i class="fas fa-eye"></i>
                                        <p>Status Pengajuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Publikasi/Ajupublikasi') ?>" class="nav-link">
                                        <i class="fas fa-pen-square"></i>
                                        <p>Pengajuan Publikasi</p>
                                    </a>
                                </li>
                            </ul>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>
                                    Panduan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $judul ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                <li class="breadcrumb-item active"><?= $judul ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php

                        if ($page) {
                            echo view($page);
                        }

                        ?>

                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <a href="">Magang UIN JAMBI</a>.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('adminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminLTE') ?>/dist/js/adminlte.min.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url('adminLTE') ?>/plugins/sweetalert2/sweetalert2.all.js"></script>


    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script>

    </script>
    <script>
        $(document).ready(function() {

            $('#tabel_publikasi').DataTable({
                language: {
                    search: "Pencarian:",
                    lengthMenu: "_MENU_  Data per Halaman",
                    page: "Halaman",
                    info: "Menampilkan Halaman _PAGE_ dari _PAGES_"

                }
            });
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
            $('#tblmasterpub').DataTable({
                language: {
                    search: "Pencarian:",
                    lengthMenu: "_MENU_  Data per Halaman",
                    page: "Halaman",
                    info: "Menampilkan Halaman _PAGE_ dari _PAGES_"

                }
            });
        });
    </script>

</body>

</html>