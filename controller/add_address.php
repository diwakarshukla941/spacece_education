<?php
session_start();
include '../db/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect POST data
    $childId = (int)$_POST['child_id'];
    $addressLine1 = htmlspecialchars(trim($_POST['address_line1']));
    $addressLine2 = htmlspecialchars(trim($_POST['address_line2']));
    $city = htmlspecialchars(trim($_POST['city']));
    $state = htmlspecialchars(trim($_POST['state']));
    $zipcode = htmlspecialchars(trim($_POST['zipcode']));

    // Validate inputs
    if (empty($addressLine1) || empty($city) || empty($state) || empty($zipcode)) {
        die("All required fields must be filled.");
    }

    // Insert into address table
    $query = "INSERT INTO child_address (child_id, address_line1, address_line2, city, state, zipcode) 
              VALUES ('$childId', '$addressLine1', '$addressLine2', '$city', '$state', '$zipcode')";
    
    if (mysqli_query($conn, $query)) {
        // Redirect to detailedInfo.php with the child ID
        header("Location: ../detailedInfo.php?id=" . $childId); // Redirect with the child_id in the URL
        exit();
    } else {
        die("Error inserting address: " . mysqli_error($conn));
    }
}
?>
