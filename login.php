<?php
// Start session to store login status
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-warning d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <!-- Login container -->
                <div class="login-container bg-white p-4 rounded shadow">
                    <div class="text-center mb-4">
                        <img src="src/images/logo.png" alt="Logo" class="logo mb-3 img-fluid" style="max-width: 100%; height: auto;">
                    </div>

                    <h1 class="h4 mb-3 text-center">Login</h1>
                    <h2 class="h6 mb-4 text-center text-muted">Welcome Back!</h2>

                    <!-- Display success message if login is successful -->
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Login successful! Redirecting...
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Display error message if login fails -->
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Login form -->
                    <form id="login-form" action="controller/login_action.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100">Login</button>
                    </form>

                    <div class="bottom-image-container mt-4">
                        <img src="src/images/icon.jpg" alt="Visual Icon" class="bottom-image img-fluid rounded">
                    </div>

                    <p class="text-center mt-3">
                        Don't have an account? <a href="register.php" class="text-warning">Register Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
</body>
</html>
