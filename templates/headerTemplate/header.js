window.onerror = function(error, url, line) {
    controller.sendLog({acc:'error', data:'ERR:'+error+' URL:'+url+' L:'+line});
};

/*LOGIN MODAL*/
// Get the modal.
var modal = document.getElementById("login-modal");

// Get the button that opens the modal.
var modalBtn = document.getElementById("login-button");

// Get the <span> element that closes the modal.
var spanClose = document.getElementsByClassName("modal-close")[0];

//Error buttons
var loginUserError = document.getElementById("modal-login-user-error");
var loginVerifyError = document.getElementById("modal-login-verify-error");
var loginPasswordError = document.getElementById("modal-login-password-error");

var loginButton = document.getElementById("login-button");
var profileButton = document.getElementById("profile-button");

// When the user clicks on the button, open the modal.
modalBtn.onclick = function() {
    modal.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal.
spanClose.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it.
window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
  }
}

function hideErrors() {
    loginUserError.style.display = "none";
    loginVerifyError.style.display = "none";
    loginPasswordError.style.display = "none";
}


//Hide profile button when page loads
$(document).ready(function() {
    profileButton.style.display = "none";
});

$(document).ready(function() {
    $('#login-form').submit(function(e) {
        //Hides all error messages when button is pressed, to avid repeats
        hideErrors();

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/TRES/UserHandling/login.php",
            data: $(this).serialize(), //We pass the form's content to the PHP file
            success: function(response) //We wait for a response
            {
                console.log(response);
                var jsonData = JSON.parse(response);
 
                //We check all possible responses and display the appropriate error message
                switch (jsonData.success) {
                    case 1:
                        modal.style.display = "none";
                        break;

                    case -1:
                        loginUserError.style.display = "flex";
                        break;

                    case -2:
                        loginVerifyError.style.display = "flex";
                        break;

                    case -3:
                        loginPasswordError.style.display = "flex";
                        break;

                    case 0:
                        alert("Critical error, do not call this file on it's own");

                        break;
                }
           }
       });
     });
});

var ajaxInterval = 100;  // 1000 = 1 second, 3000 = 3 seconds
function doAjax() {
    $.ajax({
            type: "POST",
            url: "/TRES/Session/getsession.php",
            data: {requested: "logged-in"},
            success: function (data) {
                //Ajax returns the data as a string
                if (data != "null") {
                    //If user is logged we show the profile button and hide the logout button.
                    loginButton.style.display = "none";
                    profileButton.style.display = "block";
                    console.log("Logged");
                }
                else {
                    console.log("Not");
                    loginButton.style.display = "block";
                    profileButton.style.display = "none";
                }
            },
            complete: function (data) {
                // Schedule the next
                setTimeout(doAjax, ajaxInterval);
            }
    });
}
setTimeout(doAjax, ajaxInterval);