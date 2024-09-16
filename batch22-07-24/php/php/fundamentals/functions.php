<?php
declare(strict_types=1);

// function SUM(int $a, int $b)
// {

//  return $a + $b;
// }










// $greet = function ($name) {

//  var_dump($name);


// };




// $greet("WORLD");





// echo SUM(2, 5);


// $a=1;
// $b=2;

// $abc = fn()=>  $a + $b ;
// echo $abc();


// $a = 10;
// function display()
// {
//  global $a;
//  $b = 7;

//  return $b;
// }
// // http://localhost/phpmyadmin/

// $ewqewq= display();

// echo $ewqewq;




/**
 
primary key
secondary key 
composite key 
foreign key
COMPOUND KEY 


normalization
javascript 
vue js 
livewire 
laravel with  vue js

 1st nf
2nd
3rd 
4th
5th
 */
?>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <style>
  form{
   display: flex;
   flex-wrap: wrap;
   flex-direction: column;
   align-items: center;
  }
  form>input{
   flex:1;
   padding: .3rem;
   font-family: Arial, Helvetica, sans-serif;
   margin: 3px 0px 10px 0px;
  }

 
 </style>
</head>

<body>

 <form action="javascript:void(0)" name="Myform"  method="post">

  <label for="userName"> ENTER TASK NAME</label>
  <input type="text" id="userName" name="user_name">

  <button type="button" id="btn">
   ADD TASK
  </button>

 </form>


 <div id="res"></div>

 <script src="./function.js"></script>
</body>

</html>