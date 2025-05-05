<!-- Auth_Session page to confirm the login of the user to avoid re-login-->
<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: Login.php");
        exit();
    }
?>>