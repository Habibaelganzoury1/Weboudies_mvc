<?php
session_start();

function addProduct()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include_once "../db/dbh.inc.php";

        $productName = htmlspecialchars($_POST["productName"]);
        $productPrice = htmlspecialchars($_POST["productPrice"]);
        $productId = htmlspecialchars($_POST["productId"]);

        // Handle image upload (make sure to validate and move the uploaded file)

        $sql = "INSERT INTO products (id, name, price) VALUES ('$productId', '$productName', '$productPrice')";

        if ($connection->query($sql) === TRUE) {
            header("Location: ../php/dashboard.php");
        } else {
            echo "Error: " . $connection->error;
        }

        $connection->close();
    }
}

function editProduct()
{
    // Implement edit product logic here
}

function deleteProduct()
{
    // Implement delete product logic here
}

function Admin()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include_once "../db/dbh.inc.php";

        $adminName = htmlspecialchars($_POST["adminName"]);
        $adminEmail = htmlspecialchars($_POST["adminEmail"]);
        $adminPassword = htmlspecialchars($_POST["adminPassword"]);

        $sql = "INSERT INTO admin (name, email, password) VALUES ('$adminName', '$adminEmail', '$adminPassword')";

        if ($connection->query($sql) === TRUE) {
            header("Location: ../php/dashboard.php");
        } else {
            echo "Error: " . $connection->error;
        }

        $connection->close();
    }
}

function editAdmin()
{
    // Implement edit admin logic here
}

function deleteAdmin()
{
    // Implement delete admin logic here
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["action"])) {
        $action = $_POST["action"];
        if ($action === "addProduct") {
            addProduct();
        } elseif ($action === "editProduct") {
            editProduct();
        } elseif ($action === "deleteProduct") {
            deleteProduct();
        } elseif ($action === "addAdmin") {
            addAdmin();
        } elseif ($action === "editAdmin") {
            editAdmin();
        } elseif ($action === "deleteAdmin") {
            deleteAdmin();
        } else {
            echo "Invalid action";
        }
    }
}
?>