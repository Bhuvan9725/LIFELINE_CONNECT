<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('REG.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #B22222;
            padding: 10px 20px;
            width: 100%;
            position: fixed;
            top: 0;
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
            font-size: 24px;
            margin: 0;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            padding: 5px;
            margin: 0 10px;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #ffd700;
        }

        .container {
            max-width: 600px;
            width: 90%;
            margin-top: 120px;
            margin-right:20px;
            padding: 25px;
            background: transparent;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        h1 {
            text-align: center;
            color: #e74c3c;
            font-size: 28px;
            margin-bottom: 20px;
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

        input[type="text"], 
        input[type="email"], 
        input[type="date"], 
        input[type="tel"], 
        input[type="number"], 
        select, 
        textarea {
            padding: 12px;
            margin-bottom: 15px;
            margin-right: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: calc(100% - 20px);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, 
        input[type="email"]:focus, 
        input[type="date"]:focus, 
        input[type="tel"]:focus, 
        input[type="number"]:focus, 
        select:focus, 
        textarea:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 8px rgba(231, 76, 60, 0.5);
            outline: none;
        }

        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #c0392b;
            transform: scale(1.05);
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

    <div class="container">
        <h1>Blood Request Form</h1>
        <form action="requestblood.php" method="POST">
            <label for="pname">Patient Name:</label>
            <input type="text" id="pname" name="pname" placeholder="Patient Name" required>

            <label for="hospital">Hospital:</label>
            <input type="text" id="hospital" name="hospital" placeholder="Hospital Name" required>

            <label for="blood">Blood Type:</label>
            <select id="blood" name="blood" required>
                <option>Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB+">AB+</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB-">AB-</option>
            </select>

            <label for="units">Unit:</label>
            <input type="number" id="units" name="units" placeholder="Number of packets" required>

            <label for="contact">Phone Number:</label>
            <input type="tel" id="contact" name="contact" placeholder="Enter phone number" required>

            <label for="Email-id">Email:</label>
            <input type="email" id="Email-id" name="Email-id" placeholder="Enter Email ID" required>

            <label for="Age">Age:</label>
            <input type="number" id="Age" name="Age" placeholder="Enter Your Age" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" placeholder="Enter Your City" required>

            <label for="Reason">Reason:</label>
            <input type="text" id="Reason" name="Reason" placeholder="Enter a valid Reason" required>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>


<?php
include "db_conn.php";

if(isset($_POST['submit'])){
$pname=$_POST['pname'];
$hname=$_POST['hospital'];
$btype=$_POST['blood'];
$units=$_POST['units'];
$phn=$_POST['contact'];
$email=$_POST['Email-id'];
$age=$_POST['Age'];
$city=$_POST['city'];
$reason=$_POST['Reason'];

$sql="INSERT INTO requestb(pname,hname,btype,unit,phno,email,age,reason,city)
               VALUES ('$pname','$hname','$btype','$units','$phn','$email','$age','$reason','$city')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>
                            swal('Success!', 'Request Submitted successfully!', 'success')
                                .then(() => { window.location.href = 'index.html'; });
                          </script>";
                } else {
                    echo "<script>
                            swal('Error!', 'There was an error processing your request.', 'error')
                                .then(() => { window.history.back(); });
                          </script>";
                }
}
?>