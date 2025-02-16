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
   <title>home</title>

   

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <!-- <link rel="stylesheet" href="css/demo.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section>
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade slider" data-bs-ride="carousel" style="z-index: 0;" >
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
          </div>
          <div class="carousel-inner slider_img" style="height: 55rem;">
            <div class="carousel-item active" data-bs-interval="5000">
              <a href="category.php?category=Burgers" ><img src="images/burger.png" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=Burgers"><h2 class="animate__animated animate__fadeInDown">Hungry? Try Our Burgers Made with Half Pound Patties.</h2></a>
                <a href="category.php?category=Burgers><h5 class="animate__animated animate__fadeInUp">Explore more Burgers.</h5></a>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
              <a href="category.php?category=Frankies"><img src="images/frankie.jpg" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=Frankies"><h2 class="animate__animated animate__fadeInDown">Do not take the chance, just eat it.</h2></a>
                <a href="category.php?category=Frankies"><h5 class="animate__animated animate__fadeInUp">Explore more Frankies.</h5></a>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
              <a href="category.php?category=pizzas"><img src="images/pizza.png" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=pizzas"><h2 class="animate__animated animate__fadeInDown">All you need is love, but sometimes a pizza break works wonders.</h2></a>
                <a href="category.php?category=pizzas"><h5 class="animate__animated animate__fadeInUp">Explore more pizza.</h5></a>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
              <a href="category.php?category=Pastas"><img src="images/pasta.png" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=Pastas"><h2 class="animate__animated animate__fadeInDown">Let’s stick a fork in the bowl of pasta and call it a day!</h2></a>
                <a href="category.php?category=Pastas"><h5 class="animate__animated animate__fadeInUp">Explore more Pastas.</h5></a>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
              <a href="category.php?category=Fries"><img src="images/fries.png" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=Fries"><h2 class="animate__animated animate__fadeInDown">There’s no problem that fries can’t solve.</h2></a>
                <a href="category.php?category=Fries"><h5 class="animate__animated animate__fadeInUp">Explore more Fries.</h5></a>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
              <a href="category.php?category=Desserts"><img src="images/dessert.png" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=Desserts"><h2 class="animate__animated animate__fadeInDown">A fit and fab body sounds nice, but not as much as dessert!</h2></a>
                <a href="category.php?category=Desserts"><h5 class="animate__animated animate__fadeInUp">Explore more Desserts.</h5></a>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
              <a href="category.php?category=Juices"><img src="images/juice.png" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=Juices"><h2 class="animate__animated animate__fadeInDown">Take your health to new heights with a tall glass of juice.</h2></a>
                <a href="category.php?category=Juices"><h5 class="animate__animated animate__fadeInUp">Explore more Juice.</h5></a>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
              <a href="category.php?category=Cold Drinks"><img src="images/cold_drink.png" class="d-block w-100" alt="Image not found"></a>
              <div class="carousel-caption d-none d-md-block">
                <a href="category.php?category=Cold Drinks"><h2 class="animate__animated animate__fadeInDown">A cold drink is the answer to most problems.</h2></a>
                <a href="category.php?category=Cold Drinks"><h5 class="animate__animated animate__fadeInUp">Explore more Cold_Drinks.</h5></a>
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
    <!-- image slider end -->

<section class="category">

   <h1 class="title">food category</h1>

   <div class="box-container">

      <a href="category.php?category=Burgers" class="box" style="text-decoration: none;">
         <img src="images/burger.png" alt="" class="cat_img">
         <h3>Burgers</h3>
      </a>
      <a href="category.php?category=Frankies" class="box" style="text-decoration: none;">
         <img src="images/frankie.jpg" alt="" class="cat_img">
         <h3>Frankies</h3>
      </a>
      <a href="category.php?category=pizzas" class="box" style="text-decoration: none;">
         <img src="images/pizza.png" alt="" class="cat_img">
         <h3>pizzas</h3>
      </a>
      <a href="category.php?category=Pastas" class="box" style="text-decoration: none;">
         <img src="images/pasta.png" alt="" class="cat_img">
         <h3>Pastas</h3>
      </a>
      <a href="category.php?category=Fries" class="box" style="text-decoration: none;">
         <img src="images/fries.png" alt="" class="cat_img">
         <h3>Fries</h3>
      </a>
      <a href="category.php?category=Desserts" class="box" style="text-decoration: none;">
         <img src="images/dessert.png" alt="" class="cat_img">
         <h3>Desserts</h3>
      </a>
      <a href="category.php?category=Juices" class="box" style="text-decoration: none;">
         <img src="images/juice.png" alt="" class="cat_img">
         <h3>Juices</h3>
      </a>
      <a href="category.php?category=Cold Drinks" class="box" style="text-decoration: none;">
         <img src="images/cold_drink.png" alt="" class="cat_img">
         <h3>Cold Drinks</h3>
      </a>
   </div>

</section>




<section class="products">

   <h1 class="title">dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="des" value="<?= $fetch_products['des']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="des"><?= $fetch_products['des']; ?></div>
         <div class="flex">
            <div class="price"><span>Rs.</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="v_l">veiw all</a>
   </div>

</section>


















<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>


</script>

</body>
</html>