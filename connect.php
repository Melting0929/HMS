<!--Database Connection-->
<?php
	//Establish connect to the database called 'hotel', username='root', password=''
   $db_name = 'mysql:host=localhost;dbname=hotel';
   $db_user_name = 'root';
   $db_user_pass = '';

   $conn = new PDO($db_name, $db_user_name, $db_user_pass);

?>