<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <style>
        body {
            margin: 0;
            padding-top: 20px;
            font-family: Inter, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Materi</h1>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('material/store') ?>" method="post">
            <input type="hidden" name="class_id" value="<?= $class_id ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Materi</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" required>
            </div>
            <div class="mb-3">
                <label for="material_description" class="form-label">Deskripsi Materi</label>
                <textarea class="form-control" id="material_description" name="material_description" rows="3" required><?= old('material_description') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="material_content" class="form-label">Isi Materi</label>
                <textarea class="form-control" id="material_content" name="material_content" rows="5" required><?= old('material_content') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="video_path" class="form-label">Video Path</label>
                <input type="text" class="form-control" id="video_path" name="video_path" value="<?= old('video_path') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Materi</button>
        </form>
    </div>
</body>

</html>