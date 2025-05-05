<!-- Login N Register page -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Membership</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<?php 
	include('selectionTab.html');
?>
<style>
.loginNregister .contact .row .form{
   flex: 1 1 30rem;
}

.loginNregister .contact .row .form table{
   width: 100%;
   height: auto;
   border: none;
}

.loginNregister .contact .row .form td{
   padding: 1rem;
}
	
ul {
  align-content: center;
  font-size: 2rem;
  color: var(--sub-color);
  font-family: 'Montserrat', sans-serif;
  margin: 0;
  padding: 4rem;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
  list-style-position: inside;
  text-align: left;
}
</style>
</head>
<body>
<!-- login and register section start -->
<section class="loginNregister">
<section class="contact" id="review">
    <div class="row">
      <div class="image">
		<img src="Pictures/gallery3.jpg">
      </div>
      <div class="form">
		<form action="" method="post">
		<h3>Join as our member!</h3><br><br>
		<ul>
		  <li>Free Membership</li>
		  <li>Free Wi-Fi</li>
		  <li>Get Single-bed room as birthday treat</li>
		  <li>Early check-in and Late check-out</li>
		  <li>Dining benefit and Spa benefit</li>
		</ul><br>
		<a href="Login.php" style="margin: 20px;" class="btn"> Login </a><a href="register.php" style="margin: 20px;" class="btn">Sign Up</a>
		</form>
      </div>
    </div>
</section>
</section>
<!-- login and register section end -->
</body>
</html>