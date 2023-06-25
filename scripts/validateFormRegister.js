$().ready(function() {
    $("#register-form").validate({
        errorClass: "error",
        errorElement: "span",
        rules: {
           name: {
            required: true,
            minlength: 1,
            maxlength: 30
           },
           surname: {
            required: true,
            minlength: 1,
            maxlength: 30
           },
           username: {
            required: true,
            minlength: 3,
            maxlength: 20
           },
           password: {
            required: true,
            minlength: 5,
           },
           "re-password": {
            required: true,
            equalTo: "#password"
           }
        },

        messages: {
            name: "<br>Name must be 1 to 30 characters long",
            surname: "<br>Surname must be 1 to 30 characters long",
            username: "<br>Username must be 3 to 20 characters long",
            password: "<br>Password must be at least 5 characters long",
            "re-password": "<br>Passwords must match"
        },
        highlight: function(element) {
            $(element).addClass("border-error")
        },

        submitHandler: function(form) {
            form.submit()
        }

    })
})