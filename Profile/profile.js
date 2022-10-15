window.onerror = function(error, url, line) {
    controller.sendLog({acc:'error', data:'ERR:'+error+' URL:'+url+' L:'+line});
};

var ajaxInterval = 100;  // 1000 = 1 second, 3000 = 3 seconds
$(document).ready(function() {
    function doAjax() {
        $.ajax({
                type: "POST",
                url: "/TRES/Session/getsession.php",
                data: {requested: "logged-in"},
                success: function (data) {
                    //Ajax returns the data as a string. We do this check to prevent people from accessing the page by simply typing in the URL.
                    if (data == "null") {
                        //We redirect the user to the main page.
                        window.location.replace("http://localhost/TRES/index.html");;
                    }
                },
                complete: function (data) {
                    // Schedule the next
                    setTimeout(doAjax, ajaxInterval);
                }
        });
    }

    setTimeout(doAjax, ajaxInterval);
});

$(document).ready(function() {
    $('#logout-form').submit(function(e) {

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/TRES/Session/closessesion.php",
            success: function(response) //We wait for a response
            {
                console.log("Close session");
            }
       });
    });
});

$(document).ready(function() {
    function getUserData() {
    $.ajax({
            type: "POST",
            url: "/TRES/Profile/getdata.php",
            data: {requested: "logged-in"},
            success: function (data) {
                var jsonData = JSON.parse(data);
                var userInfo = document.getElementsByClassName("user-info");
                var emailInfo = document.getElementsByClassName("email-info");
                
                $('#user-info').text("Usuario: " + jsonData.username);
                $('#email-info').text("Correo electronico: " + jsonData.email);
            }
        });
    }

    getUserData();
});