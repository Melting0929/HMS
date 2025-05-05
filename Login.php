<!-- User login page -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('selectionTab.html');
require('connect.php');
session_start();
// When form submitted, check and create user session.
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Prepare statement
	$stmt = $conn->prepare("SELECT * FROM `users` WHERE username = :username AND password = :password");

	// Bind parameters
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':password', md5($password));

	// Execute statement
	$stmt->execute();

	// Check if user exists
	if ($stmt->rowCount() == 1) {
		$_SESSION['username'] = $username;
		// Redirect to user dashboard page
		header("Location: dashboard.php");
		exit();
	} else {
		include('Error.php');
		exit();
	}
} else {
?>
<?php
}
?>
<!-- login section start -->
<section class="loginNregister" id="review">
<section class="contact" id="review">

<div class="row">
<div class="image">
	 <img src="Pictures/Room1.jpg" alt="Beach at Penang">
  </div>
  <form action="" method="post">
	 <h3>Login to your CintaMu account</h3>
	 <input type="text" name="username" required maxlength="50" placeholder="Username" class="box" autofocus="true"/>
	 <input type="password" name="password" required maxlength="50" placeholder="Password" class="box">
	 <input type="submit" value="Login" name="submit" class="btn">
	  <p class="link"><a href="register.php">New Registration</a></p>
  </form>
   </div>
</section>
</section>
<!-- login section end -->
</body>
</html>
