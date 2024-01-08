<?php
//include "../partials/nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oudies</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="Contact.css">

</head>
<body>
  <header>
    <nav>
      <div class="logo"><img src="name.png" alt="Oudies Logo"></div>
      <ul class="nav-links">
        <li ><a href="home.php">Home</a></li>
        <li><a href="hoodies.php">Hoodies</a></li>
        <li><a href="pants.php">Pants</a></li>
      </ul>
      <div class="icons">
        <a href="login.php"><i class="fas fa-user"></i></a>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        <a href="login.php" class="btn">Login</a>
      </div>
    </nav>
  </header>
  <body>



<main class="main">
  <div class="container">
    <div class="box">
      <h2>Contact Us</h2>
      <form id="contactForm">
        <div class="form-group">
          <label for="feedback">Feedback:</label>
          <input type="text" id="feedback" name="feedback">
        </div>
        <div class="form-group">
          <label for="message">Leave Your Message Here:</label>
          <textarea id="message" name="message" rows="6"></textarea>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="text" id="phone" name="phone">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email">
        </div>
        <input type="submit" value="Submit" class="btn">
      </form>
    </div>
  </div>
</main>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>
