/**
 
default/normal function with no return
default/normal function with  return

parameter/argument function with  return
parameter/argument function with  no return

anonymous  function with return 
anonymous  function with no return

arrow function with return
arrow function with no return

 */

function SUM(x, y) {
  let a = x;
  let b = y;

  let z = a + b;

  return z;
}

console.log(SUM(2, 4));
console.log(SUM(12, 4));
console.log(SUM(12, 5));

let u = (a, b) => {
  console.log("anonymous function called");
};

function CheckValue(a) {
  let output = "";
  
  if (a > 0) {
    output = "POSITIVE VALUE";
  } else {
    output = "NEGATIVE VALUE";
  }

  return output;
  
}



console.log(CheckValue(-5))
