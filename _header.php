<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi SDN Kalibaru 09</title>
    <!-- Bootstrap Core CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="<?= base_url('_assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/css/simple-sidebar.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/libs/DataTables/datatables.min.css'); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        .sidebar-brand,
        .sidebar-nav {
            font-family: 'Carter One', cursive;
        }

        .sidebar-brand {
            color: rgb(0, 255, 255);
            letter-spacing: 1px;
            text-align: center;
            padding-bottom: 25px;
        }

        .sidebar-nav li a {
            color: white;
            font-size: 18px;
            padding: 0;
            margin-bottom: 35px;
            letter-spacing: 1px;
        }

        .sidebar-nav li a:hover {
            color: black;
        }

        .sidebar-nav li .logout {
            color: #F32424;
        }

        .sidebar-nav li .logout:hover {
            color: #F32424;
        }

        i {
            padding-right: 10px;
        }

        .box {
            text-align: justify;
        }

        .box ul {
            position: relative;
        }

        .box ul li {
            width: 100%;
            transition: transform 0.5s;
        }

        .box ul li:hover {
            transform: scale(1.2);
            z-index: 2;
            background: rgb(0, 255, 255);
        }
    </style>
</head>

<body>
    <script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('_assets/libs/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('_assets/libs/vendor/vendor/ckeditor/ckeditor/ckeditor.js') ?>"></script>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <h3 class="sidebar-brand">SDN Kalibaru 09</h3>
            <div class="box">
                <ul class="sidebar-nav">
                    <li>
                        <a href="<?= base_url('home') ?>"><i class="bi bi-house-door-fill"></i>Home</a>
                    </li>
                    <li>
                        <a href="<?= base_url('siswa/data.php') ?>"><i class="bi bi-people"></i>Data Siswa</a>
                    </li>
                    <li>
                        <a href="<?= base_url('guru/data.php') ?>"><i class="bi bi-person-vcard-fill"></i></i>Data Guru</a>
                    </li>
                    <li>
                        <a href="<?= base_url('ruangan/data.php') ?>"><i class="bi bi-house-fill"></i>Data Ruangan</a>
                    </li>
                    <li>
                        <a class="logout" href="<?= base_url('auth/logout.php') ?>"><i class="bi bi-door-closed-fill"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="page-content-wrapper">
            <div class="container-fluid">