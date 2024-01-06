<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
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

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        .error-message {
            color: #ff0000;
            font-size: 12px;
            margin-top: 5px;
        }

        #previewImage {
            max-width: 100%;
            margin-top: 10px;
            display: none;
        }

        .submit-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
</head>

<body>
    <!-- <a href="dashboard.php" class="back-button">Back</a> -->
    <div class="container">
        <h2>Add Product</h2>
        <form id="addProductForm" method="POST" action="../includes/admin.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="addProduct">

            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required placeholder="Enter Product Name">
                <span id="productNameErrorMessage" class="error-message"></span>
            </div><br>

            <div class="form-group">
                <label for="productPrice">Product Price:</label>
                <input type="number" id="productPrice" name="productPrice" required placeholder="Enter Product Price">
                <span id="productPriceErrorMessage" class="error-message"></span>
            </div><br>

            <div class="form-group">
                <label for="productId">Product ID:</label>
                <input type="text" id="productId" name="productId" required placeholder="Enter Product ID">
                <span id="productIdErrorMessage" class="error-message"></span>
            </div><br>

            <div class="form-group">
                <label for="productImage">Product Image:</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" required>
                <span id="productImageErrorMessage" class="error-message"></span>
                <img id="previewImage" src="#" alt="Preview Image" style="display: none;">
            </div><br>

            <div class="form-group">
                <button type="submit" class="submit-button">Add Product</button>
            </div>
        </form>
    </div>

    <script>
        const addProductForm = document.getElementById('addProductForm');
        const productNameInput = document.getElementById('productName');
        const productPriceInput = document.getElementById('productPrice');
        const productIdInput = document.getElementById('productId');
        const productImageInput = document.getElementById('productImage');
        const previewImage = document.getElementById('previewImage');

        addProductForm.addEventListener('submit', function (event) {
            if (!isFormValid()) {
                event.preventDefault();
            }
        });

        productImageInput.addEventListener('change', function () {
            // Display a preview of the selected image
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.style.display = 'block';
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        function isFormValid() {
            let isValid = true;

            if (!validateProductName(productNameInput.value)) {
                isValid = false;
            }

            if (!validateProductPrice(productPriceInput.value)) {
                isValid = false;
            }

            if (!validateProductId(productIdInput.value)) {
                isValid = false;
            }

            if (!validateProductImage(productImageInput)) {
                isValid = false;
            }

            return isValid;
        }

        function validateProductName(productName) {
            // Add your validation logic for product name
            return true;
        }

        function validateProductPrice(productPrice) {
            // Add your validation logic for product price
            return true;
        }

        function validateProductId(productId) {
            // Add your validation logic for product ID
            return true;
        }

        function validateProductImage(productImageInput) {
            const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            const productImageErrorMessage = document.getElementById('productImageErrorMessage');
            const fileName = productImageInput.value.toLowerCase();
            const fileExtension = fileName.split('.').pop();

            if (!allowedExtensions.includes(fileExtension)) {
                productImageErrorMessage.textContent = 'Invalid file format. Please choose a valid image (jpg, jpeg, png, gif).';
                return false;
            } else {
                productImageErrorMessage.textContent = '';
                return true;
            }
        }
    </script>
</body>

</html>
