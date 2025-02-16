<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
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
            background-image: url(Background.webp);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .cont {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            width: 900px;
            height: 550px;
            margin: 0 auto 100px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.3),
                10px 10px 15px rgba(70, 70, 70, 0.15);
        }

        .form {
            position: relative;
            width: 640px;
            height: 100%;
            padding: 50px 30px 0;
        }

        label {
            display: block;
            width: 260px;
            margin: 25px auto 0;
            text-align: center;
        }

        input {
            display: block;
            width: 100%;
            margin-top: 5px;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .error {
            color: red;
            font-size: 12px;
            text-align: center;
            margin-top: 5px;
        }

        button {
            display: block;
            margin: 20px auto;
            width: 260px;
            height: 36px;
            border-radius: 30px;
            background: #d4af7a;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body>

    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" id="loginEmail" required />
                <div class="error" id="loginEmailError"></div>
            </label>
            <label>
                <span>Password</span>
                <input type="password" id="loginPassword" required />
                <div class="error" id="loginPasswordError"></div>
            </label>
            <button type="button" class="submit" onclick="validateLogin()">Sign In</button>
        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h3>Don't have an account? Sign up!</h3>
                </div>
                <div class="img__text m--in">
                    <h3>Already have an account? Sign in.</h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>

            <div class="form sign-up">
                <h2>Create Account</h2>
                <label>
                    <span>Name</span>
                    <input type="text" id="signupName" required />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" id="signupEmail" required />
                    <div class="error" id="signupEmailError"></div>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" id="signupPassword" required />
                    <div class="error" id="signupPasswordError"></div>
                </label>
                <label>
                    <span>OTP</span>
                    <input type="text" id="signupOtp" required />
                </label>
                <button type="button" class="submit" onclick="validateSignup()">Sign Up</button>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function () {
            document.querySelector('.cont').classList.toggle('s--signup');
        });

        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validatePassword(password) {
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            return passwordRegex.test(password);
        }

        function validateLogin() {
            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value.trim();

            document.getElementById('loginEmailError').textContent = "";
            document.getElementById('loginPasswordError').textContent = "";

            if (!validateEmail(email)) {
                document.getElementById('loginEmailError').textContent = "Invalid email format";
                return false;
            }

            if (!validatePassword(password)) {
                document.getElementById('loginPasswordError').textContent = "Password must be at least 8 characters, contain 1 uppercase, 1 lowercase, 1 special character, and 1 number.";
                return false;
            }

            alert("Login successful!");
            return true;
        }

        function validateSignup() {
            const name = document.getElementById('signupName').value.trim();
            const email = document.getElementById('signupEmail').value.trim();
            const password = document.getElementById('signupPassword').value.trim();

            document.getElementById('signupEmailError').textContent = "";
            document.getElementById('signupPasswordError').textContent = "";

            if (!name) {
                alert("Name is required");
                return false;
            }

            if (!validateEmail(email)) {
                document.getElementById('signupEmailError').textContent = "Invalid email format";
                return false;
            }

            if (!validatePassword(password)) {
                document.getElementById('signupPasswordError').textContent = "Password must be at least 8 characters, contain 1 uppercase, 1 lowercase, 1 special character, and 1 number.";
                return false;
            }

            alert("Signup successful!");
            return true;
        }
    </script>

</body>
</html>
