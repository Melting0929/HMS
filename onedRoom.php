<!-- Payment page for One Day travel Room -->
<?php
//Establish connect to the database
include 'connect.php';

//create id for user_id and booking_id in bookings table
function create_unique_id(){
  $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $rand = array();
  $length = strlen($str) - 1;

  for($i = 0; $i < 20; $i++){
	 $n = mt_rand(0, $length);
	 $rand[] = $str[$n];
  }
  return implode($rand);
}

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   header('location:index.php');
}

//check if user clciked book
if(isset($_POST['book'])){
	//sanitize the user input data from the form fields
	$booking_id = create_unique_id();
	$name = $_POST['name'];
	$name = filter_var($name, FILTER_SANITIZE_STRING);
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_STRING);
	$number = $_POST['number'];
	$number = filter_var($number, FILTER_SANITIZE_STRING);
	$hotel = $_POST['hotel'];
	$hotel = filter_var($hotel, FILTER_SANITIZE_STRING);
	$roomType = $_POST['roomType'];
	$roomType = filter_var($roomType, FILTER_SANITIZE_STRING);
	$check_in = $_POST['check_in'];
	$check_in = filter_var($check_in, FILTER_SANITIZE_STRING);
	$check_out = $_POST['check_out'];
	$check_out = filter_var($check_out, FILTER_SANITIZE_STRING);
	$adults = $_POST['adults'];
	$adults = filter_var($adults, FILTER_SANITIZE_STRING);
	$childs = $_POST['childs'];
	$childs = filter_var($childs, FILTER_SANITIZE_STRING);

	//check the room booked by the user already or not
	$verify_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE user_id = ? AND name = ? AND email = ? AND number = ? AND hotel = ? AND roomType = ? AND check_in = ? AND check_out = ? AND adults = ? AND childs = ?");
	$verify_bookings->execute([$user_id, $name, $email, $number, $hotel, $roomType, $check_in, $check_out, $adults, $childs]);
	
	//if yes
	if($verify_bookings->rowCount() > 0){
		$warning_msg[] = 'Room booked already!';
	}else{//if no
		$book_room = $conn->prepare("INSERT INTO `bookings`(booking_id, user_id, name, email, number, hotel, roomType, 	check_in, check_out, adults, childs) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
		$book_room->execute([$booking_id, $user_id, $name, $email, $number, $hotel, $roomType, $check_in, $check_out, $adults, $childs]);
		$success_msg[] = 'Room booked successfully!';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>One Day travel Room</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="style.css">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<style>
input[type=text], input[type=date] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 1.5rem;
}
select{
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 1.5rem;
}	
label {
  margin-bottom: 10px;
  display: block;
  font-size: 2rem;
}
h3, h4{
	font-size: 3rem;

}
.image{
   flex: 1 1 40rem;
}	
.image img{
   height: 20rem;
   width: 20rem;
   border-radius: 50%;
   object-fit: cover;
}	
</style>
</head>
<body>
<?php 
	include('selectionTab.html');
	include('slideshowS.html');
?>

<!-- reservation section starts  -->
<div class="payment">
  <div class="col-75">
	<div class="paycontainer">
	  <form action="" method="post">
		<div class="payment">
		  <div class="col-50"><br>
			<h3 style="font-size: 3rem;">Billing Address</h3><br><br>
			<!-- it will return the value user entered to the database -->
			<label for="fname">Full Name</label>
			<input type="text" name="name" placeholder="Lily S. Marine">
			<label for="email">Email</label>
			<input type="text" name="email" placeholder="lily@example.com">
			<label for="number">Phone Number</label>
			<input type="text" name="number" placeholder="016789237">
			<label for="hotel-select">Hotel Location:</label>
			<!-- hotel-select return the value user select to the script -->
			<select id="hotel-select" name="hotel" required>
			  <option value="" disabled selected>-- Please select --</option>
			  <option value="1">Lily Hotel, Penang</option>		  
			  <option value="2">Rose Hotel, Melaka</option>
			  <option value="3">Daisy Hotel, Langkawi Island</option>
			  <option value="4">Hibiscus Hotel, Kuala Lumpur</option>
			  <option value="5">Chrysanthemum Hotel, Johor</option>
			</select>
			<label for="room-select">Room type:</label>
			<!-- room-select return the value user select to the script -->
			<!-- include the updateTotal() function in the script -->
			<select id="room-select" name="roomType" onchange="updateTotal()">
			  <option value="" disabled selected>-- Please select --</option>
			  <option value="350">Single bed Without Anda travel package - RM350</option>
			  <option value="550">Single bed With Anda travel package - RM550</option>
			  <option value="650">King-sized bed Without Anda travel package - RM650</option>
			  <option value="750">King-sized bed With Anda travel package - RM750</option>
			</select>
			<label for="check_in">Check in:</label>
			<!-- the date is fixed the minimum date as today date and max date as 31/5 -->
			<input type="date" min="<?= date('Y-m-d') ?>" max="2023-05-31" name="check_in" class="input" required>
			<label for="check_out">Check out:</label>
			<input type="date" min="<?= date('Y-m-d') ?>" max="2023-05-31" name="check_out" class="input" required>
			<label for="adults">Adults:</label>
			<!-- adults return the value user select to the script -->
			   <select id="adults" name="adults" class="input" required>
				<option value="1">1 adult</option>
				<option value="2">2 adults</option>
				<option value="3">3 adults</option>
			</select>
			<label for="childs">Childs:</label>
			<!-- childs return the value user select to the script -->
			<select id="childs" name="childs" class="input" required>
				<option value="0">0 child</option>
				<option value="1">1 child</option>
				<option value="2">2 children</option>
			</select>
		  </div>

		  <div class="col-50"><br>
			<h3>Payment</h3><br><br>
			<label for="fname">Accepted Cards</label>
			<div class="icon-container">
			  <i class="fa fa-cc-visa" style="color:navy;"></i>
			  <i class="fa fa-cc-amex" style="color:blue;"></i>
			  <i class="fa fa-cc-mastercard" style="color:red;"></i>
			  <i class="fa fa-cc-discover" style="color:orange;"></i>
			</div>
			<label for="cname">Name on Card</label>
			<input type="text" id="cname" name="cardname" placeholder="John More Doe">
			<label for="ccnum">Credit card number</label>
			<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
			<label for="expmonth">Exp Month</label>
			<input type="text" id="expmonth" name="expmonth" placeholder="September">
			<label for="expyear">Exp Year</label>
			<input type="text" id="expyear" name="expyear" placeholder="2025">
			<label for="cvv">CVV</label>
			<input type="text" id="cvv" name="cvv" placeholder="352">
		  </div>
		</div>
		  <div class="col-50"><br><br><br><br>
		<!-- submit button -->
		<input type="submit" name="book" value="Book Now" class="btn"><br><br>
	  </form>
	</div>
	</div>
	</div>

	<div id="order" class="col-25">
		  <div class="paycontainer">
			<h4>One Day Travel Room
			  <span class="price" style="color:black"></span>
			  </h4><br>
			<div class="image">
			<img src="Pictures/RoomPenang.jpg"></div><br><br>
			<!-- id: hotel-location display what the user have selected --> 
			<p style="font-size: 2rem;">Hotel Location: <b><span id="hotel-location"></span></b></p><br>
			<!-- id: room-type display what the user have selected -->
			<p style="font-size: 2rem;">Room Type: <b><span id="room-type"></span></b></p><br><br>
			 <div class="price-container">
			  <label for="currency-select">Currency:</label>
			  <!-- currency-select return the value user select to the script -->
			  <!-- include the updateTotal() function in the script -->
			  <select id="currency-select" name="currency" onchange="updateTotal()">
				<option value="myr">RM</option>
				<option value="usd">USD</option>
				<option value="rmb">RMB</option>
			  </select>
			  <!-- id: total-price display the price based on user selection -->
			  <label>Total price:   <spa id="total-price"></span></label>
			</div>
		  </div>
		</div>
	  </div>
  </div>
</div>
</form>
<!-- reservation section ends -->
<script>
//Java script for controling and storing user selection
const hotelSelect = document.getElementById("hotel-select");
const hotelLocation = document.getElementById("hotel-location");
const roomSelect = document.getElementById("room-select");
const roomType = document.getElementById("room-type");
var adultsSelect = document.getElementById('adults');
var childsSelect = document.getElementById('childs');
	
// To get the changes on the hotel dropdown
hotelSelect.addEventListener("change", () => {
const value = parseInt(hotelSelect.value);// Get the selected option value
//return the text follow by what user select
switch (value) {
  case 1:
	hotelLocation.textContent = "Lily Hotel, Penang";
	break;
  case 2:
	hotelLocation.textContent = "Rose Hotel, Melaka";
	break;
  case 3:
	hotelLocation.textContent = "Daisy Hotel, Langkawi Island";
	break;
  case 4:
	hotelLocation.textContent = "Hibiscus Hotel, Kuala Lumpur";
	break;
  case 5:
	hotelLocation.textContent = "Chrysanthemum Hotel, Johor";
	break;
  default:
	hotelLocation.textContent = "";
	break;
}
});
	
// To get the changes on the room type dropdown
roomSelect.addEventListener("change", () => {
const value = parseInt(roomSelect.value);// Get the selected option value
//return the text follow by what user select
switch (value) {
  case 350:
	roomType.textContent = "Single bed room without Anda Travel Package";
	break;
  case 550:
	roomType.textContent = "Single bed room with Anda Travel Package";
	break;
  case 650:
	roomType.textContent = "King-sized bed room without Anda Travel Package";
	break;
  case 750:
	roomType.textContent = "King-sized bed room with Anda Travel Package";
	break;
  default:
	roomType.textContent = "";
	break;
}
});

//to calculate the total price based on different currency
function updateTotal() {
  // Get the selected option value
  var roomSelect = document.getElementById("room-select");
  var currencySelect = document.getElementById("currency-select");
  var price = parseFloat(roomSelect.options[roomSelect.selectedIndex].value);
  var currency = currencySelect.options[currencySelect.selectedIndex].value;
  var total = document.getElementById("total-price");
  var displayPrice = "";
  
  if (currency === "usd") {
    displayPrice = "$" + (price * 0.22).toFixed(2);
  } 
	else if (currency === "rmb") {
    displayPrice = "¥" + (price * 1.55).toFixed(2);
  } 
	else {
    displayPrice = "RM" + price.toFixed(2);
  }
  
  total.innerHTML = displayPrice;
}

// To change the adults select element
adultsSelect.addEventListener('change', function() {
   // Get the selected option value
   var selectedValue = parseInt(adultsSelect.value);

   // Reset the child options
   childsSelect.selectedIndex = 0;
   childsSelect.disabled = false;

   // Set the child options based on the selected adult value
   if (selectedValue == 1) {
      // 1 adult: 0, 1, or 2 childs
	   childsSelect.selectedIndex = 0;
	   childsSelect.options[2].disabled = false;
   } 
   else if (selectedValue == 2) {
      // 2 adults: 0 or 1 child
	  childsSelect.selectedIndex = 0;
      childsSelect.options[2].disabled = true;
   } 
   else if (selectedValue == 3) {
      // 3 adults: 0 child
      childsSelect.selectedIndex = 0;
      childsSelect.disabled = true;
   }
});
	
/* Reference: https://stackoverflow.com/questions/74072613/how-to-set-current-date-as-the-min-date-on-below-code*/
// Get the check-in and check-out input elements
var checkInInput = document.getElementsByName('check_in')[0];
var checkOutInput = document.getElementsByName('check_out')[0];

// Attach a change event listener to the check-in input element
checkInInput.addEventListener('change', function() {
	// Get the selected check-in date
	var checkInDate = new Date(checkInInput.value);

	// Set the minimum check-out date to the selected check-in date
	var minCheckOutDate = new Date(checkInDate.getTime() + 24 * 60 * 60 * 1000);//hours, minutes, seconds, and milliseconds in a day
	checkOutInput.min = minCheckOutDate.toISOString().slice(0,10);//date portion in the format "YYYY-MM-DD"
});

// Attach a change event listener to the check-out input element
checkOutInput.addEventListener('change', function() {
	// Get the selected check-out date
	var checkOutDate = new Date(checkOutInput.value);

	// Set the maximum check-in date to the selected check-out date
	var maxCheckInDate = new Date(checkOutDate.getTime() - 24 * 60 * 60 * 1000);
	checkInInput.max = maxCheckInDate.toISOString().slice(0,10);
});
</script>
<?php 
	include('footer.html');
	include 'message.php';
?>
</body>
</html>