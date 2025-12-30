<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Searching Blood Bank</title>
<link rel="icon" href="icon.jpg" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* Basic Reset */
    * {
        box-sizing: border-box;
    }

    /* Body and Background */
    body {
        background-image: url('nb.jpg'); /* Replace with your image URL */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
        margin: 0;
        font-family: Arial, sans-serif;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Header */
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #B22222;
        padding: 10px 15px;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    header img {
        width:40px;
        height: 40px;
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
        padding: 8px;
        transition: color 0.3s;
    }

    header nav a:hover {
        color: #ffd700;
    }

    /* Main Content */
    .donor1 {
        padding: 120px 20px 40px;
        text-align: center;
        max-width: 800px;
        width: 100%;
    }

    .donor1 h1 {
        color: #333;
        font-size: 28px;
        margin-bottom: 20px;
    }

    /* Form */
    .group {
        margin: 10px 0;
    }

    select, button {
        padding: 12px 15px;
        width: 220px;
        font-size: 16px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    select:focus {
        border-color: #B22222;
        outline: none;
    }

    button {
        color: #fff;
        background-color: #B22222;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #8B0000;
    }

    /* Table */
    table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
        border: 1px solid #ddd;
        padding: 12px;
    }

    th {
        background-color: #B22222;
        color: white;
        font-weight: bold;
    }

    td {
        background-color: #fff;
    }
    
    /* Responsive Design */
    @media (max-width: 600px) {
        header h1 {
            font-size: 20px;
        }

        header nav a {
            font-size: 16px;
            padding: 5px;
        }

        .donor1 h1 {
            font-size: 24px;
        }

        select, button {
            width: 100%;
        }

        table, th, td {
            font-size: 14px;
        }
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

<div class="donor1">
    <form method="post" action="bloodbanks.php">
        <h1>Nearest Blood Bank Units</h1>
        <div class="group">
            <select name="state">
                <option>Select State</option>
                <option>Andhra Pradesh</option>
                <!-- Add other states here as needed -->
            </select>
        </div>
        <div class="group">
            <select name="district">
                <option value="Alluri Sitharama Raju">Alluri Sitharama Raju</option>
<option value="Anakapalli">Anakapalli</option>
<option value="Anantapur">Anantapur</option>
<option value="Annamayya">Annamayya</option>
<option value="Bapatla">Bapatla</option><option value="Chittoor">Chittoor</option>
<option value="East Godavari">East Godavari</option><option value="Eluru">Eluru</option>
<option value="Guntur">Guntur</option><option value="Kakinada">Kakinada</option>
<option value="Konaseema">Konaseema</option><option value="Krishna">Krishna</option>
<option value="Kurnool">Kurnool</option><option value="Nandyal">Nandyal</option>
<option value="NTR">NTR</option><option value="Palnadu">Palnadu</option>
<option value="Parvathipuram Manyam">Parvathipuram Manyam</option><option value="Prakasam">Prakasam</option>
<option value="Srikakulam">Srikakulam</option><option value="Sri Potti Sriramulu Nellore">Sri Potti Sriramulu Nellore</option><option value="Sri Sathya Sai">Sri Sathya Sai</option>
<option value="Tirupati">Tirupati</option><option value="Visakhapatnam">Visakhapatnam</option><option value="Vizianagaram">Vizianagaram</option>
<option value="West Godavari">West Godavari</option><option value="Y.S.R">Y.S.R</option>
            </select>
        </div>
        <button name="submit" id="submit">Search</button>
    </form>
</div>

</body>
</html>

<?php
include 'db_conn.php';

$alluri = "Alluri Sitharama Raju";
$anak = "Anakapalli";
$anant = "Anantapur";
$annam = "Annamayya";
$bap = "Bapatla";
$chit = "Chittoor";
$eluru = "Eluru";
$eg = "East Godavari";
$gunt = "Guntur";
$kaki = "Kakinada";
$krish = "Krishna";
$kona = "Konaseema";
$kurn = "Kurnool";
$nand = "Nandyal";
$paln = "Palnadu";
$ntr = "NTR";
$manyam = "Parvathipuram Manyam";
$wg = "West Godavari";
$ysr = "Y.S.R";
$pra = "Prakasam";
$srik = "Srikakulam";
$sps = "Sri Potti Sriramulu Nellore";
$satya = "Sri Sathya Sai";
$tiru = "Tirupati";
$vizag = "Visakhapatnam";
$vizi = "Vizianagaram";

if (isset($_POST['submit'])) {
    $res = htmlspecialchars($_POST['district']);
    $sql = "SELECT * FROM hdetails WHERE Disname = '$res'";
    $result = $conn->query($sql);

    if (in_array($res, [$kaki, $krish, $kona, $kurn, $nand, $paln, $ntr, $manyam, $wg, $ysr, $vizi, $vizag, $tiru, $satya, $sps, $pra, $gunt, $eg, $eluru, $chit, $bap, $anant, $alluri, $srik, $annam, $anak])) {
        if ($result->num_rows > 0) {
            echo "<br><br><br><br><h1>Blood Banks Availble</h1>";
            echo "<table><tr><th>Hospital Names</th><th>Address</th><th>PhNo.</th><th>Email</th><th>Category</th><th>Type</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["addr"] . "</td><td>" . $row["phnum"] . "</td><td>" . $row["email"] . "</td><td>" . $row["category"] . "</td><td>" . $row["type"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No users found";
        }
    }
}
?>
