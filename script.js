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