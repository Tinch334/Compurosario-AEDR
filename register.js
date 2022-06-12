$(document).ready(function() {
    document.getElementsByTagName("html")[0].style.visibility = "visible";
});

//Error text
var registerUserError = document.getElementById("username-used");
var registerEmailError = document.getElementById("email-used");

var registerButton = document.getElementById("login-button");

function hideErrors() {
    registerUserError.style.display = "none";
    registerEmailError.style.display = "none";
}

$(document).ready(function() {
    $('#register-form').submit(function(e) {
        //Hides all error messages when button is pressed, to avid repeats
        hideErrors();

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/TRES/UserHandling/register.php",
            data: $(this).serialize(), //We pass the form's content to the PHP file
            success: function(response) //We wait for a response
            {
                console.log(response);
                var jsonData = JSON.parse(response);
 
                //We check all possible responses and display the appropriate error message
                switch (jsonData.success) {
                    case 1:
                        //Take user to main page, registration was successful.
                        window.location.replace("/TRES/index.html");
                        break;

                    case -1:
                        registerUserError.style.display = "block";
                        break;

                    case -2:
                        registerEmailError.style.display = "block";
                        break;

                    case 0:
                        alert("Critical error, do not call this file on it's own");

                        break;
                }
           }
       });
     });
});