<?php
include '../components/connect.php';
session_start();

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Using MD5 for password hashing

    try {
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $select_user->execute([$email, $password]);
        
        if($select_user->rowCount() > 0) {
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if($row['user_type'] == 'admin') {
                $_SESSION['admin_id'] = $row['id'];
                header('location:../admin/dashboard.php');
            } elseif($row['user_type'] == 'user') {
                $_SESSION['user_id'] = $row['id'];
                header('location:../home.php');
            }
        } else {
            $message = 'Incorrect email or password!';
            header('location:Login.php?error=' . urlencode($message));
        }
    } catch(PDOException $e) {
        $message = 'Something went wrong: ' . $e->getMessage();
        header('location:Login.php?error=' . urlencode($message));
    }
}
