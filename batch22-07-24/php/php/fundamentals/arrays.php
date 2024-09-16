<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
 <head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
   name="viewport"
   content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />

  <!-- Bootstrap CSS v5.2.1 -->
  <link
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
   rel="stylesheet"
   integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
   crossorigin="anonymous"
  />
 </head>

 <body class="container px-5">
 <?php


function pre(array $a)
{
 echo "<pre>";
 print_r($a);
 echo "</pre>";

}
// background_color  snake case  
// backgroundColor  camel case

$t=6;
?>
<h3> ORIGINAL ARRAY </h3>
<?php
$a = [1, 2, 3, 4, 5, 6, 7];
$length = count($a);
pre($a);

array_push($a, 999);

?>

<h1> AFTER PUSHING FUNCTION</h1>
<?php
pre($a);
?>

<h3> After   using unshift </h3>
<?php

array_unshift($a,"HELLO WORLD!");
pre($a);
?>
<h3> SPLICE FUNCTION </h3>
<?php 
$t=[1,2,3,4,5];
$c= array_splice($t,3,0,"hello WORD");
pre($t);



?>

<h3> ASSOCIATIVE ARRAY </h3>
<?php

$y= [
 "name"=>"XYZ",
 "ADDRESS"=> "XYZ_ADDRESS"
];

// let y = {
//  name:"XYZ"
// }

pre($y);

foreach ($y as $i=>$q) {
 # code...
echo "{$i} : {$q} <br>";
}

?>
  <!-- Bootstrap JavaScript Libraries -->
  <script
   src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
   integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
   crossorigin="anonymous"
  ></script>

  <script
   src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
   integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
   crossorigin="anonymous"
  ></script>
 </body>
</html>
