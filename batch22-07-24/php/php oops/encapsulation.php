<?php
declare(strict_types=1);
// object oriented programming 

// class 
// object

/**
 * 
 1. Encapsulation 
 2. inheritance 
 3. polymorphism
 4. abstraction  
  

 */


class AreaOfRectangle
{

 //  access modifier 
//  public private protected 
 private $a;
 private $b;


 //  setter and getter 

 public function SetA(float $x, float $y)
 {
  $this->a = $x;
  $this->b = $y;
 }


 public function Calculate()
 {
  $z = $this->a * $this->b;
  return $z;
 }
}





$q = new AreaOfRectangle;

$q->SetA(8,5);

echo $q->Calculate();

$q->SetA(5,5);

echo $q->Calculate();

// echo $u->a =" $ u value";

// echo "<br>";


// echo $t->a;





?>