<!-- My Booking page -->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Bookings</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">	
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>

<?php
	include('selectionTab.html');
?>

<?php
include 'connect.php';
session_start();
//declare $name
$name = "";
//check if user already logged in or not
if(isset($_SESSION['username'])){
   $name = $_SESSION['username'];//if yes
}else{
	header("Location: bookingError.php");//if no
}

//if user clicked cancel booking button
if(isset($_POST['cancel'])){

   $booking_id = $_POST['booking_id'];
   $booking_id = filter_var($booking_id, FILTER_SANITIZE_STRING);

   $verify_user = $conn->prepare("SELECT * FROM `bookings` WHERE name = ?");
   $verify_user->execute([$name]);
   
   $verify_booking = $conn->prepare("SELECT * FROM `bookings` WHERE booking_id = ?");
   $verify_booking->execute([$booking_id]);

   if($verify_booking->rowCount() > 0){
      $delete_booking = $conn->prepare("DELETE FROM `bookings` WHERE booking_id = ?");
      $delete_booking->execute([$booking_id]);
      $success_msg[] = 'booking cancelled successfully!';
   }else{
      $warning_msg[] = 'booking cancelled already!';
   }
   
}

?>	
	
<!-- My booking section starts  -->
<section class="bookings">
   <h1 class="heading">my bookings</h1>
   <div class="box-container">
   <?php
      $select_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE name = ?");
	  $select_bookings->execute([$name]);
	  //check the user already book room or not
      if($select_bookings->rowCount() > 0){
         while($fetch_booking = $select_bookings->fetch(PDO::FETCH_ASSOC)){//if yes
   ?>
   <div class="box">
	  <!-- display the room booking detail-->
      <p>name : <span><?= $fetch_booking['name']; ?></span></p>
      <p>email : <span><?= $fetch_booking['email']; ?></span></p>
      <p>number : <span><?= $fetch_booking['number']; ?></span></p>
      <p>check in : <span><?= $fetch_booking['check_in']; ?></span></p>
      <p>check out : <span><?= $fetch_booking['check_out']; ?></span></p>
      <p>adults : <span><?= $fetch_booking['adults']; ?></span></p>
      <p>childs : <span><?= $fetch_booking['childs']; ?></span></p>
      <p>booking id : <span><?= $fetch_booking['booking_id']; ?></span></p>
      <form action="" method="POST">
         <input type="hidden" name="booking_id" value="<?= $fetch_booking['booking_id']; ?>">
         <input type="submit" value="cancel booking" name="cancel" class="btn" onclick="return confirm('cancel this booking?');"><!-- cancel button for user to cancel room reservation-->
      </form>
   </div>
   <?php
    }
	  
   }else{//if no
   ?>   
   <div class="box" style="text-align: center;">
      <p style="padding-bottom: .5rem; text-transform:capitalize;">No Bookings Found!</p>
      <a href="Room(unsort).php" class="btn">Book New</a><!-- link the user to book room-->
   </div>
   <?php
   }
   ?>
   </div>
</section>
<!-- My booking section ends -->
<?php 
	include 'footer.html';
	include 'message.php'; 
?>
</body>
</html>