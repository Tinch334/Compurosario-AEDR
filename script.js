$(document).ready(function() {
  $('#autoWidthDiscount').lightSlider({
      autoWidth:true,
      loop:true,
      onSliderLoad: function() {
          $('#autoWidthDiscount').removeClass('cS-hidden');
      } 
  });
});


$(document).ready(function() {
  $('#autoWidthNew').lightSlider({
      autoWidth:true,
      loop:true,
      onSliderLoad: function() {
          $('#autoWidthNew').removeClass('cS-hidden');
      } 
  });  
});