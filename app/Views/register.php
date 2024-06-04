<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <?php echo form_open('auth/register', 'method="post"'); ?>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="role">Role:</label><br>
        <input type="radio" name="role" value="admin" required>Student<br>
        <input type="radio" name="role" value="user" required>Mentor<br>

        <input type="submit" value="Register">
    <?php echo form_close(); ?>
</body>
</html>
