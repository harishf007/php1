<?php

require 'config/database.php';

include 'includes/header.php';
include 'includes/navbar.php';

$keyword = "";

if (isset($_GET['keyword'])) {
	$keyword = trim($_GET['keyword']);
}

$sql = "SELECT * 
	FROM students 
	WHERE first_name LIKE ? 
		OR last_name LIKE ?
		OR email LIKE ?
		OR phone LIKE ?
	ORDER BY id DESC";

$stmt = $conn->prepare($sql);

$search = "%".$keyword."%";

$stmt->execute([$search, $search, $search, $search]);

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="card">

<div class="card-header">

<h3>Search Results</h3>

<form method="GET">

<input type="text" 
name="keyword" 
class="form-control" 
	value="<?= htmlspecialchars($keyword); ?>" 
placeholder="Search">

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

<?php if(count($students) > 0): ?>

<?php foreach($students as $row): ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['first_name']); ?></td>

<td><?= htmlspecialchars($row['last_name']); ?></td>

<td><?= htmlspecialchars($row['email']); ?></td>

<td><?= htmlspecialchars($row['phone']); ?></td>

<td>

<a href="view.php?id=<?= $row['id']; ?>" 
class="btn btn-info btn-sm">
View
</a>

<a href="edit.php?id=<?= $row['id']; ?>" 
class="btn btn-primary btn-sm">
Edit
</a>

<a href="delete.php?id=<?= $row['id']; ?>" 
class="btn btn-danger btn-sm" 
onclick="return confirm('Delete this student?');">
Delete
</a>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="6" class="text-center">
No records found.
</td>

</tr>

<?php endif; ?>

</tbody>

</table>

<a href="index.php" class="btn btn-secondary">
Back to Home
</a>

</div>

</div>

<?php include 'includes/footer.php'; ?>

