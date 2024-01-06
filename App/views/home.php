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
        <li ><a href="home.php">Home</a></li>
        <li><a href="hoodies.php">Hoodies</a></li>
        <li><a href="#">Crewnecks</a></li>
        <li><a href="#">Pants</a></li>
      </ul>
      <div class="icons">
        <a href="#"><i class="fas fa-user"></i></a>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
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

    <div class="carousel">
      <div class="carousel-slide">
        <img src="image1.jpg" alt="Hoodie 1">
      </div>
      <div class="carousel-slide">
      </div>
      <div class="carousel-slide">
        <img src="o1.jpg" alt="Hoodie 3">
      </div>
      
      <!-- Controls -->
      <a class="carousel-control prev" onclick="changeSlide(-1)">&#10094;</a>
      <a class="carousel-control next" onclick="changeSlide(1)">&#10095;</a>
    </div>
  </main>
  </main>
  <section class="blog">
    <h2>Latest Blog Posts</h2>
    <div class="blog-posts-container">
      <div class="blog-posts">
        <!-- Display blog posts with titles, excerpts, etc. -->
        <div class="blog-post">
          <h3>Post Title</h3>
          <p>Post excerpt or summary</p>
          <a href="blog/post1.php" class="btn">Read More</a>
        </div>
        <!-- Add more blog posts -->
      </div>
    </div>
  </section>
  
  
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

      // Auto slide change every 3 seconds (3000ms)
      setInterval(() => {
        showSlide(currentSlide + 1);
      }, 3000);
    });
  </script>
</body>
</html>
