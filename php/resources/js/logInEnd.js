function formValidationLogIn() {
// Make quick references to our fields.
var user = document.getElementById('user'); 
var myInput = document.getElementById("pwd");


// To check empty form fields.

// Check each input in the order that it appears in the form.

if (textAlphanumeric(user, "* For your username please use alphabets and numbers only*")) {
if (lengthDefineUser(user, 5, 10)) {
if (passwordValidation(myInput,"*pwd between 4 to 8 chars containing at least 1 numeric digit,1 uppercase and 1 lowercase letter*")) {



return true;
}
}
}


return false;
}
function passwordValidation(inputtext, alertMsg) {
var numericExpression = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/;
if (inputtext.value.match(numericExpression)) {
return true;
} else {
document.getElementById('p7').innerText = alertMsg; // This segment displays the validation rule for zip.
inputtext.focus();
return false;
}
}


// Function that checks whether input text includes alphabetic and numeric characters.
function textAlphanumeric(inputtext, alertMsg) {
var alphaExp = /^[0-9a-zA-Z]+$/;
if (inputtext.value.match(alphaExp)) {
return true;
} else {
document.getElementById('p6').innerText = alertMsg; // This segment displays the validation rule for address.
inputtext.focus();
return false;
}
}

function lengthDefineUser(inputtext, min, max) {
var uInput = inputtext.value;
if (uInput.length >= min && uInput.length <= max) {
return true;
} else {
document.getElementById('p5').innerText = "* Please enter between " + min + " and " + max + " characters *"; // This segment displays the validation rule for username
inputtext.focus();
return false;
}
}
