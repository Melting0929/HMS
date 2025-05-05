<!-- Company Detail on the main page-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page(aboutUs)</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">	
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>

<?php
require('connect.php');// establish connect to database
//check if the user click send
if(isset($_POST['send'])){
	//sanitize the user input data from the 'name', 'email', 'number', and 'message' form fields
	$name = $_POST['name'];
	$name = filter_var($name, FILTER_SANITIZE_STRING);
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_STRING);
	$number = $_POST['number'];
	$number = filter_var($number, FILTER_SANITIZE_STRING);
	$message = $_POST['message'];
	$message = filter_var($message, FILTER_SANITIZE_STRING);
	//check message already sent or not
	$verify_message = $conn->prepare("SELECT * FROM `message` WHERE name = :name AND email = :email AND number = :number AND message = :message");
	$verify_message->bindValue(":name", $name);
	$verify_message->bindValue(":email", $email);
	$verify_message->bindValue(":number", $number);
	$verify_message->bindValue(":message", $message);
	$verify_message->execute();
	$verify_message_result = $verify_message->fetch(PDO::FETCH_ASSOC);

	if($verify_message_result){//if yes
		$warning_msg = array();
		$warning_msg[] = 'message sent already!';
	}else{//if no
		$insert_message = $conn->prepare("INSERT INTO `message`(name, email, number, message) VALUES(:name, :email, :number, :message)");
		$insert_message->bindValue(":name", $name);
		$insert_message->bindValue(":email", $email);
		$insert_message->bindValue(":number", $number);
		$insert_message->bindValue(":message", $message);
		$insert_message->execute();
		$success_msg[] = 'message send successfully!';
	}
}
//include the message.php to displays different types of alerts using the SweetAlert library
include 'message.php';
?>
<!-- about section starts  -->
<section class="about" id="about">
   <div class="row">
      <div class="image">
         <img src="Pictures/Staff.png" alt="Our Staff">
      </div>
      <div class="content">
         <h3>Our history & Leaders</h3>
         <p>Who make us an opportunity to be of service to you?<br>Get know about Our History & Leaders</p>
         <a href="About_Us.php" class="btn">Know more About Us</a>
      </div>
   </div>

   <div class="row revers">
      <div class="image">
         <img src="Pictures/Food.jpg" alt="Food & Beverage">
      </div>
      <div class="content">
         <h3>Our Services</h3>
         <p>What will we served to you?<br>The World-class hospitality.</p>
         <a href="#services" class="btn">Know more about our Services</a>
      </div>
   </div>

   <div class="row">
      <div class="image">
         <img src="Pictures/Environment.jpg" alt="Hotel Environment">
      </div>
      <div class="content">
         <h3>Our Hotel Environment</h3>
         <p>Where will be the best sea view hotel in Penang? <br>Our Lily Hotel, Penang - a comfort and leisurely place for all of you.</p>
         <a href="Room(unsort).php" class="btn">Check Availability</a>
      </div>
   </div>
</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id= "services">
   <div class="box-container">
      <div class="box">
         <img src="Pictures/icon-1.png" alt="">
         <h3>food & drinks</h3>
         <p>Our hotel's food is delicious and sure to satisfy your taste buds.</p>
      </div>

      <div class="box">
         <img src="Pictures/icon-2.png" alt="">
         <h3>outdoor dining</h3>
         <p>Our dining environment offers a cozy and welcoming ambiance, perfect for enjoying a meal with friends and family.</p>
      </div>

      <div class="box">
         <img src="Pictures/icon-3.png" alt="">
         <h3>beach view</h3>
         <p>Our hotels offer stunning views of the beach, with crystal clear waters and a picturesque coastline.</p>
      </div>

      <div class="box">
         <img src="Pictures/icon-4.png" alt="">
         <h3>decorations</h3>
         <p>Our hotel's decoration is changed according to the seasons, creating a beautiful and immersive atmosphere for guests throughout the year.</p>
      </div>

      <div class="box">
         <img src="Pictures/icon-5.png" alt="">
         <h3>swimming pool</h3>
         <p>Our hotels boast a magnificent swimming pool with crystal-clear water and plenty of space for guests to relax and soak up the sun.</p>
      </div>

      <div class="box">
         <img src="Pictures/icon-6.png" alt="">
         <h3>resort beach</h3>
         <p>Our hotels are conveniently located near the beach and provides easy access to various recreational activities for guests to enjoy.</p>
      </div>
   </div>
</section>

<!-- services section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">
   <div class="swiper gallery-slider">
      <div class="swiper-wrapper">
         <img src="Pictures/gallery1.jpg" class="swiper-slide" alt="">
         <img src="Pictures/gallery2.jpg" class="swiper-slide" alt="">
         <img src="Pictures/gallery3.jpg" class="swiper-slide" alt="">
         <img src="Pictures/gallery4.jpg" class="swiper-slide" alt="">
         <img src="Pictures/gallery5.jpg" class="swiper-slide" alt="">
         <img src="Pictures/gallery6.jpg" class="swiper-slide" alt="">
      </div>
      <div class="swiper-pagination"></div>
   </div>
</section>

<!-- gallery section ends -->

<!-- contact section starts  -->

<section class="contact" id="review">
   <div class="row">
      <form action="" method="post">
         <h3>Review Us!</h3><!-- header -->
         <input type="text" name="name" required maxlength="50" placeholder="Enter Your Name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="Enter Your Email Address" class="box">
         <input type="number" name="number" required maxlength="10" min="0" max="9999999999" placeholder="Enter Your Phone Number" class="box">
         <textarea name="message" class="box" required maxlength="1000" placeholder="Enter Your Review Here!" cols="30" rows="10"></textarea>
         <input type="submit" value="Submit" name="send" class="btn">
      </form>
	  
	<div class="google-map">
		<form action="">
	 	<h3>Our Location</h3><!-- header -->
		<div class="map-wrapper">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17503.349252554868!2d101.57720626876153!3d3.14950032036206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4efc1320915b%3A0x71780032b534e07b!2sSEGi%20University!5e0!3m2!1sen!2smy!4v1681618793993!5m2!1sen!2smy" width="50" height="45" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		</form>
	</div>
	</div>
</section>

<!-- contact section ends -->

<script>
/*Java Script for Gallery slider*/
var swiper = new Swiper(".gallery-slider", {
   loop:true,
   effect: "coverflow",
   slidesPerView: "auto",
   centeredSlides: true,
   grabCursor: true,
   coverflowEffect: {
	  rotate: 0,
	  stretch: 0,
	  depth: 100,
	  modifier: 2,
	  slideShadows: true,
   },
   pagination: {
	  el: ".swiper-pagination",
	},
});
</script>
</body>
</html>