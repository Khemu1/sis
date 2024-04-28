import * as utils from "./Utils.js";

utils.checkFormTheme(localStorage.getItem("theme"));

let switcher = document.querySelector(".theme-switcher");
switcher.addEventListener("click", function (e) {
  utils.formthemes();
});
