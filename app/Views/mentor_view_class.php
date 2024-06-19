<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <style>
        body {
            margin: 0;
            padding-top: 20px;
            font-family: Inter, sans-serif;
            overflow: hidden;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #4829B2;
            color: #fff;
            padding: 20px;
        }

        .sidebar-brand {
            font-family: 'Abhaya Libre', sans-serif;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .sidebar-nav {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 20px;
        }

        .sidebar-nav .nav-item a {
            color: #fff;
            text-decoration: none;
        }

        .nav-item1 {
            padding-top: 360px;
        }

        .nav-item1 a {
            display: inline-block;
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: red;
            background-color: #F1E8F6;
            border-radius: 10px;
        }

        .nav-item1 a:hover {
            background-color: #fff;
            color: red;
        }

        .user-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 30px 30px 0 0;
        }

        .user-info img {
            border-radius: 50%;
            margin-right: 10px;
            width: 30px;
            height: 30px;
            object-fit: cover;
        }

        .user-info .user-name {
            color: black;
        }

        .assignment-card {
            height: 100%;
            width: 90%;
            display: flex;
            flex-direction: column;
            padding: 20px;
            margin: 20px;
            border-radius: 7px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            color: #333;
        }

        h2 {
            margin: 20px 0;
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        textarea.form-control {
            width: 100%;
            height: 150px;
            resize: both;
        }

        .custom-button {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            width: 100%;
            margin: 10px 0;
        }

        .custom-button:hover {
            background-color: #218838;
        }

        /* Custom table styling */
        .assignment table {
            width: 80%;
            border-collapse: collapse;
        }

        .assignment th,
        .assignment td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .assignment th {
            background-color: #4829B2;
            color: #fff;
            text-align: left;
        }

        .assignment tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .assignment tr:hover {
            background-color: #ddd;
        }

        .assignment td a.btn {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <nav class="sidebar">
        <div style="padding-bottom: 40px; text-align: center; color: white;">
            <a class="sidebar-brand" href="#">
                <img src="./assets/book.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                E-learningApp
            </a>
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <span style="display: flex; align-items: center; padding-left: 20px;">
                    <img src="./assets/beranda.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                    <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('#') ?>">Beranda</a>
                </span>
            </li>
            <li class="nav-item">
                <span style="display: flex; align-items: center; padding-left: 20px;">
                    <img src="./assets/kelas.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                    <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('class') ?>">Kelas</a>
                </span>
            </li>
            <!-- <li class="nav-item">
                <span style="display: flex; align-items: center; padding-left: 20px;">
                    <img src="./assets/jadwal.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                    <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('./jadwal') ?>">Jadwal</a>
                </span>
            </li>
            <li class="nav-item">
                <span style="display: flex; align-items: center; padding-left: 20px;">
                    <img src="./assets/nilai.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                    <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('./nilai') ?>">Nilai</a>
                </span>
            </li> -->
            <li class="nav-item">
                <span style="display: flex; align-items: center; padding-left: 20px;">
                    <img src="./assets/jadwal.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                    <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('assignments/create') ?>">Buat Tugas</a>
                </span>
            </li>
            <!-- <li class="nav-item">
                <span style="display: flex; align-items: center; padding-left: 20px;">
                    <img src="./assets/materi.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                    <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('materials/create') ?>">Materi</a>
                </span>
            </li> -->
        </ul>
        <ul class="nav-item1">
            <a href="<?= base_url('logout') ?>">
                Keluar
            </a>
        </ul>
    </nav>

    <div class="container" style="margin-left: 270px;">
        <header class="d-flex justify-content-between align-items-center">
            <div class="container mt-4" style="width: 81%;">
                <form class="form-inline">
                    <div class="d-flex justify-content-between align-items-center">
                        <input class="form-control" type="search" placeholder="Cari kelas sekarang..." id="searchInput" aria-label="Search">
                        <button class="btn btn-primary" type="button" onclick="searchPelajaran()">Cari</button>
                    </div>
                </form>
            </div>
            <div class="container mt-4" style="width: 20%">
                <a href="<?php echo site_url('class/create') ?>" class="btn btn-primary" style="background-color: #4829B2; color: #ffffff;">+ Add Class</a>
            </div>

            <div class="user-info">
                <img src="./assets/ellipse-1-bg-eyb.png" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
                <span>
                    <div class="user-name"><?php echo session()->get('username'); ?></div>
                    <div class="user-name1" style="font-size: 13px;">Mentor</div>
                </span>
            </div>
        </header>

        <!-- table -->
        <div class="container mt-4">
            <div class="assignment" style="margin-top: 20px;">
                <h1>Class Room</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class Name</th>
                            <th>Description</th>
                            <th>Quota</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($class as $classes) : ?>
                        <tr>
                            <td><?= $classes['id'] ?></td>
                            <td><?= $classes['class_name'] ?></td>
                            <td><?= $classes['class_description'] ?></td>
                            <td><?= $classes['quota'] ?></td>
                            <td><a href="<?php echo site_url('class/detail/'. $classes['id']) ?>" class="btn btn-warning btn-sm">Detail</a></td>
                            <td><a href="<?php echo site_url('class/update/' . $classes['id']) ?>" class="btn btn-success btn-sm">Update</a></td>
                            <td><a href="<?php echo base_url('class/delete/'. $classes['id']) ?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
