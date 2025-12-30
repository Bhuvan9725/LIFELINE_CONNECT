<?php
$host = 'localhost';
$db = 'lifeline';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
$donorCounts = [];
foreach ($bloodGroups as $group) {
    $query = "SELECT COUNT(*) AS count FROM donors WHERE bloodGroup = '$group'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $donorCounts[$group] = $row['count'];
}

$totalDonorsQuery = "SELECT COUNT(*) AS total_donors FROM donors";
$totalDonorsResult = $conn->query($totalDonorsQuery);
$totalDonors = $totalDonorsResult->fetch_assoc()['total_donors'];
$totalRequestsQuery = "SELECT COUNT(*) AS total_requests FROM requestb";
$totalRequestsResult = $conn->query($totalRequestsQuery);
$totalRequests = $totalRequestsResult->fetch_assoc()['total_requests'];
$acceptedRequestsQuery = "SELECT COUNT(*) AS accepted_requests FROM requestb WHERE status = 'accepted'";
$acceptedRequestsResult = $conn->query($acceptedRequestsQuery);
$acceptedRequests = $acceptedRequestsResult->fetch_assoc()['accepted_requests'];
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeLine Connect Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            max-width: 1100px;
            margin: 20px auto;
            padding: 20px;
        }
        .welcome-banner {
            background-color:#e74c3c;
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            animation: slideIn 1s ease-out;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            transition: transform 0.3s ease;
            font-size: 18px;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            margin: 10px 0;
            color: #333;
        }
        .card p {
            color: #666;
        }
        .card img {
            width: 50px;
            margin-bottom: 10px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 30px;
        }
        .summary-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .icon {
            font-size: 30px;
            color: #ff4757;
            margin-bottom: 10px;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="welcome-banner">
            Welcome to LifeLine Connect Admin Dashboard
        </div>
        <div class="grid-container">
            <?php foreach ($bloodGroups as $group): ?>
                <div class="card">
                    <img src="drop.png" alt="Blood Icon">
                    <h3><?php echo $group; ?></h3>
                    <p><?php echo $donorCounts[$group]; ?> Donors</p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="summary-container">
            <div class="card">
                <span class="icon">👥</span>
                <h3><?php echo $totalDonors; ?></h3>
                <p>Total Donors</p>
            </div>
            <div class="card">
                <span class="icon">📋</span>
                <h3><?php echo $totalRequests; ?></h3>
                <p>Total Requests</p>
            </div>
            <div class="card">
                <span class="icon">✔️</span>
                <h3><?php echo $acceptedRequests; ?></h3>
                <p>Accepted Requests</p>
            </div>
        </div>
    </div>
</body>
</html>
