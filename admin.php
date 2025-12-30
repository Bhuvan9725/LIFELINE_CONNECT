<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="icon" href="icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('admin2.jpg');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

       header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #B22222;
            padding: 10px 1.5px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
        }

        header img {
            width: 40px;
            height: 40px;
            margin-right: 5px;
            border-radius: 50%;
        }

        header h1 {
            color: #fff;
            font-size: 20px;
            margin: 0;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            padding: 5px;
            margin: 10px;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #ffd700;
        }

        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            border-color: black;
            margin: 220px auto 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #B22222;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 90%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        label {
            color: brown;
            font-size: 20px;
            padding: 10px;
        }

        button {
            display: block; 
            width: 90%; 
            background-color: blue;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
            margin: 20px auto;
            border: none;
            cursor: pointer;
            text-align: center;
            font-size: 18px;
        }

        button:hover {
            opacity: 0.8;
        }

        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 90%;
            border-radius: 5px;
            margin: 10px auto;
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <div style="display: flex; align-items: center;">
        <img src="icon.jpg" alt="Logo">
        <h1>LifeLine Connect</h1>
    </div>
    <nav>
        <a href="index.html"><i class="fas fa-home"></i> Home</a>
    </nav>
</header>

<form action="login.php" method="post">
    <h2>ADMIN LOGIN</h2>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php } ?>
    <label for="uname">User Name</label>
    <input type="text" id="uname" name="uname" placeholder="User Name" required>
    
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>
</form>
</body>
</html>
