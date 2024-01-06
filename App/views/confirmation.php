<?php
// Retrieve the total from the URL parameter
$total = isset($_GET['total']) ? $_GET['total'] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <title>Order Confirmation</title>
  <header>
    <nav>
      <div class="logo"><img src="name.png" alt="Oudies Logo"></div>
    </nav>
  </header>
  <style>
    /* Styles for the whole document */
    
    .confirmation {
      text-align: center;
      margin-top: 100px;
      flex: 1;
    }
    
    h1, h3 {
      color: rgb(247, 246, 246);
    }
    
    .message {
      font-size: 18px;
      margin-top: 20px;
    }
    
    .red {
      color: red;
    }
    
    .grey {
      color: grey;
    }
    
    .black {
      color: black;
    }

    body {
      background-color:  rgb(150, 20, 20);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .btn a {
      background-color: white;
      color: black;
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>

<body>
  <div class="confirmation">
    <h1>Your order has been placed !</h1>
    <h3>The order will arrive within 4 to 10 days</h3>
    <h3>We're waiting for your review</h3>
    <p>Total Amount: $<?php echo number_format($total, 2); ?></p>
    <a href="home.php" class="btn a">Continue Shopping</a>
  </div>

  <footer>
    <div class="footer-content">
      <a href="about.php">About Us</a>
      <p>Contact Us: contact@oudiess.com</p>
      <p>&copy; 2023 Oudies </p>
      <div class="social-icons">
        <a href="https://www.instagram.com/oudies" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com/oudies" target="_blank"><i class="fab fa-facebook-f"></i></a>
      </div>
    </div>
  </footer>
</body>
</html>