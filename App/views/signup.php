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
          body { background-image: url('2.png'); /* Path to your image */
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
    </style>
</head>

<body>

    <div class="container signup-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <form class="signup-form" id="signupForm" novalidate>
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
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
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
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
                <p class="login-link"><a href="login.php">Already have an account? Login here</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript for form validation -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('signupForm');

        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            // Check if passwords match
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('confirmPassword').setCustomValidity("Passwords do not match");
                event.preventDefault();
            } else {
                document.getElementById('confirmPassword').setCustomValidity('');
            }

            form.classList.add('was-validated');
        });
    });
</script>

</body>

</html>


</body>

</html>
