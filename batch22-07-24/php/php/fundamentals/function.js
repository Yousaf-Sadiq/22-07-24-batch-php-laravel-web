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

function CheckValue(a) {
  let output = "";

  if (a > 0) {
    output = "POSITIVE VALUE";
  } else {
    output = "NEGATIVE VALUE";
  }

  return output;
}

// console.log(a[3][3]);

/**
 
*
**
***
****
*****
******


 */

// out = "";
// for (let row = 1; row <= 6; row++) {
//   for (let col = 1; col <= row; col++) {
//     out += "*";
//   }

//   out += "<br>";
// }

// document.write(out);

/**
 

******
*****
****
***
**
*


 */

// let a = [1, 23, 4, [5, 6, 7, 8, 99, 123]];

// console.log(a);
// let q="";
// for (let row = 0; row < a.length; row++) {

//   if (typeof a[row] == "object") {

//     for (let col = 0; col < a[row].length; col++) {
//       //  3     1
//       console.log(a[row][col]);
//       q+=`${a[row][col]} <br>`
//     }

//   }
//   else{
//     console.log(a[row]);
//     q+= `${a[row]} <br>`
//   }
// }

// document.write(q);

//  selection and sort
//  selection and check  greater

//  merge and quick sort 
//  bubble sort 
//  dijkstra algo

// let t = [1, 2, 3, 3243424, 5, 6, 6, 7, 87];

// for (let selection = 0; selection < t.length; selection++) {
//   let greater = true;


//   for (let check = 0; check < t.length; check++) {
//     if (selection != check) {
//       if (t[selection] < t[check]) {
//         greater= false;
//         break;
//       }
//     }
//   }

//   if (greater == true) {
//     console.log(t[selection]);
//   }
// }

// let form = document.forms["Myform"];

// let input = form["user_name"];

let input= document.querySelector("#userName");


let res= document.querySelector("#res");


let btn = document.querySelector("#btn");

btn.addEventListener("click",function(){

  let input_val= input.value;

  if (input_val == "" || input_val == undefined)  {
    alert("PLEASE FILL THE FIELD")
  }
  else{
    console.log(input_val);

    let h1 = document.createElement("h1");
    h1.innerHTML=input_val;
  
    res.appendChild(h1);
  
    input.value =""

  }

  
}) 

/**
  form validation 
  dom EVENT HANDLER 
  DOM create element
  object manipulation
 */
 
  //  selection and sort
  //  selection and check  greater
  
  //  merge and quick sort 
  //  bubble sort 
  //  dijkstra algo


  let b ={
    name:"XYZ",
    address:"XYZ_address"
  };

  b["name"]
  b.address