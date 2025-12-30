<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD DONOR MANAGEMENT SYSTEM - Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <style>
       
body {
    display: flex;
    flex-direction: column;
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100vh;
    overflow: hidden;
}


.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color:  #B22222; 
    color: white;
    padding: 20px 30px;
    width: 100%;
    height: 80px;
    box-sizing: border-box;
    position: fixed;
    top: 0;
    left: 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    border-bottom: 2px solid #c0392b; 
}

header img {
            width: 40px;
            height: 40px;
            margin-right: 5px;
            border-radius: 50%;
        }

.header .username {
    font-size: 28px;
}

.header .header-links {
    display: flex;
    gap: 10px;
}

.header .header-links a,
.header .logout-btn {
    background-color: blue ;
    color: white;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
}

.header .logout-btn:hover {
    background-color: #FFF;
    color: #c0392b;
    transform: translateY(-2px);
}


.sidebar {
    width: 250px;
    background-color: #e74c3c; 
    color: white;
    height: calc(100vh - 80px);
    position: fixed;
    top: 80px;
    left: 0;
    overflow-y: auto;
    box-shadow: 2px 0 4px rgba(0, 0, 0, 0.2);
    border-right: 2px solid #2980b9; 
}

.sidebar a {
    display: flex;
    align-items: center;
    padding: 20px;
    color: white;
    text-decoration: none;
    margin: 10px 0;
    font-size: 20px;
    border-radius: 6px;
    transition: background-color 0.3s, border-color 0.3s, transform 0.2s;
}

.sidebar a:hover,
.sidebar a.active {
    background-color: #FFF;
    color: #e74c3c;
    transform: translateX(5px);
}

.sidebar i {
    margin-right: 15px;
}

.content {
    margin-left: 250px;
    margin-top: 80px;
    width: calc(100% - 250px);
    height: calc(100vh - 80px);
    overflow-y: auto;
    box-sizing: border-box;
    border-left: 2px solid #2980b9;
    border-radius: 8px; 
    background-color: #f9f9f9; 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
}

.content iframe {
    border: none;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table, th, td {
    border: 2px solid #ddd;
    border-radius: 6px; 
}

th, td {
    padding: 15px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}


.btn-custom {
    background-color: #e74c3c; 
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

.btn-custom:hover {
    background-color: #c0392b;
    transform: translateY(-2px);
}

    </style>
</head>
<body>
<div class="header">
<div style="display: flex; align-items: center;">
    <img src="icon.jpg" alt="Logo" style="width: 50px; height: 50px; margin-right: 10px; border-radius: 50%;">
    <h1>LifeLine Connect</h1>
</div>
        <div class="username">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></div>
        <div class="header-links">
            <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <div class="sidebar">
    <a href="dashboard.php" target="content-frame"><i class="fas fa-tachometer-alt"></i> Dashboard</a>   
    <a href="donors.php" target="content-frame"><i class="fas fa-users"></i> Donors List</a>
    <a href="donationcamp.php" target="content-frame"><i class="fas fa-plus-circle"></i> Add Camps</a>
    <a href="campadmin.php" target="content-frame"><i class="fas fa-calendar-alt"></i> Camps</a>
    <a href="requests.php" target="content-frame"><i class="fas fa-envelope"></i> Requests</a>
    <a href="addbank.php" target="content-frame"><i class="fas fa-hospital"></i> Add Blood Bank</a>
    <a href="user_form.php" target="content-frame"><i class="fas fa-user-plus"></i> Add Users</a>
</div>

    <div class="content">
        <iframe name="content-frame" src="dashboard.php"></iframe>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (!empty($messageType)) { ?>
                Swal.fire({
                    title: "<?php echo $messageType === 'success' ? 'Updated!' : 'Not Updated!'; ?>",
                    text: "<?php echo $messageText; ?>",
                    icon: "<?php echo $messageType; ?>",
                    confirmButtonText: 'OK'
                });
            <?php } ?>
        });
    </script>
</body>
</html>
