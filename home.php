<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-Commerce Store</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section>
   <div id="carouselExampleCaptions" class="carousel slide carousel-fade slider" data-bs-ride="carousel" style="z-index: 0;">
      <div class="carousel-indicators">
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      
      <div class="carousel-inner slider_img" style="height: 55rem;">
         <div class="carousel-item active" data-bs-interval="5000">
            <a href="category.php?category=Electronics"><img src="images/electronics-banner.jpg" class="d-block w-100" alt="Electronics"></a>
            <div class="carousel-caption d-none d-md-block">
               <a href="category.php?category=Electronics"><h2 class="animate__animated animate__fadeInDown">Latest Electronics & Gadgets</h2></a>
            </div>
         </div>
         
         <div class="carousel-item" data-bs-interval="5000">
            <a href="category.php?category=Fashion"><img src="images/fashion-banner.jpg" class="d-block w-100" alt="Fashion"></a>
            <div class="carousel-caption d-none d-md-block">
               <a href="category.php?category=Fashion"><h2 class="animate__animated animate__fadeInDown">Trendy Fashion Collection</h2></a>
            </div>
         </div>
         
         <div class="carousel-item" data-bs-interval="5000">
            <a href="category.php?category=Home"><img src="images/home-banner.jpg" class="d-block w-100" alt="Home & Living"></a>
            <div class="carousel-caption d-none d-md-block">
               <a href="category.php?category=Home"><h2 class="animate__animated animate__fadeInDown">Home & Living Essentials</h2></a>
            </div>
         </div>
      </div>
      
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
      </button>
   </div>
</section>

<section class="category">
   <h1 class="title">Shop by Category</h1>

   <div class="box-container">
      <a href="category.php?category=Electronics" class="box">
         <img src="images/cat-electronics.png" alt="">
         <h3>Electronics</h3>
      </a>
      
      <a href="category.php?category=Fashion" class="box">
         <img src="images/cat-fashion.png" alt="">
         <h3>Fashion</h3>
      </a>
      
      <a href="category.php?category=Home" class="box">
         <img src="images/cat-home.png" alt="">
         <h3>Home & Living</h3>
      </a>
      
      <a href="category.php?category=Books" class="box">
         <img src="images/cat-books.png" alt="">
         <h3>Books</h3>
      </a>
   </div>
</section>

<section class="products">
   <h1 class="title">Latest Products</h1>
   <div class="box-container">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY id DESC LIMIT 8");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No products added yet!</p>';
         }
      ?>
   </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>