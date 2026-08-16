<?php 
require 'config/database.php';
$id=$_GET['id'];
$stmt=$conn->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="card">
    <div class="card-header">
        <h3>Student Details</h3>
    </div>

    <div class="card-body">
        <p><strong>First Name:</strong><?= htmlspecialchars($row['first_name']); ?></p>
        <p><strong>Last Name:</strong><?= htmlspecialchars($row['last_name']); ?></p>
        <p><strong>Email:</strong><?= htmlspecialchars($row['email']); ?></p>
        <p><strong>Phone:</strong><?= htmlspecialchars($row['phone']); ?></p>

        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

