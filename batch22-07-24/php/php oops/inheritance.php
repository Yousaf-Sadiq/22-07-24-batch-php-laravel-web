<?php
declare(strict_types=1);

// single level inheritance 

class A
{

 protected $name;
 protected $age;




}

class AreaOfRectangle extends A
{

}


//  method overloading 
//  method overriding  

class B extends A
{

 public function SetName(string $a)
 {
  $this->name = $a;
 }
 public function __construct()
 {
  $this->name = "Default";
  $this->age = "no define";
 }


//  function __call($name_of_function, $arguments) {
             
//   // It will match the function name
//   if($name_of_function == 'area') {
       
//       switch (count($arguments)) {
               
//           // If there is only one argument
//           // area of circle
//           case 1:
//               return 3.14 * $arguments[0];
                   
//           // IF two arguments then area is rectangle;
//           case 2:
//               return $arguments[0]*$arguments[1];
          
//       }
//   }



// }

 public function SUM(int $a,int $b,int $c){

 }








 public function SetAge(int $b)
 {
  $this->age = $b;
 }


 public function GetAge(): int
 {
  return $this->age;
 }



 public function GetName(): string
 {
  return $this->name;
 }


 public function __destruct()
 {
  echo "<br>destructor called  in class b<br>";
 }

}




$t = new B;

// $t->SetAge(23);
// $t->SetName("XYZ");


echo $t->GetName();

?>