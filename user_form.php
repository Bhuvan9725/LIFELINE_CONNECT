<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>      
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f0f4f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    max-width: 800px;
    width: 100%;
}
.form-container {
    padding: 40px;
    flex: 1;
}
.form-container h2 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}
form {
    display: flex;
    flex-direction: column;
}
label {
    font-size: 16px;
    color: #555;
    margin-bottom: 8px;
}
input[type="text"],
input[type="password"] {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    width: 100%;
    max-width: 100%;
}
input[type="submit"] {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}
input[type="submit"]:hover {
    background-color: #f44336;
}
form p {
    margin-top: 10px;
    font-size: 14px;
}
.image-container {
    background: url('your-image-path.jpg') no-repeat center center/cover;
    width: 50%;
    min-height: 100%;
    display: none; 
}
@media screen and (max-width: 768px) {
    .container {
        flex-direction: column;
    }
    .image-container {
        width: 100%;
        height: 200px;
        display: block;
    }
    .form-container {
        padding: 20px;
    }
}
     </style>
    <title>Insert User</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Insert New User</h2>
            <form action="insert_user.php" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <label for="name">Full Name:</label><br>
                <input type="text" id="name" name="name" required><br><br>
                <input type="submit" value="Insert User">
            </form>
            <?php
            if (isset($_GET['success'])) {
                echo "<p style='color: green;'>User inserted successfully!</p>";
            }
            if (isset($_GET['error'])) {
                echo "<p style='color: red;'>Error: " . htmlspecialchars($_GET['error']) . "</p>";
            }
            ?>
        </div>
        <div class="image-container">
        </div>
    </div>
</body>
</html>