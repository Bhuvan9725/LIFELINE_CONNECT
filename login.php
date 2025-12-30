<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: admin.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: admin.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['loggedin'] = true; 
                header("Location: home.php");
                exit();
            } else {
                header("Location: admin.php?error=Incorrect password");
                exit();
            }
        } else {
            header("Location: admin.php?error=Incorrect User name or password");
            exit();
        }
    }

} else {
    header("Location: admin.php");
    exit();
}

?>