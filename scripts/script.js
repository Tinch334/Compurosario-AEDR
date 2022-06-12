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