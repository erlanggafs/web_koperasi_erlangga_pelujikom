<?php
session_start();
require 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Koperasi</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="Assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="Assets/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* SIDEBAR */
        #sidebar-wrapper {
            width: 250px;
            background-color: #222;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #sidebar-wrapper h4 {
            padding: 15px;
            color: #fff;
        }

        #sidebar-wrapper ul {
            list-style-type: none;
            padding: 0;
        }

        #sidebar-wrapper ul li a {
            color: #ccc;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        #sidebar-wrapper ul li a:hover,
        #sidebar-wrapper ul li.active a {
            background-color: #337ab7;
            color: #fff;
        }

        /* KONTEN UTAMA */
        #main-wrapper {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                left: -250px;
            }

            #sidebar-wrapper.active {
                left: 0;
            }

            #main-wrapper {
                margin-left: 0;
            }

            #main-wrapper.shifted {
                margin-left: 250px;
            }
        }

        footer {
            padding: 10px;
            background-color: #ddd;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <?php require 'akun.php'; ?>

    <!-- Sidebar -->
    <section id="sidebar-wrapper">
        <?php require 'menu.php'; ?>
    </section>

    <!-- Main content -->
    <section id="main-wrapper">
        <!-- Toggle button for small screens -->
        <button id="toggle-sidebar" class="btn btn-primary visible-xs-block" style="margin-bottom: 15px;">
            <i class="fa fa-bars"></i> Menu
        </button>

        <main>
            <?php require 'content_admin.php'; ?>
        </main>

        <footer>
            <?php require 'footer.php'; ?>
        </footer>
    </section>

    <!-- Scripts -->
    <script src="Assets/js/jquery.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src="Assets/js/jquery.dataTables.min.js"></script>
    <script src="Assets/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#deskripsi').dataTable();

            $('#toggle-sidebar').on('click', function () {
                $('#sidebar-wrapper').toggleClass('active');
                $('#main-wrapper').toggleClass('shifted');
            });
        });
    </script>
</body>
</html>
