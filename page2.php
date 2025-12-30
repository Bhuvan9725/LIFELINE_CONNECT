<?php
include "db_conn.php";
// SQL query to fetch data from the donors table
$sql = "SELECT donarname, gender, contactNumber, email, bloodGroup, state, district, city FROM donors";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Donors List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Donation camps list</h2>

<table>
    <thead>
        <tr>
            <th>Donar Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Blood Group</th>
            <th>State</th>
            <th>District</th>
            <th>City</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["donarname"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
              echo "<td>" . $row["bloodGroup"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $row["district"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["contactNumber"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No donors found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Close the connection
$conn->close();
?>

</body>
</html>