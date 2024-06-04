<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo session()->get('username'); ?>!</h1>
    <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>
</html>
