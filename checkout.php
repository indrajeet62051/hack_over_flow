<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){
      if($address == ''){
         $message[] = 'please add your address!';
      }else{
         try {
            // Start transaction
            $conn->beginTransaction();

            // Insert into orders table
            $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, total_amount, shipping_address, status) VALUES(?,?,?,?)");
            $insert_order->execute([$user_id, $total_price, $address, 'pending']);
            $order_id = $conn->lastInsertId();

            // Get cart items and insert into order_items
            $select_cart = $conn->prepare("
               SELECT c.*, p.price 
               FROM `cart` c 
               JOIN `products` p ON c.product_id = p.id 
               WHERE c.user_id = ?
            ");
            $select_cart->execute([$user_id]);
            
            $insert_items = $conn->prepare("INSERT INTO `order_items`(order_id, product_id, quantity, price) VALUES(?,?,?,?)");
            
            while($cart_item = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $insert_items->execute([
                  $order_id,
                  $cart_item['product_id'],
                  $cart_item['quantity'],
                  $cart_item['price']
               ]);
            }

            // Clear the cart
            $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
            $delete_cart->execute([$user_id]);

            // Commit transaction
            $conn->commit();
            $message[] = 'order placed successfully!';
         } catch(PDOException $e) {
            // Rollback transaction on error
            $conn->rollBack();
            $message[] = 'Error placing order: ' . $e->getMessage();
         }
      }
   }else{
      $message[] = 'your cart is empty';
   }
}

// Fetch user profile
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>checkout</h3>
   <p><a href="home.php">home</a> <span> / checkout</span></p>
</div>

<section class="checkout">

   <h1 class="title">order summary</h1>

<form action="" method="post">

   <div class="cart-items">
      <h3>cart items</h3>
      <?php
         $grand_total = 0;
         $cart_items = array();
         $select_cart = $conn->prepare("
            SELECT c.*, p.name, p.price, p.image 
            FROM `cart` c 
            JOIN `products` p ON c.product_id = p.id 
            WHERE c.user_id = ?
         ");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
      <p><span class="name"><?= $fetch_cart['name']; ?></span><span class="price">Rs.<?= $fetch_cart['price']; ?> x <?= $fetch_cart['quantity']; ?></span></p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
      <p class="grand-total">grand total : <span>Rs.<?= $grand_total; ?>/-</span></p>
      <a href="cart.php" class="btn">view cart</a>
   </div>

   <input type="hidden" name="total_price" value="<?= $grand_total; ?>">
   <input type="hidden" name="name" value="<?= $fetch_profile['name'] ?? ''; ?>">
   <input type="hidden" name="number" value="<?= $fetch_profile['number'] ?? ''; ?>">
   <input type="hidden" name="email" value="<?= $fetch_profile['email'] ?? ''; ?>">
   <input type="hidden" name="address" value="<?= $fetch_profile['address'] ?? ''; ?>">

   <div class="user-info">
      <h3>your info</h3>
      <p><i class="fas fa-user"></i><span><?= $fetch_profile['name'] ?? 'please enter your name'; ?></span></p>
      <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number'] ?? 'please enter your number'; ?></span></p>
      <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email'] ?? 'please enter your email'; ?></span></p>
      <a href="update_profile.php" class="btn">update info</a>
      <h3>delivery address</h3>
      <p><i class="fas fa-map-marker-alt"></i><span><?= $fetch_profile['address'] ?? 'please enter your address'; ?></span></p>
      <a href="update_address.php" class="btn">update address</a>
      <select name="method" class="box" required>
         <option value="" disabled selected>select payment method</option>
         <option value="cash on delivery">cash on delivery</option>
         <option value="credit card">credit card</option>
         <option value="paytm">paytm</option>
         <option value="paypal">paypal</option>
      </select>
   </div>

   <input type="submit" value="place order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="submit">

</form>
   
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>