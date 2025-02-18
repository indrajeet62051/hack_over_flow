<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

if(isset($_POST['submit_review'])){
   if($user_id == ''){
      $message[] = 'please login first to submit a review';
   }else{
      $product_id = $_POST['product_id'];
      $rating = $_POST['rating'];
      $review = $_POST['review'];
      $review = filter_var($review, FILTER_SANITIZE_STRING);

      $check_review = $conn->prepare("SELECT * FROM `reviews` WHERE user_id = ? AND product_id = ?");
      $check_review->execute([$user_id, $product_id]);

      if($check_review->rowCount() > 0){
         $update_review = $conn->prepare("UPDATE `reviews` SET rating = ?, review = ? WHERE user_id = ? AND product_id = ?");
         $update_review->execute([$rating, $review, $user_id, $product_id]);
         $message[] = 'review updated successfully!';
      }else{
         $insert_review = $conn->prepare("INSERT INTO `reviews`(user_id, product_id, rating, review) VALUES(?,?,?,?)");
         $insert_review->execute([$user_id, $product_id, $rating, $review]);
         $message[] = 'review submitted successfully!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="quick-view">

   <h1 class="title">quick view</h1>

   <?php
      $pid = $_GET['pid'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
      $select_products->execute([$pid]);
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><?= $fetch_products['name']; ?></div>
            <div class="flex">
               <div class="price"><span>₹</span><?= $fetch_products['price']; ?></div>
               <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
            </div>
            <div class="details"><?= $fetch_products['description']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </div>
         </div>
      </div>
   </form>
   
   <!-- Reviews Section -->
   <div class="reviews-section">
      <h2>Product Reviews</h2>
      
      <?php if($user_id != ''): ?>
      <!-- Review Form -->
      <form action="" method="post" class="review-form">
         <input type="hidden" name="product_id" value="<?= $pid; ?>">
         <div class="rating">
            <span>Your Rating:</span>
            <select name="rating" required>
               <option value="5">5 Stars ⭐⭐⭐⭐⭐</option>
               <option value="4">4 Stars ⭐⭐⭐⭐</option>
               <option value="3">3 Stars ⭐⭐⭐</option>
               <option value="2">2 Stars ⭐⭐</option>
               <option value="1">1 Star ⭐</option>
            </select>
         </div>
         <textarea name="review" placeholder="Write your review here..." required></textarea>
         <input type="submit" value="Submit Review" name="submit_review" class="btn">
      </form>
      <?php else: ?>
         <p class="login-message">Please <a href="authentication/Login.php">login</a> to submit a review.</p>
      <?php endif; ?>

      <!-- Display Reviews -->
      <div class="reviews-container">
         <?php
            $select_reviews = $conn->prepare("
               SELECT r.*, u.name as user_name 
               FROM `reviews` r 
               JOIN `users` u ON r.user_id = u.id 
               WHERE r.product_id = ? 
               ORDER BY r.created_at DESC
            ");
            $select_reviews->execute([$pid]);
            
            if($select_reviews->rowCount() > 0){
               while($review = $select_reviews->fetch(PDO::FETCH_ASSOC)){
                  $stars = str_repeat('⭐', $review['rating']);
         ?>
         <div class="review-box">
            <div class="user"><?= $review['user_name']; ?></div>
            <div class="rating"><?= $stars; ?></div>
            <div class="date"><?= date('d M Y', strtotime($review['created_at'])); ?></div>
            <div class="text"><?= $review['review']; ?></div>
         </div>
         <?php
               }
            }else{
               echo '<p class="empty">no reviews yet!</p>';
            }
         ?>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>