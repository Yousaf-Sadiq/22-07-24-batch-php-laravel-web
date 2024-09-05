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

// upload 

if (isset($_POST["uploads"]) && !empty($_POST["uploads"])) {
  $file_ext = ["png", "jpg"];


  $file = file_upload("images", $file_ext, "assets/upload/");


  if ($file == 1) {
    $a = implode(" ", $file_ext);  // array to string conversion 
    $a = strtoupper($a);
    error_msg("{$a} ONLY ALLOWED");
  }


  if ($file == false) {
    
  }
  else{
    success_msg("FILE HAS BEEN UPLOADED");
    pre($file);
  }
  // if (function  == 1) {
  //   # code...
  // }
  // $file = $_FILES["images"];

  // pre($file);


  // $file_name = rand(1, 99) . "_" . $file["name"];

  // $tmp_name = $file["tmp_name"];

  // $ext = pathinfo($file_name, PATHINFO_EXTENSION);

  // $file_ext = ["png", "jpg"];

  // if (!in_array($ext, $file_ext)) {

  //   $a = implode(" ", $file_ext);  // array to string conversion 
  //   $a = strtoupper($a);
  //   error_msg("{$a} ONLY ALLOWED");

  //  refresh_url(2,DASHBOARD);

  //  return;
  // }





  // $dest = rel_url . "/assets/upload/" . $file_name;





  // if (move_uploaded_file($tmp_name, $dest)) {
  //   success_msg("FILE HAS BEEN UPLOADED");
  // } else {
  //   error_msg("FILE ERROR");
  // }

  //   relative path  uploading or removing

  //  abs path display/show

}



// insert form 
if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {

  $email = filterData($_POST["email"]);

  $user_name = filterData($_POST["user_name"]);

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

  if (!isset($user_name) || empty($user_name)) {

    $status["error"]++;

    array_push($status["msg"], "USER NAME IS REQUIRED");

  }

  if (!isset($pswd) || empty($pswd)) {

    $status["error"]++;

    array_push($status["msg"], "PASSWORD IS REQUIRED");

  }

  // check email =============================================================

  $check = "SELECT * FROM `" . USER . "` WHERE `email`='{$email}'";

  $check_exe = conn->query($check);

  if ($check_exe->num_rows > 0) {

    $status["error"]++;

    array_push($status["msg"], "EMAIL ALREADY TAKEN");
  }

  // =======================================================

  if ($status["error"] > 0) {

    foreach ($status['msg'] as $value) {

      error_msg($value);
    }


    refresh_url(2, DASHBOARD);

  } else {

    $pasword = password_hash($pswd, PASSWORD_BCRYPT);

    $encrpyt = base64_encode($pswd);


    $insert_q = "INSERT INTO `" . USER . "`( `user_name`, `email`, `password`, `ptoken`) 

     VALUES ('{$user_name}','{$email}','{$pasword}','{$encrpyt}')";

    $insert_exe = conn->query($insert_q);

    if ($insert_exe) {

      if (conn->affected_rows > 0) {
        success_msg("DATA HAS BEEN INSERTED");
      } else {
        error_msg("DATA HAS NOT BEEN INSERTED");
      }


    } else {
      error_msg("ERROR IN QUERY {$insert_q}");
    }


    refresh_url(3, DASHBOARD);
  }



}



// update form 
if (isset($_POST["updates"]) && !empty($_POST["updates"])) {

  $email = filterData($_POST["email"]);

  $user_name = filterData($_POST["user_name"]);

  $pswd = filterData($_POST["pswd"]);

  $user_id = filterData(base64_decode($_POST["_token"]));



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

  if (!isset($user_name) || empty($user_name)) {

    $status["error"]++;

    array_push($status["msg"], "USER NAME IS REQUIRED");

  }

  if (!isset($pswd) || empty($pswd)) {

    $status["error"]++;

    array_push($status["msg"], "PASSWORD IS REQUIRED");

  }

  // check email =============================================================

  $check = "SELECT * FROM `" . USER . "` WHERE `email`='{$email}' AND `id`<>'{$user_id}'";

  $check_exe = conn->query($check);

  if ($check_exe->num_rows > 0) {

    $status["error"]++;

    array_push($status["msg"], "EMAIL ALREADY TAKEN");
  }

  // =======================================================

  if ($status["error"] > 0) {

    foreach ($status['msg'] as $value) {

      error_msg($value);
    }

    refresh_url(2, DASHBOARD);

  } else {

    $pasword = password_hash($pswd, PASSWORD_BCRYPT);

    $encrpyt = base64_encode($pswd);


    $update_q = "UPDATE `" . USER . "` SET  `user_name`='{$user_name}' 
     , `email`='{$email}', `password`='{$pasword}', `ptoken`='{$encrpyt}' 
     WHERE `id`='{$user_id}'
     ";


    $insert_exe = conn->query($update_q);

    if ($insert_exe) {

      if (conn->affected_rows > 0) {
        success_msg("DATA HAS BEEN UPDATED");
      } else {
        error_msg("DATA HAS NOT BEEN UPDATED");
      }


    } else {
      error_msg("ERROR IN QUERY {$update_q}");
    }


    refresh_url(3, DASHBOARD);
  }



}

?>



<?php
require_once dirname(__DIR__) . "/layouts/user/footer.php";

?>