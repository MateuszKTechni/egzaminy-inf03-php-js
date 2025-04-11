const btn = document.querySelector("#calculate");

function calculateDistance() {
  console.log("calc-distance");
  const v0 = parseFloat(document.querySelector("#v0").value);
  const t = parseFloat(document.querySelector("#t").value);
  const a = parseFloat(document.querySelector("#a").value);
  const result = document.querySelector("#result");
  const montionType = document.querySelector(
    'input[name="motionType"]:checked'
  ).value;
  let distance = 0;

  switch (montionType) {
    case "przyspieszony":
      distance = v0 * t + 0.5 * a * t ** 2;
      break;
    case "opozniony":
      distance = v0 * t - 0.5 * a * t ** 2;
      break;
    case "prostoliniowy":
      distance = v0 * t;
      break;
  }

  result.innerText = `Droga: ${distance} m`;
}

btn.addEventListener("click", calculateDistance);
