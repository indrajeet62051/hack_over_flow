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

    $fname = $_POST['fname'];
    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
    $lname = $_POST['lname'];
    $lname = filter_var($lname, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $person = $_POST['person'];
    $person = filter_var($person, FILTER_SANITIZE_STRING);
    $date = $_POST['date'];
    $date = filter_var($date, FILTER_SANITIZE_STRING);   
    $time = $_POST['time'];
    $time = filter_var($time, FILTER_SANITIZE_STRING);
    $msg = $_POST['msg'];
    $msg = filter_var($msg, FILTER_SANITIZE_STRING);

    $insert_book_table = $conn->prepare("INSERT INTO `book_table`(fname, lname, email, number, person, date, time, msg) VALUES(?,?,?,?,?,?,?,?)");
    $insert_book_table->execute([$fname, $lname, $email, $number, $person, $date, $time, $msg]);
    $message[] = 'Table Book successfully!';
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book Table</title>

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
   <h3>Book Table</h3>
   <p><a href="html.php">home</a> <span> / Book Table</span></p>
</div>

<section class="book_table">
    <h1 class="title">Book Table</h1>
    <form action="" method="POST">
        <input type="text" name="fname" requireed placeholder="Enter your first name" class="box" maxlength="30">
        <input type="text" name="lname" required placeholder="enter your last name" class="box" maxlength="50">
        <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="number" name="number" required placeholder="enter your number" class="box"  maxlength="10">
        <input type="person" name="person" required placeholder="enter number of person" class="box" min="1" max="20" maxlength="2">
        <input type="date" name="date" required placeholder="enter date" class="box" >
        <input type="time" name="time" required placeholder="enter time" class="box" >
        <input type="text" name="msg" requireed placeholder="Enter message" class="box" maxlength="50">
        <input type="submit" value="Book Table" name="submit" class="btn">
    </form>
</section>
<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>