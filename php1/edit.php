<?php
require 'config/database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

include 'includes/header.php';
include 'includes/navbar.php';

if (!$row) {
	die("Student not found.");
}

if (isset($_POST['update'])) {

	$first = $_POST['first_name'];
	$last = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	$sql = "UPDATE students 
			SET first_name=?,
				last_name=?,
				email=?,
				phone=?
			WHERE id=?";

	$stmt = $conn->prepare($sql);
	$stmt->execute([$first, $last, $email, $phone, $id]);

	header("Location: index.php");
	exit;
}

?>

<div class="card">
	<div class="card-header">
		<h3>Edit Students</h3>
	</div>

	<div class="card-body">
		<form method="POST">
			<input type="text" name="first_name" class="form-control mb-3" value="<?= htmlspecialchars($row['first_name']); ?>" required>
			<input type="text" name="last_name" class="form-control mb-3" value="<?= htmlspecialchars($row['last_name']); ?>" required>
			<input type="email" name="email" class="form-control mb-3" value="<?= htmlspecialchars($row['email']); ?>" required>
			<input type="text" name="phone" class="form-control mb-3" value="<?= htmlspecialchars($row['phone']); ?>">

			<button class="btn btn-primary" name="update">Update</button>
			<a href="index.php" class="btn btn-secondary">Cancel</a>

		</form>
	</div>
</div>

<?php include 'includes/footer.php'; ?>

