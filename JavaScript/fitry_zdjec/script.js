const blurCheckbox = document.querySelector("#blur");
const sepiaCheckbox = document.querySelector("#sepia");
const invertCheckbox = document.querySelector("#negatyw");

function updateFilter() {
  let filters = [];
  let chList = document.querySelectorAll("input[type=checkbox]:checked");
  chList.forEach((checkbox) => {
    switch (checkbox.id) {
      case "blur":
        filters.push("blur(5px)");
        break;
      case "sepia":
        filters.push("sepia(100%)");
        break;
      case "negatyw":
        filters.push("invert(100%)");
        break;
      default:
        break;
    }
  });

  applyFilter(filters.join(" "));
}

function applyFilter(filter) {
  document.querySelector("#image").style.filter = filter;
}

[blurCheckbox, sepiaCheckbox, invertCheckbox].forEach((checkbox) => {
  checkbox.addEventListener("change", updateFilter);
});

document.querySelector("#color").addEventListener("click", () => {
  applyFilter("none");
});

document.querySelector("#grayscale").addEventListener("click", () => {
  applyFilter("grayscale(100%)");
});

document.querySelector("#applyOpacity").addEventListener("click", () => {
  document.querySelector("#image").style.opacity =
    document.querySelector("#opacity").value / 100;
});

document.querySelector("#applyBri").addEventListener("click", () => {
  document.querySelector("#image").style.filter = `brightness(${
    document.querySelector("#brightness").value / 100
  })`;
});
