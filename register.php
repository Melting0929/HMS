<!-- User Registration -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Registration</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<?php
	include('selectionTab.html');
?>
</head>
<body>
<?php
	//Establish connection with database
    require('connect.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = htmlspecialchars($username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = htmlspecialchars($email);
    $password = stripslashes($_REQUEST['password']);
    $password = htmlspecialchars($password);
    $create_datetime = date("Y-m-d H:i:s");

    // Prepare statement
    $stmt = $conn->prepare("INSERT into `users` (username, password, email, create_datetime) VALUES (:username, :password, :email, :create_datetime)");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', md5($password));
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':create_datetime', $create_datetime);

    // Execute statement
    $result = $stmt->execute();

    if ($result) {
        header("Location: dashboard.php");
        exit();
    }
	} else {

	}
?>
<!-- register section starts -->
<section class="loginNregister" id="review">
<section class="contact" id="review">
<div class="row">
<div class="image">
<img src="Pictures/Room2.jpg" alt="Beach at Penang">
  </div>
  <form action="" method="post">
	 <h3>Join Us as Our Member</h3>
	 <input type="text" name="username" required maxlength="50" placeholder="Username" class="box" required/>
	 <input type="text" class="box" name="email" placeholder="Email Address">
	 <input type="password" name="password" required maxlength="50" placeholder="Password" class="box">
	 <input type="submit" value="Join now" name="submit" class="btn">
	 <p class="link"><a href="login.php">Click to Login</a></p><!-- if user wish to login -->
  </form>
</div>
</section>
</section>
<!-- register section ends -->
</body>
</html>
