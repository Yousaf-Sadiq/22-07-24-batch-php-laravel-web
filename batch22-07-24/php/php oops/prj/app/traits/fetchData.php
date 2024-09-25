<?php

trait FetchData
{
 public function getResult()
 {

  $this->result = [];

  while ($row = $this->exe->fetch_assoc()) {

   array_push($this->result, $row);
  }


  return $this->result;

 }
}

?>