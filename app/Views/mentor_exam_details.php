<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .content h1 {
            margin-bottom: 20px;
        }
        .content .card {
            margin-bottom: 20px;
        }
        .content .card .card-body {
            padding: 20px;
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

            <div class="user-info">
                <img src="./assets/ellipse-1-bg-eyb.png" alt="Logo" width="48" height="48" class="d-inline-block align-text-top">
                <span>
                    <div class="user-name"><?php echo session()->get('username'); ?></div>
                    <div class="user-name1" style="font-size: 13px;">Kelas 12</div>
                </span>
            </div>
        </header>

        <?php if (isset($exam)): ?>
        <?php foreach ([$exam] as $examItem): ?>
            <form action="<?= base_url('exams/update/' . $examItem['id']) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="exam-card">
                    <h1>Exam Details</h1>

                    <h2>Exam Name</h2>
                    <input type="text" class="form-control" name="name" value="<?= $examItem['name'] ?>" required><br>

                    <h2>Class ID</h2>
                    <input type="text" class="form-control" name="class_id" value="<?= $examItem['class_id'] ?>" required><br>

                    <h2>Date Created</h2>
                    <input type="date" class="form-control" name="date_created" value="<?= $examItem['date_created'] ?>" required><br>

                    <h2>Start Time</h2>
                    <input type="time" class="form-control" name="start_time" value="<?= $examItem['start_time'] ?>" required><br>

                    <h2>End Time</h2>
                    <input type="time" class="form-control" name="end_time" value="<?= $examItem['end_time'] ?>" required><br>

                    <button type="submit" class="custom-button" style="background-color: #32CA4D; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#7DD38C'" onmouseout="this.style.backgroundColor='#32CA4D'">Update</button>
                </div>
            </form>

            <form action="<?= base_url('exams/delete/' . $examItem['id']) ?>" method="post" style="display: none;" id="deleteForm">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
            </form>
            <button type="button" style="margin-top: 0px; width: 85%; background-color: #F80202; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#F15757'" onmouseout="this.style.backgroundColor='#F80202'" class="custom-button" onclick="deleteSubmission()">
                Delete Exam
            </button>
        <?php endforeach; ?>

        <!-- <?php if (isset($question) && !empty($question)): ?>
            <div class="questions-section">
                <h2>Questions</h2>
                <?php foreach ($question as $questionItem): ?>
                    <div class="question-card">
                        <h3><?= $questionItem['question'] ?></h3>
                        <p><?= $questionItem['correct_answer'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No questions found for this exam.</p>
        <?php endif; ?> -->
        <?php else: ?>
            <p>Exam not found or invalid data.</p>
        <?php endif; ?>
    </div>

    <script>
        function deleteSubmission() {
            if (confirm('Are you sure you want to delete this exam?')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
</body>

</html>