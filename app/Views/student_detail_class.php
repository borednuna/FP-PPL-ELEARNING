<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Link to Inter font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">

    <style>
        body {
            margin: 0;
            padding-top: 20px;
            font-family: Inter, sans-serif;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #002979;
            color: #fff;
            padding-top: 40px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
        }

        .sidebar-brand {
            font-family: 'Abhaya Libre', sans-serif;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .sidebar-nav {
            list-style: none;
            padding-left: 20px;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 20px;
        }

        .sidebar-nav .nav-item a {
            font-family: 'Inter', sans-serif;
        }

        .nav-item1 {
            list-style: none;
            padding-top: 360px;
        }

        .nav-item1 a {
            display: inline-block;
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: red;
            background-color: white;
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
            padding: 30px;
            padding-bottom: 0px;

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

        .container img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            /* Center the image */
        }

        .desktop-1-Mss {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .auto-group-39fb-PpZ {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .vector-zxm {
            width: 50px;
            height: auto;
        }

        .navbar-43-WRK {
            display: flex;
            align-items: center;
        }

        .auto-group-zq2d-y41 {
            display: flex;
            align-items: center;
        }

        .frame-63-hVo {
            display: flex;
            align-items: center;
        }

        .frame-64-3Zf {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .raphael-books-XNM {
            width: 30px;
            height: auto;
            margin-right: 10px;
        }

        .media-ilmu-pcM,
        .catalog-JGd,
        .delivery-R6M,
        .delivery-LUD {
            margin: 0;
            padding: 0;
            margin-right: 20px;
            color: #fff;
            text-decoration: none;
        }

        .frame-65-5Au {
            display: flex;
            align-items: center;
        }

        .ellipse-1-Nvh {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #fff;
            margin-right: 10px;
        }

        .delivery-1Ts {
            margin: 0;
            padding: 0;
            margin-right: 10px;
            color: #fff;
        }

        .iconamoon-arrow-up-2-light-jem {
            width: 20px;
            height: auto;
        }

        .navbar-nav .nav-link {
            outline: none;
        }

        .navbar-nav .nav-item.active a {
            color: blue;
            font-weight: bold;
        }

        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card img {
            flex-grow: 1;
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .card-body p.card-text {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            color: #ffffff;
            background-color: #32CA4D;
            /* Set text color to white */
        }
    </style>
</head>

<body>
<header>
        <div class="sidebar">
            <div style="padding-bottom: 40px; text-align: center; color: white;">
                <a class="sidebar-brand" href="#">
                    <img src="<?= base_url('assets/book.png'); ?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    E-learningApp
                </a>
            </div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="<?= base_url('assets/beranda.png'); ?>" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('#') ?>">Beranda</a>
                    </span>
                </li>
                <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="<?= base_url('assets/kelas.png'); ?>" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?php echo site_url('student/class'); ?>">Kelas</a>
                    </span>
                </li>
                <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="<?= base_url('assets/jadwal.png'); ?>" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('notifications/read') ?>">Notifikasi</a>
                    </span>
                </li>
                <li class="nav-item1 text-center">
                    <a class="nav-link active" aria-current="page" href="<?php echo site_url('auth/logout'); ?>">Keluar</a>
                </li>
            </ul>
        </div>
    </header>

    <div style="margin-left: 270px;">
        <!-- Add separate containers for pelajaran and tugas -->
        <div class="result-container">
            <img src="./assets/welcome_guru.png" class="img-fluid" style="padding-bottom: 40px;"><br>
            <img src="./assets/welcome_guru.png" class="img-fluid" style="padding-bottom: 40px;"><br>
            <div class="row" id="resultPelajaran"></div>
        </div>
        <h1>Exams in This Class</h1>
        <?php if (empty($exams)) : ?>
            <p>No exams found.</p>
        <?php else : ?>
            <?php foreach ($exams as $exam) : ?>
                <div class="card shadow d-flex flex-column" style="align-items: flex-start; margin-bottom:10px; width: 70%">
                    <div class="card-body img-fuild">
                        <h6 class="card-title"><?= esc($exam['name']); ?></h6>
                        <p class="card-title">Start time : <?= esc($exam['start_time']); ?>, End time : <?= esc($exam['end_time']); ?></p>
                        <div class="card-body img-fluid">
                        <a href="<?= base_url('exam/' . $exam['id']); ?>" class="btn btn-sm btn-warning">Take Exam</a>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <h1>Ini Daftar Materi</h1>
        <div class="card shadow d-flex flex-column" style="align-items: flex-start;">
             <div class="card-body img-fuild">
                <p class="card-title">Aljabar apa itu</p>
                    <h6 class="card-title">Gak tau males</h6>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>