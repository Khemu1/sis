const usernameEl = document.querySelector("#user-name");
const nameEl = document.querySelector("#name");
const passwordEl = document.querySelector("#password");
const addressEl = document.querySelector("#address");
const levelEl = document.querySelector("#level");
const form = document.querySelector("form");
const checkUsername = () => {
  let valid = false;

  const min = 3,
    max = 12;

  const username = usernameEl.value.trim();

  if (!isRequired(username)) {
    showError(usernameEl, "Username field cannot be blank.");
    document.getElementById("user-name").style.border = "1px solid red";
  } else if (!isBetween(username.length, min, max)) {
    showError(usernameEl, "Username must be between 3 and 12 characters.");
    document.getElementById("user-name").style.border = "1px solid red";
  } else {
    showSuccess(usernameEl);
    valid = true;
    document.getElementById("user-name").style.border = "1px solid green";
  }
  return valid;
};

const checkName = () => {
  let valid = false;

  const min = 3,
    max = 12;

  const name = nameEl.value.trim();

  if (!isRequired(name)) {
    showError(nameEl, "Name field cannot be blank.");
    document.getElementById("name").style.border = "1px solid red";
  } else if (!isNameSecure(name)) {
    showError(nameEl, "Name must only contain English letters");
    document.getElementById("name").style.border = "1px solid red";
  } else if (!isBetween(name.length, min, max)) {
    showError(nameEl, "Name must be between 3 and 12 characters.");
    document.getElementById("name").style.border = "1px solid red";
  } else {
    showSuccess(nameEl);
    valid = true;
    document.getElementById("name").style.border = "1px solid green";
  }
  return valid;
};

const checkPassword = () => {
  let valid = false;

  const password = passwordEl.value.trim();

  if (!isRequired(password)) {
    showError(passwordEl, "Password field cannot be blank.");
    document.getElementById("password").style.border = "1px solid red";
  } else if (!isPasswordSecure(password)) {
    showError(
      passwordEl,
      "Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)"
    );
    document.getElementById("password").style.border = "1px solid red";
  } else {
    showSuccess(passwordEl);
    valid = true;
    document.getElementById("password").style.border = "1px solid green";
  }
  return valid;
};

const checkAddress = () => {
  let valid = false;
  const address = addressEl.value.trim();
  const min = 2,
    max = 30;

  if (!isRequired(address)) {
    showError(addressEl, "Address field can't be blank");
    document.getElementById("address").style.border = "1px solid red";
  } else if (!isBetween(address.length, min, max)) {
    showError(
      addressEl,
      'Address must be between 2-30 characters and can only contain english letters , number and symbols like (",",".").'
    );
    document.getElementById("address").style.border = "1px solid red";
  } else {
    showSuccess(addressEl);
    valid = true;
    document.getElementById("address").style.border = "1px solid green";
  }
  return valid;
};

const checkLevel = () => {
  let valid = false;
  const level = levelEl.value.trim();

  if (!isRequired(level)) {
    showError(levelEl, "Level field cannot be blank.");
    document.getElementById("level").style.border = "1px solid red";
  } else if (isNaN(level)) {
    showError(levelEl, "Level must be a number.");
    document.getElementById("level").style.border = "1px solid red";
  } else if (!isBetween(level, 1, 2)) {
    showError(levelEl, "Level must be between 1 and 2.");
    document.getElementById("level").style.border = "1px solid red";
  } else {
    showSuccess(levelEl);
    valid = true;
    document.getElementById("level").style.border = "1px solid green";
  }
  return valid;
};

const checkRegisterButton = () => {
  // You may want to add validation for the register button here if needed
  return true; // For now, just return true
};

const isPasswordSecure = (password) => {
  const re = new RegExp(
    "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
  );
  return re.test(password);
};

const isRequired = (value) => (value === "" ? false : true);
const isBetween = (length, min, max) =>
  length < min || length > max ? false : true;

const showError = (input, message) => {
  // get the form-field element
  const formField = input.parentElement;
  // add the error class
  formField.classList.remove("success");
  formField.classList.add("error");

  // show the error message
  const error = formField.querySelector("small");
  error.textContent = message;
};

const showSuccess = (input) => {
  // get the form-field element
  const formField = input.parentElement;

  // remove the error class
  formField.classList.remove("error");
  formField.classList.add("success");

  // hide the error message
  const error = formField.querySelector("small");
  error.textContent = "";
};

const isNameSecure = (name) => {
  const re = new RegExp("^[a-zA-Z ]{3,12}$");
  return re.test(name);
};
const debounce = (fn, delay = 500) => {
  let timeoutId;
  return (...args) => {
    // cancel the previous timer
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
    // setup a new timer
    timeoutId = setTimeout(() => {
      fn.apply(null, args);
    }, delay);
  };
};

// fantastic way to call the methods
form.addEventListener(
  "input",
  debounce(function (e) {
    switch (e.target.id) {
      case "user-name":
        checkUsername();
        break;
      case "name":
        checkName();
        break;
      case "password":
        checkPassword();
        break;
      case "address":
        checkAddress();
        break;
      case "level":
        checkLevel();
        break;
    }
  })
);

setTimeout(function () {
  document.querySelector(".container").classList.add("move");
}, 250);
