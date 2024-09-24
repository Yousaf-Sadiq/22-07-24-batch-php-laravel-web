<?php

require_once dirname(__DIR__) . "/../app/database.php";
require_once dirname(__DIR__) . "/../include/table.php";

use App\database\DB as DB;
use App\database\helper as help;

$help = new help();
$db = new DB();

if (isset($_POST["inserts"]) && !empty($_POST["inserts"])) {

 $email = $help->FilterData($_POST["email"]);
 $user_name = $help->FilterData($_POST["userName"]);
 $pswd = $help->FilterData($_POST["pswd"]);


 // --------------------------------------------------------------------
 $status = [
  "error" => 0,
  "msg" => []
 ];

 if (!isset($email) || empty($email)) {

  $status['error']++;
  array_push($status["msg"], "EMAIL IS REQUIRED");
 }

 if (!isset($user_name) || empty($user_name)) {
  $status['error']++;
  array_push($status["msg"], "USERNAME IS REQUIRED");
 }

 if (!isset($pswd) || empty($pswd)) {
  $status['error']++;
  array_push($status["msg"], "PASSWORD IS REQUIRED");
 }


 // check 

 $check = "SELECT * FROM `" . USER . "` WHERE `email`='{$email}'";
 $exe = $db->Mysql($check, true);

 if ($exe) {
  $status['error']++;
  array_push($status["msg"], "EMAIL ALREADY EXIST");

 }

 if ($status['error'] > 0) {
  echo json_encode($status);
  return;
 } else {


  $pasword = password_hash($pswd, PASSWORD_BCRYPT);
  $encrpt = base64_encode($pswd);

  $data = [
   "email" => $email,
   "user_name" => $user_name,
   "password" => $pasword,
   "ptoken" => $encrpt
  ];


  echo $db->inserts(USER, $data);

 }
}

?>