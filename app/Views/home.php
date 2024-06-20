<!DOCTYPE html>
<html lang="en">
<head>
    <<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }
        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #EF3B3A;
        }
        body {
            background: #FFFFFF;
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;      
        }
        h1 {
            text-align: center;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="home">
        <h1>Welcome to E-Learning App</h1>
        <p>You are not logged in. <a href="<?php echo base_url('auth/login'); ?>">Login</a> or <a href="<?php echo base_url('auth/register'); ?>">Register</a> to unlock the features of this app.</p>
    </div>
</body>
</html>
