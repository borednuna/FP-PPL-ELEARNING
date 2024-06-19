<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Material</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Material</h1>
        <form action="/material/update/<?= $material['id'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="material_description">Material Description</label>
                <textarea class="form-control" id="material_description" name="material_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="material_content">Material Content</label>
                <textarea class="form-control" id="material_content" name="material_content" required></textarea>
            </div>
            <div class="form-group">
                <label for="video_path">Video Path</label>
                <input type="text" class="form-control" id="video_path" name="video_path">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
