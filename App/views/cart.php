<?php
//include "../partials/nav.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Shopping Cart</title>
</head>

<body>

    <header>
        <h1>Shopping Cart</h1>
    </header>

    <section class="products">
        <div class="product">
            <img src="p1.png" alt="Product 1">
            <h2>Product 1</h2>
            <p>$19.99</p>
            <button onclick="addToCart('Product 1', 19.99)">Add to Cart</button>
        </div>

        <div class="product">
            <img src="p2.png" alt="Product 2">
            <h2>Product 2</h2>
            <p>$29.99</p>
            <button onclick="addToCart('Product 2', 29.99)">Add to Cart</button>
        </div>
    </section>

    <section class="cart">
        <h2>Shopping Cart</h2>
        <ul id="cart-items"></ul>
        <p>Total: $<span id="total">0.00</span></p>

        <!-- Added a payment method selection -->
        <label for="paymentMethod">Payment Method:</label>
        <select id="paymentMethod">
            <option value="select">Select</option>
            <option value="cashOnDelivery">Cash on Delivery</option>
            <option value="creditCard">Credit Card</option>
        </select><br><br>

        <button onclick="checkout()">Checkout</button>
    </section>

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
