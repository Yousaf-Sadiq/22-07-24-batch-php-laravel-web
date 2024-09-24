<?php
declare(strict_types=1);


trait Inserts
{

 public function inserts(string $table, array $data)
 {

  $status = [
   "error" => 0,
   "msg" => []
  ];
  if ($this->CheckTable($table)) {

   $col = array_keys($data);  // array 


   $val = array_values($data); // array 




   //   convert array to string
   $col = "( `" . implode("` , `", $col) . "` )";




   $val = "( '" . implode("' , '", $val) . "' )";


   $this->query = "INSERT INTO  `{$table}` {$col}  VALUES {$val}";

   $this->exe = $this->conn->query($this->query);


   if ($this->exe) {
    if ($this->conn->affected_rows > 0) {
     $status["msg"][] = "DATA HAS BEEN INSERTED";

    }
   }











  } else {
   $status["msg"][] = ["table is not existed"];
  }

  return json_encode($status);

 }


}

?>