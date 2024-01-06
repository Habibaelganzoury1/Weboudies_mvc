<?php
// session_start();
// Include necessary files or configuration here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        .element {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .submit {
            background-color: #4caf50;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Edit Product</h2>
    <form name="edit-Product" action="../db/product.php" method="post" onsubmit="return editProductHandler(event)" enctype="multipart/form-data">
        <input type="hidden" name="action" value="UpdateProduct">

        <!-- Product Name -->
        <label for="productName">Product Name:</label>
        <input id="productName" type="text" class="element" name="productName" value="<?php echo isset($_SESSION['ProductName']) ? $_SESSION['ProductName'] : ''; ?>" required><br><br>

        <!-- Product Price -->
        <label for="productPrice">Product Price:</label>
        <input id="productPrice" type="number" class="element" name="productPrice" value="<?php echo isset($_SESSION['ProductPrice']) ? $_SESSION['ProductPrice'] : ''; ?>" required><br><br>

        <!-- Product ID (Assuming it's non-editable) -->
        <label for="productId">Product ID:</label>
        <input id="productId" type="text" class="element" name="productId" value="<?php echo isset($_SESSION['ProductId']) ? $_SESSION['ProductId'] : ''; ?>" readonly><br><br>

        <!-- Product Image -->
        <label for="productImage">Product Image:</label>
        <input id="productImage" type="file" class="element" name="productImage"><br><br>

        <!-- Additional fields can be added as needed -->

        <input class="submit" type="submit" value="Update">
    </form>

    <!-- <a style="text-decoration: none; display: inline-block;" href="../view/profile.php" class="submit">Back</a> -->
</div>

<script>
    function editProductHandler(event) {
        // Add validation logic if needed
        return true; // Returning true to allow form submission
    }
</script>

</body>
</html>
