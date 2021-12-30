$(document).ready(function () {
    $("#profile-update-form").submit(function (e) {
        e.preventDefault();
        // console.log('working........');
        $.ajax({
            url: 'php/process.php',
            method: 'post',
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function (response) {
                // console.log(response);
                location.reload()
            }
        });
    });

    $("#changePassBtn").click(function (e) {
        if ($("#change-pass-form")[0].checkValidity()) {
            e.preventDefault();
            $("#changePassBtn").val("Please Wait....");
            if ($("#newpass").val() != $("#cnewpass").val()) {
                $("#changePassErr").text('* Password did not matched');
                $("#changePassBtn").val("Change Password");
            } else {
                $.ajax({
                    url: 'php/process.php',
                    method: 'post',
                    data: $("#change-pass-form").serialize() + '&action=change_pass',
                    success: function (response) {
                        $("#changePassAlert").html(response);
                        $("#changePassBtn").val('Change Password');
                        $("#changePassErr1").text('');
                        $("#change-pass-form")[0].reset();

                    }
                });

            }
        };
    });

    // VERIFY EMAIL 
    $("#verify-email").click(function (e) {
        e.preventDefault();
        $(this).text('please Wait......')

        $.ajax({
            url: 'php/process.php',
            method: 'post',
            data: { action: 'verify_email' },
            success: function (response) {
                $("#verifyEmailAlert").html(response);
                // $("#verify-email").text('Verfiy Now')
            }


        });

    });

    // FEEDBACK 

    $("#feedbackBtn").click(function (e) {
        if ($("#feedback-form")[0].checkValidity()) {
            e.preventDefault();
            $(this).val('Please Wait...')
            $.ajax({
                url: 'php/process.php',
                method: 'post',
                data: $("#feedback-form").serialize() + '&action=feedback',
                success: function (response) {
                    // console.log(response);
                    $("#feedback-form")[0].reset();
                    $("#feedbackBtn").val('Send FeedBack');
                    Swal.fire({
                        type: 'success',
                        title: 'FeedBack Sent Successfully',
                        // showConfirmButton: false,
                    });
                }

            });
        }

    });


    // SHOW NOTIFICATION

    fetchNotification()
    function fetchNotification() {
        $.ajax({
            url: 'php/process.php',
            method: 'post',
            data: { action: 'fetchNotification' },
            success: function (response) {
                console.log(response);
            }


        });

    }

});


