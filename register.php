<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="icon.jpg" type="image/x-icon">
    <style>
        body { 
            font-family: Arial, sans-serif;
             background-image: url('REG.jpg'); 
             background-size: cover;
              background-position: center; 
              margin: 0;
               padding: 0;
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
            margin-left: 10px;
            margin-right: 10px;
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
        .container { 
            max-width: 800px; 
            margin: 150px auto 50px;
             padding: 35px; 
             box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
              border-radius: 12px; 
              animation: fadeIn 1.5s ease-in-out;
             }
        @keyframes fadeIn { 
            from { opacity: 0; } to { opacity: 1; } }
        h1 { 
            text-align: center;
             color: #e74c3c; 
             font-size: 32px;
            }
        form { 
            display: flex;
             flex-direction: column; 
            }

        label { 
            margin-bottom: 5px;
            font-weight: bold;
             color: #333;
            }
        input[type="text"], input[type="email"], input[type="date"], input[type="tel"], select, textarea {
            padding: 12px; 
            margin-bottom: 15px;
             border: 1px solid #ccc; 
             border-radius: 6px;
              width: 100%; 
              transition: all 0.3s ease;
        }
        input:focus, select:focus, textarea:focus {
             border-color: #e74c3c;
              box-shadow: 0 0 8px rgba(231, 76, 60, 0.5); 
            }
        button {
             background-color: #e74c3c;
              color: #fff; 
              border: none; 
              padding: 15px; 
              border-radius: 6px; 
              cursor: pointer; 
              font-size: 16px;
             }
        button:hover { 
            background-color: #c0392b;
             transform: scale(1.05); 
            }
        .consent { 
            display: flex;
             align-items: center;
             }
        .consent input[type="checkbox"] {
             margin-right: 10px; 
            }
    </style>
</head>
<body>

<!-- Header Section -->
<header>
    <div style="display: flex; align-items: center;">
        <img src="icon.jpg" alt="Logo">
        <h1>LifeLine Connect</h1>
    </div>
    <nav>
        <a href="index.html"><i class="fas fa-home"></i> Home</a>
    </nav>
</header>

<div class="container">
    <h1>Blood Donor Registration</h1>
    <form action="register.php" method="POST" onsubmit="return checkEligibility()">
        <label for="donarname">Full Name:</label>
        <input type="text" id="donarname" name="donarname" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="bloodGroup">Blood Group:</label>
        <select id="bloodGroup" name="bloodGroup" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <label for="contactNumber">Contact Number:</label>
        <input type="tel" id="contactNumber" name="contactNumber" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="district">District:</label>
        <input type="text" id="district" name="district" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="lastDonation">Last Donation Date:</label>
        <input type="date" id="lastDonation" name="lastDonation">

        <div class="consent">
            <input type="checkbox" id="consent" name="consent" required>
            <label for="consent">I consent to donate blood and agree to the terms and conditions.</label>
        </div>

        <button type="submit">REGISTER</button>
    </form>
</div>

<script>
    function checkEligibility() {
        const dob = document.getElementById('dob').value;
        const birthDate = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const month = today.getMonth() - birthDate.getMonth();

        if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        if (age < 18) {
            swal({
                title: "Not Eligible!",
                text: "You are below 18 years!",
                icon: "error",
            });
            return false;
        } else {
            return true;
        }
    }
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "lifeline";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

    $donarname = $_POST['donarname'];
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

    $sql = "INSERT INTO donors(donarname, dob, gender, bloodGroup, contactNumber, email, state, district, city, lastDonation, consent)
            VALUES ('$donarname', '$dob', '$gender', '$bloodGroup', '$contactNumber', '$email', '$state', '$district', '$city', '$lastDonation', '$consent')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                swal('Success!', 'You have been registered successfully!', 'success')
                    .then(() => { window.location.href = 'index.html'; });
              </script>";
    } else {
        echo "<script>
                swal('Error!', 'There was an error processing your registration.', 'error')
                    .then(() => { window.history.back(); });
              </script>";
    }

   
    $conn->close();
}
?>
</body>
</html>
