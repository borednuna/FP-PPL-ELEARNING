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
            overflow: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #4829B2;
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

        .submit-button {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #218838;
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
    </style>
</head>

<body>
    <header>
        <div class="sidebar">
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
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('./kelas') ?>">Kelas</a>
                    </span>
                </li>
                <li class="nav-item">
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
                </li>
                <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="./assets/materi.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('./materi') ?>">Materi</a>
                    </span>
                </li>
            </ul>
            <ul class="nav-item1">
                <a href="<?= base_url('logout') ?>">
                    Keluar
                </a>
            </ul>
        </div>
    </header>

    <div class="container" style="margin-left: 270px;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="container mt-4" style="width: 81%;">
                <form class="form-inline">
                    <div class="d-flex justify-content-between align-items-center">
                        <input class="form-control" type="search" placeholder="Cari kelas sekarang..." id="searchInput" aria-label="Search">
                        <button class="btn btn-primary" type="button" onclick="searchPelajaran()">Cari</button>
                    </div>
                </form>
            </div>

            <div class="user-info">
                <img src="./assets/ellipse-1-bg-eyb.png" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
                <span>
                    <div class="user-name"><?php echo session()->get('username'); ?></div>
                    <div class="user-name1" style="font-size: 13px;">Mentor</div>
                </span>
            </div>
        </div>
        
        <div class="class-card">
            <h1>Update Class</h1>
            <?php if (isset($class_data)): ?>
                <?= form_open("class/update/" . $class_data['id'], ['method' => 'post']); ?>
                    <?= csrf_field(); ?>
                    <label for="class_name">Class Name</label>
                    <input type="text" class="form-control" name="class_name" value="<?= esc($class_data['class_name']); ?>" placeholder="Name" required><br>

                    <label for="class_description">Description</label>
                    <textarea class="form-control" name="class_description" placeholder="Description" required><?= esc($class_data['class_description']); ?></textarea><br>

                    <label for="quota">Quota</label>
                    <input type="text" class="form-control" name="quota" value="<?= esc($class_data['quota']); ?>" required><br>

                    <button type="submit" class="custom-button">Update Class</button>
                <?= form_close(); ?>
            <?php else: ?>
                <p>Class data not found.</p>
            <?php endif; ?>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
