<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/signup.css">
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="text-center">
                <img src="src/images/logo.png" alt="Logo" class="logo">
            </div>

            <h1>Register</h1>
            <h2>Home Learning Made Easy</h2>

            <form id="register-form" action="controller/register_action.php" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="contact">Phone Number</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your phone number" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
                </div>

                <button type="submit" class="btn btn-custom btn-block">Register</button>
            </form>

            <div class="bottom-image-container">
                <img src="src/images/icon.jpg" alt="Visual Icon" class="bottom-image">
            </div>
            <p class="text-center mt-3">
                Already have an account? <a href="login.php">Login Now</a>
            </p>
        </div>
    </div>

</body>

</html>
