<?php
include "db_conn.php";
if (isset($_POST['id'])) {
    $donor_id = $_POST['id'];
    $sql = "DELETE FROM donors WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $donor_id);
    if ($stmt->execute()) {
        echo "Donor deleted successfully.";
    } else {
        echo "Error deleting donor: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
    exit(); 
}
$sql = "SELECT id, donarname, gender, contactNumber, email, bloodGroup, state, district, city FROM donors";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Donors List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #dc3545;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #dc3545;
            color: white;
            font-size: 16px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f8d7da;
        }
        button {
            padding: 8px 12px;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #c82333;
        }
        button:focus {
            outline: none;
        }
    </style>
</head>
<body>

<h2>Registered Donors List</h2>

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
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr id='donor-" . $row["id"] . "'>"; // Add unique ID to the row
                echo "<td>" . $row["donarname"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["contactNumber"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["bloodGroup"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $row["district"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td><button onclick=\"deleteDonor(" . $row['id'] . ")\">Delete</button></td>"; 
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No donors found</td></tr>"; 
        }
        ?>
    </tbody>
</table>
<script>
    function deleteDonor(id) {
        if (confirm("Are you sure you want to delete this donor?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    document.getElementById('donor-' + id).remove();
                    alert('Donor deleted successfully!');
                }
            };
            xhr.send("id=" + id); 
    }
</script>
<?php
$conn->close();
?>
</body>
</html>
