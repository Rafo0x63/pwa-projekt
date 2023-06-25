$().ready(function() {
    $("#form-write").validate({
        errorClass: "error",
        errorElement: "span",
        rules: {
            title: {
                required: true,
                minlength: 5,
                maxlength: 30
            },
            abstract: {
                required: true,
                minlength: 10,
                maxlength: 50
            },
            content: {
                required: true
            },
            photo: {
                required: true
            },
            category: {
                required: true
            }
        },

        messages: {
            title: {
                color: "red",
                required: "<br> Title is required",
                minlength: "<br> Title must be at least 5 characters",
                maxlength: "<br> Title can't be longer than 30 characters"
            },
            abstract: {
                color: "red",
                required: "<br> Abstract is required",
                minlength: "<br> Abstract must be at least 10 characters",
                maxlength: "<br> Abstract can't be longer than 50 characters"
            }, 
            content: {
                color: "red",
                required: "<br> Article is required"
            },
            photo: {
                color: "red",
                required: "<br> Image is required"
            },
            category: {
                color: "red",
                required: "<br> Category is required"
            }
        },
        highlight: function(element) {
            $(element).addClass("border-error")
        },

        submitHandler: function(form) {
            form.submit()
        }

    })
})