<!-- Unsort room detail display -->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>unsortRoom</title>
</head>
<body>
<!-- unsorted room section starts -->
<section class="about" id= "room">
<div class="row">
  <div class="image">
	 <img src="Pictures/Room3.jpg" alt="Lily Hotel, Penang">
  </div>
  <div class="content">
	 <h3>Beach view with Landa travel packages</h3>
	 <p><b>Location:</b> Lily Hotel, Penang & Daisy Hotel, Langkawi Island<br>
	  <b>Room type:</b> Single bed & King-sized bed</p>
	  <!-- to check if the user logged in or not -->
	 <?php 
	  if (isset($_SESSION['username'])){
	  ?>
	 <a href="beachRoom.php" class="btn">Check Rate</a><!-- if yes, link to payment page -->
	  <?php
		 }else{?>
	 <a href="checkError.php" class="btn">Check Rate</a><!-- if no, link to error page to let user logged in -->
	  <?php	
		}?>
  </div>
</div>
<br>
<div class="row">
  <div class="image">
	 <img src="Pictures/gallery5.jpg" alt="Hibiscus Hotel, Kuala Lumpur">
  </div>
  <div class="content">
	 <h3>City view with Kanda travel package</h3>
	 <p><b>Location:</b> Rose Hotel, Melaka & Hibiscus Hotel, Kuala Lumpur & Chrysanthemum Hotel, Johor<br>
	  <b>Room type:</b> Single bed & King-sized bed</p>
	  <!-- to check if the user logged in or not -->
	 <?php 
	  if (isset($_SESSION['username'])){
	  ?>
	 <a href="cityRoom.php" class="btn">Check Rate</a><!-- if yes, link to payment page -->
	  <?php
		 }else{?>
	 <a href="checkError.php" class="btn">Check Rate</a><!-- if no, link to error page to let user logged in -->
	  <?php	
		}?>
  </div>
</div>
<br>
<div class="row">
  <div class="image">
	 <img src="Pictures/Environment.jpg" alt="Hotel Environment">
  </div>
  <div class="content">
	 <h3>One Day travel with Anda Travel Package</h3>
	 <p><b>Location:</b> Lily Hotel, Penang & Daisy Hotel, Langkawi Island & Rose Hotel, Melaka & Hibiscus Hotel, Kuala Lumpur & Chrysanthemum Hotel, Johor<br>
	  <b>Room type:</b> Single bed & King-sized bed</p>
	  <!-- to check if the user logged in or not -->
	 <?php 
	  if (isset($_SESSION['username'])){
	  ?>
	 <a href="onedRoom.php" class="btn">Check Rate</a><!-- if yes, link to payment page -->
	  <?php
		 }else{?>
	 <a href="checkError.php" class="btn">Check Rate</a><!-- if no, link to error page to let user logged in -->
	  <?php	
		}?>
  </div>
</div>
</section>
<!-- unsorted room section ends -->
</body>
</html>