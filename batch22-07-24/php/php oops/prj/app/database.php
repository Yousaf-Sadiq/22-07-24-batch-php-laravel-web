<?php
declare(strict_types=1);
namespace App\database;

require_once dirname(__FILE__) . "/traits/checkTable.php";
require_once dirname(__FILE__) . "/traits/insert.php";

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




 use \CheckTable,\Inserts;


 public function __destruct()
 {
  $this->conn->close();
 }

}







?>