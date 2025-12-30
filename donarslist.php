<?php
include "db_conn.php";
// SQL query to fetch data from the donors table
$sql = "SELECT id, donarname, gender, contactNumber, email, bloodGroup, state, district, city FROM donors"; // Make sure you have an `id` column for each donor
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Donors List</title>
</head>
<body>

<h2>Registered Donors List</h2>

<table border="1">
    <thead>
        <tr>
            <th>Donor Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Blood Group</th>
            <th>State</th>
            <th>District</th>
            <th>City</th>
            <th>Edit</th>
            <th>Delete</th>
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
                echo "<td>" . $row["contactNumber"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["bloodGroup"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $row["district"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";

                // Edit button
                echo "<td><a href='edit_donor.php?id=" . $row["id"] . "'>Edit</a></td>";

                // Delete button
                echo "<td><a href='delete_donor.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this donor?\")'>Delete</a></td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No donors found</td></tr>";
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
