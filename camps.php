<?php
include 'db_conn.php';
$sql = "SELECT * FROM donation_camps WHERE start_date >= CURDATE() ORDER BY start_date ASC";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Donation Camps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f9;
            color: #333;
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

        h1 {
            text-align: center;
            color: #b71c1c;
            margin: 80px 0 20px;
            font-size: 36px;
        }

        table {
            width: 90%;
            margin: 0 auto 30px;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #B22222;
            color: #ffffff;
            font-weight: bold;
        }

        td {
            background-color: #ffebeb;
            color: #333;
        }

        tr:nth-child(even) td {
            background-color: #ffe6e6;
        }

        tr:hover td {
            background-color: #ffd1d1;
            cursor: pointer;
        }

        .map {
            width: 90%;
            margin: 20px auto;
            height: 400px;
            display: none;
            border: 2px solid #b71c1c;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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

<h1>Upcoming Donation Camps</h1>

<?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Camp Name</th>
            <th>Organizer</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Start and End Time</th>
            <th>Contact Person</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['camp_name']); ?></td>
                <td><?php echo htmlspecialchars($row['organizer']); ?></td>
                <td><?php echo htmlspecialchars($row['location']); ?></td>
                <td><?php echo htmlspecialchars($row['start_date']); ?></td>
                <td><?php echo htmlspecialchars($row['end_date']); ?></td>
                <td>
                    <?php 
                    $start_time = htmlspecialchars($row['start_time']);
                    $end_time = htmlspecialchars($row['end_time']);
                    echo "Start: $start_time<br>End: $end_time"; 
                    ?>
                </td>
                <td><?php echo htmlspecialchars($row['contact_person']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

   

<?php else: ?>
    <p>No upcoming donation camps found.</p>
<?php endif; ?>

<?php $conn->close(); ?>

</body>
</html>
