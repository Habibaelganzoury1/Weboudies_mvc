<?php
function addProduct($productName, $productPrice, $productImage)
{
    $servername = "localhost";
    $username = "root";
    $password = ""; // Update with your actual password if set
    $dbname = "oudies";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $targetDir = '../views/images/ ' ; // Full path to the images directory
    $targetFile = $targetDir . basename($productImage["name"]);
    move_uploaded_file($productImage["tmp_name"], $targetFile);

    // Insert product into the database
    $sql = "INSERT INTO products (name, price, image) VALUES ('$productName', '$productPrice', '$targetFile')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'addProduct') {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_FILES['productImage'];

    addProduct($productName, $productPrice, $productImage);
    header("Location: ../views/hoodies.php");
}

?>
