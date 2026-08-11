<?php
require 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

$stmt = $conn->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<div class="card">
	<div class="card-header">
		<h3>Student List</h3>

		<a href="add.php" class="btn btn-success">
			Add Student
		</a>

		<form action="search.php" method="GET" class="mt-3">
			<input type="text"
				name="keyword"
				class="form-control"
				placeholder="Search by name or email">
		</form>

	</div>

	<div class="card-body">

		<table class="table table-bordered table-hover">

			<thead>

			<tr>

				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Actions</th>
			</tr>

			</thead>

			<tbody>

			<?php foreach($students as $row): ?>

			<tr>

				<td><?= $row['id']; ?></td>

				<td><?= htmlspecialchars($row['first_name']); ?></td>

				<td><?= htmlspecialchars($row['last_name']); ?></td>

				<td><?= htmlspecialchars($row['email']); ?></td>

				<td><?= htmlspecialchars($row['phone']); ?></td>

				<td>

					<a href="view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>

					<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>

					<a href="delete.php?id=<?= $row['id']; ?>"
						class="btn btn-danger btn-sm"
						onclick="return confirm('Delete this student?')">
						Delete
					</a>

				</td>

			</tr>

			<?php endforeach; ?>

			</tbody>

		</table>

	</div>

</div>

<?php include 'includes/footer.php'; ?>

