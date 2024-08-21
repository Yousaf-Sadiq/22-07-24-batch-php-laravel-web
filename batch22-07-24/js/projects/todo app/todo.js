let todoContainer = document.querySelector("#todo-container");
let result = document.querySelector("#result");

let input = document.createElement("input");
input.type = "text";
input.id = "todo";
input.placeholder = "Enter Any task";

todoContainer.appendChild(input);

let button = document.createElement("button");
button.type = "button";
button.innerHTML = "Add Task";
button.onclick = function () {
  checkVal();
};

input.after(button);

//  creating ol tag
let ol = document.createElement("ol");
result.appendChild(ol);

if (localStorage.getItem("todo")) {
  ol.innerHTML = localStorage.getItem("todo");

  edit();
  lineThrough();
  remove();
}

// =====================================

function checkVal() {
  let todoInput = document.querySelector("#todo");

  let val = todoInput.value;

  if (val == "" || val == undefined) {
    alert("Please Fill the field");
  } else {
    addTask(val);
  }
}

function addTask(value) {
  let todoInput = document.querySelector("#todo");

  let li = document.createElement("li");
  ol.appendChild(li);

  let span1 = document.createElement("span");
  span1.classList.add("addLine");
  span1.innerHTML = value;

  li.appendChild(span1);

  let span2 = document.createElement("span");

  span1.after(span2);

  let editbtn = document.createElement("button");
  editbtn.type = "button";
  editbtn.classList.add("edit");
  editbtn.innerHTML = "EDIT";
  editbtn.onclick = function () {
    edit();
  };

  span2.prepend(editbtn);

  // remove btn==========================
  let removebtn = document.createElement("button");
  removebtn.type = "button";
  removebtn.classList.add("remove");
  removebtn.innerHTML = "delete";
  removebtn.onclick = function () {
    remove();
  };

  span2.appendChild(removebtn);

  todoInput.value = "";

  lineThrough();
  saveItem();
}
// ===============================================================
function remove() {
  let allRemoveBtn = document.querySelectorAll(".remove");

  let length = allRemoveBtn.length;

  for (let i = 0; i < length; i++) {
    allRemoveBtn[i].addEventListener("click", function () {
      let parent = allRemoveBtn[i].parentElement.parentElement;

      parent.style.backgroundColor = "red";
      parent.style.color = "white";
      parent.style.transition = "opacity 0.75s ease-in-out";

      setTimeout(function () {
        parent.style.opacity = 0;

        setTimeout(() => {
          parent.remove();
          saveItem();

        }, 1000);
      }, 1000);
    });
  }

}

function edit() {
  let allEditBtn = document.querySelectorAll(".edit");

  allEditBtn.forEach(function (ele) {
    ele.addEventListener("click", function () {
      let parent = ele.parentElement.parentElement;
      console.log(parent);

      let spanText = parent.querySelector(".addLine");

      let NewValue = prompt("Enter Your Task", spanText.textContent);

      if (NewValue && NewValue.trim() !== "") {
        spanText.innerHTML = NewValue;
      }
    });
  });

  saveItem();
}


function lineThrough() {
 let addLine = document.querySelectorAll(".addLine");

 for (let index = 0; index < addLine.length; index++) {
     addLine[index].onclick = () => {
         let currentSpanTag = addLine[index];
         currentSpanTag.classList.toggle("LineThrough");
         SaveItem();
     };
 }

}
function saveItem() {
  let result = document.querySelector("#result > ol");
  localStorage.setItem("todo", result.innerHTML);
}
