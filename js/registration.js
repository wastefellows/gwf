function validateForm() {
    var name = document.forms["myform"]["myName"].value;
    var isMember = document.forms["myform"]["member"].value;
    var federation = document.forms["myform"]["federation"].value;
    var address = document.forms["myform"]["address"].value;
    var city = document.forms["myform"]["city"].value;
    var state = document.forms["myform"]["state"].value;
    var pincode = document.forms["myform"]["pincode"].value;
    var phone = document.forms["myform"]["phone"].value;
    var email = document.forms["myform"]["email"].value;
    var enroll_trip = document.forms["myform"]["enroll_trip"].value;

    //Name Validation
    if (name === "") {
        document.getElementById('error_name').innerHTML = "Please Enter a Name";
        return false;
    }
    else {
        document.getElementById('error_name').innerHTML = "";
    }

    //IsMember Validation
    if (isMember === "") {
        document.getElementById('error_member').innerHTML = "Please Enter the Member Group";
        return false;
    }
    else {
        document.getElementById('error_member').innerHTML = "";
    }

    //federation Validation
    if (federation === "") {
        document.getElementById('error_federation').innerHTML = "Please Enter any federation";
        return false;
    }
    else {
        document.getElementById('error_federation').innerHTML = "";
    }

    //address Validation
    if (address === "") {
        document.getElementById('error_address').innerHTML = "Please Enter a Name";
        return false;
    }
    else {
        document.getElementById('error_address').innerHTML = "";
    }

    //city Validation
    if (city === "") {
        document.getElementById('error_city').innerHTML = "Please Enter city";
        return false;
    }
    else {
        document.getElementById('error_city').innerHTML = "";
    }

    //state Validation
    if (state === "") {
        document.getElementById('error_state').innerHTML = "Please Enter state";
        return false;
    }
    else {
        document.getElementById('error_state').innerHTML = "";
    }

    //state Validation
    if (state === "") {
        document.getElementById('error_state').innerHTML = "Please Enter state";
        return false;
    }
    else {
        document.getElementById('error_state').innerHTML = "";
    }

    //state Validation
    if (state === "") {
        document.getElementById('error_state').innerHTML = "Please Enter state";
        return false;
    }
    else {
        document.getElementById('error_state').innerHTML = "";
    }

    //state Validation
    if (state === "") {
        document.getElementById('error_state').innerHTML = "Please Enter state";
        return false;
    }
    else {
        document.getElementById('error_state').innerHTML = "";
    }

    //state Validation
    if (state === "") {
        document.getElementById('error_state').innerHTML = "Please Enter state";
        return false;
    }
    else {
        document.getElementById('error_state').innerHTML = "";
    }
}