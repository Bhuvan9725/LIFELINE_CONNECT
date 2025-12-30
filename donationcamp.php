<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    include "db_conn.php";
    $stmt = $conn->prepare("INSERT INTO donation_camps (camp_name, organizer, location, contact_person, start_time, end_time, start_date, end_date, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $camp_name, $organizer, $location, $contact_person, $start_time, $end_time, $start_date, $end_date, $phone, $email);
    $camp_name = $_POST['camp_name'];
    $organizer = $_POST['organizer'];
    $location = $_POST['location'];
    $contact_person = $_POST['contact_person'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    if ($stmt->execute()) {
        $success_message = "New record created successfully";
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Camp Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
        }
        h2 {
            text-align: center;
            color: #c0392b;
            margin-top: 20px;
            font-size: 2rem;
        }
        form {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-group {
            flex: 0 0 48%;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 1rem;
            color: #c0392b;
            margin-bottom: 8px;
        }
      input[type="text"],
        input[type="time"],
        input[type="date"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #e74c3c;
            border: none;
            color: #fff;
            font-size: 1.1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #c0392b;
        }
        #map {
            height: 400px;
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        @media (max-width: 768px) {
            .form-group {
                flex: 0 0 100%;
            }
            form {
                padding: 15px;
            }
            h2 {
                font-size: 1.5rem;
            }
        }
    </style> 
</head>
<body>
    <h2>Register Donation Camp</h2>
    <form action="" method="POST" onsubmit="handleFormSubmit(event)">
        <div class="form-row">
            <div class="form-group">
                <label for="camp_name">Camp Name:</label>
                <input type="text" id="camp_name" name="camp_name" required>
            </div>
            <div class="form-group">
                <label for="organizer">Organizer:</label>
                <input type="text" id="organizer" name="organizer" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="contact_person">Contact Person:</label>
                <input type="text" id="contact_person" name="contact_person" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="time" id="end_time" name="end_time" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email (optional):</label>
            <input type="email" id="email" name="email">
        </div>
        <input type="submit" value="Register Camp">
    </form>
    <?php
    if (isset($success_message)) {
        echo "<script>Swal.fire('Success!', 'Camp \"". htmlspecialchars($camp_name) ."\" has been registered successfully.', 'success');</script>";
    } elseif (isset($error_message)) {
        echo "<script>Swal.fire('Error!', '". htmlspecialchars($error_message) ."', 'error');</script>";
    }
    ?>
</body>
</html>

