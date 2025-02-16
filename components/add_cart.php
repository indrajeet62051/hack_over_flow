<?php

if(isset($_POST['add_to_cart'])){
   if($user_id == ''){
      header('location:authentication/Login.php');
   }else{
      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $qty = $_POST['qty'];
      $des = $_POST['des'];

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE product_id = ? AND user_id = ?");
      $check_cart_numbers->execute([$pid, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'already added to cart!';
      }else{
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, product_id, quantity) VALUES(?,?,?)");
         $insert_cart->execute([$user_id, $pid, $qty]);
         $message[] = 'added to cart!';
      }
   }
}

?>