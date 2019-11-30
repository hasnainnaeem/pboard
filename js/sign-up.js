let isEmailFilled = false, isFirstNameFilled = false, isPasswordFilled = false;

function checkLength(elem, fieldType, minLength, feedbackType) {
    let isFiledCorrectly = false;
    let textField = elem;
    let formFeedback = textField.next();
    if(textField.val().length < minLength) {
        if(feedbackType=="warning")
            formFeedback.attr("class", "warning");

        else if(feedbackType=="tip")
            formFeedback.attr("class", "feedback");

        formFeedback.text(fieldType + " must contain " + minLength + " characters.");
        isFiledCorrectly = false;
    }
    else {
        formFeedback.text("");
        isFiledCorrectly = true;
    }

    return isFiledCorrectly;
}

function checkEmail(elem, feedbackType) {
    let emailField = elem;
    let formFeedback = emailField.next();
    if(!emailField.val().includes('@')) {
        formFeedback.text("Incorrect Email. Rewrite correct email.");
        formFeedback.attr("class", "warning");
        isEmailFilled = false;
    }
    else {
        formFeedback.text("");
        isEmailFilled = true;
    }

    return isEmailFilled;
}

function doesPasswordsMatch(){
    let formFeedback = confirmPassElem.next();
    if(confirmPassElem.val() != passElem.val()){
        formFeedback.attr("class", "warning");
        formFeedback.text("Passwords don't match!");
        return false;
    }
    formFeedback.attr("class", "feedback");
    formFeedback.text("Passwords matched.");
    return true;
}

// validating first name
let fnameElem = $("#first-name");
fnameElem.on('focus', function() {
    isFirstNameFilled = checkLength($(this), "First name", 3, "tip" );
});

fnameElem.on('blur', function() {
    isFirstNameFilled = checkLength($(this), "First name", 3 ,"warning")
});

// validating email
let emailElem = $("#email");
emailElem.on('blur', function() {
    isEmailFilled = checkEmail($(this));
});

// validating password
let passElem = $("#password");
passElem.on('blur', function() {
    isPasswordFilled = checkLength($(this), "Password", 7, "warning");
});

passElem.on('focus', function() {
    isPasswordFilled = checkLength($(this), "Password", 7, "feedback");
});

let confirmPassElem = $("#confirm-password");
confirmPassElem.on('blur', function() {
    isPasswordFilled = checkLength($(this), "Password", 7, "warning");
    isPasswordFilled = doesPasswordsMatch();
});

confirmPassElem.on('focus', function() {
    isPasswordFilled = checkLength($(this), "Password", 7, "feedback");
});

// Sending data to Back-end script
$signUpForm = $("#sign-up-form");
$signUpForm.submit(function(e) {
    e.preventDefault();
    isPasswordFilled = doesPasswordsMatch();
    if(!(isFirstNameFilled && isEmailFilled && isPasswordFilled))
    {
        $signUpForm.find("#sign-up-feedback").text(
            "Please fill form correctly before submitting.").hide().attr("class", "warning").fadeIn();
    }
    else {
        let details = $signUpForm.serialize();
        $.post("php/sign-up.php", details, function(data){
            $data = $("#sign-up-feedback").text(data);
            $data.attr("class", "feedback");
            $signUpForm.find("input, textarea").val("");
        });
    }
});
