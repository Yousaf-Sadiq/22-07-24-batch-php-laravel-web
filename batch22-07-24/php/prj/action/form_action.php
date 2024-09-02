<?php
require_once dirname(__DIR__) . "/layouts/user/header.php";


/**
  super global variable 
 
  1. $_POST[]
  2. $_GET[]
  3. $_FILES[]
 
  
  4. $_REQUEST[]
  5. $_SERVER[]
  
  6. $_SESSION[]
  7.$_COOKIES[]

 */

?>

<?php

// insert form 
if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {

 $email = filterData($_POST["email"]);

 $user_name = filterData($_POST["user_name"]);

 $pswd = filterData($_POST["pswd"]);


}


?>



<?php
require_once dirname(__DIR__) . "/layouts/user/footer.php";

?>