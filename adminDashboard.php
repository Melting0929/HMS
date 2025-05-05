<!--Admin Dashboard when admin login sucessful-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
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
	font-size: 2rem;
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
<!-- admin dashboard start -->
<section class="error">
	<div class="row">
		<form action="" method="post">
			<p class="link">Welcome to Admin Panel!</p>
			<p class="link">Click <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=hotel">here</a> to the admin page.</p><br>
			<p class="link">The data store in the database: </p>
			<!-- unordered list to list the data specific -->
				<p class="link"><b>Hotel</b><br>
				<ul style="color: #2B1103; list-style-position: inside; font-size: 2rem;">
					<li>1 = Lily Hotel, Penang</li>
					<li>2 = Rose Hotel, Melaka</li>     
					<li>3 = Daisy Hotel, Langkawi Island</li>
					<li>4 = Hibiscus Hotel, Kuala Lumpur</li>
					<li>5 = Chrysanthemum Hotel, Johor</li>
				</ul></p>
			<p class="link"><b>Room type</b><br>
			<ul style="color: #2B1103; list-style-position: inside; font-size: 2rem;">
				<li>350 = single-bed room without travel package</li>      
				<li>550 = single-bed room with travel package</li>
				<li>650 = king-sized bed room without travel package</li>
				<li>750 = king-sized bed room with travel package</li>
				</ul></p><br>
			<p class="link">If you wish to logout. Click <a href="logout.php">here</a>!</p>
		</form>
	</div>
</section>
<!-- admin dashboard end -->
<?php 
	include('footer.html'); 
?>
</body>
</html>