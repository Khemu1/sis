// @ts-nocheck
import * as utils from "./Utils.js";
let userNameField = document.querySelector(".user-name");
let nameField = document.querySelector(".name");
let passwordField = document.querySelector(".password");
let addressField = document.querySelector(".address");
let levelField = document.querySelector(".level");
const form = document.querySelector("form");

userNameField.addEventListener("input", function (e) {
  let invalidUserName = document.querySelector(".invalid-user-name");
  // console.log(e.target.value);
  if (utils.validUserName(e.target.value)) {
    userNameField.classList.remove("invalid");
    userNameField.classList.add("valid");
  } else {
    userNameField.classList.remove("valid");
    userNameField.classList.add("invalid");
  }
  if (!invalidUserName.classList.contains("hide"))
    invalidUserName.classList.add("hide");
});

nameField.addEventListener("input", function (e) {
  let invalidName = document.querySelector(".invalid-name");

  // console.log(e.target.value);
  if (utils.validName(e.target.value)) {
    nameField.classList.remove("invalid");
    nameField.classList.add("valid");
  } else {
    nameField.classList.remove("valid");
    nameField.classList.add("invalid");
  }
  if (!invalidName.classList.contains("hide"))
    invalidName.classList.add("hide");
});

passwordField.addEventListener("input", function (e) {
  // console.log(e.target.value);
  let invalidPassword = document.querySelector(".invalid-password");

  if (utils.validPassword(e.target.value)) {
    passwordField.classList.remove("invalid");
    passwordField.classList.add("valid");
  } else {
    passwordField.classList.remove("valid");
    passwordField.classList.add("invalid");
  }
  if (!invalidPassword.classList.contains("hide"))
    invalidPassword.classList.add("hide");
});

addressField.addEventListener("input", function (e) {
  // console.log(e.target.value);
  let invalidAddress = document.querySelector(".invalid-address");

  if (utils.validAddress(e.target.value)) {
    addressField.classList.remove("invalid");
    addressField.classList.add("valid");
  } else {
    addressField.classList.remove("valid");
    addressField.classList.add("invalid");
  }
  if (!invalidAddress.classList.contains("hide"))
    invalidAddress.classList.add("hide");
});

levelField.addEventListener("input", function (e) {
  let invalidLevel = document.querySelector(".invalid-level");

  if (utils.validLevel(e.target.value)) {
    levelField.classList.remove("invalid");
    levelField.classList.add("valid");
    if (!invalidLevel.classList.contains("hide"))
      invalidLevel.classList.add("hide");
  } else {
    levelField.classList.remove("valid");
    levelField.classList.add("invalid");
    if (invalidLevel.classList.contains("hide"))
      invalidLevel.classList.remove("hide");
  }
  utils.resetLevel(e);
});

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  let formD = new FormData(form);
  let username = formD.get("userName");
  let password = formD.get("password");
  let name = formD.get("name");
  let address = formD.get("address");
  let level = formD.get("level");
  let result = await fetch("../../controller/StudentRegister.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      register: "Student",
      userName: username,
      name: name,
      password: password,
      address: address,
      level: level,
    }),
  });

  // Handle the response
  if (result.ok) {
    let responseData = await result.json();
    let stat = responseData.status;
    console.log(responseData);
    console.log(stat);
    if (stat == "success") {
      console.log("yeeeeeeeeeeeeeees");
      window.location.href = `http://sis.test/views/php/home.php`;
    } else {

      utils.handelErrorDisplay(responseData.errors);
      console.log(responseData.message);
    }
  } else {
    console.error("Error: " + result.statusText);
  }
});


