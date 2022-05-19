'use strict'
document.getElementById('btn').setAttribute('disabled', 'true');
let email = document.getElementById('email');
let pass = document.getElementById('pass');
let confirm_pass = document.getElementById('confirm_pass');
let form = document.getElementById('formReg');
let allValid = {
    '_email': false,
    '_pass':false,
    '_confirm_pass':false,
}
form.oninput = function(){
    if(allValid['_email'] && allValid['_pass'] && allValid['_confirm_pass'] == true){
        document.getElementById('btn').removeAttribute('disabled');       
    }else{
        document.getElementById('btn').setAttribute('disabled', 'true');
    }
}
email.oninput = function () {
    if (email.classList.contains('_email')) {
        emailTest(email) ? addError('email-error') : removeError('email-error');   
        allValid['_email'] = emailTest(email);           
    }
}
pass.oninput = function () {
    if (pass.classList.contains('_pass')) {
        passTest(pass) ? addError('pass-error') : removeError('pass-error');
        allValid['_pass'] = passTest(pass);
    }
}
confirm_pass.oninput = function () {
    if (confirm_pass.classList.contains('_confirm')) {
        matchPass(pass, confirm_pass) ? addError('confirm-error') : removeError('confirm-error');
        allValid['_confirm_pass'] = matchPass(confirm_pass, pass);
    }
}
function addTrue(key){
    allValid[key] = true;
}
function addFalse(key){
    allValid[key] = false;
}
function matchPass(pass1, pass2) {
    let p1 = pass1.value;
    let p2 = pass2.value;
    return p1 === p2;
}
function addError(errorId) {
    document.getElementById(String(errorId)).classList.add('hidden');    
}
function removeError(errorId) {
    document.getElementById(String(errorId)).classList.remove('hidden');    
}
function emailTest(input) {
    return /^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i.test(input.value);
}
function passTest(input) {
    return /(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g.test(input.value);
}