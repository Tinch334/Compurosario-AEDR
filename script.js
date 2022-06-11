$(document).ready(function() {
    document.getElementsByTagName("html")[0].style.visibility = "visible";
});


/*SLIDERS*/
$(document).ready(function() {
  $('#autoWidthDiscount').lightSlider({
        autoWidth:true,
        auto:true,
        loop:true,
        pauseOnHover: true,
        onBeforeSlide: function (el) {
            $('#current').text(el.getCurrentSlideCount());
        }
    });
  
});


$(document).ready(function() {
    $('#autoWidthNew').lightSlider({
      autoWidth:true,
        auto:true,
        loop:true,
        pauseOnHover: true,
        onBeforeSlide: function (el) {
            $('#current').text(el.getCurrentSlideCount());
        }
    });
    
});


/*LOGIN MODAL*/
// Get the modal.
var modal = document.getElementById("login-modal");

// Get the button that opens the modal.
var modalBtn = document.getElementById("login-button");

// Get the <span> element that closes the modal.
var spanClose = document.getElementsByClassName("modal-close")[0];

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

$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "UserHandling/login.php",
            data: $(this).serialize(), //We pass the form's content to the PHP file
            success: function(response) //We wait for a response
            {
                console.log("Outside");
                var jsonData = JSON.parse(response);
 
                switch (jsonData.success) {
                    case 1:
                        console.log("Logged in!!!!!!!!!!!!!!!");

                        break;
                    case -1:
                        break;
                    case -2:
                        break;
                    case -3:
                        break;
                    case 0:
                        alert("Critical error, do not call this file on it's own");

                        break;
                }
           }
       });
     });
});