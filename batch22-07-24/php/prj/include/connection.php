<?php

// define("HOSTNAME","");

const HOSTNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DB = "crud_batch22_july";


// core php 
// const conn= mysqli_connect();


// php oops
const conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB);

if (conn) {
 // echo "ESTABLISHED";
} else {
echo conn->error;
}
?>