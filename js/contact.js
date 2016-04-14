$(function() {

    var contact = {

        displayError: function(msg) {

            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                .append("</button>");
            $('#success > .alert-danger').append(msg);
            $('#success > .alert-danger').append('</div>');
        },

        displaySuccess: function(msg) {
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                .append("</button>");
            $('#success > .alert-success')
                .append(msg);
            $('#success > .alert-success')
                .append('</div>');
        }

    }

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();

            // get values from FORM
            var name = $("input#name").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var message = $("textarea#message").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "contact.php",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                dataType: 'json',
                cache: false,
                success: function(result) {

                    $("#btnSubmit").attr("disabled", false);

                    if (typeof(result.errors) !== 'undefined' && Object.keys(result.errors).length > 0) {
                        for(var i in result.errors) {
                            $('#form-contact #'+i).next('.help-block.text-danger').html(result.errors[i]);
                        }
                        contact.displayError("<strong>Le formulaire comporte des erreurs !");
                        return false;
                    }

                    if (typeof(result.status) !== 'undefined' && result.status === true) {
                        contact.displaySuccess("<strong>Votre message a été envoyé</strong>");
                    }

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    contact.displayError("<strong>Désolé " + firstName + ", il semble que le serveur ne réponde pas, merci de réessayer ultérieurement!");
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
