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
