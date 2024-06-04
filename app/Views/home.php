<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to Our Website</h1>

    <?php if ($isLoggedIn) : ?>
        <p>Hello, <?php echo $userData['username']; ?>! You are logged in.</p>
        <p>Your email: <?php echo $userData['email']; ?></p>
        <p><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></p>
    <?php else : ?>
        <p>You are not logged in. <a href="<?php echo base_url('auth/login'); ?>">Login</a> or <a href="<?php echo base_url('auth/register'); ?>">Register</a></p>
    <?php endif; ?>
</body>
</html>
