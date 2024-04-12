// @ts-nocheck
import * as utils from "./Utils.js";
let usernameField = document.querySelector(".user-name");
let nameField = document.querySelector(".name");
let passwordField = document.querySelector(".password");
let addressField = document.querySelector(".address");
let coursesC = document.querySelectorAll(".course");
let coursesField = document.querySelector(".dropdown");
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

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  if (utils.checked(coursesC).length > 0) {
    coursesField.classList.remove("invalid");
    coursesField.classList.add("valid");
  }
  let formD = new FormData(form);
  let username = formD.get("userName");
  let password = formD.get("password");
  let name = formD.get("name");
  let address = formD.get("address");
  let courses = formD.getAll("courses[]");
  console.log(courses);
  let result = await fetch("../../controller/TecaherRegister.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      register: "Teacher",
      userName: username,
      name: name,
      password: password,
      address: address,
      courses: courses,
    }),
  });

  // Handle the response
  if (result.ok) {
    let responseData = await result.json();
    let stat = responseData.status;
    console.log(responseData);
    if (stat == "success") {
      console.log("yeeeeeeeeeeeeeees");
      window.location.href = `http://sis.test/views/php/home.php`;
    } else {
      let errors = responseData.errors;
      console.log(errors);
      Object.keys(errors).forEach((error) => {
        console.log(error);
        if (error === "username")
          document.querySelector(".user-name").classList.add("invalid");
        if (error === "name") nameField.classList.add("invalid");
        if (error === "password") passwordField.classList.add("invalid");
        if (error === "address") addressField.classList.add("invalid");
        if (error === "courses") coursesField.classList.add("invalid");
      });
      console.log(responseData.message);
    }
  } else {
    console.error("Error: " + result.statusText);
  }
});
