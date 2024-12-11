<?php
session_start();
include 'db/db.php';

// Check if the admin is logged in (optional, if needed)

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: ../index.php?error=" . urlencode("Unauthorized access."));
    exit();
}


// Fetch child info along with address details
$query = "
    SELECT 
        child_info.id AS child_id,
        child_info.child_name,
        child_info.age,
        child_info.photo,
        child_info.appointment_date,
        child_address.address_line1,
        child_address.address_line2,
        child_address.city,
        child_address.state,
        child_address.zipcode
    FROM 
        child_info
    LEFT JOIN 
        child_address 
    ON 
        child_info.id = child_address.child_id
    ORDER BY 
        child_info.id DESC
";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Child Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">All Child Details</h2>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Child Name</th>
                    <th>Age</th>
                    <th>Photo</th>
                    <th>Appointment Date</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip Code</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['child_id']) ?></td>
                        <td><?= htmlspecialchars($row['child_name']) ?></td>
                        <td><?= htmlspecialchars($row['age']) ?></td>
                        <td>
                            <img src="<?= htmlspecialchars($row['photo']) ?>" alt="Child Photo" style="width: 100px; height: auto;">
                        </td>
                        <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                        <td><?= htmlspecialchars($row['address_line1'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($row['address_line2'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($row['city'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($row['state'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($row['zipcode'] ?? 'N/A') ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
