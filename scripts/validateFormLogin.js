$().ready(function() {
    $("#login-form").validate({
        errorClass: "error",
        errorElement: "span",
        rules: {
           username: {
            required: true
           },
           password: {
            required: true
           }
        },

        messages: {
            username: "<br>Username is required",
            password: "<br>Password is required",
        },
        highlight: function(element) {
            $(element).addClass("border-error")
        },

        submitHandler: function(form) {
            form.submit()
        }

    })
})