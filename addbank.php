<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Registration</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .donor2 {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 800px;
            height: auto;
            text-align: center;
            box-sizing: border-box;
        }
        h1 {
            color: #dc3545;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input[type="text"]:focus, input[type="email"]:focus, select:focus {
            border-color: #dc3545;
            outline: none;
            box-shadow: 0 0 5px rgba(220, 53, 69, 0.3);
        }
        button {
            background-color: #dc3545;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 10px;
            box-sizing: border-box;
        }
        button:hover {
            background-color: #c82333;
        }
        @media (max-width: 576px) {
            .donor2 {
                padding: 30px;
                width: 95%;
            }

            h1 {
                font-size: 24px;
            }

            button {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="donor2">
        <form action="addbank.php" method="post">
            <h1>Register a New Bank</h1>           
            <input type="text" name="hospn" placeholder="Enter Name" required>           
            <input type="text" name="address" placeholder="Enter Hospital Address" required>
            <input type="text" name="disn" placeholder="Enter District Name" required>            
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="text" name="phno" placeholder="Enter Phone Number" required>
            <select name="category" id="categ" required>
                <option value="">Select category</option>
                <option value="Govt...">Govt...</option>
                <option value="Private">Private</option>
                <option value="Charitable/vol">Charitable/vol</option>
                <option value="RedCross">RedCross</option>
            </select>
            <select name="Type" id="type" required>
                <option value="">Select Type</option>
                <option value="Campus Stock">Campus Stock</option>
                <option value="Nill">Nill</option>
            </select>
            <button id="submit" name="signup">Sign-In</button>
        </form>             
    </div>
</body>
</html>