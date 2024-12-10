<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Step Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="src/css/signin.css">
</head>

<body>
    <!-- Login Section -->
    <div class="container">
        <div class="login-container">
            <!-- Logo -->
            <div class="text-center">
                <img src="src/images/logo.png" alt="SpaceECE Logo" class="logo">
            </div>


            <!-- Heading -->
            <h1>SPACE for ECE</h1>
            <h2>Home Learning Made Easy</h2>

            <!-- Step 1: Phone Number -->
            <div id="step-1">
                <form id="phone-form">
                    <div class="form-group">
                        <label for="phone">Enter Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="1234567890"
                            required>
                    </div>
                    <button type="button" class="btn btn-custom btn-block" onclick="showOTPForm()">Send OTP</button>
                    <div class="bottom-image-container">
                        <img src="src/images/icon.jpg" alt="Visual Icon" class="bottom-image">
                    </div>
                </form>
            </div>

            <!-- Step 2: OTP Input Section -->
            <div id="step-2" style="display: none;">
                <form id="otp-form" action="./main.php">
                    <label for="otp">Enter OTP</label>
                    <div class="otp-input-container">
                        <input type="text" maxlength="1" class="otp-input" required>
                        <input type="text" maxlength="1" class="otp-input" required>
                        <input type="text" maxlength="1" class="otp-input" required>
                        <input type="text" maxlength="1" class="otp-input" required>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-outline-dark">Resend OTP</button>
                        <button type="submit" class="btn btn-custom">Confirm </button>
                    </div>

                    <div class="bottom-image-container">
                        <img src="src/images/icon.jpg" alt="Visual Icon" class="bottom-image">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    <script>
    function showOTPForm() {
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }
    </script>
</body>

</html>