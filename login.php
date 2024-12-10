<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/signup.css">
    <style>
        /* Custom alert style */
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #d4edda;
            color: #155724;
            padding: 15px 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .custom-alert button {
            background: none;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #155724;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="text-center">
                <img src="src/images/logo.png" alt="Logo" class="logo">
            </div>

            <h1>Login</h1>
            <h2>Welcome Back!</h2>

            <!-- Display success message if login is successful -->
            <?php if (isset($_GET['success'])): ?>
                <div class="custom-alert" id="alert-box">
                    <span>Login successful! Redirecting...</span>
                    <button onclick="closeAlert()">&times;</button>
                </div>
                <script>
                    // Close the alert after 3 seconds
                    setTimeout(function() {
                        document.getElementById('alert-box').style.display = 'none';
                    }, 3000);
                </script>
            <?php endif; ?>

            <!-- Display error message if login fails -->
            <?php
            if (isset($_GET['error'])) {
                echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['error']) . "</div>";
            }
            ?>

            <form id="login-form" action="./controller/login_action.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>

                <button type="submit" class="btn btn-custom btn-block">Login</button>
            </form>

            <div class="bottom-image-container">
                <img src="src/images/icon.jpg" alt="Visual Icon" class="bottom-image">
            </div>

            <p class="text-center mt-3">
                Don't have an account? <a href="register.php">Register Now</a>
            </p>
        </div>
    </div>

    <script>
        // Close the alert manually
        function closeAlert() {
            document.getElementById('alert-box').style.display = 'none';
        }

        // Auto-close the alert after 5 seconds
        setTimeout(() => {
            const alertBox = document.getElementById('alert-box');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, 5000);
    </script>
</body>

</html>
