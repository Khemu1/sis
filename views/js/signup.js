const usernameEl = document.querySelector('#username');
const passwordEl = document.querySelector('#password');
const addressEl = document.querySelector('#address');
const levelEl = document.querySelector('#level');
const form = document.querySelector('#signup');


const checkUsername = () => {

    let valid = false;

    const min = 3,
        max = 12;

    const username = usernameEl.value.trim();

    if (!isRequired(username)) {
        showError(usernameEl, 'Username cannot be blank.');
    } else if (!isBetween(username.length, min, max)) {
        showError(usernameEl, `Username must be between ${min} and ${max} characters.`);
    }
    else {
        showSuccess(usernameEl);
        valid = true;
    }
    return valid;
};

const checkPassword = () => {
    let valid = false;


    const password = passwordEl.value.trim();

    if (!isRequired(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};

const checkAddress = () => {

    let valid = false;
    const address = addressEl.value.trim();

    if (!isRequired(address)) {
        showError(addressEl, 'address cannot be blank.');
    }
    else {
        showSuccess(addressEl);
        valid = true;
    }
    return valid;
};

const checkLevel = () => {

    let valid = false;
    const level = levelEl.value.trim();

    if (!isRequired(level)) {
        showError(levelEl, 'Level cannot be blank.');
    }
    else if (isNaN(level)) {
        showError(levelEl, 'Level must be a number.');
    }
    else if (!isBetween(level,1,4)){
        showError(levelEl, 'Level must be between 1 and 4.');
    }
    else {
        showSuccess(levelEl);
        valid = true;
    }
    return valid;
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;


const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let isUsernameValid = checkUsername(),
        isAddressValid = checkAddress(),
        isPasswordValid = checkPassword(),
        isLevelValid = checkLevel();

    let isFormValid = isUsernameValid &&
        isAddressValid &&
        isPasswordValid &&
        isLevelValid;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
});


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'username':
            checkUsername();
            break;
        case 'password':
            checkPassword();
            break;
        case 'address':
            checkAddress();
            break;
        case 'level':
            checkLevel();
            break;
    }
}));