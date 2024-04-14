// @ts-nocheck

/**
 * Validates the username input.
 * @param {string} username
 * @returns {boolean} - Returns true if the input address is valid, otherwise false.
 */
export function validUserName(username) {
  return !!username.trim().match("^[a-zA-Z0-9 ]{2,12}$");
}

/**
 * Validates the name input.
 * @param {string} name
 * @returns {boolean} - Returns true if the input address is valid, otherwise false.
 */
export function validName(name) {
  return !!name.trim().match("^[a-zA-Z ]{2,12}$");
}
/**
 * Validates the password input.
 * @param {string} password
 * @returns {boolean} - Returns true if the input address is valid, otherwise false.
 */
export function validPassword(password) {
  return !!password.trim().match("^[a-zA-Z0-9 ]{2,12}$");
}
/**
 * Validates the address input.
 * @param {string} address - The input address to be validated.
 * @returns {boolean} - Returns true if the input address is valid, otherwise false.
 */
export function validAddress(address) {
  return !!address.trim().match("^[a-zA-Z0-9,. ]{2,12}$");
}

/**
 * Validates the level input.
 * @param {string} level - The input level to be validated.
 * @returns {boolean} - Returns true if the input level is valid, otherwise false.
 */
export function validLevel(level) {
  return !!level.trim().match("^[1-2]{1,1}$");
}

/**
 * Resets the level of the input field
 * @param {Event} e
 */
export function resetLevel(e) {
  let level = e.target.value;
  if (level !== "1" && level !== "2") {
    e.target.value = "1";
  }
}

/**
 * This method is responsible for getting the checked values of the checkboxes.
 * @param {array} checkboxes - an array of HTMLInputElement objects representing the checkboxes.
 * @returns {array} - an array of the values of the checked checkboxes.
 */
export function checked(checkboxes) {
  let checked = [];
  if (checkboxes) {
    checkboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        checked.push(checkbox.value);
      }
    });
  }
  return checked;
}

/**
 * This method is responsible for displaying errors
 * @param {Object} errors - an object containing the validation errors
 */
export function handelErrorDisplay(errors) {
  "use strict";

  /** @type {HTMLInputElement} */
  const userNameField = document.querySelector(".user-name");
  /** @type {HTMLInputElement} */
  const nameField = document.querySelector(".name");
  /** @type {HTMLInputElement} */
  const passwordField = document.querySelector(".password");
  /** @type {HTMLInputElement} */
  const addressField = document.querySelector(".address");
  /** @type {HTMLInputElement} */
  const levelField = document.querySelector(".level");

  /** @type {HTMLElement} */
  const usesUserName = document.querySelector(".used-username");
  /** @type {HTMLElement} */
  const invalidUserName = document.querySelector(".invalid-user-name");
  /** @type {HTMLElement} */
  const invalidName = document.querySelector(".invalid-name");
  /** @type {HTMLElement} */
  const invalidPassword = document.querySelector(".invalid-password");
  /** @type {HTMLElement} */
  const invalidAddress = document.querySelector(".invalid-address");
  /** @type {HTMLElement} */
  const invalidLevel = document.querySelector(".invalid-level");
  /** @type {HTMLElement} */
  const invalidcourses = document.querySelector(".invalid-courses");

  Object.keys(errors).forEach((error) => {
    if (error === "username") {
      userNameField.classList.add("invalid");
      invalidUserName.classList.remove("hide");
    }
    if (error === "name") {
      nameField.classList.add("invalid");
      invalidName.classList.remove("hide");
    }
    if (error === "password") {
      passwordField.classList.add("invalid");
      invalidPassword.classList.remove("hide");
    }
    if (error === "address") {
      addressField.classList.add("invalid");
      invalidAddress.classList.remove("hide");
    }
    if (error === "level") {
      levelField.classList.add("invalid");
      invalidLevel.classList.remove("hide");
    }
    if (error === "account") {
      usesUserName.classList.remove("hide");
    }
    if (error === "courses") {
      invalidcourses.classList.remove("hide");
    }
    if (error === "invalid account") {
      userNameField.classList.add("invalid");
      passwordField.classList.add("invalid");
      document.querySelector(".invalid-login").classList.remove("hide");
    }
  });
}
