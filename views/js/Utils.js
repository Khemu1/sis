// @ts-nocheck

/**
 * @param {string} username
 */
export function validUserName(username) {
  return !!username.trim().match("^[a-zA-Z0-9 ]{2,12}$");
}

/**
 * @param {string} name
 */
export function validName(name) {
  return !!name.trim().match("^[a-zA-Z ]{2,12}$");
}
/**
 * @param {string} password
 */
export function validPassword(password) {
  return !!password.trim().match("^[a-zA-Z0-9 ]{2,12}$");
}
/**
 * @param {string} address
 */
export function validAddress(address) {
  return !!address.trim().match("^[a-zA-Z0-9,. ]{2,12}$");
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
