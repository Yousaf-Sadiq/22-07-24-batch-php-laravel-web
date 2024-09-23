<?php
declare(strict_types=1);



$a = 19;

$a = 10;


// class A
// {
//  public function __construct()
//  {
//   echo "constructor called of A class<br>";
//  }
//  public function display()
//  {
//   echo "class A display function called<br>";
//  }

// }

// //  derived => child 
// //  base => parent 
// class B extends A
// {
//  public function __construct()
//  {

//   echo "constructor called of B class<br>";
//   parent::__construct();
//  }
//  public function display()
//  {

//   parent::display();
//   echo "class B display function called<br>";
//  }
// }





abstract class BASE
{
 protected $name;

 abstract public function calculate();

 // abstract public function Avg(); 



}

interface Q{
  public function display();
  public function Avg();
}



interface CommonFunction
{
 public function calculate();
}





class derived extends BASE implements CommonFunction,Q 
{

 public function calculate()
 {
  echo " calculate function";
 }
 public function display()
 {
  echo " display function";
 }
 public function Avg()
 {
  echo " avg function";
 }

}
// 1 . we can treat abstract  as an normal class but we can create an object of this class 




class b implements CommonFunction,Q
{
 public function calculate()
 {
  echo " calculate function";
 }
 public function display()
 {
 }
 public function Avg()
 {
 }

}
// $t = new BASE;

// $t->display();


?>