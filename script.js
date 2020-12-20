function validate_farmer(){
var username =document.getElementById("username").value;
var pass1 = document.getElementById("password").value;
var pass2 = document.getElementById("cpass").value;
var phoneNumber =document.getElementById("phoneNumber").value;
var postalCode = document.getElementById("postalCode").value;
if(username.length<8 || username.length>8){
    alert("Invalid Kissan card Number!!!");
    return false;
}
if (pass1.length < 6) {
    alert("password cannot be less than 6 characters");
    return false;
}
if(pass2 != pass1){
    alert("passwords do not match!!!!");
    return false;
}
if(isNaN(phoneNumber) || (phoneNumber.length<10 || phoneNumber.length>10)) {
    alert("Invalid phoneNumber!!!");
    return false;
}
if(isNaN(postalCode) || (postalCode.length<6 || postalCode.length>6)) {
    alert("Invalid postalCode!!!");
    return false;
}
}

function validate_buyer(){
    var username =document.getElementById("username").value;
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("cpass").value;
    var phoneNumber =document.getElementById("phoneNumber").value;
    var postalCode = document.getElementById("postalCode").value;
    if(username.length<10 || username.length>10){
        alert("Invalid adhar card Number!!!");
        return false;
    }
    if (pass1.length < 6) {
        alert("password cannot be less than 6 characters");
        return false;
    }
    if(pass2 != pass1){
        alert("passwords do not match!!!!");
        return false;
    }
    if(isNaN(phoneNumber) || (phoneNumber.length<10 || phoneNumber.length>10)) {
        alert("Invalid phoneNumber!!!");
        return false;
    }
    if(isNaN(postalCode) || (postalCode.length<6 || postalCode.length>6)) {
        alert("Invalid postalCode!!!");
        return false;
    }
    }


