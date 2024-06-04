<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if(session()->getFlashdata('login_failed')): ?>
        <p><?php echo session()->getFlashdata('login_failed'); ?></p>
    <?php endif; ?>
    <?php echo form_open('auth/login', 'method="post"'); ?>
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    <?php echo form_close(); ?>
</body>
</html>
