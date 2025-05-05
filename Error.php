<!-- Error message when incorrect username or password when login -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Error</title>
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
<!-- error message section start -->
<section class="error">
	<div class="row">
		<form action="" method="post">
			<p  class='link'>Incorrect Username/password.</p><br/>
			<p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
		</form>
	</div>
</section>
<!-- error message section end -->
<?php 
	include('footer.html'); 
?>
</body>
</html>
