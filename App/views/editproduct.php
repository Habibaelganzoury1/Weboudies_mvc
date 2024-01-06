<?php
session_start();
// Include necessary files or configuration here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Product</title>
</head>
<body>

<div class="signup">
    <p class="sign">Edit Product</p>
</div>

<div class="sign">
    <form name="edit-product" action="../db/product.php" method="post" onsubmit="return editProductHandler(event)" enctype="multipart/form-data">
        <input type="hidden" name="action" value="UpdateProduct">

        <!-- Product Name -->
        <label for="productName">Product Name:</label>
        <input id="productName" type="text" class="element" name="productName" value="<?php echo isset($_SESSION['ProductName']) ? $_SESSION['ProductName'] : ''; ?>" required><br>

        <!-- Product Price -->
        <label for="productPrice">Product Price:</label>
        <input id="productPrice" type="number" class="element" name="productPrice" value="<?php echo isset($_SESSION['ProductPrice']) ? $_SESSION['ProductPrice'] : ''; ?>" required><br>

        <!-- Product ID (Assuming it's non-editable) -->
        <label for="productId">Product ID:</label>
        <input id="productId" type="text" class="element" name="productId" value="<?php echo isset($_SESSION['ProductId']) ? $_SESSION['ProductId'] : ''; ?>" readonly><br>

        <!-- Product Image -->
        <label for="productImage">Product Image:</label>
        <input id="productImage" type="file" class="element" name="productImage"><br>

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
