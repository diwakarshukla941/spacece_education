<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/register.css">
</head>

<body class="bg-warning d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="login-container bg-white shadow p-4 rounded">
            <div class="text-center">
                <img src="src/images/logo.png" alt="Logo" class="logo">
            </div>

            <h1 class="text-center mb-4">Sign Up</h1>
            <form id="register-form" action="controller/register_action.php" method="POST" onsubmit="return validateForm()">
                <div class="form-group mb-3">
                    <label for="name">Enter Name</label>
                    <input type="text" class="form-control rounded" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Id</label>
                    <input type="email" class="form-control rounded" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group mb-3">
                    <label for="contact">Phone Number</label>
                    <input type="text" class="form-control rounded" id="contact" name="contact" placeholder="Enter your phone number" required>
                    <small id="contact-error" class="text-danger d-none">Phone number must be exactly 10 digits and contain only numbers.</small>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control rounded" id="password" name="password" placeholder="Enter password" required>
                </div>

                <div class="form-group mb-3">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control rounded" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
                </div>

                <div class="form-group mb-4">
                    <label class="font-weight-bold" for="userRole">User Role</label>
                    <select class="form-control rounded" id="userRole" name="role" required>
                        <option value="parent">Parent</option>
                        <option value="champion">Champion</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning w-100 rounded">Sign Up</button>
            </form>

            <div class="bottom-image-container mt-4">
                <img src="src/images/icon.jpg" alt="Visual Icon" class="bottom-image img-fluid rounded">
            </div>
            <p class="text-center mt-3">
                Already have an account? <a href="login.php" class="text-warning">Login Now</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>

    <script>
        function validateForm() {
            var contact = document.getElementById('contact').value;
            var contactError = document.getElementById('contact-error');

            // Check if contact number contains only 10 digits
            var regex = /^[0-9]{10}$/;

            if (!regex.test(contact)) {
                contactError.classList.remove('d-none');
                return false;
            } else {
                contactError.classList.add('d-none');
                return true;
            }
        }
    </script>
</body>

</html>
