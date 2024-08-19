let quizContainer = document.querySelector("#quiz-container");
let question = document.querySelector("#question");
let option = document.querySelector("#options");
let error = document.querySelector("#error");

const quizData = [
  {
    question: "What is the capital of France?",
    options: ["Paris", "London", "Berlin", "Madrid"],
    answer: "Paris",
  },
  {
    question: "What is the largest planet in our solar system?",
    options: ["Mars", "Saturn", "Jupiter", "Neptune"],
    answer: "Jupiter",
  },
  {
    question: "Which country won the FIFA World Cup in 2018?",
    options: ["Brazil", "Germany", "France", "Argentina"],
    answer: "France",
  },
];

let index = 0;
let score = 0;
let quizLength = quizData.length;
let wrongOption = [];

function displayQuiz() {
  let quizLength = quizData.length;
  if (index < quizLength) {
    let quizContainer = document.querySelector("#quiz-container");
    let question = document.querySelector("#question");
    let option = document.querySelector("#options");

    let currentQuiz = quizData[index];
    let next = document.querySelector("#NEXT");

    question.innerHTML = currentQuiz.question;

    //  display option
    option.innerHTML = "";
    currentQuiz.options.forEach(function (opt, address) {
      let input = document.createElement("input");
      input.type = "radio";
      input.name = "quiz";
      input.value = opt;
      input.classList.add("opt");
      input.id = opt + "_" + address;

      option.appendChild(input);

      let label = document.createElement("label");
      label.innerHTML = opt;

      label.setAttribute("for", opt + "_" + address);

      input.after(label);
    });

    if (next) {
      next.remove();
    }

    let button = document.createElement("button");
    button.id = "NEXT";
    button.innerHTML = "NEXT";

    button.onclick = function () {
      checkOpt();
    };

    option.after(button);
  } else {
    Result();
  }
}

displayQuiz();

function checkOpt() {
  let allOpt = document.querySelectorAll(".opt");
  let error = document.querySelector("#error");

  let optLength = allOpt.length;

  let errors = true;

  for (let i = 0; i < optLength; i++) {
    if (allOpt[i].checked == true) {
      errors = false;
      error.innerHTML = "";

      checkAns(allOpt[i]);

      break;
    }
  }

  if (errors) {
    error.innerHTML = "<br> please select anyone";
    error.style.color = "red";
  }
}

function checkAns(opt) {
  let quizLength = quizData.length;
  if (index < quizLength) {
    let currentQuiz = quizData[index];

    let userValue = opt.value;

    let ans = currentQuiz.answer;

    if (userValue == ans) {
      score++;
    } else {
      wrongOption.push({
        question: currentQuiz.question,
        userAns: userValue,
        correct: ans,
      });
    }

    index++;
    displayQuiz();
  } else {
    Result();
  }
}

function Result() {
  let question = document.querySelector("#question");
  let option = document.querySelector("#options");
  let error = document.querySelector("#error");
  let next = document.querySelector("#NEXT");

  question.innerHTML = `YOUR SCORE IS : ${score}`;

  option.innerHTML = "";
  error.innerHTML = "";
  next.innerHTML = "Restart quiz";
  next.onclick = function () {
    Restart();
  };

  if (wrongOption.length > 0) {
    let button = document.createElement("button");
    button.id = "wrong";
    button.innerHTML = "SHOW WRONG ANSWER";

    button.onclick = function () {
      showWrong();
    };

    next.after(button);
  }
  else{

   let button = document.createElement("span");
   button.id = "wrong";
   button.innerHTML = "CONGRATULATION! YOU WON";
   next.after(button);
  }
}

function showWrong() {
  let option = document.querySelector("#options");
  let html = "";
  wrongOption.forEach(function (val) {
    html += `Q : ${val.question} <br>
            <span style="color:red">Your selected option:  ${val.userAns}</span> <br>
            <span style="color:green">correct Answer:  ${val.correct}</span>
            <hr>
            `;
  });

  option.innerHTML = html;
}

function Restart() {
  index = 0;
  score = 0;
  wrongOption = [];

  document.querySelector("#wrong").remove();

  let question = document.querySelector("#question");
  let option = document.querySelector("#options");
  let error = document.querySelector("#error");

  question.innerHTML = "";
  option.innerHTML = "";
  error.innerHTML = "";
  displayQuiz();
}
