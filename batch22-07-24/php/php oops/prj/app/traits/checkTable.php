<?php
declare(strict_types=1);
trait CheckTable
{

 public function CheckTable(string $table): bool
 {

  $this->query = "SELECT * 
  FROM information_schema.tables
  WHERE table_schema = '{$this->db}' 
      AND table_name = '{$table}'
  LIMIT 1";

  $this->exe = $this->conn->query($this->query);

  if ($this->exe) {

   if ($this->exe->num_rows > 0) {
    return true;
   } else {
    return false;
   }


  } else {

  }



 }
}


?>