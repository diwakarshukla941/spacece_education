<?php

// Check if there is an error or success message in the URL
$error_message = isset($_GET['error']) ? urldecode($_GET['error']) : '';
$success_message = isset($_GET['success']) ? urldecode($_GET['success']) : '';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/style.css">
    <style>
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 10px;
            width: auto;
            min-width: 250px;
        }

        .custom-alert.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .custom-alert.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .custom-alert button {
            background: none;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: inherit;
        }
    </style>
</head>

<body>
    <?php include 'src/partials/nav.php'; ?>

    <!-- Custom Alert -->
    <?php if (!empty($error_message)): ?>
    <div class="custom-alert error" id="alert-box">
        <span><?php echo $error_message; ?></span>
        <button onclick="closeAlert()">&times;</button>
    </div>
    <?php elseif (!empty($success_message)): ?>
    <div class="custom-alert success" id="alert-box">
        <span><?php echo $success_message; ?></span>
        <button onclick="closeAlert()">&times;</button>
    </div>
    <?php endif; ?>

    <!-- Card and Dropdown Section -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
        <!-- Image -->
        <div class="card" style="width: 18rem;">
            <img src="src/images/icon.jpg" class="card-img-top" alt="...">
        </div>

        <!-- Welcome Text and Buttons -->
        <div class="inputs text-center mt-2">
            <h3 style="margin-bottom: 5px;">Welcome!</h3>

            <div class="buttons">
                <a href="register.php">
                    <button type="button" class="btn btn-warning mt-3" style="width: 250px;">Register</button>
                </a>
                <a href="login.php">
                    <button type="button" class="btn btn-warning mt-3" style="width: 250px;">Login</button>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Close the alert
        function closeAlert() {
            const alertBox = document.getElementById('alert-box');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }

        // Auto-close the alert after 5 seconds
        setTimeout(() => {
            closeAlert();
        }, 5000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
