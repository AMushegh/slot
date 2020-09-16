$(document).ready(function() {
    $(".frm-btn").click(function(e) {
        $.ajax({
            type: "POST",
            url: "back/loginback.php",
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            dataType: "json",
            success: function(response) {
                if (response) {
                    // console.log(response);
                    window.location.href = '../slot/slot.php';
                    sessionStorage.setItem("username", $("#username").val());
                } else {
                    alert("sxal");
                }
            }
        });
    });
});