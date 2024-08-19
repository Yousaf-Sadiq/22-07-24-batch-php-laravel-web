//  event listner

let btn = document.querySelector("#btn");

let div = document.querySelector("#result");

// method 1 to get value from form
// let form = document.forms["Myform"];
let input = document.querySelector("#user_name");
// target selector.addEventListener( target event , function )

btn.addEventListener("click", function () {
  // let val =form["user_name"].value;

  let val = input.value;

  let div2 = document.createElement("div");

  div.appendChild(div2);

  let span = document.createElement("span");
  span.innerHTML = `<i>${val}</i>`;
  // h1.id = "abc";
  div2.appendChild(span);

  let button = document.createElement("button");
  // button.setAttribute("type","button")
  button.type = "button";
  button.innerHTML = "X";
  button.classList.add("remove");

  // button.className="remove"

  span.after(button);

  let br = document.createElement("br");

  button.after(br);

  input.value = "";

  remove();
});

function remove() {
  let btn_remove = document.querySelectorAll(".remove");

  // {
  // "name":"dsnakl"
  // }


// let a = [1,2,4,5,6,7];

// for (let j = 0; j < a.length; j++) {
  
//   console.log(a[j])
  
// }



  for (let i = 0; i < btn_remove.length; i++) {


    btn_remove[i].addEventListener("click", function () {
      
      
      
      let parent = btn_remove[i].parentElement;



      parent.style.backgroundColor = "red";
      parent.style.color = "white";

      parent.style.transition = "opacity 0.75s ease-in-out";

      setTimeout(function () {
        parent.style.opacity = 0;

       
        setTimeout(() => {
         parent.remove();
       }, 1000);

      }, 1000);



      
    });
  }

  
}
