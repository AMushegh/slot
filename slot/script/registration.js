$(document).ready(function() {

    function checkUserName(usrnm) {
        $.ajax({
            type: "POST",
            url: "back/checkusername.php",
            data: { username: usrnm },
            dataType: "json",
            success: function(response) {
                if (response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This username is already exists! Please enter the new one!'
                    });
                    $("#username").val('');
                }
            }
        });
    }

    let letters = /^[A-Za-z]+$/;

    // Registsrstion form functional
    {
        $("#firstname").keyup(function(e) {
            if (!($("#firstname").val() == '') && !($("#firstname").val().match(letters))) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Something went wrong! Your firstname can include only letters!"
                });
                let temp = $("#firstname").val();
                temp = temp.replace(/[^A-z]+$/, '');
                $("#firstname").val(temp);
            }
        });

        $("#lastname").keyup(function(e) {
            if (!($("#lastname").val() == '') && !($("#lastname").val().match(letters))) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Something went wrong! Your lastname can include only letters!"
                });
                let temp = $("#lastname").val();
                temp = temp.replace(/[^A-z]+$/u, '');
                $("#lastname").val(temp);
            }
        });

        let hasShownAlert = false;
        $("#username").focusout(function(e) {
            checkUserName($("#username").val());
        });

        $("#password1").focusout(function(e) {
            if ($("#password").val() != $("#password1").val()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Something went wrong! Passwords Doesn't match!!!"
                })
                $("#password1").val("");
            }
        });

        $(".reg-btn").click(function(e) {
            if ($("#firstname").val() && $("#lastname").val() && $("#username").val() && $("#password").val()) {
                $.ajax({
                    type: "post",
                    url: "back/registrationback.php",
                    data: {
                        firstname: $("#firstname").val(),
                        lastname: $("#lastname").val(),
                        password: $("#password").val(),
                        username: $("#username").val(),
                        email: $("#email").val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            alert("ok");
                            // Swal.fire(
                            //         'success',
                            //         'That thing is still around?',
                            //         'success'
                            //     )
                            window.location.href = 'index.php';
                            sessionStorage.setItem("username", $("#username").val());
                            // location("slot.php");
                        }
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Something went wrong!"
                })
            }
        });
    }
});