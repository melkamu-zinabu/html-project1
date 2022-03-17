function validateFName() {

    var x = document.querySelector("#firstname").value;
    if (x.length < 3 || x.length > 10) {

        document.querySelector("#feedbfname").innerHTML = " Invalid value provided ";
        return false;
    } else {

        document.querySelector("#feedbfname").innerHTML = " Valid ";
        return true;
    }
}

function validateEmailAndType() {

    var email = document.querySelector("#email").value;

    var regexEmail = /^\S+@\S+\.\S+$/;

    if (regexEmail.test(email)) {

        document.querySelector("#feedbemail").innerHTML = "Valid Email";
        return true;
    } else {
        document.querySelector("#feedbemail").innerHTML = "Invalid Email";
        return false;
    }
}