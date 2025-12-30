<?php
$fullName = $_POST['fullName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$bloodGroup = $_POST['bloodGroup'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$state = $_POST['state'];
$district = $_POST['district'];
$city = $_POST['city'];
$lastDonation = $_POST['lastDonation'];
$consent = isset($_POST['consent']) ? 1 : 0;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO donors (fullName, dob, gender, bloodGroup, contactNumber, email, state, district, city, lastDonation, consent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssi", $fullName, $dob, $gender, $bloodGroup, $contactNumber, $email, $state, $district, $city, $lastDonation, $consent);

// Set parameters and execute

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
