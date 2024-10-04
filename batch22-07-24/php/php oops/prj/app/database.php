<?php
declare(strict_types=1);
namespace App\database;

use Update;

require_once dirname(__FILE__) . "/traits/checkTable.php";
require_once dirname(__FILE__) . "/traits/insert.php";
require_once dirname(__FILE__) . "/traits/Mysql.php";
require_once dirname(__FILE__) . "/traits/select.php";
require_once dirname(__FILE__) . "/traits/fetchData.php";
require_once dirname(__FILE__) . "/traits/update.php";
require_once dirname(__FILE__) . "/traits/delete.php";

class DB
{

 private $host = "localhost";
 private $username = "root";
 private $pass = "";
 private $db = "crud_batch22_july";

 protected $conn;

 private $query;

 private $result = [];

 private $exe;

 public function __construct()
 {
  $this->conn = new \mysqli($this->host, $this->username, $this->pass, $this->db);

  // if ($this->conn) {
  //  echo "ESTABLISHED";
  // }
 }




 use \CheckTable, \Inserts, \Mysql, \Select, \FetchData,\Update,\Delete;


 public function __destruct()
 {
  $this->conn->close();
 }

}


class helper extends DB
{


 public function FilterData(string $data)
 {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = $this->conn->real_escape_string($data);
  return $data;
 }

 public function pre(array $a)
 {
  echo "<pre>";
  print_r($a);
  echo "</pre>";
 }

}





?>