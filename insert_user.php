<?php
include "db_conn.php"; 
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $name = validate($_POST['name']);
    if (empty($username) || empty($password) || empty($name)) {
        header("Location: user_form.php?error=All fields are required");
        exit();
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, name) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $name);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: user_form.php?success=1"); 
        } else {
            header("Location: user_form.php?error=" . urlencode(mysqli_error($conn)));
        }
    }
} else {
    header("Location: user_form.php?error=Invalid Access");
}
?>