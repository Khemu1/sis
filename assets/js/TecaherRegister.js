// @ts-nocheck
import * as utils from "./Utils.js";
let usernameField = document.querySelector(".user-name");
let nameField = document.querySelector(".name");
let passwordField = document.querySelector(".password");
let addressField = document.querySelector(".address");
let coursesField = document.querySelectorAll(".course");
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

form.addEventListener("submit", function (e) {
  let formData = new FormData(this);
  let username = formData.get("username");
  let name = formData.get("name");
  let password = formData.get("password");
  let address = formData.get("address");
  let courses = formData.getAll("courses[]");
  if (!utils.validUserName(username)) return;
  if (!utils.validName(name)) return;
  if (!utils.validPassword(password)) return;
  if (!utils.validAddress(address)) return;
  if (utils.checked(courses).length <= 0) return;
  console.log("valid");
  this.submit
});
