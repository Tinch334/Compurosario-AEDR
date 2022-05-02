$(document).ready(function () {
    $('.carousel').slick({
      //   change prev and next button
      prevArrow:
        '<button class="slick-prev" aria-label="Previous" type="button">&lt;</button>',
      nextArrow:
        '<button class="slick-next" aria-label="Next" type="button">&gt;</button>',
  
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 4,
    });
  });
  

  // esto es parte del codigo del mostrar info. del producto en hover que no funcionaba (funciona unicamente con el primer elemento, el primero con dicha id del DOM)
  /*
  $(document).ready(function() {
    $("#carousel-item").hover(function(){
      $("#prod-info").slideToggle("slow");
    });
  }); */
