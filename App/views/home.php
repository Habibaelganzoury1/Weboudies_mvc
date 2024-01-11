<?php
//include "../partials/nav.php";
error_reporting(E_ALL);
ini_set("display_errors", 0);

function customErrorHandler($errno, $errstr, $errfile, $errline){
$message = "Error: [$errno] $errstr - $errfile: $errline";
err_log($message . PHP_EOL, 3, "error_log.txt");
}

set_error_handler("customErrorHandler");
echo $undefinedVariable;

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
        <li ><a href="home.php">Home</a></li>
        <li><a href="hoodies.php">Hoodies</a></li>
        <li><a href="pants.php">Pants</a></li>
      </ul>
      <div class="icons">
        <a href="#"><i class="fas fa-user"></i></a>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        <a href="login.php" class="btn">Login</a>
      </div>
    </nav>
  </header>

  <main>
    <section class="hero">
      <h1>Welcome to Oudies </h1>
      
      <p>Find your perfect fit here!</p>
      <a href="#" class="btn">Shop Now</a>
    </section>
    <br>
    <section class="home-category">
    <h1 class="title">Shop by Category</h1>

    <div class="container">
        <div class="box">
            <img src="images/name.png" alt="">
            <h3><strong>Hoodies</strong></h3>
            <p>Made of a heavyweight melton fleece fabric. Super-soft fabric perfect for the winter season. Drop-shoulder fit, front pouch pocket & banded hem & cuffs. This loose fit gives you a relaxed feel, 
              so you can lounge around comfortably all day long. Item runs big & is oversized. Graphic print on front and back.</p>
            <a href="hoodies.php" class="btn">Hoodies</a>
        </div>

        <!-- Repeat the same structure for other boxes -->

        <!-- Example for 'Meat' box -->
        <div class="box">
            <img src="images/cat-2.png" alt="">
            <h3><strong>Pants</strong></h3>
            <p>First ever sweatpants in our soft melton fleece fabric. Relaxed-fit silhouette with exterior drawstrings. Side pockets & one back pocket. Elastic waist. 
              Signature embroidered Oudies logo. These sweatpants were developed to have a true to size fit. .</p>
            <a href="pants.php" class="btn">Pants</a>
        </div>
        
        <!-- Add more boxes similarly -->
    </div>
    <br><br>
</section>

    <div class="carousel">
      <div class="carousel-slide">
        <img src="carosel1.jpg" alt="Hoodie 1">
      </div>
      <div class="carousel-slide">
      </div>
      <div class="carousel-slide">
        <img src="carosel2.jpg" alt="Hoodie 3">
      </div>
      
      <!-- Controls -->
      <a class="carousel-control prev" onclick="changeSlide(-1)">&#10094;</a>
      <a class="carousel-control next" onclick="changeSlide(1)">&#10095;</a>
    </div>
  </main>
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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const slides = document.querySelectorAll('.carousel-slide');
      let currentSlide = 0;

      function showSlide(n) {
        slides[currentSlide].style.display = 'none';
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].style.display = 'block';
      }

      // Initially show the first slide
      showSlide(currentSlide);

      // Auto slide change every 6 seconds (3000ms)
      setInterval(() => {
        showSlide(currentSlide + 1);
      }, 6000);
    });
  </script>
</body>
</html>
