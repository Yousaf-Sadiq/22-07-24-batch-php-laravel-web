<?php

trait Mysql
{

 public function Mysql(string $query, bool $numRow = false)
 {
  $this->query = $query;

  $this->exe = $this->conn->query($this->query);

  if ($this->exe) {


   if ($numRow) {

    if ($this->exe->num_rows > 0) {
     return true;
    } else {
     return false;
    }
   }


   return true;
  } else {
   return false;
  }
 }

}
?>