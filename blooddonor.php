<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="icon.jpg" type="image/x-icon">
    <style>
        
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

        body {
    margin: 0;
    font-family: Arial, sans-serif;
    padding-top: 80px;
    background-image: url('s2.avif');
    background-size: cover;
    background-position: center;
    }

      
        .donor {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            max-width: 400px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }

        .donor h1 {
            color: #B22222;
            font-size: 24px;
            text-align: center;
            margin-bottom: 15px;
        }

        .group {
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        #submit {
            background-color: #B22222;
            color: white;
            font-size: 16px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #submit:hover {
            background-color: #a32020;
        }

        h1 {
            text-align:center;
        }
        
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #B22222;
            color: white;
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
<form method="post" action="blooddonor.php">
    <div class="donor">
        <h1><b>FIND BLOOD DONORS</b></h1>
       <div class="group"> Blood Group:&nbsp;&nbsp;&nbsp;
        <select name="bloodgroup" id="blood" required>
            <option value="">-------SELECT------</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select><br></div>
       <div class="group"> Select District:&nbsp;&nbsp;
        <select name="place" id="Place" required>
            <option value="">-------------SELECT----------------</option>
            <!-- Populate with real data if needed -->
        </select><br></div>
        <div class="group">Select City:&nbsp;&nbsp;
        <select id="city" name="city">
            <option value="">-------SELECT-----</option>
            <!-- Populate with real data if needed -->
        </select><br></div>
        <center><button id="submit" name="submit" type="submit">Submit</button></center>
    </div>
</form>
<script src="scr.js"></script>
</body>
</html>
<?php
include 'db_conn.php';
if(isset($_POST['submit'])){
$bloodgroup=$_POST['bloodgroup'];
$place=$_POST['place'];
$sql="SELECT * FROM  donors where bloodGroup =  '$bloodgroup' AND  district = '$place' ";
$result=($conn->query($sql));
$row=[];
if($result){
echo "<h1>Available Donors</h1>";
    echo "<table border='1'><tr><th>Donor Name</th><th>Blood-Group</th><th>Email</th><th>Ph-No</th><th>State</th><th>District</th><th>City</th></tr>";       
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["donarname"]. "</td><td>" . $row["bloodGroup"]. "</td><td>" . $row["email"]. "</td><td>" . $row["contactNumber"]. "</td><td>" . $row["state"]. "</td><td>" . $row["district"]. "</td><td>" . $row["city"]. "</td></tr>";
    }
    echo "</table>";
}
else{
echo "Not Found";
}
}
?>