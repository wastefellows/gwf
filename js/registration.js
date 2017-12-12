function validateForm() {
    var transationId = document.forms["myform"]["transactionId"].value;
    var name = document.forms["myform"]["myName"].value;
    // var isMember = document.forms["myform"]["member"].value;
    // var federation = document.forms["myform"]["federation"].value;
    var address = document.forms["myform"]["address"].value;
    var city = document.forms["myform"]["city"].value;
    var state = document.forms["myform"]["state"].value;
    var pincode = document.forms["myform"]["pincode"].value;
    var phone = document.forms["myform"]["phone"].value;
    var email = document.forms["myform"]["email"].value;
    var enroll_trip = document.forms["myform"]["enroll_trip"].value;

    //TransactionId Validation
    if (transationId === "") {
        document.getElementById('error_transationId').innerHTML = "Please Enter a Transation Id<br>";
        return false;
    }
    else {
        document.getElementById('error_transationId').innerHTML = "";
    }

    //Name Validation
    if (name === "") {
        document.getElementById('error_name').innerHTML = "Please Enter a Name";
        return false;
    }
    else {
        document.getElementById('error_name').innerHTML = "";
    }

    //IsMember Validation
    // if (isMember === "") {
    //     document.getElementById('error_member').innerHTML = "Please Enter the Member Group";
    //     return false;
    // }
    // else {
    //     document.getElementById('error_member').innerHTML = "";
    // }

    //federation Validation
    // if (federation === "") {
    //     document.getElementById('error_federation').innerHTML = "Please Enter any federation";
    //     return false;
    // }
    // else {
    //     document.getElementById('error_federation').innerHTML = "";
    // }

    //address Validation
    if (address === "") {
        document.getElementById('error_address').innerHTML = "Please Enter Address";
        return false;
    }
    else {
        document.getElementById('error_address').innerHTML = "";
    }

    //city Validation
    if (city === "") {
        document.getElementById('error_city').innerHTML = "Please Enter City";
        return false;
    }
    else {
        document.getElementById('error_city').innerHTML = "";
    }

    //state Validation
    if (state === "") {
        document.getElementById('error_state').innerHTML = "Please Enter State";
        return false;
    }
    else {
        document.getElementById('error_state').innerHTML = "";
    }

    //pincode Validation
    if (pincode === "") {
        document.getElementById('error_pincode').innerHTML = "Please Enter Pincode";
        return false;
    }
    else {
        document.getElementById('error_pincode').innerHTML = "";
    }

    //phone Validation
    if (phone === "") {
        document.getElementById('error_phone').innerHTML = "Please Enter Phone Number";
        return false;
    }
    else {
        document.getElementById('error_phone').innerHTML = "";
    }

    //email Validation
    if (email === "") {
        document.getElementById('error_email').innerHTML = "Please Enter Email Id";
        return false;
    }
    else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        document.getElementById('error_email').innerHTML = "Please Enter a valid Email Id";
        return false;
    }
    else {
        document.getElementById('error_email').innerHTML = "";
    }

    //enroll trip Validation
    if (enroll_trip === "") {
        document.getElementById('error_enroll_trip').innerHTML = "Please select one option";
        return false;
    }
    else {
        document.getElementById('error_enroll_trip').innerHTML = "";
    }
}