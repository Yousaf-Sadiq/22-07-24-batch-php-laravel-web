/**
 *
 * index/range/address array
 * object/associative array
 * []
 */

let h1 = document.querySelector("#abc");
let h3 = document.querySelector("#abc2");

let a = [12, 34, 333, 55, 123, 453, 5434, 31, 54, 675, 87634, 43243265];

let b = ["hello", "world", "abc"];

//  by using of concatination method of array
// let c= a.concat(b);
//  spread operator

function getLastEle(arr) {
  let q = arr;

  let q_LENGTH = q.length;

  let range = q_LENGTH - 1;

  let lastEle = q[range];

  let output = `last element value ${lastEle} and it's index is : ${range}`;

  return output;
}

// ysk96881@gmail.com

// console.log(getLastEle(a));
h1.innerHTML = getLastEle(a);

// Find the last element of an array without giving a hard-coded index.

// Check whether the first or the last index of an array
// has a specified value, let's say 5.
// Make an array to store the names of students and check

// whether that array has your own name or not and also return
// the index of that value.

// Add the array element at the specified index.

let c = [...a, ...b];
// console.log(c);

let a_length = a.length;

let range = a_length - 1;

// console.log(a_length);
// console.log(range);

// let q = a.indexOf(677); // if not found then return -1

// let val = a[q];

// console.log(`old array`);
// console.log(a);

let valueIndex = a.indexOf(55);

let a_length2 = valueIndex + 1; // converting to length

let newArr = a.slice(0, a_length2);

// a.splice(valueIndex);

// console.log(valueIndex)

// a.push("abc"); is used to insert at end of the array

// console.log("new array");
// console.log(a);

// console.log(`index of this value (${val}) is : ${q}`);

// a.unshift("abc") ; //is used to insert element at the starting point of array

// a.pop();   //is use to remove the element at the end of the array

// a.shift(); //is use to remove the element at the starting point of the array

// console.log("new array");
// console.log(newArr);

// console.log(q);

// multi dimentional array

// let t = [1, 2, 3, 4, 5, 6, 7, 8, 9, ["Hello", "world"]];
let t = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// console.log(typeof t)

let t_length = t.length;

let r_index = t_length - 1;

console.log(t);

// console.log(t[9][1]);

// i = i + 1;

// for(let i=0; i < t_length; i++){

// let html = "";

// let n = 115;

// let product = 1; // multiplicative identity

// for (let j = 1; j <= 10; j++) {

//   html += `${n} X ${j} = ${n * j} <br>`;

// }

// for(let i=0; i <= r_index; i++){

//   console.log(t[i]);
// //  html = html + t[i];
//   html += t[i]+"<br>";

// }

// h3.innerHTML = html;

/**
 
*
**
***
****
*****
******
*******


 */
let html = "";

for (let row = 1; row <= 7; row++) {
  for (let col = 1; col <= row; col++) {
    html += "*";
  }

  html += "<br>";
}

h3.innerHTML = html;

// let obj = {
//   "name": "XYZ",
//   "address":
// };
//  [1,2,4,]
let obj = [
  {
    name: "XYZ1",
    address: "abcAdderss",
    class: "XYZCLass",
    abc: function () {
      console.log("function called");
    },
  },
  {
    name: "XYZ2",
    address: "abcAdderss",
    class: "XYZCLass",
  },
  {
    name: "XYZ3",
    address: "abcAdderss",
    class: "XYZCLass",
  },
  {
    name: "XYZ4",
    address: "abcAdderss",
    class: "XYZCLass",
    abc: function () {
      console.log("function called");
    },
  },
];

console.log(obj[0].abc());

// Sum all the array elements by using a loop.

// Make a reverse of the array by using a loop.

// Find the largest number in an array by using a loop.
// Find the smallest number in an array by using a loop.
// Write a function that checks if a word is a palindrome (reads the same forwards and backward).
// Write a function to calculate the factorial of a given number.

// Write a function that determines whether a given number is prime or not.

// Print numbers from 1 to 100,
// but for multiples of 3 print "Fizz",
// for multiples of 5, print "Buzz"
// and for numbers that are multiples of both 3 and 5 print "FizzBuzz".

//  10!=> 1x 2 x 3 x 4 x 5

// MAM
function FindSum(arr) {
  if (typeof arr == "object") {
    let arr_length = arr.length;

    let total = 0;

    for (let i = 0; i < arr_length; i++) {
      // a =a +1;
      // total = total + arr[i];
      total += arr[i];
    }

    return total;
  } else {
    return false;
  }
}

t = 9;

if (FindSum(t) == false) {
  console.log("variable is not supportable");
} else {
  console.log(FindSum(t));
}

let u = [1, 2, 8998989, 9999999777, 9999 ];



for (let select = 0; select < u.length; select++) {
  let greater = true;

  for (let check = 0; check < u.length; check++) {
    if (select != check) {
      if (u[select] < u[check]) {
        greater = false;
        break;
      }
    }
  }


  if(greater == true){

    console.log(u[select])
  }


}
