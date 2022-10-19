function hideErrors() {
    $(".email-existing-error").hide();
    $(".email-rejected-error").hide();
}

hideErrors();

$(document).ready(function() {
    $('#new-email-form').submit(function(e) {
        //Stops the page from being reloaded.
        e.preventDefault();
        //Hides all error messages when button is pressed, to avid repeats.
        hideErrors();

        $.ajax({
            type: "POST",
            url: "/TRES/Profile/Email/changeEmail.php",
            data: $(this).serialize(),
            success: function(data)
            {
                console.log(data);
                var jsonData = JSON.parse(data);

                switch (jsonData.success) {
                    case 1:
                        window.location.replace("/TRES/Profile/profile.html");
                        break;

                    case -1:
                        $(".email-existing-error").show();
                        break;

                    case -2:
                        $(".email-rejected-error").show();
                        break;

                    case 0:
                        alert("Critical error, do not call this file on it's own");
                        break;
                }
            }
       });
    });
});