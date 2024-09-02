<?php
declare(strict_types=1);


if (!function_exists("filterData")) {

 function filterData(string $data){


  $data = trim($data);
  $data = htmlspecialchars($data);
  $data=  stripslashes($data);
  $data = conn->escape_string($data);


  return $data;
  
 } 


}


?>