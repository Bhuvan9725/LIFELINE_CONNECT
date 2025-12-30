<?php
include 'db_conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$sql = "SELECT id, pname, hname, btype, unit, city, phno, email, reason, status FROM requestb WHERE status='pending'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Requests</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #d9534f;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #d9534f;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .accept-btn, .reject-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .accept-btn {
            background-color: #5cb85c;
            color: white;
        }
        .reject-btn {
            background-color: #d9534f;
            color: white;
        }
        .accept-btn:hover {
            background-color: #4cae4c;
        }
        .reject-btn:hover {
            background-color: #c9302c;
        }
        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }
            th, td {
                padding: 8px 10px;
            }
            .accept-btn, .reject-btn {
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Blood Requests</h1>
    <table>
        <tr>
            <th>Patient Name</th>
            <th>Hospital Name</th>
            <th>Blood Group</th>
            <th>Units</th>
            <th>City</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Reason</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["pname"] . "</td>";
                echo "<td>" . $row["hname"] . "</td>";
                echo "<td>" . $row["btype"] . "</td>";
                echo "<td>" . $row["unit"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["phno"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["reason"] . "</td>";               
                if ($row['status'] == 'accepted') {
                    echo "<td>Accepted</td>";
                } elseif ($row['status'] == 'rejected') {
                    echo "<td>Rejected</td>";
                } else {
                    echo "<td>
                            <form method='POST' action=''>
                                <button type='submit' name='accept' value='" . $row['id'] . "' class='accept-btn'>Accept</button>
                                <button type='submit' name='reject' value='" . $row['id'] . "' class='reject-btn'>Reject</button>
                            </form>
                          </td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No requests found</td></tr>";
        }
        ?>
    </table>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['accept'])) {
            $id = $_POST['accept'];
            $updateSql = "UPDATE requestb SET status='accepted' WHERE id=$id";
            if ($conn->query($updateSql) == TRUE) {
                $patientSql = "SELECT * FROM requestb WHERE id=$id";
                $patientResult = $conn->query($patientSql);
                if ($patientResult->num_rows > 0) {
                    $patientRow = $patientResult->fetch_assoc();
                    $patientEmail = $patientRow['email'];
                    $donorSql = "SELECT donarname, email, contactNumber, city FROM donors WHERE bloodGroup='" . $patientRow['btype'] . "' LIMIT 1";
                    $donorResult = $conn->query($donorSql);
                    if ($donorResult->num_rows > 0) {
                        $donorRow = $donorResult->fetch_assoc();
                        $mail = new PHPMailer(true);
                        try {
                            $mail->isSMTP();
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPAuth = true;
                            $mail->Username = 'lifelineconnect18@gmail.com';
                            $mail->Password = 'lqmr gqfl whzg adip';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port = 587;
                            $mail->setFrom('lifelineconnect18@gmail.com');
                            $mail->addAddress($patientEmail);
                            $mail->isHTML(true);
                            $mail->Subject = 'Blood Donor Details';
                            $mail->Body = "
                                <h3>Blood Donor Details</h3>
                                <p>Name: " . $donorRow['donarname'] . "</p>
                                <p>Email: " . $donorRow['email'] . "</p>
                                <p>Phone Number: " . $donorRow['contactNumber'] . "</p>
                                <p>City: " . $donorRow['city'] . "</p>
                            ";
                            $mail->send();
                            echo "<script>alert('Request accepted and email sent successfully.');</script>";
                        } catch (Exception $e) {
                            echo "Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                }
                
            }
        }
        if (isset($_POST['reject'])) {
            $id = $_POST['reject'];
            $updateSql = "UPDATE requestb SET status='rejected' WHERE id=$id";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Request rejected successfully.');</script>";
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            }
        }
    }
    $conn->close();
    ?>
</body>
</html>
