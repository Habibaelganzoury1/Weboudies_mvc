<?php
require_once '../db/Dbh.php';

$sql="SELECT * FROM products";
$all=$conn->query($sql);

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

  <style>
    body {
      
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }
      
      footer {
        margin-top: auto;
      }
      .hoodies-container {
        display:grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 90px;
        padding: 20px;
      }
  
      .hoodie {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
      }
  
      .hoodie img {
        width: 100%;
        height: auto;
      }
  
      .hoodie-name {
        font-weight: bold;
        margin-bottom: 5px;
      }
  
      .hoodie-price {
        margin-bottom: 10px;
      }
  
      .icons {
        display: flex;
        justify-content: space-around;
        align-items: center;
      }
  </style>
</head>
<body>
  <header>
    <nav>
      <div class="logo"><img src="name.png" alt="Oudies Logo"></div>
      <ul class="nav-links">
        <li ><a href="home.php">Home</a></li>
        <li><a href="hoodies.php">Hoodies</a></li>
        <li><a href="pants.php">Pants</a></li>
        <li><a href="allproducts.php">All Products</a></li>
      </ul>
      <div class="icons">
        <a href="login.php#"><i class="fas fa-user"></i></a>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        <a href="login.php" class="btn">Login</a>
      </div>
    </nav>
  </header>
  <body>
   
    <div class="hoodies-container">
    <?php
while ($row = mysqli_fetch_assoc($all)) {
    
?>
    <div class="hoodie">
        <img src="<?php echo $row["image"]; ?>" alt="">
        <div class="info">
            <p class="hoodie-name"><?php echo $row["name"]?></p>
            <p class="hoodie-price"><?php echo $row["price"]?></p>
            <div class="icons">
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                
            </div>
        </div>
    </div>
<?php
    
}
?>
     </div>
  </body>
  
  
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