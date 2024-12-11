<?php
session_start();
include 'db/db.php';

// Fetch child info for the logged-in user
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to view this page.");
}

$userId = $_SESSION['user_id'];
$query = "SELECT * FROM child_info WHERE user_id = '$userId' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $child = mysqli_fetch_assoc($result);
} else {
    die("No data found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Info</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Child Appointment Details</h2>
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <!-- Child Information -->
                <div class="col-md-6">
                    <p><strong>Child's Name:</strong> <?= htmlspecialchars($child['child_name']) ?></p>
                    <p><strong>Age:</strong> <?= htmlspecialchars($child['age']) ?></p>
                    <p><strong>Appointment Date:</strong> <?= htmlspecialchars($child['appointment_date']) ?></p>
                    <p><strong>Photo:</strong></p>
                    <img src="<?= htmlspecialchars($child['photo']) ?>" alt="Child Photo" style="max-width: 200px; height: auto;">
                </div>
                
                <!-- Address Form -->
                <div class="col-md-6">
                    <h5>Add Address</h5>
                    <form action="controller/add_address.php" method="POST">
                        <input type="hidden" name="child_id" value="<?= $child['id'] ?>">
                        <div class="mb-3">
                            <label for="address_line1" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="address_line1" name="address_line1" placeholder="Enter address line 1" required>
                        </div>
                        <div class="mb-3">
                            <label for="address_line2" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Enter address line 2">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required>
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter state" required>
                        </div>
                        <div class="mb-3">
                            <label for="zipcode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter zip code" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional for form interactions) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
