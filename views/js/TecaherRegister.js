// @ts-nocheck
import * as utils from "./Utils.js";
let userNameField = document.querySelector(".user-name");
let nameField = document.querySelector(".name");
let passwordField = document.querySelector(".password");
let addressField = document.querySelector(".address");
let courses = document.querySelectorAll(".course");
const form = document.querySelector("form");
let switcher = document.querySelector(".theme-switcher");

userNameField.addEventListener("input", function (e) {
  let invalidUserName = document.querySelector(".invalid-user-name");

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

courses.forEach((course) => {
  let invalidCourses = document.querySelector(".invalid-courses");

  course.addEventListener("change", () => {
    if (utils.checked(courses).length > 0) {
      let courses = document.querySelector(".dropdown label");
      if (courses.classList.contains("red")) {
        courses.classList.remove("red");
        if (!invalidCourses.classList.contains("hide"))
          invalidCourses.classList.add("hide");
      }
    } else {
      let courses = document.querySelector(".dropdown label");
      if (!courses.classList.contains("red")) {
        courses.classList.add("red");
        if (!invalidCourses.classList.contains("hide"))
          invalidCourses.classList.add("hide");
      }
    }
  });
});

switcher.addEventListener("click", function (e) {
  utils.formthemes("teacher");
});

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  let allCourses = document.querySelectorAll(".course");
  if (utils.checked(allCourses).length > 0) {
    document.querySelector(".dropdown label").classList.remove("invalid");
    document.querySelector(".dropdown label").classList.add("valid");
  }
  let formD = new FormData(form);
  let username = formD.get("userName");
  let password = formD.get("password");
  let name = formD.get("name");
  let address = formD.get("address");
  let courses = formD.getAll("courses[]");
  console.log(courses);
  // starting the AJAX request
  let result = await fetch("../../controller/TecaherRegister.php", {
    method: "POST",
    headers: {
      // used . The headers object is used to specify the content type of the request body
      "Content-Type": "application/json", // This means that the data being sent to the server is in JSON forma
    },
    body: JSON.stringify({
      register: "Teacher",
      userName: username,
      name: name,
      password: password,
      address: address,
      courses: courses,
      theme: utils.hasDark(),
    }),
  });

  // Handle the response
  if (result.ok) {
    let responseData = await result.json();
    let stat = responseData.status;
    console.log(responseData);
    if (stat == "success") {
      console.log("yeeeeeeeeeeeeeees");
      window.location.href = `http://sis.test/views/php/home.php?${
        utils.hasDark() ? "dark" : "white"
      }`;
    } else {
      utils.handelErrorDisplay(responseData.errors);
    }
  } else {
    console.error("Error: " + result.statusText);
  }
});
