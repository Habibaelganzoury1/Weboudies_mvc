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
</head>
<body>
  <header>
    <nav>
      <div class="logo"><img src="name.png" alt="Oudies Logo"></div>
      <ul class="nav-links">
        <li ><a href="adminview.php">Admin Dashboard</a></li>
      </ul>
      <div class="icons">
        
        <a href="login.php" class="btn">Login as a user</a>
      </div>
    </nav>
  </header>

  <main>
    <section class="hero">
      <h1>Welcome to Oudies </h1>
    </section>
    <br>
    <section class="home-category">

    <div class="container">
        <div class="box">
            <img src="images/name.png" alt="">
            <a href="addproduct.php" class="btn">Add a new product</a>
        </div>

        <!-- Repeat the same structure for other boxes -->

        <!-- Example for 'Meat' box -->
        <div class="box">
            
            <a href="pants.php" class="btn">View Orders</a>
        </div>
        
        <!-- Add more boxes similarly -->
    </div>
    <br><br>
</section>

  
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

 
</body>
</html>
