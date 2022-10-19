window.onerror = function(error, url, line) {
    controller.sendLog({acc:'error', data:'ERR:'+error+' URL:'+url+' L:'+line});
};

/*LOGIN modal*/
// Get the button that opens the modal.
var loginButton = document.getElementById("login-button");

// Get the <span> element that closes the modal.
var spanClose = document.getElementsByClassName("modal-close")[0];

// When the user clicks on the button, open the modal.
loginButton.onclick = function() {
    $("#login-modal").show()
}

// When the user clicks on <span> (x), close the modal.
spanClose.onclick = function() {
    $("#login-modal").hide();
}

function hideErrors() {
    $("#modal-login-user-error").hide();
    $("#modal-login-verify-error").hide();
    $("#modal-login-password-error").hide();
    $("#modal-login-elocked-error").hide();
}


//Hide profile button when page loads
$(document).ready(function() {
    $("#profile-button").hide();
});

$(document).ready(function() {
    $('#login-form').submit(function(e) {
        //Hides all error messages when button is pressed, to avid repeats.
        hideErrors();
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/TRES/UserHandling/login.php",
            data: $(this).serialize(), //We pass the form's content to the PHP file.
            success: function(data) //We wait for a response.
            {
                var jsonData = JSON.parse(data);
                console.log(data);
                //We check all possible responses and display the appropriate error message.
                switch (jsonData.success) {
                    case 1:
                        $("#login-modal").hide();
                        break;

                    case -1:
                        $("#modal-login-user-error").show();
                        break;

                    case -2:
                        $("#modal-login-verify-error").show();
                        break;

                    case -3:
                        $("#modal-login-password-error").show();
                        break;

                    case -4:
                        $("#modal-login-blocked-error").show();
                        break;

                    case 0:
                        alert("Critical error, do not call this file on it's own");
                        break;
                }
           }
       });
     });
});

var ajaxInterval = 100;
function doAjax() {
    $.ajax({
            type: "POST",
            url: "/TRES/Session/getsession.php",
            data: {requested: "logged-in"},
            success: function (data) {
                //Ajax returns the data as a string
                if (data != "null") {
                    //If user is logged we show the profile button and hide the logout button.
                    $("#login-button").hide();
                    $("#profile-button").show();
                    console.log("Logged");
                }
                else {
                    $("#login-button").show();
                    $("#profile-button").hide();

                    console.log("Not");
                }
            },
            complete: function (data) {
                // Schedule the next call.
                setTimeout(doAjax, ajaxInterval);
            }
    });
}
setTimeout(doAjax, ajaxInterval);