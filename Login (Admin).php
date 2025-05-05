<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Admin Page</title>
<link rel="stylesheet" href="style.css"/>
<?php
	include('selectionTab.html');
?>
<?php
require('connect.php');
session_start();

// When form submitted, check and create user session.
if (isset($_POST['admin'])) {
	$admin = $_POST['admin'];
	$password = $_POST['password'];

	// Prepare statement
	$stmt = $conn->prepare("SELECT * FROM `admin` WHERE admin = :admin AND password = :password");

	// Bind parameters
	$stmt->bindParam(':admin', $admin);
	$stmt->bindParam(':password', md5($password));

	// Execute statement
	$stmt->execute();

	// Check if user exists
	if ($stmt->rowCount() == 1) {
		$_SESSION['admin'] = $admin;
		// Redirect to admin dashboard page
		header("Location: adminDashboard.php");
		exit();
	} else {
		include('Error.php');
		exit();
	}
} else {
?>
</head>
<body>
<!-- admin login section start -->
<section class="loginNregister" id="review">
  <section class="contact" id="review">
    <div class="row">
      <div class="image">
        <img src="Pictures/Room1.jpg" alt="Beach at Penang">
      </div>
      <form action="" method="post">
        <h3>Login to your My Cinta account</h3>
        <input type="text" name="admin" required maxlength="50" placeholder="Employee Name" class="box" autofocus="true"/>
        <input type="password" name="password" required maxlength="50" placeholder="Password" class="box">
        <input type="submit" value="Login" name="submit" class="btn">
		<p class="link"><a href="adminRegister.php">New Registration</a></p>
      </form>
    </div>
  </section>
</section>
<!-- admin login section end -->
</body>
</html>
<?php
    }
?>

</html>