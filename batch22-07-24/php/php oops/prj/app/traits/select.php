<?php

trait Select
{

 public function select(string $table, string $row = null, string $WHERE = null, string $orderBY = null, string $limit = null, bool $numRow = false)
 {
  /*
  SELECT colName| *  FROM `table_name`

  SELECT colName| *  FROM `table_name` WHERE col

  SELECT colName| *  FROM `table_name` WHERE col  ORDERBY DESC

  SELECT colName| *  FROM `table_name` WHERE col  ORDERBY DESC limit 10 3


   foreign keys 
   
   INNER JOIN /JOIN
   FULL JOIN
   OUTER JOIN 
   LEFT JOIN 
   RIGHT JOIN 
  */
  if ($this->CheckTable($table)) {



   if ($row == null) {
    $row = "*";
   }


   $this->query = "SELECT {$row} FROM `{$table}`";


   if ($WHERE != null) {
    $this->query .= " WHERE {$WHERE}";
   }



   if ($orderBY != null) {
    $this->query .= " ORDERBY {$orderBY}";
   }


   if ($limit != null) {
    $this->query .= " LIMIT {$limit}";
   }


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


}



?>