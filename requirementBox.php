<!-- Requirement Box -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>requirementBox</title>
</head>
<body>
<?php
require('connect.php');
//if user click the check availability button
if(isset($_POST['check'])){
	$hotel = $_POST['hotel'];
	$hotel = filter_var($hotel, FILTER_SANITIZE_NUMBER_INT);
	//if user select the hotel 
	if($hotel == 1 || $hotel == 3)
	{
		// Redirect to the specific room sorted page
		header("Location: Room(Beach).php");
		exit();
	}
	elseif($hotel == 2 || $hotel == 4 || $hotel == 5)
	{
		header("Location: Room(City).php");
		exit();
	}
}
?>
	
<?php
$today = date('Y-m-d');
$nextYear = date('Y-m-d', strtotime('+1 year'));
?>

<!-- requirement box section start -->
<section class="availability" id="availability">
	<form action="" method="post">
		<div class="flex">
			<div class="box">
				<p>Check in <span>*</span></p>
				<input type="date" min="<?= $today ?>" max="<?= $nextYear ?>" name="check_in" class="input" required>
			</div>
			<div class="box">
				<p>Check out <span>*</span></p>
				<input type="date" min="<?= $today ?>" max="<?= $nextYear ?>" name="check_out" class="input" required>
			</div>
			<div class="box">
				<p>Adults <span>*</span></p>
				<select id="adults" name="adults" class="input" required>
					<option value="1">1 adult</option>
					<option value="2">2 adults</option>
					<option value="3">3 adults</option>
				</select>
			</div>
			<div class="box">
				<p>Children <span>*</span></p>
				<select id="childs" name="childs" class="input" required>
					<option value="0">0 child</option>
					<option value="1">1 child</option>
					<option value="2">2 children</option>
				</select>            
			</div>
			<div class="box">
			<p>Hotel Location <span>*</span></p>
			<select name="hotel" class="input" required>
			<option value="" disabled selected>Find a Hotel</option>
			<option value="1">Lily Hotel, Penang</option>
			<option value="2">Rose Hotel, Melaka</option>
			<option value="3">Daisy Hotel, Langkawi Island</option>
			<option value="4">Hibiscus Hotel, Kuala Lumpur</option>
			<option value="5">Chrysanthemum Hotel, Johor</option>
			</select>
	 </div>
  </div>
  <input type="submit" value="check availability" name="check" class="btn">
</form>
</section>
<!-- requirement box section end -->
<script>
// Get the adults and childs select elements
var adultsSelect = document.getElementById('adults');
var childsSelect = document.getElementById('childs');

// Attach a change event listener to the adults select element
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

// Set today's date as the minimum for check-in
var today = new Date();
var todayFormatted = today.toISOString().slice(0, 10); // "YYYY-MM-DD"
checkInInput.min = todayFormatted;
checkInInput.value = todayFormatted; // Optional

// Set default check-out date as one day after today
var defaultCheckOut = new Date(today.getTime() + 24 * 60 * 60 * 1000);
checkOutInput.min = defaultCheckOut.toISOString().slice(0, 10);
checkOutInput.value = defaultCheckOut.toISOString().slice(0, 10); // Optional

// Attach a change event listener to the check-in input element
checkInInput.addEventListener('change', function() {
	var checkInDate = new Date(checkInInput.value);
	var minCheckOutDate = new Date(checkInDate.getTime() + 24 * 60 * 60 * 1000);
	checkOutInput.min = minCheckOutDate.toISOString().slice(0,10);
});

// Attach a change event listener to the check-out input element
checkOutInput.addEventListener('change', function() {
	var checkOutDate = new Date(checkOutInput.value);
	var maxCheckInDate = new Date(checkOutDate.getTime() - 24 * 60 * 60 * 1000);
	checkInInput.max = maxCheckInDate.toISOString().slice(0,10);
});
	
</script>
</body>
</html>