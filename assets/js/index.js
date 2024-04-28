import * as utils from "./Utils.js";

utils.checkFormTheme();

let switcher = document.querySelector(".theme-switcher");
switcher.addEventListener("click", function (e) {
  utils.formthemes();
});

// utils.themeDectector();
