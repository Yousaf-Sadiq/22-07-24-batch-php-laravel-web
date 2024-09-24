<?php
declare(strict_types=1);
namespace App\database;

require_once dirname(__FILE__) . "/traits/checkTable.php";
require_once dirname(__FILE__) . "/traits/insert.php";
require_once dirname(__FILE__) . "/traits/Mysql.php";

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




 use \CheckTable, \Inserts,\Mysql;


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
}





?>