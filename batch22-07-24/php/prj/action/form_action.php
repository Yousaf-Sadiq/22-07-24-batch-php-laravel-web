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

  } else {
    success_msg("FILE HAS BEEN UPLOADED");
    // pre($file);
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

  $input_file = "images";



  $status = [
    "error" => 0,
    "msg" => []
  ];





  if (isset($_FILES[$input_file]["name"]) && !empty($_FILES[$input_file]["name"])) {


    $file_ext = ["png", "jpg"];


    $file = file_upload("images", $file_ext, "assets/upload/");




    // if extension prob occurs 
    if ($file == 1) {

      $a = implode(" ", $file_ext);  // array to string conversion 
      $a = strtoupper($a);


      $status["error"]++;
      array_push($status["msg"], "{$a}  ONLY ALLOWED");
    }




    if ($file == 10) {
      $status["error"]++;
      array_push($status["msg"], "File uploading error");
    }

    // JSON => javascript object notation 


    $file = json_encode($file);

  }

  /**
   

  one to one
  
  one to many 

  many to many 
 
  many to one 
   */



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





    $check_address = "SELECT * FROM `" . ADDRESS . "` WHERE `user_id`='{$user_id}'";

    $check_address_exe = conn->query($check_address);


    $output = "";
    $address_id = null;

 //  if file is uploading 
    if (isset($_FILES[$input_file]["name"]) && !empty($_FILES[$input_file]["name"])) {
      if ($check_address_exe->num_rows > 0) {
        // update
  
        $address_insert = "UPDATE `" . ADDRESS . "`  SET  
          `images`='{$file}' , `address`='null' , `contact_info`='null'
          WHERE `user_id`='{$user_id}'
        ";
  
  
  
        $address_insert_exe = conn->query($address_insert);
  
  
        if ($address_insert_exe) {
  
          if (conn->affected_rows > 0) {
            $output = true;
  
  
  
          }
        } else {
          $output = false;
        }
  
        $fetch = $check_address_exe->fetch_assoc();
  
        $address_id = $fetch["id"];
  
  
      } else {
  
        // insert
  
        $address_insert = "INSERT INTO `" . ADDRESS . "`  (`images`,`address`,`contact_info`,`user_id`) 
          VALUES ('{$file}','none','null','{$user_id}')";
  
  
  
        $address_insert_exe = conn->query($address_insert);
  
  
        if ($address_insert_exe) {
  
          if (conn->affected_rows > 0) {
            $output = true;
          }
        } else {
          $output = false;
        }
  
        $address_id= conn->insert_id;
  
      }
  
    }
    //  if file is not upload 
    else{

      if ($check_address_exe->num_rows > 0) {
        // update
  
        $address_insert = "UPDATE `" . ADDRESS . "`  SET  
         `address`='null' , `contact_info`='null'
          WHERE `user_id`='{$user_id}'
        ";
  
  
  
        $address_insert_exe = conn->query($address_insert);
  
  
        if ($address_insert_exe) {
  
          if (conn->affected_rows > 0) {
            $output = true;
  
  
  
          }
        } else {
          $output = false;
        }
  
        $fetch = $check_address_exe->fetch_assoc();
  
        $address_id = $fetch["id"];
  
  
      } else {
  
        // insert
  
        $address_insert = "INSERT INTO `" . ADDRESS . "`  (`address`,`contact_info`,`user_id`) 
          VALUES ('none','null','{$user_id}')";
  
  
  
        $address_insert_exe = conn->query($address_insert);
  
  
        if ($address_insert_exe) {
  
          if (conn->affected_rows > 0) {
            $output = true;
          }
        } else {
          $output = false;
        }
  
        $address_id= conn->insert_id;
  
      }

    }




    $update_q = "UPDATE `" . USER . "` SET  `user_name`='{$user_name}' 
     , `email`='{$email}', `password`='{$pasword}', `ptoken`='{$encrpyt}',
     `address_id`='{$address_id}'
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