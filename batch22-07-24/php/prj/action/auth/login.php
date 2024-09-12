<?php
require_once dirname(__DIR__) . "/../layouts/user/header.php";

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
if (isset($_POST["login"]) && !empty($_POST["login"])) {

  $email = filterData($_POST["email"]);

  // $user_name = filterData($_POST["user_name"]);

  $pswd = filterData($_POST["pswd"]);



  $status = [
    "error" => 0,
    "msg" => []
  ];



  // $status["msg"][]="EMAIL IS REQUIRED";
  if (!isset($email) || empty($email)) {

    $status["error"]++;

    array_push($status["msg"], "EMAIL IS REQUIRED");


  } else {
    //        T
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $status["error"]++;

      array_push($status["msg"], "EMAIL FORMAT INVALID");

    }
  }



  if (!isset($pswd) || empty($pswd)) {

    $status["error"]++;

    array_push($status["msg"], "PASSWORD IS REQUIRED");

  }


  if ($status["error"] > 0) {

    foreach ($status['msg'] as $value) {

      error_msg($value);
    }


    refresh_url(2, DASHBOARD);

  } else {

    $pasword = password_hash($pswd, PASSWORD_BCRYPT);

    $encrpyt = base64_encode($pswd);



    // check email =============================================================

    $check = "SELECT * FROM `" . USER . "` WHERE `email`='{$email}' AND `ptoken`='{$encrpyt}'";

    $check_exe = conn->query($check);

    if ($check_exe->num_rows > 0) {

      $row= $check_exe->fetch_assoc();


      $_SESSION["user_id"]=$row["id"];

      
      success_msg("login successfull");


    }

    // =======================================================



    refresh_url(3, DASHBOARD);
  }



}




?>



<?php
require_once dirname(__DIR__) . "/../layouts/user/footer.php";

?>