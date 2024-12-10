<?php
session_start();
include '../db/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to add a child.");
}

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $childName = htmlspecialchars(trim($_POST['child_name']));
    $childAge = (int)$_POST['child_age'];

    // Validate inputs
    if (empty($childName)) die("Child's name is required.");
    if ($childAge < 0 || $childAge > 8) die("Invalid age selected.");

    // Handle file upload
    if (isset($_FILES['child_photo']) && $_FILES['child_photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['child_photo'];
        $uploadDir = '../uploads/';
        $fileName = uniqid() . '_' . basename($photo['name']);
        $targetFile = $uploadDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
            die("Failed to create upload directory.");
        }

        // Check file type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($photo['type'], $allowedTypes)) die("Only JPG, PNG, and GIF files are allowed.");

        // Move the file to the target directory
        if (move_uploaded_file($photo['tmp_name'], $targetFile)) {
            $photoPath = 'uploads/' . $fileName;

            // Insert child data into the database
            $query = "INSERT INTO child_info (child_name, photo, age, user_id) VALUES ('$childName', '$photoPath', '$childAge', '$userId')";
            if (mysqli_query($conn, $query)) {
                header("Location: ../list.php");
                exit();
            } else {
                die("Error inserting data: " . mysqli_error($conn));
            }
        } else {
            die("Error uploading the file.");
        }
    } else {
        die("No photo uploaded.");
    }
}
?>
