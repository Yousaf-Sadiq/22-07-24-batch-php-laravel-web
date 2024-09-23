<?php
require_once dirname(__DIR__) . "/app/database.php";

use App\database\DB as DB;

$r = new DB;

$t=[
"email"=>"xyz",
"password"=>"xyz@gmail.com",
"ptoken"=>1234
]; 


 $r->inserts("users",$t);


?>