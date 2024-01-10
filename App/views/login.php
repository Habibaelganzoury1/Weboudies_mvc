<?php
require_once '../db/Dbh.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res=mysqli_query($conn,"SELECT * FROM userr WHERE uname='$username' AND password='$password'");
    $row=mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res)>0){
        if($password==$row['password']){
            $_SESSION['login']=true;
            $_SESSION['id']=$row['ID'];
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('2.png'); /* Path to your image */
            background-size: cover;
        }

        .login-container {
            margin-top: 5%;
        }

        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px #000000;
        }

        .login-form .btn {
            font-size: 16px;
            border-radius: 5px;
        }

        .register-link,
        .forgot-password-link {
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <form class="login-form" id="loginForm" method="POST" action="controllers/Usercontroller.php">
                    <h2 class="text-center mb-4">Login</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please enter your username.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submit" href="home.php">Login</button>
                    <div class="text-center mt-3">
                        <a href="signup.php" class="register-link">Create an account</a> | <a href="#" class="forgot-password-link">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (function () {
            'use strict';

            var forms = document.querySelectorAll('.login-form');
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>

</body>

</html>
