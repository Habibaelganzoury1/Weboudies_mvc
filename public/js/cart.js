let cartItems = [];
let total = 0;

function addToCart(productName, productPrice) {
    cartItems.push({ name: productName, price: productPrice });
    updateCart();
}

function updateCart() {
    const cartList = document.getElementById('cart-items');
    const totalElement = document.getElementById('total');

    // Clear previous items
    cartList.innerHTML = '';

    // Update cart items
    cartItems.forEach(item => {
        const listItem = document.createElement('li');
        listItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
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
        window.location.href = `confirmation.html?total=${totalAmount}`;
    } else if (selectedPaymentMethod === 'creditCard') {
        alert(`Total: $${total.toFixed(2)}\nRedirecting to credit card information page...`);
        // Redirect to the credit card information page
        window.location.href = 'creditCard.html';
    } else {
        alert("Invalid payment method selected.");
    }

    // Clear the cart after checkout
    cartItems = [];
    updateCart();
}

// function checkout() {
//     alert(`Total: $${total.toFixed(2)}\nThank you for your purchase!`);

//     // Redirect to the confirmation page
//     window.location.href = 'confirmationpage.html';
// }


