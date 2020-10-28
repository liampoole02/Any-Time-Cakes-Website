function validate() {
    var name = document.getElementById("name");
    var surname = document.getElementById("surname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    removeMessage();

    console.log(name.value);

    var valid = true;

    if (name.value.length == 0) {
        name.className == "wrong-input";
        name.nextElementSibling.innerHTML = "Please fill in a Name";
        valid = false;
    }
    if (surname.value.length == 0) {
        surname.className == "wrong-input";
        surname.nextElementSibling.innerHTML = "Please enter a surname";
        valid = false;
    }
    if (mobile.value.length == 0) {
        mobile.className == "wrong-input";
        mobile.nextElementSibling.innerHTML = "Please enter a mobile number";
        valid = false;
    }
    if (email.value.length == 0) {
        email.className == "wrong-input";
        email.nextElementSibling.innerHTML = "Please enter an email";
        valid = false;
    }
    if (password.value.length == 0) {
        password.className == "wrong-input";
        password.nextElementSibling.innerHTML = "Please enter a password";
        valid = false;
    }
    return valid;
}

function removeMessage() {
    var errorInput = document.querySelectorAll(".wrong-input");
    [].forEach.call(errorInput, function(el) {
        el.classList.remove("wrong-input");
    });

    var errorPara = document.querySelectorAll(".error");
    [].forEach.call(errorPara, function(el) {
        el.innerHTML = "";
    });
}