import * as utils from "./Utils.js";
const form = document.querySelector("form");
let userNameField = document.querySelector(".user-name");
let passwordField = document.querySelector(".password");
let switcher = document.querySelector(".theme-switcher");

userNameField.addEventListener("click", function (e) {
  if (userNameField.classList.contains("invalid"))
    userNameField.classList.remove("invalid");

  if (passwordField.classList.contains("invalid"))
    passwordField.classList.remove("invalid");

  if (!document.querySelector(".invalid-login").classList.contains("hide"))
    document.querySelector(".invalid-login").classList.add("hide");
});

passwordField.addEventListener("click", function (e) {
  if (passwordField.classList.contains("invalid"))
    passwordField.classList.remove("invalid");

  if (userNameField.classList.contains("invalid"))
    userNameField.classList.remove("invalid");

  if (!document.querySelector(".invalid-login").classList.contains("hide"))
    document.querySelector(".invalid-login").classList.add("hide");
});

document.querySelectorAll("input[type=radio]").forEach((radio) => {
  radio.addEventListener("click", function (e) {
    if (passwordField.classList.contains("invalid"))
      passwordField.classList.remove("invalid");

    if (userNameField.classList.contains("invalid"))
      userNameField.classList.remove("invalid");

    if (!document.querySelector(".invalid-login").classList.contains("hide"))
      document.querySelector(".invalid-login").classList.add("hide");
  });
});
switcher.addEventListener("click", function (e) {
  utils.formthemes("login");
});
form.addEventListener("submit", async (e) => {
  e.preventDefault();
  let formD = new FormData(form);
  let user = document.querySelector('input[name="userType"]:checked');
  let type = user.value; // disregard that error it doesn't exist

  let username = formD.get("userName");
  let password = formD.get("password");

  const hiddenInput = document.createElement("input");

  hiddenInput.type = "hidden";

  hiddenInput.name = "type";

  hiddenInput.value = type;
  form.appendChild(hiddenInput);
  let result = await fetch("../../controller/login.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      login: "Joe amama",
      userName: username,
      password: password,
      type: type,
      theme: utils.hasDark()
    }),
  });

  // Handle the response
  if (result.ok) {
    let responseData = await result.json();
    let stat = responseData.status;
    if (stat == "success") {
      window.location.href = `http://sis.test/views/php/home.php?${utils.hasDark()? "dark":"white"}`;
    } else {
      utils.handelErrorDisplay(responseData.errors);
    }
  } else {
    console.error("Error: " + result.statusText);
  }
});


