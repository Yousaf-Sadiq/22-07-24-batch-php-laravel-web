<?php
namespace layout\user\trait_static;
// traits 
// namespace 
// static methods and variable


trait getter
{

 public function display()
 {
  echo "display function called in trait getter";
 }
}


trait  u
{
 public static function display()
 {
  echo "display function called in trait U";
 }
}

class A
{

 use getter, u {
  getter::display insteadof u;
  u::display as display2;
 }
}




// $a = new A;

// $a->display();

A::display2();

// $t = new A;
// $y = new A;

// A::$a=6;

// A::display();


?>