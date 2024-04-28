import * as utils from "./Utils.js";

console.log(localStorage.getItem("theme"));
if (!localStorage.getItem("theme")) localStorage.setItem("theme", "white");

utils.checkFormTheme(localStorage.getItem("theme"), "login");

let switcher = document.querySelector(".theme-switcher");
switcher.addEventListener("click", function (e) {
  utils.formthemes("login");
});
