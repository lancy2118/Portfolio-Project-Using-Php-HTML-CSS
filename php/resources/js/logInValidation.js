function formValidationSignUp() {
// Make quick references to our fields.
var firstname = document.getElementById('fname');
var email = document.getElementById('emailId');
var lastname = document.getElementById('lname');
var user = document.getElementById('user'); 
var myInput = document.getElementById("pwd");
var myInput2 = document.getElementById("rpwd");


// To check empty form fields.
if (firstname.value.length == 0) {
document.getElementById('head').innerText = "* All fields are mandatory *"; // This segment displays the validation rule for all fields
firstname.focus();
return false;
}
// Check each input in the order that it appears in the form.
if (inputAlphabet(firstname, "* For your name please use alphabets only*")) {
if (lengthDefine(firstname, 5, 25)) {
if (emailValidation(email, "* Please enter a valid email address *")) {
if (inputAlphabet2(lastname, "* For your name please use alphabets only*")) {
if (lengthDefinelname(lastname, 5, 15)) {
if (textAlphanumeric(user, "* For your username please use alphabets and numbers only*")) {
if (lengthDefineUser(user, 5, 10)) {
if (passwordValidation(myInput,"*pwd between 4 to 8 chars containing at least 1 numeric digit,1 uppercase and 1 lowercase letter*")) {
if (passwordValidation(myInput2,"*pwd between 4 to 8 chars containing at least 1 numeric digit,1 uppercase and 1 lowercase letter*")) {
if(checkPwd(myInput,myInput2,"*Entered password does not match*")){


return true;
}
}
}
}
}
}
}
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

// Function that checks whether input text is an alphabetic character or not.
function inputAlphabet(inputtext, alertMsg) {
var alphaExp = /^[a-zA-Z\s]+$/;
if (inputtext.value.match(alphaExp)) {
return true;
} else {
document.getElementById('p1').innerText = alertMsg; // This segment displays the validation rule for name.
//alert(alertMsg);
inputtext.focus();
return false;
}
}
function inputAlphabet2(inputtext, alertMsg) {
var alphaExp = /^[a-zA-Z]+$/;
if (inputtext.value.match(alphaExp)) {
return true;
} else {
document.getElementById('p9').innerText = alertMsg; // This segment displays the validation rule for name.
//alert(alertMsg);
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
// Function that checks whether the input characters are restricted according to defined by user.
function lengthDefine(inputtext, min, max) {
var uInput = inputtext.value;
if (uInput.length >= min && uInput.length <= max) {
return true;
} else {
document.getElementById('p2').innerText = "* Please enter between " + min + " and " + max + " characters *"; // This segment displays the validation rule for username
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
function lengthDefinelname(inputtext, min, max) {
var uInput = inputtext.value;
if (uInput.length >= min && uInput.length <= max) {
return true;
} else {
document.getElementById('p4').innerText = "* Please enter between " + min + " and " + max + " characters *"; // This segment displays the validation rule for username
inputtext.focus();
return false;
}
}

// Function that checks whether an user entered valid email address or not and displays alert message on wrong email address format.
function emailValidation(inputtext, alertMsg) {
var emailExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if (inputtext.value.match(emailExp)) {
return true;
} else {
document.getElementById('p3').innerText = alertMsg; // This segment displays the validation rule for email.
inputtext.focus();
return false;
}
}
function checkPwd(inputtext, inputtext2, alertMsg) {
var uInput = inputtext.value;
var uInput2 = inputtext2.value;
if (uInput==inputtext2) {
return true;
} else {
document.getElementById('p8').innerText = alertMsg; // This segment displays the validation rule for email.
inputtext.focus();
return false;
}
}