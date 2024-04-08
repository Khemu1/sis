// @ts-nocheck
import * as utils from "./Utils.js";
let usernameField = document.querySelector(".user-name");
let nameField = document.querySelector(".name");
let passwordField = document.querySelector(".password");
let addressField = document.querySelector(".address");
let levelField = document.querySelector(".level");
let form = document.querySelector("form");

usernameField.addEventListener("input", function (e) {
  // console.log(e.target.value);
  if (utils.validUserName(e.target.value)) {
    usernameField.classList.remove("invalid");
    usernameField.classList.add("valid");
  } else {
    usernameField.classList.remove("valid");
    usernameField.classList.add("invalid");
  }
});

nameField.addEventListener("input", function (e) {
  // console.log(e.target.value);
  if (utils.validName(e.target.value)) {
    nameField.classList.remove("invalid");
    nameField.classList.add("valid");
  } else {
    nameField.classList.remove("valid");
    nameField.classList.add("invalid");
  }
});

passwordField.addEventListener("input", function (e) {
  // console.log(e.target.value);
  if (utils.validPassword(e.target.value)) {
    passwordField.classList.remove("invalid");
    passwordField.classList.add("valid");
  } else {
    passwordField.classList.remove("valid");
    passwordField.classList.add("invalid");
  }
});

addressField.addEventListener("input", function (e) {
  // console.log(e.target.value);
  if (utils.validAddress(e.target.value)) {
    addressField.classList.remove("invalid");
    addressField.classList.add("valid");
  } else {
    addressField.classList.remove("valid");
    addressField.classList.add("invalid");
  }
});

levelField.addEventListener("input", function (e) {
  if (utils.validLevel(e.target.value)) {
    levelField.classList.remove("invalid");
    levelField.classList.add("valid");
  } else {
    levelField.classList.remove("valid");
    levelField.classList.add("invalid");
  }
  utils.resetLevel(e);
});

form.addEventListener("submit", function (e) {
  let formData = new FormData(this);
  console.log(formData);

  let username = formData.get("username");
  let name = formData.get("name");
  let password = formData.get("password");
  let address = formData.get("address");
  let level = formData.get("level");

  if (!utils.validUserName(username)) return;
  if (!utils.validName(name)) return;
  if (!utils.validPassword(password)) return;
  if (!utils.validAddress(address)) return;
  if (!utils.validLevel(level)) return;
  console.log("valid");
  this.submit();
});
