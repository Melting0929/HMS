<!--Admin register when clicked on the new register link on the admin login page-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Admin Registration</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<?php
include('selectionTab.html');
?>
</head>
<body>
<?php
    require('connect.php');//Establish connect to database

    if (isset($_REQUEST['admin'])) {
    $admin = stripslashes($_REQUEST['admin']);
    $admin = htmlspecialchars($admin);
    $password = stripslashes($_REQUEST['password']);
    $password = htmlspecialchars($password);
    $create_datetime = date("Y-m-d H:i:s");

    // Prepare statement
    $stmt = $conn->prepare("INSERT into `admin` (admin, password, create_datetime) VALUES (:admin, :password, :create_datetime)");

    // Bind parameters
    $stmt->bindParam(':admin', $admin);
    $stmt->bindParam(':password', md5($password));
    $stmt->bindParam(':create_datetime', $create_datetime);

    // Execute statement
    $result = $stmt->execute();

    if ($result) {
        header("Location: index.php");
        exit();
    }
	} else {

	}
?>
<!-- admin register section start -->
<section class="loginNregister" id="review">
<section class="contact" id="review">
   <div class="row">
	<div class="image">
         <img src="Pictures/gallery1.jpg" alt="Beach at Penang">
      </div>
      <form action="" method="post">
         <h3>New Admin</h3>
         <input type="text" name="admin" required maxlength="50" placeholder="Employee Name" class="box" required/>
         <input type="password" name="password" required maxlength="50" placeholder="Password" class="box">
         <input type="submit" value="Join now" name="submit" class="btn">
      </form>
   </div>
</section>
</section>	
<!-- admin register section end -->
</body>
</html>
