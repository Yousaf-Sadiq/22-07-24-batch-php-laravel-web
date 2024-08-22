// sync programming
// console.log(data);

// if (data.status == 200) {
//   let res = await data.json();
//   console.log(res);
// } else {
//   console.log("fetching error");
// }
// async  programming

// https://api.openweathermap.org/data/2.5/weather?q=London,uk&APPID=43a4ae518fe69003563bee12073d451e
let result = document.querySelector("#res");
let search = document.querySelector("#search");

search.addEventListener("keyup", function (e) {
  // console.log(e);
  if (e.key == "Enter") {
    console.log(search.value);
    FindLocation(search.value);
  }
});

async function FindLocation(val) {
  let appId = "43a4ae518fe69003563bee12073d451e";
  let dest = val;

  let url = `https://api.openweathermap.org/data/2.5/weather?q=${dest}&APPID=${appId}`;

  let data = await fetch(url);
  let res = await data.json();
  let img = document.querySelector("#img");

  if (res.weather[0].main == "Clouds") {
    img.src =
      "https://digital-photography-school.com/wp-content/uploads/flickr/14718892840_10bba8ff6d_o-600x403.jpg";
  }

  if (res.weather[0].main == "Smoke") {
    img.src =
      "https://images.nationalgeographic.org/image/upload/v1638883225/EducationHub/photos/taipei-smog.jpg";
  }

  let output = "";

  for (const key in res) {
    if (typeof res[key] == "object") {
      for (const ChildKey in res[key]) {
        if (typeof res[key][ChildKey] == "object") {
          for (const subChildKey in res[key][ChildKey]) {
            output += `${key}:${ChildKey}:${subChildKey} :: ${res[key][ChildKey][subChildKey]} <br>`;
          }
        } else {
          output += `${key}:${ChildKey} :: ${res[key][ChildKey]} <br>`;
        }
      }
    } else {
      output += `${key} :: ${res[key]} <br>`;
    }
  }

  result.innerHTML = output;
}
