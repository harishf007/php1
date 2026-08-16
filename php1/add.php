<?php
require 'config/database.php';

if(isset($_POST['save'])){

	$first=$_POST['first_name'];
	$last=$_POST['last_name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];

	$sql="INSERT INTO students(first_name,last_name,email,phone) VALUES(?,?,?,?)";
	$stmt=$conn->prepare($sql);
	$stmt->execute([$first,$last,$email,$phone]);

	header("Location:index.php");
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="card">
	<div class="card-header">
		<h3>Add Student</h3>
	</div>

<div class="card-body">
	<form method="POST">
		<input type="text" name="first_name" class="form-control mb-3" placeholder="First Name" required>
		<input type="text" name="last_name" class="form-control mb-3" placeholder="Last Name" required>
		<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
		<input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

		<button class="btn btn-success" name="save">Save</button>
		<a href="index.php" class="btn btn-secondary">Cancel</a>

	</form>
</div>
</div>
<?php include 'includes/footer.php'; ?>


