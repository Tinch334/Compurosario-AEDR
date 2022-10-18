function hideErrors() {
    $(".pass-match-error").hide();
    $(".pass-new-error").hide();
}

hideErrors();

$(document).ready(function() {
    $('#new-pass-form').submit(function(e) {
        //Stops the page from being reloaded.
        e.preventDefault();
        //Hides all error messages when button is pressed, to avid repeats.
        hideErrors();

        //Checks that both password fields match.
        if ($("#new-pass").val() != $("#new-pass-confirm").val()) {
            $(".pass-match-error").show();

            return;
        }

        $.ajax({
            type: "POST",
            url: "/TRES/Profile/Pass/changePass.php",
            data: $(this).serialize(),
            success: function(data)
            {
                var jsonData = JSON.parse(data);

                switch (jsonData.success) {
                    case 1:
                        window.location.replace("/TRES/Profile/profile.html");
                        break;

                    case -1:
                        $(".pass-new-error").show();
                        break;

                    case 0:
                        alert("Critical error, do not call this file on it's own");
                        break;
                }
            }
       });
    });
});