$(document).ready(function() {
    $('#new-name-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/TRES/Profile/Name/changeName.php",
            data: $(this).serialize(),
            success: function(data)
            {
                window.location.replace("/TRES/Profile/profile.html");
            }
       });
    });
});