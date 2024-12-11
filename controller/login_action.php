<?php
// Include the database connection file
include('../db/db.php');

// Start session to store login status
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize error message variable
    $error_message = '';

    // Get input values from the login form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query the database to find the user by email
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check for query error
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data from the result
        $user = mysqli_fetch_assoc($result);

        // Verify the password with password_verify() if it's hashed in the database
        if (password_verify($password, $user['password'])) {
            // If password matches, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role']; // Store the user's role in session

            // Redirect based on the role
            if ($user['role'] === 'Champion') {
                header("Location: ../admin_child_info.php"); // Redirect Champions to admin_child_info.php
                exit();
            } elseif ($user['role'] === 'Parent') {
                header("Location: ../main.php"); // Redirect Parents to main.php
                exit();
            }
        } else {
            // If password doesn't match, set error message
            $error_message = "Invalid email or password.";
        }
    } else {
        // If email doesn't exist in the database, set error message
        $error_message = "No user found with this email.";
    }

    // Redirect to login page with the error message
    header("Location: login.php?error=" . urlencode($error_message));
    exit();
}
?>
