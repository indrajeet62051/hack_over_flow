<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:index.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `book_table` WHERE fname = ?");
   $delete_message->execute([$delete_id]);
   header('location:booking.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Booking</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style2.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- messages section starts  -->

<section class="messages">

   <h1 class="heading">Table Booking</h1>

   <div class="box-container">

   <?php
      $select_booking = $conn->prepare("SELECT * FROM `book_table`");
      $select_booking->execute();
      if($select_booking->rowCount() > 0){
         while($fetch_booking = $select_booking->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> first name : <span><?= $fetch_booking['fname']; ?></span> </p>
      <p> last name : <span><?= $fetch_booking['lname']; ?></span> </p>
      <p> number : <span><?= $fetch_booking['number']; ?></span> </p>
      <p> email : <span><?= $fetch_booking['email']; ?></span> </p>
      <p> person : <span><?= $fetch_booking['person']; ?></span> </p>
      <p> date : <span><?= $fetch_booking['date']; ?></span> </p>
      <p> time : <span><?= $fetch_booking['time']; ?></span> </p>
      <p> message : <span><?= $fetch_booking['msg']; ?></span> </p>
      <a href="booking.php?delete=<?= $fetch_booking['fname']; ?>" class="delete-btn" onclick="return confirm('delete this booking?');">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no booking</p>';
      }
   ?>

   </div>

</section>

<!-- messages section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>