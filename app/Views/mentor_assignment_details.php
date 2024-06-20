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
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('class') ?>">Kelas</a>
                    </span>
                </li>
                <!-- <li class="nav-item">
                    <span style="display: flex; align-items: center; padding-left: 20px;">
                        <img src="<?= base_url('assets/jadwal.png'); ?>" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        <a class="nav-link active" style="padding-left: 5px;" aria-current="page" href="<?= base_url('notifications/') ?>">Notifikasi</a>
                    </span>
                </li> -->
                <li class="nav-item1 text-center">
                    <a class="nav-link active" aria-current="page" href="<?php echo site_url('auth/logout'); ?>">Keluar</a>
                </li>
            </ul>
        </div>
    </header>

    <div style="margin-left: 270px;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="container mt-4" style="width: 81%;">
                <form class="form-inline" method="get" action="<?php echo site_url('class/search'); ?>">
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="text" class="form-control" name="kelas" placeholder="Cari kelas ..." required><br>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>

            <div class="user-info">
                <img src="<?= base_url('assets/ellipse-1-bg-eyb.png'); ?>" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
                <span>
                    <div class="user-name"><?php echo session()->get('username'); ?></div>
                    <div class="user-name1" style="font-size: 13px;">Mentor</div>
                </span>
            </div>
        </div>

        <?php if (isset($assignment)): ?>
            <?php foreach ([$assignment] as $assignmentItem): ?>
                <form action="<?= base_url('assignments/update/' . $assignmentItem['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="assignment-card">
                        <h1>Assignment Details</h1>

                        <h2>Assignment Name</h2>
                        <input type="text" class="form-control" name="name" value="<?= $assignmentItem['name'] ?>" required><br>

                        <h2>Description</h2>
                        <textarea class="form-control" name="description" placeholder="Description" required><?= $assignmentItem['description'] ?></textarea>

                        <h2>Deadline</h2>
                        <input type="text" class="form-control" name="deadline" value="<?= $assignmentItem['deadline'] ?>" required><br>

                        <button type="submit" class="custom-button" style="background-color: #32CA4D; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#7DD38C'" onmouseout="this.style.backgroundColor='#32CA4D'">Update</button>
                    </div>
                </form>

                <form action="<?= base_url('assignments/delete/' . $assignmentItem['id']) ?>" method="post" style="display: none;" id="deleteForm">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                </form>
                <button type="button" style="margin-top: 0px; width: 85%; background-color: #F80202; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#F15757'" onmouseout="this.style.backgroundColor='#F80202'" class="custom-button" onclick="deleteSubmission()">
                    Delete Submission
                </button>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Assignment not found or invalid data.</p>
        <?php endif; ?>
    </div>

    <script>
        function deleteSubmission() {
            if (confirm("Are you sure you want to delete this submission?")) {
                document.getElementById('deleteForm').submit();
            } else {
                alert("Submission deletion canceled.");
            }
        }
    </script>
</body>
</html>