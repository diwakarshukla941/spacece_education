<?php
include '../db/db.php';

try {
    // Collect form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        throw new Exception('Passwords do not match!');
    }

    // Check if email already exists
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        throw new Exception('Email already exists!');
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO user (fullname, email, contact_no, password) VALUES ('$name', '$email', '$contact', '$hashed_password')";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception('Error: ' . mysqli_error($conn));
    }

    // Registration successful - Redirect to login with success message
    header("Location: ../login.php?success=" . urlencode('Registration successful!'));
    exit();

} catch (Exception $e) {
    // If an exception occurs, redirect to index.php with an error message
    header("Location: ../index.php?error=" . urlencode($e->getMessage()));
    exit();
} finally {
    // Close the database connection
    mysqli_close($conn);
}
?>
