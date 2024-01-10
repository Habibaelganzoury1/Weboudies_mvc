<?php
session_start();

// Initialize the shopping cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle cart actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $product_id = $_GET['id'];

    switch ($action) {
        case 'add':
            addToCart($product_id);
            break;
        case 'remove':
            removeFromCart($product_id);
            break;
        case 'clear':
            clearCart();
            break;
    }
}

function addToCart($product_id) {
    // Add product to the cart
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }

    header('Location: home.php');
}

function removeFromCart($product_id) {
    // Remove product from the cart
    $index = array_search($product_id, $_SESSION['cart']);
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
    }

    header('Location: cart.php');
}

function clearCart() {
    // Clear the entire cart
    $_SESSION['cart'] = array();

    header('Location: cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="cart.css">
    <title>Shopping Cart</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .total {
            font-weight: bold;
        }

        .action-links {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
    <nav>
      <div class="logo"><img src="name.png" alt="Oudies Logo"></div>
      <h1>Your Cart</h1>
      </ul>
      <div class="icons">
        <a href="login.php" class="btn">Login</a>
      </div>
    </nav>
    </header>

    <h2>Shopping Cart</h2>
    <?php
    // Check if the cart is empty
    if (empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty.</p>";
    } else {
    ?>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        // Display products in the cart
        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $product_id) {
            // Replace the following lines with actual data retrieval from your database
            $name = "products $product_id";
            $price = 10.00; // Replace with actual product price
            $quantity = 1; // Replace with actual quantity

            $totalItemPrice = $price * $quantity;
            $totalPrice += $totalItemPrice;

            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$quantity</td>";
            echo "<td>$price</td>";
            echo "<td>$totalItemPrice</td>";
            echo "<td><a href='cart.php?action=remove&id=$product_id'>Remove</a></td>";
            echo "</tr>";
        }
        ?>
        <tr class="total">
            <td colspan="3">Total:</td>
            <td colspan="2">$<?php echo number_format($totalPrice, 2); ?></td>
        </tr>
    </table>

    <div class="action-links">
        <a href="cart.php?action=clear">Clear Cart</a>
        <a href="home.php">Continue Shopping</a>
    </div>
    <?php } ?>
    </table>

    <footer>
    <div class="footer-content">
      <a href="Contact.php">Contact Us</a>
      <p>Contact Us: contact@oudiess.com</p>
      <p>&copy; 2023 Oudies </p>
      <div class="social-icons">
        <a href="https://www.instagram.com/oudies" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com/oudies" target="_blank"><i class="fab fa-facebook-f"></i></a>
      </div>
    </div>
    </footer>

    <script>
        let cartItems = [];
        let total = 0;

        function addToCart(productName, productPrice) {
            cartItems.push({ name: productName, price: productPrice });
            updateCart();
        }

        function removeItem(index) {
            cartItems.splice(index, 1);
            updateCart();
        }

        function updateCart() {
            const cartList = document.getElementById('cart-items');
            const totalElement = document.getElementById('total');

            // Clear previous items
            cartList.innerHTML = '';

            // Update cart items
            cartItems.forEach((item, index) => {
                const listItem = document.createElement('li');
                listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
                
                // Add a "Remove" button for each item
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.onclick = () => removeItem(index);
                
                listItem.appendChild(removeButton);
                
                cartList.appendChild(listItem);
            });

            // Update total
            total = cartItems.reduce((acc, item) => acc + item.price, 0);
            totalElement.textContent = total.toFixed(2);
        }

        function checkout() {
            const selectedPaymentMethod = document.getElementById('paymentMethod').value;

            if (cartItems.length === 0) {
                alert("Your cart is empty. Add some items before checking out.");
                return;
            }

            if (selectedPaymentMethod === 'cashOnDelivery') {
                const totalAmount = total.toFixed(2);
                alert(`Total: $${totalAmount}\nPayment Method: Cash on Delivery\nThank you for your purchase!`);

                // Redirect to the confirmation page with the total amount parameter
                window.location.href = `confirmation.php?total=${totalAmount}`;
            } else if (selectedPaymentMethod === 'creditCard') {
                alert(`Total: $${total.toFixed(2)}\nRedirecting to credit card information page...`);
                // Redirect to the credit card information page
                window.location.href = 'credit.php';
            } else {
                alert("Invalid payment method selected.");
            }

            // Clear the cart after checkout
            cartItems = [];
            updateCart();
        }
    </script>
</body>
</html>
