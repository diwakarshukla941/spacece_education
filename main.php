<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Enrollment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./src/css/form.css">
</head>
<body>
<div class="form-container">
    <div class="text-center mb-4">
        <img src="./src/images/logo.png" alt="Space ECE Logo" class="company-logo">
    </div>
    <p class="text-center">Home Learning Made Easy</p>
    <form action="controller/main_action.php" method="POST" enctype="multipart/form-data">
        <label for="child_name">Child's Name:</label>
        <input type="text" id="child_name" name="child_name" placeholder="Enter your child's name" required>
        <label for="child_photo" class="mt-3">Upload Child's Photo:</label>
        <div class="upload-section d-flex align-items-center mt-2">
            <div class="image-preview">
                <img id="preview" src="./src/images/icon.jpg" alt="Camera Icon" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; border: 1px solid #ccc;">
            </div>
            <div class="ms-3">
                <input type="file" id="child_photo" name="child_photo" accept="image/*" class="form-control" onchange="showPreview(event)">
            </div>
        </div>
        <label for="child_age" class="mt-3">Select Your Child's Age:</label>
        <input type="hidden" id="child_age" name="child_age">
        <div class="age-buttons">
            <?php for ($i = 0; $i <= 8; $i++): ?>
                <button type="button" class="age-btn" data-age="<?= $i ?>"><?= $i ?></button>
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn">Confirm</button>
    </form>
    
    <!-- Button to navigate to list.php -->
    <a href="list.php" class="btn btn-secondary mt-3">Go to List</a>
</div>

<script>
    function showPreview(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    const ageButtons = document.querySelectorAll('.age-btn');
    const hiddenInput = document.getElementById('child_age');

    ageButtons.forEach(button => {
        button.addEventListener('click', () => {
            ageButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            hiddenInput.value = button.getAttribute('data-age');
        });
    });
</script>
</body>
</html>
