<?php
session_start();
// Redirect if already logged in
if(isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])) {
    header('location:../home.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login & Register</title>
    <link rel="stylesheet" href="../css/style1.css">
    <style>
    *,
    *:before,
    *:after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
        background-image: url(background.png);
        background-size: cover;
        background-repeat: no-repeat;
    }

    input,
    button {
        border: none;
        outline: none;
        background: none;
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    }

    .error-msg {
        color: #e74c3c;
        font-size: 14px;
        text-align: center;
        margin: 10px 0;
    }

    .success-msg {
        color: #2ecc71;
        font-size: 14px;
        text-align: center;
        margin: 10px 0;
    }

    .cont {
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        width: 900px;
        height: 550px;
        margin: 40px auto;
        background: #fff;
        box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.3), 10px 10px 15px rgba(70, 70, 70, 0.15);
    }

    .form {
        position: relative;
        width: 640px;
        height: 100%;
        transition: transform 1.2s ease-in-out;
        padding: 50px 30px 0;
    }

    .sub-cont {
        overflow: hidden;
        position: absolute;
        left: 640px;
        top: 0;
        width: 900px;
        height: 100%;
        padding-left: 260px;
        background: #fff;
        transition: transform 1.2s ease-in-out;
    }

    .cont.s--signup .sub-cont {
        transform: translate3d(-640px, 0, 0);
    }

    button {
        display: block;
        margin: 0 auto;
        width: 260px;
        height: 36px;
        border-radius: 30px;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

    .img {
        overflow: hidden;
        z-index: 2;
        position: absolute;
        left: 0;
        top: 0;
        width: 260px;
        height: 100%;
        padding-top: 360px;
    }

    .img:before {
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        width: 900px;
        height: 100%;
        background-image: url(ext.jpg);
        background-size: cover;
        transition: transform 1.2s ease-in-out;
    }

    .img:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }

    .cont.s--signup .img:before {
        transform: translate3d(640px, 0, 0);
    }

    .img__text {
        z-index: 2;
        position: absolute;
        left: 0;
        top: 50px;
        width: 100%;
        padding: 0 20px;
        text-align: center;
        color: #fff;
        transition: transform 1.2s ease-in-out;
    }

    .img__text h2 {
        margin-bottom: 10px;
        font-weight: normal;
    }

    .img__text p {
        font-size: 14px;
        line-height: 1.5;
    }

    .cont.s--signup .img__text.m--up {
        transform: translateX(520px);
    }
    .img__text.m--in {
        transform: translateX(-520px);
    }

    .cont.s--signup .img__text.m--in {
        transform: translateX(0);
    }

    .img__btn {
        overflow: hidden;
        z-index: 2;
        position: relative;
        width: 100px;
        height: 36px;
        margin: 0 auto;
        background: transparent;
        color: #fff;
        text-transform: uppercase;
        font-size: 15px;
        cursor: pointer;
    }

    .img__btn:after {
        content: '';
        z-index: 2;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border: 2px solid #fff;
        border-radius: 30px;
    }

    .img__btn span {
        position: absolute;
        left: 0;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        transition: transform 1.2s;
    }

    .img__btn span.m--in {
        transform: translateY(-72px);
    }

    .cont.s--signup .img__btn span.m--in {
        transform: translateY(0);
    }

    .cont.s--signup .img__btn span.m--up {
        transform: translateY(72px);
    }

    .sign-in {
        transition-timing-function: ease-out;
    }

    .cont.s--signup .sign-in {
        transition-timing-function: ease-in-out;
        transition-duration: 1.2s;
        transform: translate3d(640px, 0, 0);
    }

    .sign-up {
        transform: translate3d(-900px, 0, 0);
    }

    .cont.s--signup .sign-up {
        transform: translate3d(0, 0, 0);
    }

    .form-group {
        display: block;
        width: 260px;
        margin: 25px auto 0;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        color: #666;
    }

    input {
        display: block;
        width: 100%;
        margin-top: 5px;
        padding-bottom: 5px;
        font-size: 16px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.4);
        text-align: center;
    }

    .submit {
        margin-top: 40px;
        margin-bottom: 20px;
        background: #d4af7a;
        text-transform: uppercase;
    }

    .fb-btn {
        border: 2px solid #d3dae9;
        color: #8fa1c7;
    }

    .fb-btn span {
        font-weight: bold;
        color: #455a81;
    }

    .sign-in {
        transition-timing-function: ease-out;
    }

    .cont.s--signup .sign-in {
        transform: translate3d(640px, 0, 0);
    }

    .sign-up {
        transform: translate3d(-900px, 0, 0);
    }

    .cont.s--signup .sign-up {
        transform: translate3d(0, 0, 0);
    }
    </style>
</head>
<body>
    <div class="cont">
        <!-- Login Form -->
        <form class="form sign-in" action="login_process.php" method="POST">
            <h2 style="text-align: center; color: #666;">Welcome</h2>
            <?php
            if(isset($_GET['error'])) {
                echo '<div class="error-msg">'.$_GET['error'].'</div>';
            }
            if(isset($_GET['success'])) {
                echo '<div class="success-msg">'.$_GET['success'].'</div>';
            }
            ?>
            <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" id="email" required />
    <small id="emailError" style="color: red; display: none;">Invalid email format</small>
</div>

<script>
document.getElementById("email").addEventListener("input", function () {
    const emailInput = this.value;
    const emailError = document.getElementById("emailError");

    // Regular expression for email validation
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!emailPattern.test(emailInput)) {
        emailError.style.display = "block"; // Show error message
    } else {
        emailError.style.display = "none"; // Hide error message
    }
});
</script>

<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" id="password" required />
    <small id="passwordError" style="color: red; display: none;">
        Password must be at least 8 characters long, contain 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.
    </small>
</div>

<script>
document.getElementById("password").addEventListener("input", function () {
    const password = this.value;
    const passwordError = document.getElementById("passwordError");

    // Regular expression for password validation
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (!passwordPattern.test(password)) {
        passwordError.style.display = "block"; // Show error message
    } else {
        passwordError.style.display = "none"; // Hide error message
    }
});
</script>

            <button type="submit" class="submit" name="login">Sign In</button>
        </form>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <div class="img__text m--in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>

            <!-- Register Form -->
            <form class="form sign-up" action="register_process.php" method="POST">
                <h2 style="text-align: center; color: #666;">Create Account</h2>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" required/>
                </div>
                <button type="submit" class="submit" name="register">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
    </script>
</body>
</html>