<?php
// Include the database connection file
include('db/db.php'); // Adjust the path as needed

// Start session to access session variables
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the logged-in user's ID from session
    $user_id = $_SESSION['user_id'];

    // Query to select the children of the logged-in user
    $query = "SELECT * FROM child_info WHERE user_id = '$user_id'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching child data: " . mysqli_error($conn));
    }
} else {
    // If user is not logged in, redirect to the login page
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child List</title>
    <link rel="stylesheet" href="./src/css/list.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="app-header">
            <h1 class="app-title">SPACE for ECE</h1>
        </header>

        <section class="profile-section">
            <div class="profile-header">
                <h2 class="section-title">Child’s Profile</h2>
                <a href="main.php">
                    <button class="add-button">
                        <i class="fa fa-plus"></i> Add Another Child
                    </button>
                </a>
            </div>

            <div class="child-list">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="child-card">
                        <!-- Child Photo, use a default image if photo is not available -->
                        <img src="<?= htmlspecialchars($row['photo']) ?: 'default-photo.jpg' ?>" alt="Child Photo" class="child-photo">

                        <div class="child-info">
                            <h3 class="child-name"><?= htmlspecialchars($row['child_name']) ?></h3>
                            <p class="child-age">Age: <?= htmlspecialchars($row['age']) ?> years</p>

                            <!-- Correctly pass the `id` in the URL for detailedInfo.php -->
                            <a href="detailedInfo.php?id=<?= $row['id'] ?>" class="get-started-btn">Let’s Get Started</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No children profiles found.</p>
                <?php endif; ?>
            </div>
        </section>
    </div>
</body>

</html>
