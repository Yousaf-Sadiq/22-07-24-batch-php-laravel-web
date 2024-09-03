<?php
declare(strict_types=1);


if (!function_exists("filterData")) {

 function filterData(string $data)
 {


  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  $data = conn->escape_string($data);


  return $data;

 }

}


if (!function_exists("error_msg")) {

 function error_msg(string $msg)
 {
  echo "<div class='container p-0 justify-content-center alert alert-danger d-flex align-items-center' role='alert'>
  <svg style='width:11%' class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
  <div>
    {$msg}
  </div>
</div>";
 }

}


if (!function_exists("success_msg")) {
 function success_msg(string $msg){
echo "<div class='container'>
<div class='alert alert-success d-flex align-items-center' role='alert'>
  <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
  <div>
    {$msg}
  </div>
</div>
</div>";
 }
}


if (!function_exists("pre")) {
 function pre(array $a)
 {
  echo "<pre>";
  print_r($a);
  echo "</pre>";
 }
}


if (!function_exists("refresh_url")) {
 function refresh_url(float $sec, string $url){
  
   header("Refresh:{$sec},url={$url}");
 }
}
?>