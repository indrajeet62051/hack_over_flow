<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="heading">
   <h3>your orders</h3>
   <p><a href="home.php">home</a> <span> / orders</span></p>
</div>

<section class="orders">

   <h1 class="title">YOUR ORDERS</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("
         SELECT o.*, u.name as customer_name, u.email, u.address 
         FROM `orders` o
         JOIN `users` u ON o.user_id = u.id
         WHERE o.user_id = ?
         ORDER BY o.order_date DESC
      ");
      $select_orders->execute([$user_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>placed on : <span><?= date('d-M-Y H:i:s', strtotime($fetch_orders['order_date'])); ?></span></p>
      <p>name : <span><?= $fetch_orders['customer_name']; ?></span></p>
      <p>email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>address : <span><?= $fetch_orders['shipping_address']; ?></span></p>
      <p>order status : <span style="color:<?php if($fetch_orders['status'] == 'delivered'){ echo 'green'; }else if($fetch_orders['status'] == 'cancelled'){ echo 'red'; }else{ echo 'orange'; }; ?>"><?= $fetch_orders['status']; ?></span> </p>
      
      <div class="order-items">
         <h4>Order Items:</h4>
         <?php
            $order_id = $fetch_orders['id'];
            $select_items = $conn->prepare("
               SELECT oi.*, p.name, p.image 
               FROM `order_items` oi
               JOIN `products` p ON oi.product_id = p.id
               WHERE oi.order_id = ?
            ");
            $select_items->execute([$order_id]);
            while($item = $select_items->fetch(PDO::FETCH_ASSOC)){
               echo "<div class='item'>";
               echo "<img src='uploaded_img/{$item['image']}' alt='' class='item-image'>";
               echo "<span class='item-name'>{$item['name']}</span>";
               echo "<span class='item-details'>Qty: {$item['quantity']} x Rs.{$item['price']}</span>";
               echo "</div>";
            }
         ?>
      </div>
      
      <p>total amount : <span>Rs.<?= $fetch_orders['total_amount']; ?>/-</span></p>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
   ?>

   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>