<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us - Your E-Commerce Store</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style1.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/about-img.jpg" alt="About Us">
      </div>
      <div class="content">
         <h3>Why Choose Us?</h3>
         <p>Welcome to Your E-Commerce Store, where quality meets convenience. We're dedicated to providing you with the best shopping experience possible, offering a carefully curated selection of products across multiple categories.</p>
         <a href="menu.php" class="btn">Shop Now</a>
      </div>
   </div>

   <div class="row">
      <div class="content">
         <h3>Our Vision</h3>
         <p>Our vision is to revolutionize online shopping by providing a seamless, secure, and enjoyable experience for all our customers. We believe in:</p>
         <ul>
            <li><i class="fas fa-check"></i> Quality Products</li>
            <li><i class="fas fa-check"></i> Competitive Prices</li>
            <li><i class="fas fa-check"></i> Fast Shipping</li>
            <li><i class="fas fa-check"></i> Excellent Customer Service</li>
         </ul>
      </div>
      <div class="image">
         <img src="images/vision-img.jpg" alt="Our Vision">
      </div>
   </div>

   <div class="features">
      <h3 class="title">What We Offer</h3>
      <div class="box-container">
         <div class="box">
            <img src="images/feature-1.png" alt="">
            <h3>Fast Delivery</h3>
            <p>Quick and reliable shipping to your doorstep</p>
         </div>

         <div class="box">
            <img src="images/feature-2.png" alt="">
            <h3>Secure Payment</h3>
            <p>Multiple secure payment options available</p>
         </div>

         <div class="box">
            <img src="images/feature-3.png" alt="">
            <h3>24/7 Support</h3>
            <p>Round-the-clock customer service</p>
         </div>

         <div class="box">
            <img src="images/feature-4.png" alt="">
            <h3>Easy Returns</h3>
            <p>Hassle-free return and refund policy</p>
         </div>
      </div>
   </div>

   <div class="steps">
      <h3 class="title">How It Works</h3>
      <div class="box-container">
         <div class="box">
            <img src="images/step-1.png" alt="">
            <h3>Choose Products</h3>
            <p>Browse our wide selection of products</p>
         </div>

         <div class="box">
            <img src="images/step-2.png" alt="">
            <h3>Add to Cart</h3>
            <p>Select your items and add them to cart</p>
         </div>

         <div class="box">
            <img src="images/step-3.png" alt="">
            <h3>Secure Checkout</h3>
            <p>Complete your purchase securely</p>
         </div>

         <div class="box">
            <img src="images/step-4.png" alt="">
            <h3>Quick Delivery</h3>
            <p>Receive your order at your doorstep</p>
         </div>
      </div>
   </div>

   <div class="reviews">
      <h3 class="title">What Our Customers Say</h3>
      <div class="box-container">
         <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>"Great selection of products and excellent customer service. Will definitely shop here again!"</p>
            <h3>Sarah Johnson</h3>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>

         <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>"Fast delivery and high-quality products. The website is easy to navigate and checkout process is smooth."</p>
            <h3>Michael Brown</h3>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
         </div>

         <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>"Amazing deals and great customer support. They helped me with my return request promptly."</p>
            <h3>Emily Davis</h3>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
         </div>
      </div>
   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>