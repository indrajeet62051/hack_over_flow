<?php
include '../components/connect.php';

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Using MD5 for password hashing
    $address = $_POST['address'];
    $user_type = 'user'; // Default user type for new registrations
    $number = $_POST['number'];

    try {
        // Check if email already exists
        $check_email = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $check_email->execute([$email]);

        if($check_email->rowCount() > 0) {
            $message = 'Email already exists!';
            header('location:Login.php?error=' . urlencode($message));
        } else {
            // Insert new user
            $insert_user = $conn->prepare("INSERT INTO `users` (name, email, password, address, user_type, number) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_user->execute([$name, $email, $password, $address, $user_type, $number]);
            
            $message = 'Registered successfully! Please login.';
            header('location:Login.php?success=' . urlencode($message));
        }
    } catch(PDOException $e) {
        $message = 'Something went wrong: ' . $e->getMessage();
        header('location:Login.php?error=' . urlencode($message));
    }
}
