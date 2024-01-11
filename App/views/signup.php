<?php
require '../db/Dbh.php';
if (isset($_POST['submit'])){
    $fn = $_POST['firstName'];
    $ln = $_POST['lastName'];
    $un = $_POST['username'];
    $em = $_POST['email'];
    $p = $_POST['phoneNumber'];
    $add = $_POST['add'];
    $pass = $_POST['password'];
    $cpass = $_POST['confirmPassword'];


$usern="SELECT * FROM userr WHERE uname='$un'";
$r1=mysqli_query($conn,$usern);

$email="SELECT * FROM userr WHERE mail='$em'";
$r2=mysqli_query($conn,$email);

if ((mysqli_num_rows($r1) == 0) && mysqli_num_rows($r2) == 0) {

    if($pass==$cpass){
        $q = "INSERT INTO userr (ID,fname, lname, uname, mail, phone, address, password, cpassword) 
        VALUES ('','$fn', '$ln', '$un', '$em', '$p', '$add', '$pass', '$cpass')";
mysqli_query($conn,$q);
    }
    else{
        echo "<script>alert('passwords do not match');</script>";
    }
    
}
else {
    echo "<script>alert('mwgoddd');</script>";
    
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('2.png');
            background-size: cover;
        }

        body {
            background-color: #f8f9fa;
        }

        .signup-container {
            margin-top: 5%;
        }

        .signup-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px #000000;
        }

        .signup-form .btn {
            font-size: 16px;
            border-radius: 5px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container signup-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <form class="signup-form" id="signupForm" novalidate method="post">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                        <div class="invalid-feedback">
                            Please enter your first name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                        <div class="invalid-feedback">
                            Please enter your last name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please enter your username name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number:</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                        <div class="invalid-feedback">
                            Please enter a valid phone number.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="add" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="add" name="add" required>
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        <div class="invalid-feedback">
                            Passwords do not match.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up</button>
                    <button type="submit" class="btn btn-primary btn-block" name="submit" onclick="findUser()">Login</button>
    </form>

    <script>
        function findUser() {
            // Call the finduser() function from user controller using AJAX or any other suitable method
            
             $.ajax({
                 type: 'POST',
               url: 'controllers/Usercontroller.php',
              data: { action: 'finduser' },
            /  success: function(response) {
            //         // Handle the response as needed
                    console.log(response);
             }
             });
            }
                    <div class="mb-3 login-link">
                        <p><a href="login.php">Already have an account? Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript for form validation -->
   
</body>

</html>
