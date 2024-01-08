<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Information Form</title>

    <style>
        body { background-image: url('2.png'); /* Path to your image */
  background-size: cover;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 75%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
// Define variables to store CD information
$cardHolder = $cardNumber = $expireDate = $cvv = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $cardHolder = $_POST['cd_holder'];
    $caedNumber = $_POST['cd_number'];
    $expireDate = $_POST['expire_date'];
    $cvv = $_POST['cvv'];

    // TODO: Validate and process the CD information (you should implement secure validation and processing)

    // For educational purposes, let's just display the collected information
    echo "<h2>Card Information</h2>";
    echo "<p>Card Holder: $cdHolder</p>";
    echo "<p>Card Number: $cdNumber</p>";
    echo "<p>Expiration Date: $expireDate</p>";
    echo "<p>CVV: $cvv</p>";
}
?>

<!-- HTML form to collect CD information -->
<form method="post" action="">
    <label for="card_holder">Card Holder:</label>
    <input type="text" id="card_holder" name="card_holder" required><br><br>

    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" required><br><br>

    <label for="expire_date">Expiration Date:</label>
    <input type="text" id="expire_date" name="expire_date" placeholder="MM/YYYY" required><br><br>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>
