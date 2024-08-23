let calculator = document.querySelector("#calculator");

let btn = [
  1,
  2,
  3,
  4,
  5,
  6,
  7,
  8,
  9,
  0,
  "00",
  "+",
  "-",
  "*",
  "/",
  "AC",
  "DEL",
  "=",
];

let input = document.createElement("input");
input.type = "text";
input.id = "val";
input.readOnly = true;

calculator.appendChild(input);

let res = document.querySelector("#val");

let div = document.createElement("div");
div.classList.add("grid");
input.after(div);

btn.forEach(function (ele) {
  let button = document.createElement("button");
  button.type = "button";
  button.innerHTML = ele;
  button.onclick = function () {
    appendValue(ele);
  };

  div.appendChild(button);
});

function appendValue(val) {
  let res = document.querySelector("#val");

  if (val == "AC") {
    res.value = "";
  } 
  else if (val == "DEL"){

   let z = res.value.slice(0,-1);
   res.value = z;

  }
  else if (val == "=") {
    try {
      let a = res.value;

      res.value = eval(a);
    } catch (error) {
      // alert("INVALID OPERATION");
      res.value= "INVALID OPERATION"
    }
  } else {
    res.value += val;
  }
}
