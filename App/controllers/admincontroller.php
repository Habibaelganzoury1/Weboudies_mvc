<?php
function addProduct($productName, $productPrice, $productType,$productImage)
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
    $sql = "INSERT INTO products (name, price, type ,image) VALUES ('$productName', '$productPrice', '$productType', '$targetFile')";

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
    $productType = $_POST['productType'];
    $productImage = $_FILES['productImage'];

    addProduct($productName, $productPrice,$productType, $productImage);
    header("Location: ../views/hoodies.php");
}



function deleteProduct($productId) {
    $servername = "localhost";
    $username = "root";
    $password = ""; // Update with your actual password if set
    $dbname = "oudies";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform deletion
    $deleteSql = "DELETE FROM products WHERE product_id =$productId";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    $conn->close();

}

// Check if the action is delete and an ID is provided
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    deleteProduct($productId);
    header("Location: ../views/deleteproduct.php");

}


?>
