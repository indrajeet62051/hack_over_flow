<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex" style="padding: 10px 20px">

      <a href="home.php" class="logo" style="text-decoration: none;"><img src="images/Y-NOT.png" alt="" style="height: 6rem;width: 8rem;"></a>

      <nav class="navbar">
         <a href="home.php" style="text-decoration: none;">Home</a>
         <a href="about.php" style="text-decoration: none;">About Us</a>
         <a href="menu.php" style="text-decoration: none;">Menu</a>
         <a href="orders.php" style="text-decoration: none;">Orders</a>
         <a href="contact.php" style="text-decoration: none;">Contact Us</a>
         <a href="book_table.php" style="text-decoration: none;">Book Table</a>
      </nav>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php" style="text-decoration: none;"><i class="fas fa-search"></i></a>
         <a href="cart.php" style="text-decoration: none;"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="fname" style="font-size: 2rem;"><?= $fetch_profile['fname']; ?>&nbsp;<?= $fetch_profile['lname']; ?></p>
         
         <div class="flex">
            <a href="profile.php" class="btn"  style="margin-top: 1rem;display: inline-block;font-size: 2rem;padding:1rem 3rem;cursor: pointer;text-transform: capitalize;transition: .2s linear;background-color: var(--yellow);color:var(--black);">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn one" style="margin-top: 1rem;display: inline-block;font-size: 2rem;padding:1rem 3rem;cursor: pointer;text-transform: capitalize;transition: .2s linear;background-color: var(--yellow);color:var(--black);">login</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

