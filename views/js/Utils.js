// @ts-nocheck

/**
 * @param {string} username
 */
export function validUserName(username) {
  return !!username.trim().match("^[a-zA-Z0-9 ]{5,10}$");
}

/**
 * @param {string} name
 */
export function validName(name) {
  return !!name.trim().match("^[a-zA-Z ]{10,20}$");
}
/**
 * @param {string} password
 */
export function validPassword(password) {
  return !!password.trim().match("^[a-zA-Z0-9 ]{5,10}$");
}
/**
 * @param {string} address
 */
export function validAddress(address) {
  return !!address.trim().match("^[a-zA-Z0-9,. ]{10,50}$");
}
/**
 * @param {string} level
 */
export function validLevel(level) {
  return !!level.trim().match("^[1-2]{1,1}$");
}

/**
 * @param {Event} e
 */
export function resetLevel(e) {
  let level = e.target.value;
  if (level !== "1" && level !== "2") {
    e.target.value = "1";
  }
}
/**
 *
 * @param {array} checboxes
 * @returns {array}
 */
export function checked(checboxes) {
  let checked = [];
  if (checboxes) {
    checboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        checked.push(checkbox.value);
      }
    });
  }
  return checked;
}

/**
 *
 * @param {Object} errors
 * @returns {array}
 */
export function handelErrorDisplay(errors) {
  Object.keys(errors).forEach((error) => {
    if (error === "username") usernameField.classList.add("invalid");
    if (error === "name") nameField.classList.add("invalid");
    if (error === "password") passwordField.classList.add("invalid");
    if (error === "address") addressField.classList.add("invalid");
    if (error === "level") levelField.classList.add("invalid");
  });
}
