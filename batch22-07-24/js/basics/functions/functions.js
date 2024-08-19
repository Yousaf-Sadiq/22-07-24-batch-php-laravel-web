//  normal/default function  with return
//  normal/default function  with not return

//  parameter/argument function with return
//  parameter/argument function with not return

// anynamous  function with return
// anynamous  function with no return

// arrow funciton with return
// arrow funciton with no return


function Sum(q, t) {
  let a = q;
  let b = t;

  let sum = a + b;
  // let sum = q + t;

  // console.log(sum);

  return sum;
}

console.log(Sum(5, 6));

//  call function , invoke function , activate function

function CheckPositiveNumber(t) {
  let a = t;

  if (a > 0) {
    return "positive number";
  } else if (a == 0) {
    return "0 is Neutral number";
  } else {
    return "negative number";
  }
}

CheckPositiveNumber(45);
CheckPositiveNumber(-45);
CheckPositiveNumber(0);
