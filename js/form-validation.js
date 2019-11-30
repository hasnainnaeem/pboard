function checkLength(e, fieldType, minLength, feedbackType) {
    let textField = e.target;
    let formFeedback = textField.nextElementSibling;

    if(textField.value.length < minLength) {
        if(feedbackType=="warning")
            formFeedback.setAttribute("class", "warning");

        else if(feedbackType=="tip")
            formFeedback.setAttribute("class", "feedback");

        formFeedback.innerText = fieldType + " must contain " + minLength + " characters.";
    }
    else {
        formFeedback.innerText = "";
    }

    return false;
}

function checkEmail(e, feedbackType) {

    let emailField = e.target;
    let formFeedback = emailField.nextElementSibling;

    if(!emailField.value.includes('@')) {
        formFeedback.innerText = "Incorrect Email. Rewrite correct email.";
        formFeedback.setAttribute("class", "warning");
    }
    else {
        formFeedback.innerText = "";
    }

    return false;
}

// validating first name
let fnameElem = document.getElementById("fname");
fnameElem.addEventListener('focus', function(e) {
    checkLength(e, "First name", 3, "tip" )
}, false);


fnameElem.addEventListener('blur', function(e) {
    checkLength(e, "First name", 3 ,"warning")
}, false);

// validating email
let emailElem = document.getElementById("email");
emailElem.addEventListener('blur', function(e) {
    checkEmail(e);
}, false);

