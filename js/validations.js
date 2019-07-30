function signup_validation() {
    var form = $("#signupForm");

    form.validate({
        rules: {
            userEmailSignUp: {
                required: true,
                emailcheck: true
            },
            userPasswordSignUp: {
                required: true,
                passwordcheck: true
            },
            userPasswordConfirmSignUp: {
                required: true,
                equalTo: "#userPasswordSignUp"
            },
            firstNameSignUp: {
                required: true,
                rangelength: [2, 20]
            },
            lastNameSignUp: {
                required: true,
                rangelength: [2, 40]
            },
            dobSignUp: {
                required:true
            },
            securityQuestionSignUp: {
                required:true
            },
            securityQuestionAnswerSignUp: {
                required: true
            }
        }
        ,
        messages: {
            userEmailSignUp: {
                required: "This field is required",
                emailcheck: "You need provide a valid email"
            },
            userPasswordSignUp: {
                required: "You need create a password",
                passwordcheck: "The password must have a minimum of 8 characteres and 1 number"
            },
            userPasswordConfirmSignUp: {
                required: "Confirm your password",
                equalTo: "Password don't match"
            },
            firstNameSignUp: {
                required: "Insert your first name",
                rangelength: "Minimum of 2 and maximum of 20 letters"
            },
            lastNameSignUp: {
                required: "Insert your last name",
                rangelength: "Minimum of 2 and maximum of 40 letters"
            },
            dobSignUp: {
                required: "Insert your Date of Birth"
            },
            securityQuestionSignUp: {
                required:"Enter a security question"
            },
            securityQuestionAnswerSignUp: {
                required: "Enter a valid answer for your security question"
            }
        }
    });
    return form.valid();
}

function newpassword_validation() {
    var form = $("#newPasswordForm");
    form.validate({
        rules: {
            forgetPasswordNewPassword: {
                required: true,
                passwordcheck: true
            },
            forgetPasswordNewPasswordConfirm: {
                required: true,
                equalTo: "#forgetPasswordNewPassword"
            }
        }
        ,
        messages: {
            forgetPasswordNewPassword: {
                required: "You need create a password",
                passwordcheck: "The password must have a minimum of 8 characteres and 1 number"
            },
            forgetPasswordNewPasswordConfirm: {
                required: "Confirm your password",
                equalTo: "Password don't match"
            }
        }
    });
    return form.valid();
}

function update_validation() {
    var form = $("#updateForm");
    
    form.validate({
        rules: {
            firstNameUpdate: {
                required: true,
                rangelength: [2, 20]
            },
            lastNameUpdate: {
                required: true,
                rangelength: [2, 40]
            },
            securityQuestionUpdate: {
                required:true
            },
            securityQuestionAnswerUpdate: {
                required: true
            }
        }
        ,
        messages: {
            firstNameUpdate: {
                required: "Insert your first name",
                rangelength: "Minimum of 2 and maximum of 20 letters"
            },
            lastNameUpdate: {
                required: "Insert your last name",
                rangelength: "Minimum of 2 and maximum of 40 letters"
            },
            securityQuestionUpdate: {
                required:"Enter a security question"
            },
            securityQuestionAnswerUpdate: {
                required: "Enter a valid answer for your security question"
            }
        }
    });
    
    return form.valid();
}




jQuery.validator.addMethod("emailcheck",
    function (value, element) {
        var regex = /@/;
        return this.optional(element) || regex.test(value);
    },
    "You must provide a valid email");

jQuery.validator.addMethod("passwordcheck",
    function (value, element) {
        var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        return this.optional(element) || regex.test(value);
    },
    "You need to minimum 0f 8 characters, with at least one number"); 
