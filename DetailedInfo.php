<?php
include 'db/db.php';

// Get the child ID from the URL
if (isset($_GET['id'])) {
    $child_id = $_GET['id'];

    // Fetch data for the specific child from the `child_info` table
    $query = "SELECT * FROM child_info WHERE id = '$child_id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }

    // Fetch the child's data from the result
    $child = mysqli_fetch_assoc($result);
} else {
    // If no ID is passed, redirect to the list page
    header("Location: list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./src/css/detailedInfo.css">
</head>

<body>
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1 class="display-4">SPACE for ECE</h1>
        </header>

        <section class="profile-section bg-light p-4 rounded shadow">
            <div class="profile-header d-flex justify-content-between align-items-center">
                <h2 class="h4">Child’s Profile</h2>
                <a href="list.php" class="btn btn-warning">Back to List</a>
            </div>

            <!-- Display the child's details -->
            <div class="child-info text-center mt-4">
                <img src="<?= htmlspecialchars($child['photo']) ?>" alt="Child Photo" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                <h3 class="mt-3"><?= htmlspecialchars($child['child_name']) ?></h3>
                <p>Age: <?= htmlspecialchars($child['age']) ?> years</p>
            </div>

            <!-- Levels section -->
            <div class="levels-section text-center mt-5">
                <h3>Select Level</h3>
                <div class="btn-group mt-3" role="group" aria-label="Level buttons">
                    <?php for ($i = 0; $i <= 8; $i++): ?>
                        <button class="btn btn-warning level-btn" data-level="<?= $i ?>">Level <?= $i ?></button>
                    <?php endfor; ?>
                </div>
            </div>

 <!-- Cards section -->
<div class="level-cards mt-5">
    <!-- 7 cards for each level (they will be shown/hidden based on level selection) -->
    <?php for ($i = 0; $i <= 8; $i++): ?>
        <div class="level-cards-container level-<?= $i ?> hidden row">
            <?php 
                $startCard = $i * 7 + 1; // Calculate starting card for each level
                $endCard = $startCard + 6; // Calculate ending card for each level
                for ($j = $startCard; $j <= $endCard; $j++): 
            ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card bg-warning">  <!-- Add bg-warning here for yellow background -->
                        <div class="card-body">
                            <h5 class="card-title"><?= $i ?>. Card Title</h5>
                            <p class="card-text">Details for level <?= $i ?>, card <?= $j ?>. Customize this content based on the child's level.</p>
                            <p class="card-text"><strong>Supplies:</strong> Lorum Ipsum</p>
                            <p class="card-text"><strong>Scheduled Date:</strong> 01/01/25</p>
                            <p class="card-text"><strong>Assigned Champion:</strong> Lorum Ipsum</p>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    <?php endfor; ?>
</div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for pagination-like functionality
const cards = document.querySelectorAll('.card'); // Select all the cards
const cardsPerPage = 7; // Number of cards to show per page
let currentPage = 0; // Current page index

// Function to update the visible cards based on the current page
function updatePagination() {
    cards.forEach((card, index) => {
        if (index >= currentPage * cardsPerPage && index < (currentPage + 1) * cardsPerPage) {
            card.parentElement.style.display = 'block'; // Show card
        } else {
            card.parentElement.style.display = 'none'; // Hide card
        }
    });
}

// Initial pagination update
updatePagination();

// Add event listeners to level buttons
const levelButtons = document.querySelectorAll('.level-btn');
levelButtons.forEach(button => {
    button.addEventListener('click', () => {
        currentPage = parseInt(button.getAttribute('data-level')); // Set the current page based on level clicked
        updatePagination(); // Update the cards displayed
    });
});

    </script>
</body>

</html>
