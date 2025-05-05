<!-- User Dashboard -->
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<style>
	:root {
		--main-color:#2B1103;
		--sub-color:#DCC69C;
	}
	.error {
		border-radius: 3rem;
		padding: 4rem 2rem;
	}
	.error .row {
		border-radius: 3rem;
		padding: 4rem 2rem;
	}
	.error .row form {
		border-radius: 4rem 2rem;
		padding: 2rem;
		text-align: center;
		color: var(--sub-color);
		background-color: var(--sub-color);
	}
	.error .row form .link {
		color: var(--main-color);
		font-size: 3rem;
		padding: 2rem;

	}
	.error .row form .link a {
		color: aliceblue;
		font-family: 'Montserrat', sans-serif;
	}
</style>
</head>
<body>
<?php 
	include('selectionTab.html'); 
?>
<!-- user dashboard section start -->
<section class="error">
	<div class="row">
		<form action="" method="post">
			<p class="link">Hey, <?php echo $_SESSION['username']; ?>!<br><br>Your have already Logged IN!</p>
			<p class="link">Click <a href="index.php">here</a> to our main page.</p><br>
			<p class="link">If you wish to logout. Click <a href="logout.php">here</a>!</p>
		</form>
	</div>
</section>
<!-- user dashboard section end -->
<?php 
	include('footer.html'); 
?>
</body>
</html>

